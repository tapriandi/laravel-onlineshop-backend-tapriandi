@extends('layouts.app')

@section('title', 'Create Image Category')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Image Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Images Category</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Image Category</h2>
                <div class="card">
                    <form action="{{ route('image-category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    name="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{--  --}}
                            <div class="form-group">
                                <label>Hashtag</label>
                                <input type="text" placeholder="Enter hashtags, separated by commas"
                                    class="form-control @error('hashtag')
                                is-invalid
                            @enderror"
                                    name="hashtag">
                                @error('hashtag')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Images</label>
                                <select class="form-control selectric @error('image_id') is-invalid @enderror"
                                    name="image_id">
                                    <option value="">-- Select Image --</option>
                                    @foreach ($images as $image)
                                        <option value="{{ $image->id }}">
                                            {{ $image->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Upload Icon</label>
                                <div class="col-sm-g">
                                    <input type="file" class="form-control" name="icon"
                                        @error('icon') is-invalid @enderror>
                                    @error('icon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
