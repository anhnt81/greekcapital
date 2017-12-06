<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use Datatables;

class CategoryController extends Controller
{
    public function getList()
    {
    	$cates = Category::all();
    	return view('admin.category.list',["cates"=>$cates]);
    }
    public function getAdd()
    {
    	return view('admin.category.add');
    }
    public function postAdd(Request $req)
    {
    	$this->validate($req,
    		[
    			'cate_name'=>'required|unique:category,name|min:3|max:70',
    		],
    		[
    			'cate_name.required'=>'Bạn chưa nhập tên chuyên mục!',
                'cate_name.min'=>'Tên chuyên mục gồm ít nhất 3 ký tự!',
                'cate_name.max'=>'Tên chuyên mục gồm tối đa 50 ký tự!',
    		]);
    	$cate = new Category();
    	$cate->name = $req->input('cate_name');
    	$exception = $req->input('exception');
        $exception == 'on' ? $cate->exception = 1 : $cate->exception = 0;
        $locale = $req->input('locale');
        $locale == 1 ? $cate->locale = 'vi' : "";
        $locale == 2 ? $cate->locale = 'en' : "";
    	$cate->save();
    	Session::flash('flash_success','Thêm danh mục thành công.');
        return redirect()->route('list-category');
    }
    public function dataTable()
    { 
    	
    	$model = Category::query();
        $data = $model->get()->toArray();
        foreach ($data as $key=>$value){
            $value['exception'] == 0 ? $data[$key]['exception'] = "" : $data[$key]['exception'] = "Thỏa Thuận";
        }
    	return DataTables::of($data)
                ->addColumn('action', '
                	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#show-update">
                		<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa 
                	</button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#show-delete">
                    	<i class="fa fa-trash" aria-hidden="true"></i> Xoá
                    </button>')
                ->make(true);
    }

    public function postUpdate(Request $request)
    {
    	if($request->ajax()){
            
    		$cate = Category::find($request->input('id'));
    		if( $cate ) {
                $cate->name = $request->input('cate-name');
                $exception = $request->input('exception');
                $locale = $request->input('locale');
                $locale == 1 ? $exception->locale = 'vi' : "";
                $locale == 2 ? $exception->locale = 'en' : "";
                $exception == 'on' ? $cate->exception = 1 : $cate->exception = 0;
    			$cate->save();
    			return 'ok';
    		} else return 'Sai ID';
    	}
    }

    public function delete(Request $request)
    {
    	if($request->ajax()){
    		$cate = Category::find($request->input('id'));
    		if( $cate ) {
    			$cate->delete();
    			return 'ok';
    		} else return 'err';
    	}
    }
}
