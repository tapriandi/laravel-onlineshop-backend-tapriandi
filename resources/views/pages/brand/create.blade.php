@extends('layouts.app')

@section('title', 'Create Brand')

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
                <h1>Create Brand</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Brand</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Brand</h2>

                <div class="card">
                    <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
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

                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" class="form-control  @error('description') is-invalid @enderror" name="description"
                                    style="height:100px;"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Website</label>
                                <input type="text"
                                    class="form-control @error('website')
                                is-invalid
                            @enderror"
                                    name="website">
                                @error('website')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{--  --}}
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text"
                                    class="form-control @error('instagram')
                                is-invalid
                            @enderror"
                                    name="instagram">
                                @error('instagram')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{--  --}}
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text"
                                    class="form-control @error('facebook')
                                is-invalid
                            @enderror"
                                    name="facebook">
                                @error('facebook')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{--  --}}
                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="text"
                                    class="form-control @error('twitter')
                                is-invalid
                            @enderror"
                                    name="twitter">
                                @error('twitter')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{--  --}}
                            <div class="form-group">
                                <label>Rate Playstore</label>
                                <input type="text"
                                    class="form-control @error('rate_playstore')
                                is-invalid
                            @enderror"
                                    name="rate_playstore">
                                @error('rate_playstore')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{--  --}}
                            <div class="form-group">
                                <label>Rate Appstore</label>
                                <input type="text"
                                    class="form-control @error('rate_appstore')
                                is-invalid
                            @enderror"
                                    name="rate_appstore">
                                @error('rate_appstore')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{--  --}}
                            <div class="form-group">
                                <label>Playstore Link</label>
                                <input type="text"
                                    class="form-control @error('playstore_link')
                                is-invalid
                            @enderror"
                                    name="playstore_link">
                                @error('playstore_link')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{--  --}}
                            <div class="form-group">
                                <label>Appstore Link</label>
                                <input type="text"
                                    class="form-control @error('appstore_link')
                                is-invalid
                            @enderror"
                                    name="appstore_link">
                                @error('appstore_link')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{--  --}}
                            <div class="form-group">
                                <label class="form-label">Categories</label>
                                @foreach ($categories as $category)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="category_id[]"
                                                value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
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
