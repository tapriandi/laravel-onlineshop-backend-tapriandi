@extends('layouts.app')

@section('title', 'Edit Module')

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
                        {{-- <div class="card-header">
                            <h4>Input Text</h4>
                        </div> --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control
                                @error('name') is-invalid @enderror"
                                    name="name" value="{{ $module->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" class="form-control  @error('description') is-invalid @enderror" name="description"
                                    style="height:100px;">{{ $module->description }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Brands</label>
                                <select class="form-control selectric @error('brand_id') is-invalid @enderror"
                                    name="brand_id">
                                    <option value="">-- Select brand --</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            selected={{ old('brand_id') == $brand->id && true }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            @if ($module->icon)
                                <img src="{{ asset('module/' . $module->icon) }}" alt="" style="width:20%; margin-bottom: 20px;">
                            @endif

                            <div class="form-group">
                                <label>Icon module</label>
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
