<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Gcapital;
use App\Product;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //language default
        app()->setLocale('en');
        $employee = Employee::all();
        $gcapital = Gcapital::all();

        $product = DB::table('product')
            ->select ("product.*", "category.name as cat_name","category.exception")
            ->leftjoin("category", "product.cat_id", "=", "category.id")
            ->where('product.locale','vi')
            ->where('category.exception','0')
            ->get()->toArray();

        echo '<pre>';
        print_r($product);
        die;

        return view('front-end.index',compact('gcapital','employee','product'));

    }
    public function getLanguage(Request $request)
    {
        if($request->lang <> ''){
            app()->setLocale($request->lang);
        }
        $employee = Employee::all();
        $gcapital = Gcapital::all();
        $product = Product::all();
        return view('front-end.index',compact('gcapital','employee','product'));
    }
}
