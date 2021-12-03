<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
    Mượn luận văn
</button>
@if (Session::has('success'))
    @include('error.success')
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Thông tin của bạn</h2>
            </div>
            <div class="modal-body">
                <form action="{{ route('luanvan-form') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            @error('email')
                                <span class="form-group" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="email" name='email' class="form-control" placeholder="Enter email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ và Tên</label>
                            @error('name')
                                <span class="form-group" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" name='name' class="form-control" placeholder="Nguyễn Văn A,..."
                                value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã số sinh viên</label>
                            @error('mssv')
                                <span class="form-group" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" name='mssv' class="form-control"
                                placeholder="191xxxx, 181xxxx. 171xxxx,..." value="{{ old('mssv') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại liên lạc</label>
                            @error('phone')
                                <span class="form-group" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" name='phone' class="form-control" placeholder="Số điện thoại"
                                value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên luận văn</label>
                            <input type="text" value="{{ $luanvan->ten_lv }}" disabled="disabled"
                                class="form-control" />
                            <input type="hidden" name="ma_lv" value="{{ $luanvan->ma_lv }}" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày dự kiến đến mượn</label>
                            @error('date')
                                <span class="form-group" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="date" name='date' class="form-control" value="{{ old('date') }}">
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
