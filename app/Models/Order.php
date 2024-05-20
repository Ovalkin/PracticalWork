<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function getAll()
    {
        $orders = Order::query()
            ->select('*')
            ->get()
            ->toArray();
        $returnOrders = array();
        foreach ($orders as $order) {
            $userData = new User;
            $userData = $userData->getUserData($order['user_id']);
            $order['userName'] = $userData['name'] . ' ' . $userData['surname'] . ' ' . $userData['lastname'];
            $returnOrders[] = $order;
        }
        return $returnOrders;
    }

    public function getForUserId($id)
    {
        return Order::query()
            ->select('*')
            ->where('user_id', '=', $id)
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

    public function submitUserOrder($id)
    {
        Order::query()->where('id', $id)->update(['status'=>'Принята администратором, ожидайте принятия поставщиком']);
    }
}
