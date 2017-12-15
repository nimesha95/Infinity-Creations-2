<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use \Cart as Cart;

class UserController extends Controller
{
    public function getSignup()
    {
        return view('user.signup');
    }

    public function postEditInfo(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required'
        ]);

        $mobile = $request->input('mobile');
        $addrLine1 = $request->input('addrLine1');
        $addrLine2 = $request->input('addrLine2');
        $addrCity = $request->input('addrCity');

        $email = Auth::user()->email;


        DB::table('users')->where('email', $email)->update(array(
            'addr_line1' => $addrLine1,
            'addr_line2' => $addrLine2,
            'addr_city' => $addrCity,
            'phone_no' => $mobile,
        ));
        return redirect(route('user.profile'))->with('message', 'Information Updated');
    }

    public function getSignin()
    {
        return view('user.signin');
    }

    public function getResetPass()
    {
        return view('user.reset_password');
    }

    public function postResetPass(Request $request)
    {
        dd($request);
        //not complete
        //need to make custom reset pass function
    }

    public function postSignin(Request $request)
    {
        //dd($request);

        $this->validate($request, [
            'email' => 'email | required ',
            'password' => 'required | min:4'
        ]);

        $remember = $request->has('rememberme') ? true : false;      //getting the remember me tick value from user


        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)) {
            $type = Auth::user()->role;
            //dd($type);
            DB::table('users')->where('email', $request->input('email'))->update(array(
                'last_login' => Carbon::now()->toDateTimeString(),      //saving current timestamp as last login activity
            ));
            switch ($type) {
                case 0: //0 is admin
                    return redirect()->route('admin.index');
                    break;
                case 1: //1 is normal user
                    Cart::restore(Auth::user()->email);
                    return redirect()->route('product.index');
                    break;
                case 2: //2 is stockmanager
                    return redirect()->route('stockmanager.index');
                    break;
                case 3: //3 is cashier
                    return redirect()->route('cashier.index');
                    break;
                case 4: //4 is technician
                    return redirect()->route('technician.index');
                    break;
            }
        } else {
            return redirect()->back()->withErrors("Please Check your credentials");
        }

    }

    public function getProfile()
    {
        return view('user.profile');
    }

    public function viewOrders()
    {
        $orders = DB::select("select * from orders where email='" . Auth::user()->email . "'");

        $count = 0;
        foreach ($orders as $order) {
            $order_obj = unserialize($order->order_obj);
            //    $order_obj = (array) $order_obj;
            //dd($order_obj);
            $orders[$count]->order_obj = $order_obj;
            $count++;
        }

        //dd($orders);
//This return the order, but need to show it .... RECHECK
        return view('user.profile', ['orders' => $orders]);
    }

    public function postRegUser(Request $request)
    {
        //dd($request);
        session(['AdminRegUser' => 1]);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email | required | unique:users',
            'password' => 'required | min:4',
        ]);


        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 1,
            'role_name' => 'user',
        ]);
        $user->save();
        Auth::login($user);
        return redirect()->route('product.index');
    }


    public function getLogout()
    {

        if (Auth::user()->role == 1) {
            Cart::store(Auth::user()->email);       //saving the cart into a database
            Cart::destroy();        //destroying the current cart object
        }

        Auth::logout();
        return redirect()->back();
    }
}
