@extends('admin.layouts.admin')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sub Category/</span> Create</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create Sub Category</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.sub-category.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                  <label class="form-label" for="category">Parent Category</label>

                  <select name="category_id" id="category" required class="form-control">
                    <option value="0">Select Parent Category</option>
                    @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                  
                </div>


              <div class="mb-3">
                <label class="form-label" for="category_name">Name</label>
                <input type="text" name="name" class="form-control" id="category_name" placeholder="Name" />
              </div>


              <div class="mb-3">
                <label class="form-label" for="status">Status</label>
                <select name="status" class="form-control"  id="status">
                    <option value="active">Active</option>
                    <option value="inactive">InActive</option>
                </select>
              </div>
              <button type="submit" class="btn btn-success">Create Sub Category</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop