<?php

namespace App\Http\Controllers;

use App\Category;
use Auth;
use DB;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;

class ProductController extends Controller
{
    public function getList()
    {
        $category = Category::all();
        $list_product = DB::table('product')
            ->select ("product.*", "category.name as cat_name")
            ->leftjoin("category", "product.cat_id", "=", "category.id")
            ->get()->toArray();
        return view('admin.product.list', ['list_product' => $list_product],['category' => $category]);
    }
    //Add product
    public function postAdd(Request $request){
        $product = new Product();
        $product->cat_id = $request->category;
        $product->name = $request->product_name;
        $product->interest_rate = $request->interest_rate;
        $product->investors = $request->investors;
        $product->funds = $request->funds;
        $locale = $request->input('locale');
        $locale == 1 ? $product->locale = 'vi' : "";
        $locale == 2 ? $product->locale = 'en' : "";
        $product->save();
        Session::flash('flash_success', 'Thêm sản phẩm thành công.');
        return redirect()->route('list-product');
    }

    public function getUpdate($id){
        $data = Product::find($id);
        $category = Category::all();
        if ($data) {
            if (Auth::user()->role == 'admin') {
                return view('admin.product.edit', ['data' => $data],['category' => $category]);
            } else {
                Session::flash('flash_err', 'Bạn không có quyền thay đổi.');
                return redirect()->route('list-product');
            }
        } else {
            Session::flash('flash_err', 'Sai Thông tin Bài Viết.');
            return redirect()->route('list-product');
        }
        return view('admin.product.edit');
    }

    //Add product
    public function postUpdate($id,Request $request){
        $product = Product::find($id);
        $product->cat_id = $request->category;
        $product->name = $request->product_name;
        $product->interest_rate = $request->interest_rate;
        $product->investors = $request->investors;
        $product->funds = $request->funds;
        $locale = $request->input('locale');
        $locale == 1 ? $product->locale = 'vi' : "";
        $locale == 2 ? $product->locale = 'en' : "";
        $product->save();
        Session::flash('flash_success', 'Thêm sản phẩm thành công.');
        return redirect()->route('list-product');
    }

}
