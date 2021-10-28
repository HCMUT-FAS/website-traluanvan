<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thong tin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/template/dist/css/adminlte.min.css">
</head>

<body>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông Tin Của Bạn</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('form.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email">
                                </div>
                                <div>
                                    @error('email')
                                        {{-- <strong>{{ $message }}</strong> --}}
                                        <span class="form-group" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mssv">MSSV</label>
                                    <input type="text" name="mssv" class="form-control"
                                        placeholder="191xxxx, 181xxxx, 171xxxx,...">
                                </div>

                                @error('mssv')
                                    <span class="form-group" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <label for="ten">Họ và Tên</label>
                                    <input type="text" name="ten" class="form-control"
                                        placeholder="Nguyễn Văn A, Bùi Văn B,...">
                                </div>
                                <div>
                                    @error('ten')
                                        <span class="form-group" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sdt">Số điện thoại</label>
                                    <input type="text" name="sdt" class="form-control"
                                        placeholder="Số điện thoại liên lạc">
                                </div>
                                <div>
                                    @error('sdt')
                                        <span class="form-group" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="ngay_muon">Ngày mượn luận văn</label>
                                    <input type="date" name="ngay_muon" class="form-control" </div>
                                    <div>
                                        @error('ngay_muon')
                                            <span class="form-group" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Gửi</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src=/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src=/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src=/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src=/template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src=/template/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>
