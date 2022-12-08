@extends('admin.layouts.admin')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category/</span> Index</h4> 
    {{-- <a class="btn btn-success mb-2" href="{{ route('admin.category.create') }}">Create Category</a> --}}
    <a class="btn btn-success mb-2" onclick="category_create()" >Create Category</a>

    @if (session()->has('messege'))
      <div class="alert alert-success">
        {{ session()->get('messege') }}
      </div>
      
    @endif

    <!-- Basic Layout -->
    <div class="card">
        <h5 class="card-header">Categories</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>SL</th>
                <th>Category Name</th>
                <th>Photo</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($categories as $category)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $category->name }}</strong> <br>
                  <span>Subcategories: {{ count($category->sub_category)  }}</span>
                </td>

                <td><img src="{{ asset('uploads/category').'/'.$category->icon }}" alt=""></td>

                <td><span class="badge bg-label-{{ $category->status == 'active'?'success':'danger' }} me-1">{{ $category->status }}</span></td>

                <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.category.edit',$category->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="{{ route('admin.category.delete',$category->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>
@stop



@push('admin_script')
<script>

  function category_create(){
          $('#AdminModal').modal('show');
          $('#AdminModalBody').html(null);
          $('#exampleModalLabel3').html('Category Create');
          $.get('{{ route('admin.category.create') }}', {_token:'{{ csrf_token() }}'}, function(data){
              $('#AdminModalBody').html(data);
          });
      }

  </script>
@endpush