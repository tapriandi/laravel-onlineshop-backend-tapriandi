@extends('layouts.app')

@section('title', 'Edit Category')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Category</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Category</h2>

                <div class="card">
                    <form action="{{ route('category.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body pt-5">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-7">
                                    <input required type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $category->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hashtag<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-7">
                                    <input required type="text" placeholder="Enter hashtags, separated by commas"
                                        class="form-control @error('hashtag') is-invalid @enderror" name="hashtag"
                                        value="{{ implode(',', json_decode($category->hashtag)) }}">
                                    @error('hashtag')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Enter hashtags, separated by commas
                                    </small>
                                </div>
                            </div>

                            <div class="card-footer text-right">
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
@endpush
