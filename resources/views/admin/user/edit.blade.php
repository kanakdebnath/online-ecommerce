@extends('admin.layouts.admin')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users/</span> Update</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Update User</h5>
          </div>


          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif


          <div class="card-body">
            <form action="{{ route('admin.user.update',$model->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
              <div class="mb-3">
                <label class="form-label" for="user_name">user Name</label>
                <input type="text" value="{{ $model->name }}" name="name" class="form-control" id="user_name" placeholder="user Name" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="phone">User Phone</label>
                <input type="number" name="phone" value="{{ $model->phone }}" class="form-control" id="phone" placeholder="User Phone" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="email">User email</label>
                <input type="email" name="email" value="{{ $model->email }}" class="form-control" id="email" placeholder="User email" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="address">User address</label>
                <input type="text" name="address" value="{{ $model->address }}" class="form-control" id="address" placeholder="User address" />
              </div>

              
              <div class="mb-3">
                <label class="form-label" for="status">Status</label>
                <select name="status" class="form-control"  id="status">
                    <option {{ $model->status =='active'?'selected':'' }} value="active">Active</option>
                    <option {{ $model->status =='inactive'?'selected':'' }} value="inactive">InActive</option>
                </select>
              </div>

              <button type="submit" class="btn btn-success">Update User</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop