@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ĐƠN ĐÃ ĐĂNG KÍ</h3>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($issuesTheses as $issuesThesis)
                                        <tr>
                                            <td>
                                                <h4>Tên người mượn: {{ $issuesThesis->name }} </h4>
                                                <p>Số điện thoại: {{ $issuesThesis->phone }} <br>
                                                    Email: <span class="tag tag-success">{{ $issuesThesis->email }} </span> <br>
                                                 </p>
                                            </td>
                                            <td>
                                                <h4>{{ $issuesThesis->nameVN }}</h4>
                                                <p>Ngày dự kiến mượn: {{ $issuesThesis->expectedIssuesDate }}</p>
                                            </td>
                                        </tr>
                                    @empty
                                        <td>empty</td>
                                        <td>empty</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                {{ $issuesTheses->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
