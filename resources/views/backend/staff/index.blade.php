@extends('backend.layouts.app')

@section('title','Staff')

@push('style')

@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Staff List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Staff List</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
    <!-- Main content -->
    <section class="content p-10">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-tools" style="float: left">
                        <form action="{{ route('admin.staff.index') }}" method="GET">
                            @csrf
                            <div class="input-group input-group-sm" style="width: 250px;">
                            
                                <input type="text" name="searchKeyword" class="form-control float-left" placeholder="Search">
        
                                <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        </div>
                    <a class="btn btn-sm btn-primary float-right" href="{{ route('admin.staff.create') }}">Add New Staff</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>                  
                        <tr>
                          <th>SL</th>
                          <th>Name</th>
                          <th>Designation</th>
                          <th class="text-center">Order</th>
                          <th class="text-center">Photo</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($staff as $key => $item)
                            <tr>
                                <td width="30" class="text-center">{{ $staff->firstItem() + $key }}</td>
                                <td>{{ $item->name }}</td>  
                                <td>{{ $item->designation }}</td>  
                                <td class="text-center">{{ $item->order }}</td>  
                                <td class="text-center">
                                    @if ($item->image)
                                    <img style="border-radius: 50%" src="{{ asset('storage/' . $item->image) }}" width="50">
                                    @else
                                      <img style="border-radius: 50%" src="{{ '/assets/backend/img/avatar.png' }}" width="50">
                                    @endif
                                </td>
                                <td class="text-center">
                                  @if ($item->status === 'Active')
                                    <span class="badge badge-success">{{ $item->status }}</span>
                                  @else
                                    <span class="badge badge-warning">{{ $item->status }}</span>
                                  @endif
                                </td>
                                <td width="100" class="text-center">
                                    <a href="{{ route('admin.staff.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" type="button" onclick="deleteitem({{ $item->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('admin.staff.destroy', $item->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>  
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                    <div class="d-flex justify-content-center">
                        {!! $staff->links() !!}
                    </div>  
                </div>
              </div>
          </div>
        </div>
      </section>
@endsection 

@push('script')
<script type="text/javascript">
    function deleteitem(id) {
        Swal.fire({
            "title": "Are you sure?",
            "text": "You won't be able to revert this!",
            "type": 'warning',
            "showCancelButton": true,
            "confirmButtonColor": '#3085d6',
            "cancelButtonColor": '#d33',
            "confirmButtonText": 'Yes, delete it!',
            "cancelButtonText": 'No, cancel!',
            "confirmButtonClass": 'btn btn-success',
            "cancelButtonClass": 'btn btn-danger',
            "buttonsStyling": false,
            "reverseButtons": true,
            "timer":5000,
            "width":"32rem",
            "heightAuto":true,
            "padding":"1.25rem",
            "showConfirmButton":true,
            "showCloseButton":false,
            "icon":"warning"
            }).then((result) => {
              if (result.value) {
                  event.preventDefault();
                  document.getElementById('delete-form-'+id).submit();
              }
            })
    }
</script>
@endpush