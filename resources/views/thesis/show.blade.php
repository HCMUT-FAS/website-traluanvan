@extends('layouts.app')


@section('content')
    @forelse ($theses as $thesis)
        <div class="container">
            <div class="row">
                <!-- ./col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Chi tiết luận văn
                                    <small class="float-right">Ngày truy cập lần cuối:
                                        {{-- i have no idea how this work
                                            https://stackoverflow.com/questions/40038521/change-the-date-format-in-laravel-view-page/40038594#40038594 
                                            This will return the current time if the value is null
                                            --}}
                                        {{ \Carbon\Carbon::parse($thesis->updated_at, 'Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s')}}
                                    </small>
                                </h4>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4">Tên luận văn</dt>
                                <dd class="col-sm-8">{{ $thesis->nameVN }}</dd>
                                <dt class="col-sm-4">Tình trạng</dt>
                                @php
                                    $onHold = 2;
                                    $Unavailable = 3;
                                @endphp
                                @if ($thesis->theses_status_id == $onHold)
                                    <dd class="col-sm-8 ">
                                        <p class="badge badge-warning">{{ $thesis->name }}</p>
                                    </dd>
                                @elseif($thesis->theses_status_id == $Unavailable)
                                    <dd class="col-sm-8 ">
                                        <p class="badge badge-danger">{{ $thesis->name }}</p>
                                    </dd>
                                @else
                                    <dd class="col-sm-8 ">
                                        <p class="badge badge-success">{{ $thesis->name }}</p>
                                    </dd>
                                @endif
                                {{-- <dd class="col-sm-8 offset-sm-4">Donec id elit non mi porta gravida at eget metus.</dd> --}}
                                <dt class="col-sm-4">Sinh viên thực hiện</dt>
                                <dd class="col-sm-8">
                                    @if ($thesis->student2 == '0')
                                        {{ $thesis->student1 }}
                                    @else
                                        {{ $thesis->student1 }} và {{ $thesis->student2 }}
                                    @endif
                                </dd>
                                <dt class="col-sm-4">Giảng viên hướng dẫn</dt>
                                <dd class="col-sm-8">
                                    @if ($thesis->instructor2 == '0')
                                        {{ $thesis->instructor1 }}
                                    @else
                                        {{ $thesis->instructor1 }} và {{ $thesis->instructor2 }}
                                    @endif
                                </dd>
                                <dt class="col-sm-4">Tóm tắt luận văn</dt>
                                <dd class="col-sm-8">{{ $thesis->description }}</dd>
                            </dl>
                        </div>
                        <div class="card-footer">
                            <div class="m-0 float-right ">
                                @include('form.form-create')
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- ./col -->
            </div>
        </div>
    @empty
        {{ 'Không có gì hết' }}
    @endforelse
@endsection
