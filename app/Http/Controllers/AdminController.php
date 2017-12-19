<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Item_info;
use App\Expenditure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


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

    // xoxoxoxoxo
    public function getCurrentOrders()
    {
        $currOrd = DB::select("select order_id,email,order_obj,total,date from orders");
        $count = 0;
        foreach ($currOrd as $ord) {
            $order = $ord->order_obj;
            $order = unserialize($order);
            $currOrd[$count]->order_obj = $order;
            $count = $count + 1;
        }
        //dd($currOrd[0]->order_obj);
        return view('admin.current_orders', ['currOrd' => $currOrd]);
    }

    public function getOrderHistory()
    {
        $orderHist = DB::select("select order_id,email,order_obj,total,date,paid_date from orderhistory");
        return view('admin.order_history', ['orderHist' => $orderHist]);
    }

    public function getTrack()
    {
        return view('admin.tracking');
    }

    public function getPendingOrders()
    {
        $pendOrd = DB::select("select order_id,email,order_obj,total,date,phone_no from orders WHERE finalized = 1 AND completed = 0");
        $count = 0;
        foreach ($pendOrd as $ord) {
            $order = $ord->order_obj;
            $order = unserialize($order);
            $pendOrd[$count]->order_obj = $order;
            $count = $count + 1;
        }
        return view('admin.pending_orders', ['pendOrd' => $pendOrd]);
    }

    public function getItems()
    {
        $itemList = DB::select("select pro_id,name,type,availability,quantity from product");
        return view('admin.item_list', ['itemList' => $itemList]);
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
        //dd($request);
        session(['AdminEditItem' => 1]);
        $this->validate($request, [
            'pro_id' => 'required | is_proid | min:6 | max:6',
        ]);
        $pro_id = $request->input('pro_id');
        $productQry = DB::select("select * from product WHERE pro_id='$pro_id'");
        // dd($productQry);
        if (count($productQry) > 0)
            return view('admin.edit_item', ['productQry' => $productQry]);
        else
            return redirect(route('admin.index'))->with('Err_message', 'Item Not Found...');
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

    public function syncEarning()
    {
        $sales = DB::select('select date(date) as day,sum(total) as tot from orders group by date(date)');

        $arr = array();

        foreach ($sales as $record) {
            $temp = [$record->day, $record->tot];
            array_push($arr, $temp);
        }

        return response()->json(['msg' => $arr], 200);
    }

    public function syncData(Request $request)
    {
        $recentOrder = DB::select('SELECT count(*) as total FROM orders WHERE DATE(date) = CURDATE();');
        $recentEarning = DB::select('select date(date) as day,sum(total) as tot from orders group by date(date) ORDER BY day DESC LIMIT 1');

        $arr = [$recentOrder[0]->total, $recentEarning[0]->tot];
        return response()->json(['msg' => $arr], 200);
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


    // xoxoxoxoxox

    public function salaryCalc(Request $request)
    {
//        dd($request);
        $role1 = $request->role1;
//        dd($role1);
        $begin_date = $request->begin_date;
//        dd($begin_date);
        $end_date = $request->end_date;
//        $data = DB::table('employee')
//            ->join('attendance','employee.emp_id','=','attendance.emp_id')
//            ->join('salary','employee.role','=','salary.role')
//            ->where([$role,'employee.role'],['attendance.clock_in','>=',$begin_date],['attendance.clock_out','<=',$end_date])
//            ->select('employee.*','attendance.clock_in','attendance.clock_out','salary.sal_per_hr')
//            ->get();
//        dd($data);
        $data = DB::table('employee')
            ->join('attendance', 'employee.emp_id', '=', 'attendance.emp_id')
            ->join('salary', 'employee.role', '=', 'salary.role')
            ->select('employee.*', 'attendance.clock_in', 'attendance.clock_out', 'salary.sal_per_hr')
            ->get();
//        for($x=0;$x<sizeof($data->toArray());$x++){
//            $in = $data->pluck('clock_in')->toArray();
//            $in1 = new Carbon($in[$x]);
//            $out = $data->pluck('clock_out')->toArray();
//            $out1 = new Carbon($out[$x]);
//            $diff = $in1->diffInSeconds($out1);
//            $hours = (float)($diff/(60*60));
//
//            $sal = $data->pluck('sal_per_hr')->toArray();
//            $sal2 = (float)$sal[$x];
//
//            $total_sal = $hours * $sal2;
//
//            $arr[] = array($total_sal);
//        }
        $array2 = [];
        for ($i = 0; $i < sizeof($data->toArray()); $i++) {
            $id = $data->pluck('emp_id')->toArray()[$i];
            $first = $data->pluck('first_name')->toArray()[$i];
            $last = $data->pluck('last_name')->toArray()[$i];
            $role = $data->pluck('role')->toArray()[$i];
            $clock_in = explode(' ', $data->pluck('clock_in')->toArray()[$i])['0'];
            $clock_out = explode(' ', $data->pluck('clock_out')->toArray()[$i])['0'];
//            dd($clock_in);
//            $salary = $arr[$i][0];
            if (($role == $role1) && ((int)$clock_in >= (int)$begin_date) && ((int)$clock_out <= (int)$end_date)) {
                $array2[] = array('emp_id' => $id, 'first_name' => $first, 'last_name' => $last, 'role' => $role);
            }
        }
        if ($array2) {
            return view('admin.salary', ['array2' => $array2]);
        } else {
            return view('admin.index')->with('No results found!');
        }
    }

    public function getSalary($emp_id)
    {
//        dd($emp_id);
        $data = DB::table('employee')
            ->join('attendance', 'employee.emp_id', '=', 'attendance.emp_id')
            ->join('salary', 'employee.role', '=', 'salary.role')
            ->where('attendance.emp_id', '=', $emp_id)
            ->select('employee.*', 'attendance.clock_in', 'attendance.clock_out', 'salary.sal_per_hr')
            ->get();
        $h = 0.0;
        for ($x = 0; $x < sizeof($data->toArray()); $x++) {
            $in = $data->pluck('clock_in')->toArray();
            $in1 = new Carbon($in[$x]);
            $out = $data->pluck('clock_out')->toArray();
            $out1 = new Carbon($out[$x]);
            $diff = $in1->diffInSeconds($out1);
            $hours = (float)($diff / (60 * 60));
            $hours1 = number_format(($h + $hours), 2);
            $sal = $data->pluck('sal_per_hr')->toArray();
            $sal2 = (float)$sal[$x];
            $total_sal = number_format(($hours1 * $sal2), 2);
            $arr[] = array($hours1, $total_sal);
        }
//        dd($arr);
        for ($i = 0; $i < sizeof($data->toArray()); $i++) {
            $id = $data->pluck('emp_id')->toArray()[$i];
            $first = $data->pluck('first_name')->toArray()[$i];
            $last = $data->pluck('last_name')->toArray()[$i];
            $role = $data->pluck('role')->toArray()[$i];
            $num_of_hours = $arr[0][0];
            $salary = $arr[0][1];
//            dd($salary);
            $array2[] = array('emp_id' => $id, 'first_name' => $first, 'last_name' => $last, 'role' => $role, 'num_of_hours' => $num_of_hours, 'salary' => $salary);
        }
        if ($array2) {
            return view('admin.total_sal', ['array2' => $array2]);
        } else {
            return view('admin.total_sal')->with('No results found!');
        }
    }

    public function getAddExpense()
    {
        return view('admin.expense');
    }

    public function postAddExpense(Request $request)
    {
        $date = $request->input('date_pick');
        $type = $request->input('typeSelected');
        $remarks = $request->input('description');
        $total = $request->input('currency');

        $expense = new Expenditure();
        $expense->date = $date;
        $expense->type = $type;
        $expense->remarks = $remarks;
        $expense->total = $total;

        $expense->save();
        return redirect()->back();

    }


}
