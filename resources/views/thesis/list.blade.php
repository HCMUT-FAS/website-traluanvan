@extends('welcome')

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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tình Trạng</th>
                                        <th>Tên Luận Văn</th>
                                        <th>Giảng Viên Hướng Dẫn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($resultSearchQuery as $thesis)
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td>
                                                @php
                                                    $onHold = 2;
                                                    $Unavailable = 3;
                                                @endphp
                                                @if ($thesis->theses_status_id == 2)
                                                    <dd class="col-sm-8 ">
                                                        <p class="badge badge-warning">{{ $thesis->name }}</p>
                                                    </dd>
                                                @elseif($thesis->theses_status_id == 3)
                                                    <dd class="col-sm-8 ">
                                                        <p class="badge badge-danger">{{ $thesis->name }}</p>
                                                    </dd>
                                                @else
                                                    <dd class="col-sm-8 ">
                                                        <p class="badge badge-success">{{ $thesis->name }}</p>
                                                    </dd>
                                                @endif
                                            </td>
                                            <td><a
                                                    href="{{ route('thesis-show', ['id' => $thesis->id, 'name' => Str::slug($thesis->nameVN, '+')]) }}">{{ $thesis->nameVN }}</a>
                                            </td>
                                            @if ($thesis->instructor2 == '0')
                                                <td>{{ $thesis->instructor1 }}
                                                @else
                                                <td>{{ $thesis->instructor1 }} và {{ $thesis->instructor2 }}</td>
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
