@extends('layouts.app')


@section('content')
    @forelse ($theses as $thesis)
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> {{ $thesis->nameVN }}
                                    </h4>
                                    <p>Tình trạng: {{ $thesis->name }}</p>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Sinh viên thực hiện
                                    @if ($thesis->student2 == '0')
                                        <br>{{ $thesis->student1 }}<br>
                                    @else
                                        <br>{{ $thesis->student1 }}<br>
                                        {{ $thesis->student2 }}<br>
                                    @endif
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    Giảng viên hướng dẫn
                                    @if ($thesis->instructor2 == '0')
                                        <br>{{ $thesis->instructor1 }}<br>
                                    @else
                                        <br>{{ $thesis->instructor1 }}<br>
                                        {{ $thesis->instructor2 }}<br>
                                    @endif
                                </div>
                            </div>

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12 py-2">
                                    @include('form.form-create');
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{-- <i class="fas fa-text-width"></i> --}}
                                        <h1>TÓM TẮT</h1>

                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <h1>h1. Bootstrap heading</h1>

                                    <h2>h2. Bootstrap heading</h2>

                                    <h3>h3. Bootstrap heading</h3>
                                    <h4>h4. Bootstrap heading</h4>
                                    <h5>h5. Bootstrap heading</h5>
                                    <h6>h6. Bootstrap heading</h6>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @empty
        {{ 'khoong cos gif' }}
    @endforelse
@endsection
