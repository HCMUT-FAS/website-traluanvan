@extends('layouts.master')

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
                                    @forelse ($issuesTheses as $issuesThesis)
                                        <tr>
                                            <td>
                                                <h5>Tên người mượn: {{ $issuesThesis->name }} </h5>
                                                {{-- <p>Tên người mượn: {{ $issuesThesis->name }}</p> --}}
                                                <p>Số điện thoại: {{ $issuesThesis->phone }} <br>
                                                    Email: <span class="tag tag-success">{{ $issuesThesis->email }}
                                                    </span> <br>
                                                </p>
                                            </td>
                                            <td>
                                                <h5>{{ $issuesThesis->nameVN }}</h5>
                                                <p>Ngày dự kiến mượn:
                                                    {{-- i have no idea how this work
                                                        https://stackoverflow.com/questions/40038521/change-the-date-format-in-laravel-view-page/40038594#40038594 
                                                        This will return the current time if the value is null --}}
                                                    {{ \Carbon\Carbon::parse($issuesThesis->expectedIssuesDate, 'Asia/Ho_Chi_Minh')->format('d-m-Y') }}
                                                </p>
                                            </td>
                                            @can('librarian-view')
                                                <td>
                                                    @if ($issuesThesis->issuesDate !== null)
                                                        <form action="{{ route('librarian.return') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="issues_thesis_id"
                                                                value="{{ $issuesThesis->id }}">
                                                            <input type="hidden" name="thesis_id"
                                                                value="{{ $issuesThesis->thesis_id }}">
                                                            <button type="submit"
                                                                class="btn btn-block btn-outline-success btn-lg">Trả
                                                                Lại</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('librarian.accept') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="issues_thesis_id"
                                                                value="{{ $issuesThesis->id }}">
                                                            <input type="hidden" name="thesis_id"
                                                                value="{{ $issuesThesis->thesis_id }}">
                                                            <input type="hidden" name="user_email"
                                                                value={{ $issuesThesis->email }}>
                                                            <button type="submit"
                                                                class="btn btn-block btn-outline-success btn-lg">Cho
                                                                Mượn</button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('librarian.destroy') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="issues_thesis_id"
                                                            value="{{ $issuesThesis->id }}">
                                                        <button type="submit"
                                                            class="btn btn-block btn-outline-danger btn-lg">Xóa
                                                            Đơn</button>
                                                    </form>
                                                </td>
                                            @endcan
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
