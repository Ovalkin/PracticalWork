<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index($page = '')
    {
        $returnData['page'] = $page;

        return view('index', $returnData);
    }
}
