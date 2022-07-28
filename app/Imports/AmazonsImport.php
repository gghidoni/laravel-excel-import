<?php

namespace App\Imports;


use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class AmazonsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        

        foreach(Order::get() as $order){
            if($row['amazon_order_id'] == $order->amazon_id){
                if($row['amazon_order_date'] != $order->order_date){
                    $order->update(['order_date' => $row['amazon_order_date']]);
                }
            }
        }


    }



}
