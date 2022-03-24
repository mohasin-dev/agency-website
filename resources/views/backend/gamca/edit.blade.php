@extends('backend.layouts.app')

@section('title', 'Edit Gamca')

    @push('css')

    @endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Gamca</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Gamca</li>
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
                        <form action="{{ route('admin.gamca.update', $gamca->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFullName">Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $gamca->title) }}" id="exampleInputFulltitle"
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
                                            <option {{ $country->id == $gamca->country_id ? 'selected' : '' }}
                                                value="{{ $country->id }}">{{ $country->name }}</option>
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
                                        placeholder="Enter company name">{{ old('short_description', $gamca->short_description) }}</textarea>
                                    @error('short_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMobile">Details</label>
                                    <textarea class="@error('details') is-invalid @enderror"
                                        name="details">{!! old('details', $gamca->details) !!}</textarea>
                                    @error('details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status : </label>
                                    <input name="status" {{ $gamca->status == 'Active' ? 'checked' : '' }} type="radio"
                                        checked id="radio_1" value="Active" class="@error('status') is-invalid @enderror">
                                    <span for="radio">Active</span>
                                    <input name="status" {{ $gamca->status == 'Inactive' ? 'checked' : '' }} type="radio"
                                        id="radio_2" value="Inactive" class="@error('status') is-invalid @enderror">
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
        CKEDITOR.replace('details', {
            filebrowserUploadUrl: "{{ route('admin.gamca.file.Upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

    </script>
@endpush
