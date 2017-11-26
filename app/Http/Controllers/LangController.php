<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Input;
use Session;

class LangController extends Controller
{
    public function postLang()
    {
        Session::set('locale', Input::get('locale'));
        return Redirect::back();
    }
}
