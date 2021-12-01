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
                                <div class="col-12">
                                    {{-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                            class="fas fa-print"></i> Print</a> --}}
                                    @foreach ($availableQuery as $luanvanAvailable)
                                        @if ($luanvanAvailable->available == 1)
                                            <button type="button" class="btn btn-success float-right">
                                                <i class="fa fa-check"></i> Mượn luận văn
                                            </button>
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
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Tóm tắt</h5>
                            Đây là một bản tóm tắt nhưng gì luận văn thu thập được, nó chắc phải dài ơi là dài???
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @empty
        {{ 'khoong cos gif' }}
    @endforelse
@endsection
