@extends('admin.layout.layout')
@section('content')
    <!-- Page Content -->
    <style>
        .error {
            color: red;
        }

        .modal-dialog {
            overflow-y: initial !important
        }

        .modal-body {
            height: 550px;
            overflow-y: auto;
        }
    </style>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-11">
                    <h1 class="page-header">Nhân Viên
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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#show-add">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm Nhân Viên
                    </button>
                </div>
                <table class="table table-striped table-bordered table-hover" id="employee_list">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Tên nhân viên</th>
                        <th>Chức vụ</th>
                        <th>Thông tin cá nhân</th>
                        <th>Ngôn ngữ</th>
                        <th>Hình ảnh</th>
                        <th>Hành Động</th>
                    </tr>
                    <tbody>
                    @foreach($list_employee as $employee)
                        <tr class="odd gradeX">
                            <td>{{ $employee->id }}</td>
                            <td class="text-center">
                                {!! $employee->name  !!}
                            </td>
                            <td>{!! $employee->imposition !!}</td>
                            <td>{!! $employee->info !!}</td>
                            @if($employee->locale == 'vi')
                                <td class="text-center">{{config('local.language.vi')}}</td>
                            @else
                                <td class="text-center">{{config('local.language.en')}}</td>
                            @endif
                            <td>
                                <img src="{{$employee->image}}" style="height: 75px;width: 75px;" />
                            </td>
                            <td>
                                @if(Auth::user()->role == 'admin')
                                    <a href="admin/employee/update/{{$employee->id}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa
                                    </a>
                                    <button data-id="{{$employee->id}}" class="btn btn-danger btn-sm"
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
                    <h4 class="modal-title">Chỉnh Sửa Nhân Viên</h4>
                </div>
                <div class="modal-body">
                    <form id="form-update">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Tên Nhân Viên</label>
                            <input type="hidden" name="id" id="id">
                            <input type="text" class="form-control" id="employee_name" name="name">
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
                    <h4 class="modal-title">Thêm Nhân Viên</h4>
                </div>
                <div class="modal-body">
                    <form id="form-add" action="{{url('admin/employee/add')}}" method="post"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Tên nhân viên</label>
                            <input type="text" class="form-control" id="employee_name-add" name="employee_name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Chức vụ</label>
                            <input type="text" class="form-control" id="position" name="position">
                        </div>

                        <div class="form-group">
                            <label>Thông tin nhân viên</label>
                            <textarea name="info" id="info" class="form-control ckeditor" rows="3"></textarea>
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
                            <label for="recipient-name" class="control-label">Hình ảnh</label>
                            <input type="file" name="img_post" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="close-add" class="btn btn-default" data-dismiss="modal">Đóng
                            </button>
                            <input type="submit" value="Lưu lại" id="add-employee" class="btn btn-success"></input>
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
            //Validate form
            var validator = $("#form-add").validate({
                rules: {
                    employee_name: {
                        required: true,
                        minlength: 2
                    },
                    position: "required",
                    img_post: "required",
                    info: "required",
                    locale: "required",

                },
                messages: {
                    info: "Hãy nhập thông tin nhân viên !",
                    locale: "Hãy chọn ngôn ngữ hiển thị !",
                    position: "Hãy nhập chức vụ nhân viên",
                    employee_name: {
                        required: "Hãy nhập tên nhân viên",
                        minlength: "Tên nhân viên phải dài hơn 2 ký tự !"
                    },
                    img_post: "Hãy chọn hình ảnh nhân viên !"
                },

            });

            $("#close-add").click(function () {
                validator.resetForm();
            });

            $('#employee_list').DataTable({'iDisplayLength': '50', "order": [[0, "desc"]]});
            @if(Auth::user()->role=='admin')
            $('.status').css('cursor', 'pointer');
            /*Changer Status */
            $('.status').click(function (event) {
                id = $(this).parent().find("td:eq(0)").text();
                var status = $(this).find('i.fa-ban').text();
                var div = $(this);
                $.ajax({
                    url: 'admin/empoloyee/updateStatus',
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
