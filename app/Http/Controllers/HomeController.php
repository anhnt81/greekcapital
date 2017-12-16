<?php

namespace App\Http\Controllers;

use App\Category;
use App\Employee;
use App\Faqs;
use App\Gcapital;
use App\Product;
use DB;
use Mail;
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

        $product = DB::table('product')
            ->select ("product.*", "category.name as cat_name","category.exception")
            ->leftjoin("category", "product.cat_id", "=", "category.id")
            ->where('category.exception','0')
            ->get()->toArray();

        return view('front-end.index',compact('gcapital','employee','product','quest_answer','category','list_cat'));

    }

    public static function getProductByCatID($id){
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
    public function getEmail(){
        return view('front-end.email.step1');
    }
    public function getStep2(){
        return view('front-end.step2');
    }
    public function postStep1(Request $request){
        $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
        );

        Mail::send('front-end.email.step1', ['list' => $data], function($message) use ($data)
        {
            $message->from('chipstart1994@gmail.com', 'Customer');
            $message->to('anhntd00199@fpt.edu.vn', 'Tuấn Anh')->subject('Thông tin nhà đầu tư!');
        });
        return redirect()->route('step2');
    }
}
