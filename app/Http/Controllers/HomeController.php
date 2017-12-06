<?php

namespace App\Http\Controllers;

use App\Gcapital;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        app()->setLocale('vi');
        $gcapital = Gcapital::all();

        return view('front-end.index',compact('gcapital'));

    }
    public function getLanguage(Request $request)
    {
        if($request->lang <> ''){
            app()->setLocale($request->lang);
        }
        return view('front-end.index');
    }
}
