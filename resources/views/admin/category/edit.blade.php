@extends('admin.layouts.admin')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category/</span> Update</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Category</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
              <div class="mb-3">
                <label class="form-label" for="category_name">Category Name</label>
                <input type="text" value="{{ $category->name }}" name="name" class="form-control" id="category_name" placeholder="Category Name" />
              </div>

              <div class="row">
                <div class="col-md-3">
                    <label class="form-label" for="photo">Category Icon</label>
                    <img src="{{ asset('uploads/category').'/'.$category->icon }}" alt="">
                    <input type="hidden" name="old_icon" value="{{ $category->icon }}">
                </div>
                <div class="col-md-9">
                    <div class="mb-3">
                        <label class="form-label" for="photo">Category Icon</label>
                        <input type="file" name="photo" class="form-control" id="photo" />
                      </div>
                </div>
              </div>
              

              <div class="mb-3">
                <label class="form-label" for="status">Status</label>
                <select name="status" class="form-control"  id="status">
                    <option {{ $category->status =='active'?'selected':'' }} value="active">Active</option>
                    <option {{ $category->status =='inactive'?'selected':'' }} value="inactive">InActive</option>
                </select>
              </div>
              <button type="submit" class="btn btn-success">Upadte Category</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop