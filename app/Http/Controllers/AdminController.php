<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Item_info;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function getIndex()
    {
        return view('admin.index');
    }

    public function getReports()
    {
        return view('admin.reports');
    }

    public function getUserHistory()
    {
        $userQry = DB::select("select name,email,role_name,created_at,last_login from users");
        return view('admin.login_history', ['userQry' => $userQry]);
    }

    public function getAdditems()
    {
        $lastID = 0;
        $LastproidRow = DB::select("SELECT * FROM product WHERE id = (SELECT max(id) FROM product)");
        foreach ($LastproidRow as $row) {
            $lastID = $row->pro_id;
        }
        $nextID = $this->getNextProid($lastID);     //get the next pro_id of the product table
        //dd($nextID);
        \Illuminate\Support\Facades\Session::put('nextID', $nextID);
        return view('admin.add_item');
    }

    public function postAdditems(Request $request)
    {
        //dd($request);

        $proid = $request->input('productid');
        $name = $request->input('name');
        $type = $request->input('type');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $unit = $request->input('unit');
        $availability = $request->input('availability');
        $description = $request->input('description');
        /*
        $image = $request->input('pri_image');
        $img1 = $request->input('img1');
        $img2 = $request->input('img2');
        $img3 = $request->input('img3');
        $img4 = $request->input('img4');
        */

        DB::insert("insert into product (pro_id,name,type,price,pricing_unit,availability,discount,item_description) values (?,?,?,?,?,?,?,?)",
            [$proid, $name, $type, $price, $unit, $availability, $discount, $description]);

        return redirect(route('admin.additems'))->with('message', 'Item Added Succesfully');
        //dd($item);
    }

    public function postRegUser(Request $request)
    {
        //dd($request);
        session(['AdminRegUser' => 1]);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email | required | unique:users',
            'pwd' => 'required | min:4',
            'role' => 'required'
        ]);


        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('pwd')),
            'role' => $request->input('role'),
            'role_name' => $this->getRoleName($request->input('role')),
        ]);
        $user->save();
        return redirect()->back()->with('message', 'User Added Succesfully');
    }

    public function postRemoveUser(Request $request)
    {
        $email = $request->input('email');
        $result = DB::select("select * from users WHERE email='$email'");
        //dd(sizeof($result));
        if (sizeof($result) > 0) {
            DB::delete("delete from users WHERE email='$email'");
            return redirect()->back()->with('message', 'User Removed Succesfully');
        } else {
            return redirect()->back()->with('Err_message', 'User Removal Failed');
        }
    }

    private function getRoleName($var)
    {
        if ($var == 0) {
            return 'Administrator';
        } elseif ($var == 1) {
            return 'User';
        } elseif ($var == 2) {
            return 'StockManager';
        } elseif ($var == 3) {
            return 'Cashier';
        } else {
            return 'Technician';
        }
    }

    private function getNextProid($var)
    {
        $prefix = substr($var, 0, 2);
        $postfix = substr($var, 2);
        $postfix = (int)$postfix;
        $postfix++;

        if (strlen((string)$postfix) == 3) {
            $postfix = "0" . $postfix;
        } elseif (strlen((string)$postfix) == 2) {
            $postfix = "00" . $postfix;
        } elseif (strlen((string)$postfix) == 1) {
            $postfix = "000" . $postfix;
        }
        $proid = $prefix . $postfix;
        return $proid;
    }

}
