@extends('layouts.app')

@section('title', 'Edit Module')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Module</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Module</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Module</h2>
                <div class="card">
                    <form action="{{ route('module.update', $module) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body pt-4">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-7">
                                    <input required type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $module->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{--  --}}
                            <div class="form-group row mb-0">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea required class="summernote-simple  @error('description') is-invalid @enderror" name="description">
                                        {{ $module->description }}
                                    </textarea>
                                </div>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{--  --}}
                            <div class="form-group row mb-5">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Brands<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-7">
                                    <select required name="brand_id"
                                        class="form-control @error('brand_id') is-invalid @enderror">
                                        <option value="">-- Select Brand --</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                selected={{ old('module_id') == $brand->id && true }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--  --}}

                            @if ($module->icon)
                                <hr>
                                <div class="form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <p>Current Icon</p>
                                        <img src="{{ asset('module/' . $module->icon) }}" alt=""
                                            style="width:20%; margin-bottom: 20px;">
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Icon</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" class="form-control" name="icon"
                                        @error('icon') is-invalid @enderror>
                                    @error('icon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
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
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
@endpush
