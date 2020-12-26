<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $setting = Setting::first();

        return view('welcome', ['setting' => $setting]);
    }
}
