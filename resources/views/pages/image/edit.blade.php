@extends('layouts.app')

@section('title', 'Edit Image')

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
                <h1>Edit Image</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Image</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Image</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form id="form1" action="{{ route('image.update', $image) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body pt-5 pb-0">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input required type="text" value="{{ $image->name }}"
                                                class="form-control @error('name') is-invalid @enderror" name="name">
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{--  --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hashtag</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input required type="text"
                                                class="form-control @error('hashtag') is-invalid @enderror" name="hashtag"
                                                placeholder="Enter hashtags, separated by commas"
                                                value="{{ implode(',', json_decode($image->hashtag)) }}">
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
                                            <select required name="module_id"
                                                class="form-control select2 @error('module_id') is-invalid @enderror">
                                                @foreach ($modules as $module)
                                                    <option value="{{ $module->id }}"
                                                        selected={{ old('module_id') == $module->id && true }}>
                                                        {{ $module->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="form-group row mb-5">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Caption</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea required class="summernote-simple  @error('caption') is-invalid @enderror" name="caption">
                                                {{ $image->caption }}</textarea>
                                        </div>
                                        @error('caption')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{--  --}}
                                    @php
                                        $urls = json_decode($image->url);
                                    @endphp
                                    @if (!empty($urls))
                                        <div class="form-group row">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image
                                                Check</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="row gutters-sm">
                                                    @foreach ($urls as $url)
                                                        <div class="col-6 col-sm-4">
                                                            <label class="imagecheck mb-4">
                                                                <input name="url[]" type="checkbox"
                                                                    value="{{ $url }}" class="imagecheck-input"
                                                                    checked />
                                                                <figure class="imagecheck-figure">
                                                                    <img src="{{ asset('image/' . $url) }}" alt=""
                                                                        class="imagecheck-image">
                                                                </figure>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    <input name="url[]" value="1" class="d-none" />
                                                </div>
                                                <small id="passwordHelpBlock" class="form-text text-muted">
                                                    Uncheck for remove image
                                                </small>
                                            </div>
                                        </div>
                                    @endif
                                    <input name="url[]" value="1" class="d-none" />


                                    {{--  --}}
                                    <div class="form-group row mb-5">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add
                                            Images</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="file" class="form-control @error('url2') is-invalid @enderror"
                                                name="url2[]" multiple>
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
                                    <button type="submit" value="submit" class="btn btn-primary btn-lg">Submit</button>
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
