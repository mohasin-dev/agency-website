@extends('backend.layouts.app')

@section('title','Add Staff')

@push('css')

@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Add Staff</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Add Staff</li>
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
                <form  action="{{ route('admin.staff.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputFullName">Full Name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="exampleInputFullname" placeholder="Enter full name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFullName">Designation</label>
                      <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation') }}" id="exampleInputFulldesignation" placeholder="Enter designation">
                        @error('designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFullName">Order</label>
                      <input type="text" name="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order') }}" id="exampleInputFullorder" placeholder="Enter order">
                        @error('order')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFullName">Facebook URL</label>
                      <input type="text" name="facebook_url"
                          class="form-control"
                          value="{{ old('facebook_url') }}"
                          id="exampleInputFullfacebook_url" placeholder="Enter instagram url">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFullName">Twitter URL</label>
                      <input type="text" name="twitter_url"
                          class="form-control"
                          value="{{ old('twitter_url') }}"
                          id="exampleInputFulltwitter_url" placeholder="Enter instagram url">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFullName">LinkedIn URL</label>
                      <input type="text" name="linkedin_url"
                          class="form-control"
                          value="{{ old('linkedin_url') }}"
                          id="exampleInputFulllinkedin_url" placeholder="Enter instagram url">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFullName">Instagram URL</label>
                      <input type="text" name="instagram_url"
                          class="form-control"
                          value="{{ old('instagram_url') }}"
                          id="exampleInputFullinstagram_url" placeholder="Enter instagram url">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Upload photo</label><br>
                        <input type="file" name="image" class="@error('image') is-invalid @enderror">
                        @error('image')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="status">Status : </label>
                      <input name="status" type="radio" checked id="radio_1" value="Active" class="@error('status') is-invalid @enderror">
                      <span for="radio1">Active</span>
                      <input name="status" type="radio" id="radio_2" value="Inactive" class="@error('status') is-invalid @enderror">
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

@endpush