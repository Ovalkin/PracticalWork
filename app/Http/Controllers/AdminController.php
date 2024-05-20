<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index($page = '')
    {
        $returnData['page'] = $page;

        $order = new Order;
        $returnData['orders'] = $order->getAll();
        return view('indexAdmin', $returnData);
    }

    public function submitUserOrder(Request $request)
    {
        $action = $request['action'];
        $orderId = $request['idOrder'];

        if ($action == 'accept')

        dd($request->all());
    }
}
