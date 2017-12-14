<?php

namespace App\Http\Controllers;

use App\Category;
use App\Employee;
use App\Faqs;
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
        $quest_answer = Faqs::all();
        $list_cat = DB::table('category')
            ->where('category.exception','0')
            ->get()->toArray();

        $category = DB::table('category')
            ->where('category.locale','vi')
            ->where('category.exception','0')
            ->get()->toArray();
//        echo '<pre>';
//        print_r($category);
//        die;

        $product = DB::table('product')
            ->select ("product.*", "category.name as cat_name","category.exception")
            ->leftjoin("category", "product.cat_id", "=", "category.id")
            ->where('category.exception','0')
            ->get()->toArray();

        return view('front-end.index',compact('gcapital','employee','product','quest_answer','category','list_cat'));

    }

    public function getProductByCatID($id){
        $product = DB::table('product')
            ->where('product.cat_id',$id)
            ->get()->toArray();
        return $product;
    }
    public function getLanguage(Request $request)
    {
        if($request->lang <> ''){
            app()->setLocale($request->lang);
        }
        $employee = Employee::all();
        $gcapital = Gcapital::all();
        $product = Product::all();
        $quest_answer = Faqs::all();
        $list_cat = DB::table('category')
            ->where('category.exception','0')
            ->get()->toArray();
        $category = DB::table('category')
            ->where('category.locale','vi')
            ->where('category.exception','0')
            ->get()->toArray();
        return view('front-end.index',compact('gcapital','employee','product','quest_answer','category','list_cat'));
    }

    public function getProduct(){
        return view('front-end.product');
    }
}
