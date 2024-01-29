@extends('layouts.app')

@section('title', 'Image Category')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Image Category</h1>
                <div class="section-header-button">
                    <a href="{{ route('image-category.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Images</a></div>
                    <div class="breadcrumb-item">All Image</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('image-category.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search image"
                                                name="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>Name</th>
                                            <th>Icon</th>
                                            <th>Hashtag</th>
                                            {{-- <th>Module</th> --}}
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                        @foreach ($imageCategory as $image)
                                            <tr>

                                                <td>{{ $image->name }}</td>
                                                <td>
                                                    @if ($image->icon)
                                                        <img src="{{ asset('imageCategory/' . $image->icon) }}" alt=""
                                                            style="height:50px; width:100px; object-fit:cover;">
                                                    @endif
                                                </td>
                                                <td>
                                                    @php
                                                        $hashtags = json_decode($image->hashtag);
                                                        echo implode(', ', $hashtags);
                                                    @endphp
                                                </td>
                                                {{-- <td>{{ $image->module }}</td> --}}
                                                <td>{{ $image->created_at }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('image-category.edit', $image->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('image-category.destroy', $image->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right" style="padding-top: 15px">
                                    {{ $imageCategory->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
