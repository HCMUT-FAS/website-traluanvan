@extends('layouts.app')

@section('search')
        <div class="content">
            <section class="content">
                <div class="container-fluid">
                    <h3 class="text-center display-4">Tra Luận Văn</h3>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form action="{{ route('thesis-search') }}" method="get">
                                @csrf
                                <div class="input-group">
                                    <input type="search" name="search" class="form-control form-control-lg"
                                        placeholder="Type your keywords here" required>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
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
                <span class=" col-md-8 offset-md-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
@endsection
