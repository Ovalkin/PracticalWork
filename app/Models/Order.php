<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function getForUserId($id)
    {
        return Order::query()
            ->select('*')
            ->where('user_id','=', $id)
            ->get()
            ->toArray();
    }

    public function addOrder($orderData)
    {
        $orderData['created_at'] = date('Y-m-d H-i-s');
        $orderData['supplier_id'] = null;
        $orderData['status'] = 'На рассмотрении администратором';

        if (Order::query()->insert($orderData)) return true;
        else return false;
    }
}
