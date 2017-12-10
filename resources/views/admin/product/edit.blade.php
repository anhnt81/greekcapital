@extends('admin.layout.layout')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm
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

                    <form action="admin/product/update/{{$data->id}}" method="Post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label>Ngôn ngữ</label>
                            <select id="locale" class="form-control" name="locale">
                                <option disabled selected value> -- Chọn ngôn ngữ --</option>
                                <option value="1">{{config('local.language.vi')}}</option>
                                <option value="2">{{config('local.language.en')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label" >Tên Sản Phẩm</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" value="{!! $data->name !!}">
                        </div>
                        <div class="form-group">
                            <label>Danh Mục Sản Phẩm</label>
                            <select disabled="disabled" id="category" class="form-control" name="category">
                                <option id="sel_default" disabled selected value> -- Chọn Danh Mục --</option>
                                @foreach($category as $cat)
                                    @if($cat->exception == 0 && $cat->locale == 'vi')
                                        <option class="option_vi" style="display: none"
                                                value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endif
                                @endforeach
                                @foreach($category as $cat)
                                    @if($cat->exception == 0 && $cat->locale == 'en')
                                        <option class="option_en" style="display: none"
                                                value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Lãi Suất (năm)</label>
                            <input type="text" class="form-control" id="interest_rate" name="interest_rate" value="{!! $data->interest_rate !!}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">NĐT</label>
                            <input type="text" class="form-control" id="investors" name="investors" value="{!! $data->investors !!}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Quỹ</label>
                            <input type="text" class="form-control" id="funds" name="funds" value="{!! $data->funds !!}">
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
            $("#locale").click(function () {
                var locale = $('#locale').find('option:selected').val();
                if (locale == 1) {
                    $('#category').val($('#category').find("option[selected]").val());
                    $("#category").prop("disabled", false);
                    $(".option_vi").css('display', 'block');
                    $(".option_en").css('display', 'none');
                } else if (locale == 2) {
                    $("#category").prop("disabled", false);
                    $(".option_en").css('display', 'block');
                    $(".option_vi").css('display', 'none');
                } else
                    $("#category").prop("disabled", true);
            });


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