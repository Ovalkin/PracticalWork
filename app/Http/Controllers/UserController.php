<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($page = '')
    {
        $returnData['page'] = $page;

        $userId = session('signedUser');
        if (isset($userId)) {
            $userData = new User;
            $returnData['userData'] = $userData->getUserData($userId);
        }

        switch ($page) {
            case '':
                break;
            case 'orders':
                $order = new Order;
                $returnData['orders'] = $order->getForUserId($userId);
                break;
            default:
                return redirect()->to('/');
        }

        return view('index', $returnData);
    }

    public function signout()
    {
        session()->forget('signedUser');
        return redirect()->to('/');
    }

    public function signin(Request $request)
    {
        $signinData = $request->all();

        if (in_array(null, $signinData)) {
            return 'Заполните все поля';
        }

        $user = new User;
        $userId = $user->signinCheck($signinData);
        if ($userId) {
            session(['signedUser' => $userId]);
        }
        return redirect()->to('/');
    }

    public function signup(Request $request)
    {
        $signupData = $request->all();

        unset($signupData['_token']);

        foreach ($signupData as $input) {
            if ($input == null | $input == '+7') return "Заполните все поля";
        }

        $user = new User();

        $phone = $signupData['phone'];                   //
        $email = $signupData['email'];                   // Проверка перед регестрацией на существование в бд
        $checkData = $user->signupCheck($phone, $email); //

        if ($signupData['password'] == $signupData['rePassword']) {
            unset($signupData['rePassword']);
            if ($checkData) {
                $user->signup($signupData);
            } else return 'Почти или телефон уже заняты!'; //
        } else return 'Пароли не совпадают';               // Поменять на уведмлялку

        $signinData['email'] = $signupData['email'];
        $signinData['password'] = $signupData['password'];
        $signinData = Request::create('/signin', 'POST', $signinData);
        $this->signin($signinData);

        return redirect()->to('/');
    }

    public function makeOrder(Request $request)
    {
        $orderData = $request->all();
        unset($orderData['_token']);

        $orderData['user_id'] = session('signedUser');

        $order = new Order;
        $order->addOrder($orderData);

        return redirect()->to('orders');
    }
}
