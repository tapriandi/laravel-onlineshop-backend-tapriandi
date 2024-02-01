@extends('layouts.app')

@section('title', 'Create Image')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Image</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Images</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Image</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form id="form1" action="{{ route('image.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body pt-5 pb-0">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name">
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{--  --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hashtag</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text"
                                                class="form-control @error('hashtag') is-invalid @enderror" name="hashtag"
                                                placeholder="Enter hashtags, separated by commas">
                                        </div>
                                        @error('hashtag')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{--  --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select
                                            Module</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control select2 @error('module_id') is-invalid @enderror"
                                                name="module_id">
                                                <option value="">-- select module --</option>
                                                @foreach ($modules as $module)
                                                    <option value="{{ $module->id }}">
                                                        {{ $module->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="form-group row mb-0">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Caption</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote-simple  @error('caption') is-invalid @enderror" name="caption"></textarea>
                                        </div>
                                        @error('caption')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{--  --}}
                                    <div class="form-group row mb-5">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload
                                            Images</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="file" class="form-control @error('url') is-invalid @enderror"
                                                name="url[]" multiple>
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                You can select multiple images
                                            </small>
                                        </div>
                                        @error('caption')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" id="submit-image" class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
