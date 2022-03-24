@extends('backend.layouts.app')

@section('title', 'Edit Country')

    @push('css')

    @endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Country</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Country</li>
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
                        <form action="{{ route('admin.country.update', $country) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFullName">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $country->name) }}" id="exampleInputFulltitle"
                                        placeholder="Enter name ">
                                    @error('name')
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
                                        placeholder="Enter company name">{{ old('short_description', $country->short_description) }}</textarea>
                                    @error('short_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile"> Image</label><br>
                                    <input type="file" name="image" class="@error('image') is-invalid @enderror">
                                    @error('image')
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

{{-- @push('script')
  <script src="{{ asset('assets/backend/ckeditor/ckeditor.js') }}"></script> --}}
{{-- <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> --}}
{{-- <script>
    CKEDITOR.replace('package_overview', {
      filebrowserUploadUrl: "{{route('admin.hazz.package.file.Upload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('itinerary', {
      filebrowserUploadUrl: "{{route('admin.hazz.package.file.Upload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('hotel_details', {
      filebrowserUploadUrl: "{{route('admin.hazz.package.file.Upload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('notes', {
      filebrowserUploadUrl: "{{route('admin.hazz.package.file.Upload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('policy', {
      filebrowserUploadUrl: "{{route('admin.hazz.package.file.Upload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('rate_and_dates', {
      filebrowserUploadUrl: "{{route('admin.hazz.package.file.Upload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
    });
  </script>
@endpush --}}
