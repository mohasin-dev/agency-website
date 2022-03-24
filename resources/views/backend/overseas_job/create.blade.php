@extends('backend.layouts.app')

@section('title', 'Create Overseas Job')

    @push('css')

    @endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Overseas Job</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Overseas Job</li>
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
                        <form action="{{ route('admin.overseas-job.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFullName">Title</label>
                                    <input type="text" name="job_title"
                                        class="form-control @error('job_title') is-invalid @enderror"
                                        value="{{ old('job_title') }}" id="exampleInputFulljob_title"
                                        placeholder="Enter job title">
                                    @error('job_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleInputFullName">Country</label>
                                    <input type="text" name="country_id"
                                        class="form-control @error('country_id') is-invalid @enderror"
                                        value="{{ old('country_id') }}" id="exampleInputFullcountry"
                                        placeholder="Enter country name">
                                    @error('country_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
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
                                    <label for="exampleInputFullName">Company Name</label>
                                    <input type="text" name="company_name"
                                        class="form-control @error('company_name') is-invalid @enderror"
                                        value="{{ old('company_name') }}" id="exampleInputFullcompany_name"
                                        placeholder="Enter company name">
                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFullName">Trade</label>
                                    <input type="text" name="trade"
                                        class="form-control @error('trade') is-invalid @enderror"
                                        value="{{ old('trade') }}" id="exampleInputFulltrade" placeholder="Enter trade">
                                    @error('trade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFullName">Visa type</label>
                                    <input type="text" name="visa_type"
                                        class="form-control @error('visa_type') is-invalid @enderror"
                                        value="{{ old('visa_type') }}" id="exampleInputFullvisa_type"
                                        placeholder="Enter visa type">
                                    @error('visa_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFullName">Deadline</label>
                                    <input type="date" name="deadline"
                                        class="form-control @error('deadline') is-invalid @enderror"
                                        value="{{ old('deadline') }}" id="exampleInputFulldeadline"
                                        placeholder="Enter visa type">
                                    @error('deadline')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFullName">Working Hour</label>
                                    <input type="text" name="working_hour"
                                        class="form-control @error('working_hour') is-invalid @enderror"
                                        value="{{ old('working_hour') }}" id="exampleInputFullworking_hour"
                                        placeholder="Enter working hour">
                                    @error('working_hour')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFullName">Contact Duration</label>
                                    <input type="text" name="contact_duration"
                                        class="form-control @error('contact_duration') is-invalid @enderror"
                                        value="{{ old('contact_duration') }}" id="exampleInputFullcontact_duration"
                                        placeholder="Enter contact duration">
                                    @error('contact_duration')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFullName">Salary</label>
                                    <input type="text" name="salary"
                                        class="form-control @error('salary') is-invalid @enderror"
                                        value="{{ old('salary') }}" id="exampleInputFullsalary"
                                        placeholder="Enter contact duration">
                                    @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMobile">Details</label>
                                    <textarea class="@error('details') is-invalid @enderror"
                                        name="details">{!! old('details') !!}</textarea>
                                    @error('details')
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
        CKEDITOR.replace('details', {
            filebrowserUploadUrl: "{{ route('admin.overseas.job.file.Upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

    </script>
@endpush
