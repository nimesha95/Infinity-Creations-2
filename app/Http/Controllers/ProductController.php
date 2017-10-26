<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use \Cart as Cart;
use Auth;
use App\Order;

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

    public function checkout()
    {
        $order = new Order();
        $content = Cart::content();
        /*
        $order->addRow($content);
        dd($content);
        */
        $serializedContent = serialize($content);
        $total = Cart::subtotal();
        DB::insert('insert into orders (email,order_obj,total) values (?,?,?)', [Auth::user()->email, $serializedContent, $total]);
        return redirect()->route('user.getCart');
    }

}
