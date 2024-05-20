<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index($page = '')
    {
        if (session('userData')['role'] != 'supplier')
            return redirect()->to('/');
        $returnData['page'] = $page;
        switch ($page){
            case '':
                break;
            case 'orders':
                $order = new Order;
                $returnData['orders'] = $order->getAll();
                return view('ordersSupplier', $returnData);
            default:
                return redirect()->to('/');
        }
    }
    public function submitUserOrder(Request $request)
    {
        $action = $request['action'];
        $orderId = $request['idOrder'];

        if ($action == 'accept'){
            $order = new Order;
            $order->submitUserOrderSupplier($orderId);
            return redirect('supplier/orders');
        }

        dd($request->all());
    }
}
