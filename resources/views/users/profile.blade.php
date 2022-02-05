@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('user-update') }}" method="post">
                            <div class="card-header">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Thông tin chi tiết
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="settings">
                                        @csrf
                                        <div class="form-group row">
                                            @foreach ($usersData as $user)

                                            @endforeach
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input name="name" class="form-control" id="inputName"
                                                    style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;"
                                                    value="{{ $user->name }}" required>
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                @error('name')
                                                    <strong class='text-danger'>{{ $message }}</strong>
                                                @enderror
                                                @error('id')
                                                    <strong class='text-danger'>{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputExperience" name="email"
                                                    value="{{ $user->email }}"></input>
                                                @error('email')
                                                    <strong class='text-danger'>{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Số Điện
                                                Thoại</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="inputExperience" name="phone"
                                                    value="{{ $user->phone }}"></input>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Mật Khẩu</label>
                                            <div class="col-sm-10">
                                                <a class="form-control" href="{{ route('password.request') }}">Đổi
                                                    Mật
                                                    Khẩu</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                            <div class="card-footer">
                                <div class="m-0 float-right ">
                                    <!-- Button trigger modal -->
                                    <button type="submit" class="btn btn-success" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Lưu thay đổi
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
