<?php

namespace App\Http\Controllers;

use App\Gcapital;
use Validator;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\GcapitalRequest;

class GcapitalController extends Controller
{
    public function getList()
    {
        $posts = Gcapital::all();
        if (Auth::user()->role == 'author') {
            $posts = $posts->where('user_id', Auth::user()->id);
        }
        return view('admin.gcapital.list', ['posts' => $posts]);
    }

    public function getAdd()
    {
        return view('admin.gcapital.add');
    }

    public function postAdd(GcapitalRequest $request)
    {
        $post = new Gcapital();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $locale = $request->input('locale');
        $locale == 1 ? $post->locale = 'vi' : "";
        $locale == 2 ? $post->locale = 'en' : "";
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
                $post->image = 'upload/posts/' . $random_file_name;
            } else return redirect()->back()->with('errfile', 'Chưa hỗ trợ định dạng file vừa upload.')->withInput();

        } else $post->image = '';
        $post->save();
        Session::flash('flash_success', 'Thêm tin tức thành công.');
        return redirect()->route('list-post');
    }

    public function getUpdate($id)
    {
        $post = Gcapital::find($id);
        if ($post) {
            if (Auth::user()->role == 'admin') {
                return view('admin.gcapital.edit', ['post' => $post]);
            } else {
                Session::flash('flash_err', 'Bạn không có quyền thay đổi.');
                return redirect()->route('list-post');
            }
        } else {
            Session::flash('flash_err', 'Sai Thông tin Bài Viết.');
            return redirect()->route('list-post');
        }

    }

    public function postUpdate(GcapitalRequest $request, $id)
    {
        $post = Gcapital::find($id);
        if ($post) {
            if (Auth::user()->role == 'admin') {
                $post->title = $request->input('title');
                $post->content = $request->input('content');
                $locale = $request->input('locale');
                $locale == 1 ? $post->locale = 'vi' : "";
                $locale == 2 ? $post->locale = 'en' : "";
                //Upload Image
                if ($request->hasFile('img_post')) {
                    if(file_exists($post->image)){
                        unlink($post->image);
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
                        $post->image = 'upload/posts/' . $random_file_name;
                    } else return redirect()->back()->with('errfile', 'Chưa hỗ trợ định dạng file vừa upload.')->withInput();

                } else{
                    $post->image = $post->image;
                }
                $post->save();
                Session::flash('flash_success', 'Thay đổi thành công.');
                return redirect()->route('list-post');
            } else {
                Session::flash('flash_err', 'Bạn không có quyền thay đổi.');
                return redirect()->route('list-post');
            }
        } else {
            Session::flash('flash_err', 'Sai thông tin bài viết.');
            return redirect()->route('list-post');
        }
    }

    public function getDelete($id)
    {
        $post = Gcapital::find($id);
        if ($post) {
            if (Auth::user()->role == 'admin') {
                $post->delete();
                Session::flash('flash_success', 'Xóa thành công.');
                return redirect()->route('list-post');
            } else {
                Session::flash('flash_err', 'Bạn không có quyền xóa bài.');
                return redirect()->route('list-post');
            }
        } else {
            Session::flash('flash_err', 'Bài viết không tồn tại.');
        }
        return redirect()->route('list-post');
    }
}
