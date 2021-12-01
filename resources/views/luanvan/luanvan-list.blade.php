@extends('welcome')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách các luận văn</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tên Luận Văn</th>
                                        <th>Giảng Viên Hướng Dẫn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($resultSearchQuery as $luanvan)
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td><a
                                                    href="{{ route('luanvan-show', ['id' => $luanvan->ma_lv, 'name' => $luanvan->ten_lv]) }}">{{ $luanvan->ten_lv }}</a>
                                            </td>
                                            @if ($luanvan->ten_gv2 == '0')
                                                <td>{{ $luanvan->ten_gv1 }}
                                                @else
                                                <td>{{ $luanvan->ten_gv1 }} và {{ $luanvan->ten_gv2 }}</td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>empty</td>
                                            <td>empty</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                {{ $resultSearchQuery->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
