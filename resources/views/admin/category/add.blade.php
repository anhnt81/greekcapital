@extends('admin.layout.layout')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh Mục Sản Phẩm
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{ $err }}<br>
                        @endforeach
                    </div>
                @endif
                @if(Session::has('flash_success'))
                <div class="alert alert-success">
                    {{ session('flash_success') }}
                </div>
                @endif
                <form action="admin/category/add" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tên Danh Mục</label>
                        <input class="form-control" name="cate_name" id="title" placeholder="Tên Danh Mục" />
                    </div>
                    <div class="form-group">
                        <label>Ngôn ngữ</label>
                        <select class="form-control" name="locale">
                            <option disabled selected value> -- Chọn ngôn ngữ --</option>
                            <option value="1">{{config('local.language.vi')}}</option>
                            <option value="2">{{config('local.language.en')}}</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label>Thỏa thuận</label>
                        <input type="checkbox" name="exception" id="exception" />
                    </div>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
