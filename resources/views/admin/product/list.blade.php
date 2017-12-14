@extends('admin.layout.layout')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm
                        <small>Danh Sách</small>
                    </h1>
                </div>
                @if(session('flash_success'))
                    <div class="alert alert-success">
                        <strong>Thành Công! </strong>{{ session('flash_success') }}
                    </div>
            @endif
            <!-- /.col-lg-12 -->
                <div class="form-group">
                    <button id="add_product" type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#show-add">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm Sản Phẩm
                    </button>
                </div>
                <table class="table table-striped table-bordered table-hover" id="product_list">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Tên Danh Mục</th>
                        <th>Lãi suất (năm)</th>
                        <th>NĐT</th>
                        <th>Quỹ</th>
                        <th>Ngôn ngữ</th>
                        <th>Hành Động</th>
                    </tr>
                    <tbody>
                    @foreach($list_product as $product)
                        <tr class="odd gradeX">
                            <td>{{ $product->id }}</td>
                            <td class="text-center">
                                {!! $product->name  !!}
                            </td>
                            <td>{!! $product->cat_name !!}</td>
                            <td>{!! $product->interest_rate !!}</td>
                            <td>{!! $product->investors !!}</td>
                            <td>{!! $product->funds !!}</td>
                            @if($product->locale == 'vi')
                                <td class="text-center">{{config('local.language.vi')}}</td>
                            @else
                                <td class="text-center">{{config('local.language.en')}}</td>
                            @endif
                            <td>
                                @if(Auth::user()->role == 'admin')
                                    <a href="admin/product/update/{{$product->id}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa
                                    </a>
                                    <button data-id="{{$product->id}}" class="btn btn-danger btn-sm"
                                            data-toggle="modal"
                                            data-target="#modal-delete">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Xoá
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- Modal Update-->
    <div class="modal fade" id="show-update" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Chỉnh Sửa sản phẩm</h4>
                </div>
                <div class="modal-body">
                    <form id="form-update">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Tên sản phẩm</label>
                            <input type="hidden" name="id" id="id">
                            <input type="text" class="form-control" id="product_name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Chức Vụ</label>
                            <input type="text" class="form-control" id="position" name="position">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="save">Lưu Thay Đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Add-->
    <div class="modal fade" id="show-add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Thêm Sản Phẩm</h4>
                </div>
                <div class="modal-body">
                    <form id="form-add" action="{{url('admin/product/add')}}" method="post"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Ngôn ngữ</label>
                            <select id="locale" class="form-control" name="locale">
                                <option disabled selected value> -- Chọn ngôn ngữ --</option>
                                <option value="1">{{config('local.language.vi')}}</option>
                                <option value="2">{{config('local.language.en')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" id="product_name" name="product_name">
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
                            <input type="text" class="form-control" id="interest_rate" name="interest_rate">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">NĐT</label>
                            <input type="text" class="form-control" id="investors" name="investors">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Quỹ</label>
                            <input type="text" class="form-control" id="funds" name="funds">
                        </div>

                        <div class="modal-footer">
                            <button type="button" id="close-add" class="btn btn-default" data-dismiss="modal">Đóng
                            </button>
                            <input type="submit" value="Lưu lại" id="add-product" class="btn btn-success"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete-->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Xóa Bài Viết</h4>
                </div>
                <div style="height: auto;" class="modal-body">
                    <form id="form-delete">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="del-id">
                        <p>Bạn có chắc muốn xóa bài viết này không?</p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="" class="btn btn-danger" id="delete">Xóa</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- DataTables JavaScript -->
    <script type="text/javascript">
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

            //Validate form
            var validator = $("#form-add").validate({
                rules: {
                    product_name: {
                        required: true,
                    },
                    interest_rate: "required",
                    category: "required",
                    investors: "required",
                    funds: "required",
                    locale: "required",

                },
                messages: {
                    interest_rate: "Hãy nhập lãi xuất (năm) !",
                    locale: "Hãy chọn ngôn ngữ hiển thị !",
                    category: "Hãy chọn danh mục sản phẩm",
                    product_name: {
                        required: "Hãy nhập tên sản phẩm",
                    },
                    investors: "Hãy nhập % dành cho NĐT !",
                    funds: "Hãy nhập % dành cho Quỹ !"
                },

            });

            $("#close-add").click(function () {
                validator.resetForm();
            });

            $('#product_list').DataTable({'iDisplayLength': '50', "order": [[0, "desc"]]});
            @if(Auth::user()->role=='admin')
            $('.status').css('cursor', 'pointer');
            /*Changer Status */
            $('.status').click(function (event) {
                id = $(this).parent().find("td:eq(0)").text();
                var status = $(this).find('i.fa-ban').text();
                var div = $(this);
                $.ajax({
                    url: 'admin/product/updateStatus',
                    type: 'Put',
                    data: {"id": id, "status": status, "_token": "{{ csrf_token() }}"},
                })
                    .done(function (data) {
                        if (data == 'ok') {
                            $.alert("Thay đổi thành công.", {
                                autoClose: true, closeTime: 3000, type: 'success',
                                position: ['top-right', [45, 30]],
                                withTime: 200,
                                title: 'Thành Công',
                                icon: 'glyphicon glyphicon-ok',
                                animation: true,
                                animShow: 'fadeIn',
                                animHide: 'fadeOut',
                            });
                            if (status == 1) {
                                div.html('<i class="fa fa-check-square-o true" aria-hidden="true"> On</i>');
                            } else div.html('<i class="fa fa-ban false" aria-hidden="true"> Off</i>');
                        } else {
                            $.alert(data, {
                                autoClose: true, closeTime: 3000, type: 'danger',
                                position: ['top-right', [45, 30]],
                                withTime: 200,
                                title: 'Lỗi',
                                icon: 'glyphicon glyphicon-ok',
                                animation: true,
                                animShow: 'fadeIn',
                                animHide: 'fadeOut',
                            });
                        }
                    })
                    .fail(function () {
                        console.log("error");
                    })
            });
            @endif

            $('#modal-delete').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var iddel = button.data('id')
                var modal = $(this)
                modal.find('.modal-body #del-id').html(iddel);
                modal.find('.modal-body #delete').attr('href', 'admin/employee/delete/' + iddel);
            })
        });
    </script>
    <script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="js/bootstrap-flash-alert.js"></script>
@endsection
