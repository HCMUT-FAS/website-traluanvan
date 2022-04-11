@extends('layouts.master')

@section('search')
    <section class="content">
        <div class="container">
            <h3 class="text-center display-4">Tìm Kiếm Luận Văn Theo Chủ Đề</h3>
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('thesis.search') }}" method="get">
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
