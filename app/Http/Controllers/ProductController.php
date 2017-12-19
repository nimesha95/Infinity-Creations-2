<?php

namespace App\Http\Controllers;


use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use \Cart as Cart;
use Auth;
use App\Order;
use App\Custom_orders;
use App\Mail\OrderMade;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function getIndex()
    {
        $items = DB::select("select * from product");
        //dd($items);
        return view('shop.index', ['items' => $items]);
    }

    public function getIndexX()
    {
        return view('shop.show');
    }

    public function getCustomOrder()
    {
        return view('shop.custom_order');
    }

    public function postCustomOrder(Request $request)
    {
        $custom_order = new Custom_orders;
        $custom_order->email = Auth::user()->email;
        $custom_order->order_type = $this->getOrderType($request->order_type);
        $custom_order->description = $request->comment;

        if ($request->design_method == 0) {
            $custom_order->method = $request->printing_method;
        } else {
            $custom_order->method = $request->design_method;
        }

        if ($request->hasFile('img')) {
            $img = $request->img;
            \Cloudder::upload($img);      //uploading image to cloudinary
            $c = \Cloudder::getResult();      //getting the result array
            $custom_order->img = $c['url'];

        }

        //dd($custom_order);
        $custom_order->save();
        return view('shop.custom_order');
    }

    public function getContact()
    {
        return view('shop.contact');
    }

    public function showItem($id)
    {
        $item = DB::select("select * from product where pro_id='" . $id . "'");
        //dd($item);
        return view('shop.show', ['items' => $item]);
    }

    public function getCart()
    {
        //dd(Cart::content());
        return view('shop.cart');
    }

    public function getAddToCart($id)
    {
        $item = DB::select("select * from product where pro_id='" . $id . "'");

        foreach ($item as $itm) {
            $proid = $itm->pro_id;
            $name = $itm->name;
            $price = $itm->price;
        }
        Cart::add($proid, $name, 1, $price);    //qty is set to 1 ---- need to update dynamically later
        Cart::store(Auth::user()->email);
        return back();
    }

    public function getRemoveFromCart($count, $rowid, $curcount = null)
    {
        if ($curcount == 1) {
            Cart::remove($rowid);   //removes item if curQty is less than 1
        } elseif ($count == 1) {
            $newQty = $curcount - $count; //subtacts 1 from current Qty
            Cart::update($rowid, $newQty);
        } elseif (!strcmp('all', $count)) {
            Cart::remove($rowid);
        }
        Cart::store(Auth::user()->email);
        return redirect()->route('user.getCart');
    }

    public function getPlusOneCart($rowid, $curcount)
    {
        $newQty = $curcount + 1; //add 1 to current Qty
        Cart::update($rowid, $newQty);
        Cart::store(Auth::user()->email);
        return redirect()->route('user.getCart');
    }

    public function checkout($id)
    {
        //dd($id);
        if ($id == 1) {
            return view('shop.checkout_addr', ['addr' => Auth::user()]);   //returns address info of the current logged on user
        } elseif ($id == 2) {
            return view('shop.checkout_delivery');
        } elseif ($id == 3) {
            return view('shop.checkout_payment');
        } elseif ($id == 4) {
            return view('shop.checkout_review');
        }

        /*
        $order = new Order();
        $content = Cart::content();

        /*
        $order->addRow($content);
        dd($content);
        */

        /*
        $serializedContent = serialize($content);
        $total = Cart::subtotal();
        DB::insert('insert into orders (email,order_obj,total) values (?,?,?)', [Auth::user()->email, $serializedContent, $total]);
        return redirect()->route('user.getCart');
    */
    }

    public function postcheckout(Request $request, $id)
    {
        if ($id == 1) {
            //dd($request);
            return view('shop.checkout_addr');
        } elseif ($id == 2) {   //addr info
            //dd($request);
            $order = new Order;
            $nextOrderID = $order->getNextOrdid();
            session(['ordID' => $nextOrderID]);
            $order->order_id = $nextOrderID;
            $order->email = Auth::user()->email;

            if ($request->addr_sel == 1) {
                $order->addr_line1 = Auth::user()->addr_line1;
                $order->addr_line2 = Auth::user()->addr_line2;
                $order->addr_city = Auth::user()->addr_city;
                $order->phone_no = Auth::user()->phone_no;
            } elseif ($request->addr_sel == 2) {
                $order->addr_line1 = $request->addr_line1;
                $order->addr_line2 = $request->addr_line2;
                $order->addr_city = $request->addr_city;
                $order->phone_no = $request->phone_no;
            }

            $content = Cart::content();
            $serializedContent = serialize($content);   //convert the array into a string

            $order->order_obj = $serializedContent;
            $order->total = Cart::subtotal();

            $order->save();
            //dd($order);

            return view('shop.checkout_delivery');
        } elseif ($id == 3) {   //delivery info
            $ordID = session('ordID');

            DB::table('orders')
                ->where('order_id', $ordID)
                ->update(['delivery_method' => $request->delivery]);

            return view('shop.checkout_payment');
        } elseif ($id == 4) {   //payment info
            //dd($request);
            $payment_method = $request->payment;
            session(['payment' => $payment_method]);

            $ordID = session('ordID');

            DB::table('orders')
                ->where('order_id', $ordID)
                ->update(['payment_method' => $payment_method]);

            return view('shop.checkout_review');
        } elseif ($id == 5) {
            $ordID = session('ordID');
            $payment_method = session('payment');
            $subtotal = Cart::subtotal();

            DB::table('orders')
                ->where('order_id', $ordID)
                ->update(['finalized' => 1]);


            if ($payment_method == "paypal") {
                return redirect()->route('addmoney.paywithpaypal', $subtotal);
            }

            Cart::destroy();    //deleting the cart
            Mail::to(Auth::user()->email)->send(New OrderMade());
            return view('shop.cart');
        }
    }


    private function getOrderType($id)
    {
        //used to get the text when custom order is submitted
        if ($id == 1) {
            return 'Printing';
        } elseif ($id == 2) {
            return 'Designing';
        } elseif ($id == 3) {
            return 'Event Planing';
        } else {
            return 'Other';
        }
    }

}
