@extends('layouts.app')


@section('content')
    @forelse ($resultShowQuery as $luanvan)
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> {{ $luanvan->ten_lv }}
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Sinh viên thực hiện
                                    @if ($luanvan->ten_sv2 == '0')
                                        <br>{{ $luanvan->ten_sv1 }}<br>
                                    @else
                                        <br>{{ $luanvan->ten_sv1 }}<br>
                                        {{ $luanvan->ten_sv2 }}<br>
                                    @endif
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    Giảng viên hướng dẫn
                                    @if ($luanvan->ten_gv2 == '0')
                                        <br>{{ $luanvan->ten_gv1 }}<br>
                                    @else
                                        <br>{{ $luanvan->ten_gv1 }}<br>
                                        {{ $luanvan->ten_gv2 }}<br>
                                    @endif
                                </div>
                            </div>

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12 py-2">
                                    {{-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                            class="fas fa-print"></i> Print</a> --}}
                                    @foreach ($availableQuery as $luanvanAvailable)
                                        @if ($luanvanAvailable->available == 1)
                                            @include('form.form-create')
                                        @else
                                            <button type="button" class="btn btn-primary float-right"
                                                style="margin-right: 5px;">
                                                <i class="fa fa-times"></i> Luận văn đã được mượn vào ngày:
                                                {{ $luanvanAvailable->update }}
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-12 "> --}}

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-text-width"></i>
                                        TÓM TẮT
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
