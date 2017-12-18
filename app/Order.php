<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'Orders';

    public function getNextOrdid()
    {
        $LastproidRow = DB::select("SELECT * FROM orders WHERE id = (SELECT max(id) FROM orders)");
        foreach ($LastproidRow as $row) {
            $var = $row->order_id;
        }

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
        $orderID = $prefix . $postfix;
        return $orderID;
    }
}
