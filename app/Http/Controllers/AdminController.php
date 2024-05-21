<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index($page = '')
    {
        if (session('userData')['role'] != 'admin')
            return redirect()->to('/');
        $returnData['page'] = $page;
        switch ($page) {
            case '':
                return view('adminPanel', $returnData);
            case 'orders':
                $order = new Order;
                $returnData['orders'] = $order->getAll();
                return view('ordersAdmin', $returnData);
            default:
                return redirect()->to('/admin-panel');
        }
    }

    public function submitUserOrder(Request $request)
    {
        $action = $request['action'];
        $orderId = $request['idOrder'];

        $order = new Order;
        if ($action == 'accept') {
            $order->acceptUserOrder($orderId);
            session()->flash('alert', 'Заказ принят. Его айди: '.$orderId);
        } else {
            $order->rejectUserOrder($orderId);
            session()->flash('alert', 'Заказ отклонен. Его айди: '.$orderId);
        }
        return redirect('/admin-panel/orders');
    }
}
