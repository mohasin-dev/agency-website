@extends('backend.layouts.app')

@section('title','Edit Labar Diary')

@push('css')

@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Labar Diary</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Edit Labar Diary</li>
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
                <form  action="{{ route('admin.labar-diary.update', $labarDiary->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFullName">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $labarDiary->title) }}" id="exampleInputFulltitle" placeholder="Enter title">
                      @error('title')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFullName">Short Description</label>
                    <textarea type="text" name="short_description" class="form-control @error('short_description') is-invalid @enderror" id="exampleInputFullshort_description" placeholder="Enter short description">{{ old('short_description', $labarDiary->short_description) }}</textarea>
                      @error('short_description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                    <div class="form-group">
                      <label for="status">Status : </label>
                      <input name="status" {{ $labarDiary->status == 'Active' ? 'checked' : '' }} type="radio" checked  id="radio_1" value="Active" class="@error('status') is-invalid @enderror">
                      <span for="radio">Active</span>
                      <input name="status" {{ $labarDiary->status == 'Inactive' ? 'checked' : '' }} type="radio" id="radio_2" value="Inactive" class="@error('status') is-invalid @enderror">
                      <span for="radio_2">Inactive</span>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Youtube Embed Video Link</label><br>
                      <textarea rows="5" type="text" name="video" class="form-control @error('video') is-invalid @enderror">{{ old('short_description', $labarDiary->video) }}</textarea>
                      @error('video')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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