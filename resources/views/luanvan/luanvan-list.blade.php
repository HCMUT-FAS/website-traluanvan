@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách các luận văn</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th>Tên Luận Văn</th>
                <th>Giảng Viên Hướng Dẫn</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($resultSearchQuery as $luanvan)
                    <tr class="expandable-body d-none">
                        <td colspan="5">
                            <p style="display: none;">
                                Abstract
                            </p>
                        </td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $luanvan->ten_lv }}</td>
                        <td>{{ $luanvan->ten_gv1 }} và {{ $luanvan->ten_gv2 }}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            <div class="card-footer clearfix">
            {{ $resultSearchQuery->links() }}
            </div>
        </div>
      </div>
@endsection