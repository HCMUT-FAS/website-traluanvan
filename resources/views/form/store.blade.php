@guest
    <p>Bạn phải <a href="{{ route('login') }}">đăng nhập</a> mới có thể mượn luận văn.
    </p>
@else
    @php
    $onHold = 2;
    $Unavailable = 3;
    @endphp
    @if ($thesis->theses_status_id == $onHold)
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Chờ tới khi luận văn sẵn sàng!
        </button>
    @elseif($thesis->theses_status_id == $Unavailable)
        {{-- <button type="button" class="btn btn-alert" data-toggle="modal" data-target="#exampleModal">
            Luận văn không thể mượn được!!!
        </button> --}}
        <p class="text-danger">Luận văn không thể mượn được!!!</p>
    @else
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Mượn luận văn
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel">Thông tin của bạn</h2>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('student.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sinh Viên</label>
                                    <input type="text" value="{{ Auth::user()->name }}" disabled="disabled"
                                        class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email Sinh Viên</label>
                                    <input type="text" value="{{ Auth::user()->email }}" disabled="disabled"
                                        class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên luận văn</label>
                                    <input type="text" value="{{ $thesis->nameVN }}" disabled="disabled"
                                        class="form-control" />
                                    <input type="hidden" name="thesis_id" value="{{ $thesis->id }}"
                                        class="form-control" />
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"
                                        class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày dự kiến đến mượn</label>
                                    <input type="date" name='expected_date' class="form-control"
                                        value="{{ old('date') }}">
                                    @error('expected_date')
                                        <span class="form-group" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endguest
