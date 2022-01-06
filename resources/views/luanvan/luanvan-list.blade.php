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
                                    @forelse ($resultSearchQuery as $thesis)
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td><a
                                                    href="{{ route('thesis-show', ['id' => $thesis->id, 'name' => Str::slug($thesis->nameVN, '+')]) }}">{{ $thesis->nameVN }}</a>
                                            </td>
                                            @if ($thesis->intructor2 == '0')
                                                <td>{{ $thesis->intructor1 }}
                                                @else
                                                <td>{{ $thesis->intructor1 }} và {{ $thesis->intructor2 }}</td>
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
