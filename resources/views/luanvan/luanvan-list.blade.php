<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/template/dist/css/adminlte.min.css">

</head>

<body>
    {{-- @foreach ($luanvans as $luanvan)
    <div>
        {{ $luanvan->ten_lv }}
    </div>
@endforeach --}}
    <div id=luanvan-list>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách các luận văn</h3>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Tên Luận Văn</th>
                                    <th>Giảng Viên Hướng Dẫn</th>
                                    {{-- <th>Date</th>
                <th>Status</th>
                <th>Reason</th> --}}
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
                                        {{-- <td>11-7-2014</td>
                                <td>Pending</td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-footer clearfix">
                            {{ $resultSearchQuery->links() }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- ./wrapper -->



    </div>
    <!-- jQuery -->
    <script src="/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/template/dist/js/demo.js"></script>
</body>

</html>
