@extends('admin.layouts.admin')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Logo/</span> Setting</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Logo setting</h5>
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
            <form action="{{ route('admin.setting.store_logo') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                      <label class="form-label" for="logo">Company Logo</label>
                      <input type="file"  name="logo" class="form-control" id="logo" />
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="favicon">Company Favicon</label>
                      <input type="file"  name="favicon" class="form-control" id="favicon" />
                    </div>
              <button type="submit" class="btn btn-success">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop