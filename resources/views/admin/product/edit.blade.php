@extends('admin.layout.layout')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nhân Viên
                        <small>Cập nhật</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:70px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{ $err }}<br>
                            @endforeach
                        </div>
                    @endif

                    <form action="admin/employee/update/{{$data->id}}" method="Post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label>Tên Nhân Viên</label>
                            <input type="text" name="employee_name" id="employee_name" class="form-control" value="{!! $data->name !!}"
                                   placeholder="Nhập Tên Nhân Viên">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Chức Vụ</label>
                            <input type="text" value="{!! $data->position !!}" class="form-control" id="position" name="position">
                        </div>
                        <div class="form-group">
                            <label>Thông tin nhân viên</label>
                            <textarea name="info" id="demo" class="form-control ckeditor"
                                      rows="3">
                                {!! $data->info !!}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Ngôn ngữ</label>
                            <select class="form-control" name="locale" id="locale">
                                @if($data->locale == 'vi')
                                    <option selected value="1">{{config('local.language.vi')}}</option>
                                    <option value="2">{{config('local.language.en')}}</option>
                                @else
                                    <option selected value="2">{{config('local.language.en')}}</option>
                                    <option value="1">{{config('local.language.vi')}}</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Hình ảnh</label><br/>
                            <img style="width: 75px;height: 75px;margin-bottom: 10px;" src="{{$data->image}}"/>
                            <input type="file" name="img_post" class="form-control">
                        </div>
                        <button type="reset" class="btn btn-default">Làm Mới</button>
                        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
@section('script')
    <script src="js/slug.js"></script>
    <script>
        $(document).ready(function () {
            var options = {
                filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: 'laravel-filemanager?type=Files',
                filebrowserUploadUrl: 'laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            };
            CKEDITOR.replace('demo', options);
            $('#title').keyup(function (event) {
                var title = $('#title').val();
            });
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <link rel="stylesheet" type="text/css" href="css/select2.min.css">
    <script src="js/select2.min.js"></script>
    <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js"></script>
@endsection