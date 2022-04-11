@extends('search')

@push('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/dt-1.11.5/fc-4.0.2/fh-3.2.2/r-2.2.9/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.css" />
@endpush

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách các luận văn</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table" id="table-index">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>#Người dùng</th>
                                        <th>Loại người dùng</th>
                                        <th>Khoa</th>
                                        <th>#Luận văn</th>
                                        <th>Tình trạng luận văn</th>
                                        <th>Loại luận văn</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/fc-4.0.2/fh-3.2.2/datatables.min.js">
    </script>
    <script>
        $(function() {
            $('#table-index').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('thesis.index') !!}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'user_role_id',
                        name: 'user_role_id'
                    },
                    {
                        data: 'user_faculty_id',
                        name: 'user_faculty_id'
                    },
                    {
                        data: 'thesis_id',
                        name: 'thesis_id'
                    },
                    {
                        data: 'thesis_status_id',
                        name: 'thesis_status_id'
                    },
                    {
                        data: 'thesis_role_id',
                        name: 'thesis_role_id'
                    }
                ]
            });
        });
    </script>
@endpush
