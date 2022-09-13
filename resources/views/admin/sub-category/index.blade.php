@extends('admin.layouts.admin')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sub Category/</span> Index</h4> 
    <a class="btn btn-success mb-2" href="{{ route('admin.sub-category.create') }}">Create Sub Category</a>

    @if (session()->has('messege'))
      <div class="alert alert-success">
        {{ session()->get('messege') }}
      </div>
      
    @endif

    <!-- Basic Layout -->
    <div class="card">
        <h5 class="card-header">Sub Categories</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Category Name</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($models as $model)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $model->name }}</strong></td>

                <td>{{ $model->category->name }}</td>

                <td><span class="badge bg-label-{{ $model->status == 'active'?'success':'danger' }} me-1">{{ $model->status }}</span></td>

                <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.sub-category.edit',$model->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="{{ route('admin.sub-category.delete',$model->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
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