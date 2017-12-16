<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use Datatables;
use Validator;
use Response;
use Auth;
use Session;

class EmployeeController extends Controller
{
    public function getList()
    {
        $list_employee = Employee::all();
        return view('admin.employee.list', ['list_employee' => $list_employee]);
    }

    public function postAdd(Request $request)
    {
        $employee = new Employee();
        $employee->name = $request->input('employee_name');
        $employee->position = $request->input('position');
        $employee->info = $request->input('info');
        $locale = $request->input('locale');
        $locale == 1 ? $employee->locale = 'vi' : "";
        $locale == 2 ? $employee->locale = 'en' : "";
        //Upload Image
        if ($request->hasFile('img_post')) {
            $file = $request->file('img_post');
            $file_extension = $file->getClientOriginalExtension(); // Lấy đuôi của file
            if ($file_extension == 'png' || $file_extension == 'jpg' || $file_extension == 'jpeg') {
                $file_name = $file->getClientOriginalName();
                $random_file_name = str_random(4) . '_' . $file_name;
                while (file_exists('upload/posts/' . $random_file_name)) {
                    $random_file_name = str_random(4) . '_' . $file_name;
                }
                $file->move('upload/posts', $random_file_name);
                $employee->image = 'upload/posts/' . $random_file_name;
            } else return redirect()->back()->with('errfile', 'Chưa hỗ trợ định dạng file vừa upload.')->withInput();

        } else $employee->image = '';
        $employee->save();
        Session::flash('flash_success', 'Thêm nhân viên thành công.');
        return redirect()->route('list-employee');
    }

    public function getUpdate($id){
        $data = Employee::find($id);
        if ($data) {
            if (Auth::user()->role == 'admin') {
                return view('admin.employee.edit', ['data' => $data]);
            } else {
                Session::flash('flash_err', 'Bạn không có quyền thay đổi.');
                return redirect()->route('list-employee');
            }
        } else {
            Session::flash('flash_err', 'Sai Thông tin Bài Viết.');
            return redirect()->route('list-employee');
        }
        return view('admin.employee.edit');
    }

    public function postUpdate($id,EmployeeRequest $request)
    {
        $employee = Employee::find($id);
        $employee->name = $request->input('employee_name');
        $employee->position = $request->input('position');
        $employee->info = $request->input('info');
        $locale = $request->input('locale');
        $locale == 1 ? $employee->locale = 'vi' : "";
        $locale == 2 ? $employee->locale = 'en' : "";
        //Upload Image
        if ($request->hasFile('img_post')) {
            if(file_exists($employee->image)){
                unlink($employee->image);
            }
            $file = $request->file('img_post');
            $file_extension = $file->getClientOriginalExtension(); // Lấy đuôi của file
            if ($file_extension == 'png' || $file_extension == 'jpg' || $file_extension == 'jpeg') {
                $file_name = $file->getClientOriginalName();
                $random_file_name = str_random(4) . '_' . $file_name;
                while (file_exists('upload/posts/' . $random_file_name)) {
                    $random_file_name = str_random(4) . '_' . $file_name;
                }
                $file->move('upload/posts', $random_file_name);
                $employee->image = 'upload/posts/' . $random_file_name;
            } else return redirect()->back()->with('errfile', 'Chưa hỗ trợ định dạng file vừa upload.')->withInput();

        } else{
            $employee->image = $employee->image;
        }
        $employee->save();
        Session::flash('flash_success', 'Sửa nhân viên thành công.');
        return redirect()->route('list-employee');
    }

    public function dataTable()
    {
        $model = Employee::query();
        $data = $model->get()->toArray();
        foreach ($data as $key => $value){
            $value['info'] = strip_tags($data[$key]['info']);

            $value['locale'] == 'vi' ? $data[$key]['locale'] = 'Tiếng Việt' : "";
            $value['locale'] == 'en' ? $data[$key]['locale'] = 'English' : "";
        }
        return DataTables::of($data)
            ->addColumn('action', '
                	<button type="button" class="btn btn-info btn-sm">
                		<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa 
                	</button></a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#show-delete">
                    	<i class="fa fa-trash" aria-hidden="true"></i> Xoá
                    </button>')
            ->make(true);
    }
}
