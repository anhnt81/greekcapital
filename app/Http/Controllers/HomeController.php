<?php

namespace App\Http\Controllers;

use App\Gcapital;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        app()->setLocale('vi');
//        $list = Gcapital::all()->toArray();
//        echo '<pre>';
//        print_r($list);
//        die;
        return view('front-end.index');
    }
    public function getLanguage(Request $request)
    {
        if($request->lang <> ''){
            app()->setLocale($request->lang);
        }
        return view('front-end.index');
    }
}
