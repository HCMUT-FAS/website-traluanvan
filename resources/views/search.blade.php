@extends('layouts.app')

@section('search')
    <section class="content">
        <div class="container">
            <h3 class="text-center display-4">Tìm Kiếm Luận Văn Theo Chủ Đề</h3>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <select class="form-control" id="">
                            <option value="7">Khoa học Ứng dụng</option>
                            <option value="1">Khoa học và Kỹ thuật Máy tính</option>
                            <option value="2">Điện - Điện tử</option>
                            <option value="3">Cơ khí</option>
                            <option value="4">Kỹ thuật Hóa học</option>
                            <option value="5">Kỹ thuật Xây dựng</option>
                            <option value="6">Công nghệ Vật liệu</option>
                            <option value="8">Quản lý Công nghiệp</option>
                            <option value="9">Môi trường và Tài nguyên</option>
                            <option value="10">Kỹ thuật Giao thông</option>
                            <option value="11">Kỹ thuật Địa chất và Dầu khí</option>
                            <option value="12">Trung tâm Đào Tạo Bảo dưỡng Công nghiệp</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <select class="form-control" id="">
                            <option selected>Giảng Viên Hướng Dẫn</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('thesis-search') }}" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="search" name="search" class="form-control form-control-lg"
                                placeholder="Tiêu đề luận văn hoặc Giảng viên hướng dẫn" required>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg bg-primary btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @error('search')
        <span class=" col-8" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
@endsection
