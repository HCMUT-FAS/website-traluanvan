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
                                        {{-- <th>ID</th> --}}
                                        <th>User</th>
                                        {{-- <th>Date</th>
                                    <th>Status</th> --}}
                                        <th>Reason</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        {{-- <td>183</td> --}}
                                        <td>
                                            <h4>User: SIÊU NHÂN GAO TÊN DÀI ƠI LÀ DÀI LUÔN</h4>
                                            <p>Số điện thoại: 183 <br>
                                            Mã số sinh viên: 11-7-2014 <br>
                                            Email: <span class="tag tag-success">Approved</span></p>
                                        </td>
                                        <td>
                                            <h4>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</h4>
                                        </td>
                                        <td><button type="button" class="btn btn-block btn-outline-success btn-lg">Cho
                                                mượn</button></td>
                                        <td><button type="button" class="btn btn-block btn-outline-danger btn-lg">Xóa
                                                Đơn</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
