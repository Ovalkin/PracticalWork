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
        switch ($page){
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

        if ($action == 'accept')

        dd($request->all());
    }
}
