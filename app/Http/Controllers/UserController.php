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
        if ($userId != null) {
            $returnData['userData'] = session('userData');
        }

        switch ($page) {
            case '':
                return view('index', $returnData);
            case 'orders':
                $order = new Order;
                $returnData['orders'] = $order->getForUserId(session('userData')['id']);
                return view('orders', $returnData);
            case 'setting':
                return view('setting', $returnData);
            default:
                return redirect()->to('/');
        }
    }

    public function signout()
    {
        session()->flush();
        session()->flash('alert', 'Вы успешно вышли из своего аккаунта!');
        return redirect()->to('/');
    }

    public function signin(Request $request)
    {
        $signinData = $request->all();

        if (in_array(null, $signinData)) {
            session()->flash('alert', 'Заполните все поля и попробуйте снова!');
            return redirect()->to('/');
        }

        $user = new User;
        $userId = $user->signinCheck($signinData);
        if ($userId) {
            $userData = $user->getUserData($userId);
            session(['signedUser' => true]);
            session(['userData' => $userData]);
        } else session()->flash('alert', 'Логин или пароль не верны!');
        session()->flash('alert', 'Вы успешно вошли!');
        return redirect()->to('/');
    }

    public function signup(Request $request)
    {
        $signupData = $request->all();

        unset($signupData['_token']);

        foreach ($signupData as $input) {
            if ($input == null | $input == '+7') {
                session()->flash('alert', 'Заполните все поля и попробуйте снова');
                return redirect()->to('/');
            }
        }

        $user = new User();

        $phone = $signupData['phone'];                   //
        $email = $signupData['email'];                   // Проверка перед регестрацией на существование в бд
        $checkData = $user->signupCheck($phone, $email); //

        if ($signupData['password'] == $signupData['rePassword']) {
            unset($signupData['rePassword']);
            if ($checkData) {
                $user->signup($signupData);
            } else {
                session()->flash('alert', 'Почта или телефон уже заняты');
                return redirect()->to('/');
            }
        } else {
            session()->flash('alert', 'Пароли не совпадают');
            return redirect()->to('/');
        }

        $signinData['email'] = $signupData['email'];
        $signinData['password'] = $signupData['password'];
        $signinData = Request::create('/signin', 'POST', $signinData);
        $this->signin($signinData);

        session()->flash('alert', 'Вы успешно зарегестрировались!');
        return redirect()->to('/');
    }

    public function makeOrder(Request $request)
    {
        $orderData = $request->all();
        unset($orderData['_token']);

        $orderData['user_id'] = session('userData')['id'];

        $order = new Order;
        $order->addOrder($orderData);
        session()->flash('alert', 'Заказ успешно оформлен');
        return redirect()->to('orders');
    }

    public function changeUserData(Request $request)
    {
        $newUserData = $request->all();
        $userId = session('userData')['id'];
        unset($newUserData['_token']);

        $user = new User;

        $user->changeUserData($newUserData, $userId);

        session(['userData' => $user->getUserData($userId)]);
        session()->flash('alert', 'Вы успешно поменяли данные!');

        return redirect()->to('/setting');
    }
}
