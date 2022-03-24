@extends('backend.layouts.app')

@section('title', 'Create Hazz Package')

    @push('css')

    @endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Hazz Package</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Hazz Package</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content p-10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <form action="{{ route('admin.hazz-package.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFullName">Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title') }}" id="exampleInputFulltitle"
                                        placeholder="Enter title name">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFullName">Country</label>
                                    <select name="country_id"
                                        class="form-control @error('country_id') is-invalid @enderror">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFullName">Short Description</label>
                                    <textarea type="text" name="short_description"
                                        class="form-control @error('short_description') is-invalid @enderror" value=""
                                        id="exampleInputFullshort_description"
                                        placeholder="Enter company name">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMobile">Package Overview</label>
                                    <textarea class="@error('package_overview') is-invalid @enderror"
                                        name="package_overview">{!! old('package_overview') !!}</textarea>
                                    @error('package_overview')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMobile">Itinerary</label>
                                    <textarea class="@error('itinerary') is-invalid @enderror"
                                        name="itinerary">{!! old('itinerary') !!}</textarea>
                                    @error('itinerary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMobile">Hotel Details</label>
                                    <textarea class="@error('hotel_details') is-invalid @enderror"
                                        name="hotel_details">{!! old('hotel_details') !!}</textarea>
                                    @error('hotel_details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMobile">Notes</label>
                                    <textarea class="@error('notes') is-invalid @enderror"
                                        name="notes">{!! old('notes') !!}</textarea>
                                    @error('notes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMobile">Policy</label>
                                    <textarea class="@error('policy') is-invalid @enderror"
                                        name="policy">{!! old('policy') !!}</textarea>
                                    @error('policy')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMobile">Rate And Dates</label>
                                    <textarea class="@error('rate_and_dates') is-invalid @enderror"
                                        name="rate_and_dates">{!! old('rate_and_dates') !!}</textarea>
                                    @error('rate_and_dates')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFullName">Is Featured</label>
                                    <input type="checkbox" name="is_featured"
                                        class="@error('is_featured') is-invalid @enderror" value="Yes"
                                        id="exampleInputFullis_featured" placeholder="Enter contact duration">
                                    @error('is_featured')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Featured Image</label><br>
                                    <input type="file" name="featured_image"
                                        class="@error('featured_image') is-invalid @enderror">
                                    @error('featured_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status : </label>
                                    <input name="status" type="radio" checked id="radio_1" value="Active"
                                        class="@error('status') is-invalid @enderror">
                                    <span for="radio1">Active</span>
                                    <input name="status" type="radio" id="radio_2" value="Inactive"
                                        class="@error('status') is-invalid @enderror">
                                    <span for="radio_2">Inactive</span>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('assets/backend/ckeditor/ckeditor.js') }}"></script>
    {{-- <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> --}}
    <script>
        CKEDITOR.replace('package_overview', {
            filebrowserUploadUrl: "{{ route('admin.hazz.package.file.Upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('itinerary', {
            filebrowserUploadUrl: "{{ route('admin.hazz.package.file.Upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('hotel_details', {
            filebrowserUploadUrl: "{{ route('admin.hazz.package.file.Upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('notes', {
            filebrowserUploadUrl: "{{ route('admin.hazz.package.file.Upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('policy', {
            filebrowserUploadUrl: "{{ route('admin.hazz.package.file.Upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('rate_and_dates', {
            filebrowserUploadUrl: "{{ route('admin.hazz.package.file.Upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

    </script>
@endpush
