@extends('admin.layouts.admin')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product/</span> Index</h4> 
    <a class="btn btn-success mb-2" href="{{ route('admin.product.create') }}">Create Product</a>

    @if (session()->has('messege'))
      <div class="alert alert-success">
        {{ session()->get('messege') }}
      </div>
      
    @endif

    <!-- Basic Layout -->
    <div class="card">
        <h5 class="card-header">All Products</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Category Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Discount</th>
                <th>Photo</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($models as $product)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $product->name }}</strong>
                </td>
                <td>{{ $product->category->name }} </td>
                <td>{{ $product->brand->name }} </td>
                <td>{{ $product->price }} </td>
                <td>{{ $product->stock }} </td>
                <td>{{ $product->discount }} <br>
                  <span class="badge bg-warning">{{ $product->discount_type }}</span>
                 </td>

                <td><img width="120" height="80" src="{{ asset('uploads/product').'/'.$product->photo }}" alt=""></td>

                <td><span class="badge bg-label-{{ $product->status == 'active'?'success':'danger' }} me-1">{{ $product->status }}</span></td>

                <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.product.edit',$product->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="{{ route('admin.product.delete',$product->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
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