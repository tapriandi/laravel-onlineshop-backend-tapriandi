@extends('layouts.app')

@section('title', 'Create Brand')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
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
                                <input type="text" class="form-control @error('name') is-invalid  @enderror"
                                    name="name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{--  --}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Website</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('website') is-invalid  @enderror"
                                            name="website">
                                    </div>
                                    @error('website')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Instagram</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                            name="instagram">
                                    </div>
                                    @error('instagram')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{--  --}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Facebook</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                            name="facebook">
                                    </div>
                                    @error('facebook')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Twitter</label>
                                    <input type="text" class="form-control @error('twitter') is-invalid  @enderror"
                                        name="twitter">
                                    @error('twitter')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{--  --}}
                            <div class="form-row">
                                <div class="form-group col-md-6"">
                                    <label>Rate Playstore</label>
                                    <input type="text" class="form-control @error('rate_playstore') is-invalid @enderror"
                                        name="rate_playstore">
                                    @error('rate_playstore')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6"">
                                    <label>Rate Appstore</label>
                                    <input type="text" class="form-control @error('rate_appstore') is-invalid @enderror"
                                        name="rate_appstore">
                                    @error('rate_appstore')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{--  --}}
                            <div class="form-row">
                                <div class="form-group col-md-6"">
                                    <label>Playstore Link</label>
                                    <input type="text" class="form-control @error('playstore_link') is-invalid @enderror"
                                        name="playstore_link">
                                    @error('playstore_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6"">
                                    <label>Appstore Link</label>
                                    <input type="text" class="form-control @error('appstore_link') is-invalid @enderror"
                                        name="appstore_link">
                                    @error('appstore_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{--  --}}

                            <div class="form-group mt-4">

                                <label class="form-label">
                                    <h6>Select Categories</h6>
                                </label>
                                @foreach ($categories as $category)
                                    <div class="custom-control custom-checkbox mt-2">
                                        <input type="checkbox" name="category_id[]" class="custom-control-input"
                                            value="{{ $category->id }}" id="cat-{{ $category->id }}">
                                        <label class="custom-control-label"
                                            for="cat-{{ $category->id }}">{{ $category->name }}</label>
                                    </div>
                                @endforeach
                            </div>

                            {{--  --}}
                            <div class="form-group mb-4 mt-5">
                                <label class="form-label">
                                    <h6>Upload Icon</h6>
                                </label>
                                <div class="form-group col-md-6">
                                    <input type="file" name="icon" class="form-control" />
                                </div>
                            </div>

                            {{--  --}}
                            <div class="form-group mb-5">
                                <label class="form-label">
                                    <h6>Upload Banner</h6>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview col-sm-12" style="width: 100%">
                                        <label for="image-upload" id="image-label">Choose Banner</label>
                                        <input type="file" name="banner" id="image-upload" />
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="form-group mt-5 mb-5">
                                <label class="form-label">
                                    <h6>Deascription</h6>
                                </label>
                                <textarea class="form-control summernote-simple @error('description') is-invalid @enderror" name="description"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="card-footer text-right mt-5">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>

@endpush
