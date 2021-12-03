@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ĐƠN ĐĂNG KÍ</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Reason</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($resultSearchQuery as $form)
                                        <tr>
                                            <td>
                                                <h4>Tên người mượn: {{ $form->ten }} </h4>
                                                <p>Số điện thoại: {{ $form->sdt }} <br>
                                                    Mã số sinh viên: {{ $form->mssv }} <br>
                                                    Email: <span class="tag tag-success">{{ $form->email }} </span></p>
                                            </td>
                                            <td>
                                                <h4>{{ $form->luanvan }}</h4>
                                                <p>Ngày dự kiến mượn: {{ $form->ngay_muon }}</p>
                                            </td>
                                            <td><button type="button" class="btn btn-block btn-outline-success btn-lg">Cho
                                                    mượn</button></td>
                                            <td><button type="button" class="btn btn-block btn-outline-danger btn-lg">Xóa
                                                    Đơn</button></td>
                                        </tr>
                                    @empty
                                        <td>empty</td>
                                        <td>empty</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                {{ $resultSearchQuery->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
