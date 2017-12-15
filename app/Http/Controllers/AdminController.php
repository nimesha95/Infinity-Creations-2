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

    public function getAvailability()
    {
        $productQry = DB::select("select * from product");
        return view('admin.change_available', ['items' => $productQry]);
    }

    public function postEditItem(Request $request)
    {
        //dd($request);
        $proid = $request->input('productid');
        $name = $request->input('name');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $availability = $request->input('availability');
        $description = $request->input('description');

        DB::table('product')->where('pro_id', $proid)->update(array(
            'name' => $name,
            'price' => $price,
            'discount' => $discount,
            'availability' => $availability,
            'item_description' => $description,
        ));

        return redirect(route('admin.index'))->with('message', 'Item Edited Succesfully');
    }

    public function getEditItem(Request $request)
    {
        dd($request);
        session(['AdminEditItem' => 1]);
        $this->validate($request, [
            'pro_id' => 'required | is_proid | min:6 | max:6',
        ]);
        $pro_id = $request->input('pro_id');
        $productQry = DB::select("select * from product WHERE pro_id='$pro_id'");
        // dd($productQry);
        return view('admin.edit_item', ['productQry' => $productQry]);
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
        $count = 0;
        //added "image not avialable" link to the imgArr
        $imgThumb = [];
        $imgArr = ["http://res.cloudinary.com/docp8wv1x/image/upload/v1508704084/dprnfntaojeelbyvakmn.jpg", "http://res.cloudinary.com/docp8wv1x/image/upload/v1508704084/dprnfntaojeelbyvakmn.jpg", "http://res.cloudinary.com/docp8wv1x/image/upload/v1508704084/dprnfntaojeelbyvakmn.jpg"];
        if ($request->hasFile('img1')) {
            $thumb = $request->img1;
            \Cloudder::upload($thumb);      //uploading image to cloudinary
            $c = \Cloudder::getResult();      //getting the result array
            $imgThumb[0] = $c['url'];
            //dd($c);
        }
        if ($request->hasFile('img')) {
            foreach ($request->img as $image) {
                \Cloudder::upload($image);      //uploading image to cloudinary
                $c = \Cloudder::getResult();      //getting the result array
                $imgArr[$count] = $c['url'];
                $count = $count + 1;
            }
        }

        $proid = $request->input('productid');
        $name = $request->input('name');
        $type = $request->input('type');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $unit = $request->input('unit');
        $availability = $request->input('availability');
        $description = $request->input('description');
        $thumb = $imgThumb[0];

        $img1 = $imgArr[0];
        $img2 = $imgArr[1];
        $img3 = $imgArr[2];


        DB::insert("insert into product (pro_id,name,type,price,pricing_unit,availability,discount,item_description,img1,img2,img3,thumb) values (?,?,?,?,?,?,?,?,?,?,?,?)",
            [$proid, $name, $type, $price, $unit, $availability, $discount, $description, $img1, $img2, $img3, $thumb]);

        return redirect(route('admin.additems'))->with('message', 'Item Added Succesfully');
        //dd($item);

    }

    public function postRemoveItem(Request $request)
    {
        //dd($request);
        session(['AdminRemoveItem' => 1]);
        $this->validate($request, [
            'pro_id' => 'required | is_proid | min:6 | max:6',
        ]);
        $pro_id = $request->input('pro_id');
        DB::delete("delete from product WHERE pro_id='$pro_id'");
        return redirect(route('admin.index'))->with('message', 'Item Removed Succesfully');
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
