@extends('admin.layouts.admin')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product/</span> Update</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Product</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                  <label class="form-label" for="product_name">Product Name</label>
                  <input type="text" value="{{ $product->name }}" name="name" class="form-control" id="product_name" placeholder="Product Name" />
                </div>
  
                <div class="mb-3">
                  <label class="form-label" for="category">Category</label>
                  <select name="category"  class="form-control"  id="category">
                      <option value="">Select Category</option>
                      @foreach ($category as $item)
                      <option {{ $product->category_id == $item->id? 'selected':''  }} value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                  </select>
                </div>
  
                <div class="mb-3">
                  <label class="form-label" for="sub-category">Sub Category</label>
                  <select name="sub_category" class="form-control"  id="sub-category">
                    <option value="">Select Sub Category</option>
                    @foreach ($sub_category as $item)
                    <option {{ $product->subcategory_id == $item->id? 'selected':''  }} value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div>
  
                <div class="mb-3">
                  <label class="form-label" for="brand">Brand</label>
                  <select name="brand" class="form-control"  id="brand">
                      <option value="">Select Brand</option>
                      @foreach ($brand as $item)
                      <option {{ $product->brand_id = $item->id? 'selected':''  }} value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                  </select>
                </div>
  

                <div class="row">
                  <div class="col-md-3">
                      <label class="form-label" for="photo">Photo</label>
                      <img width="120" height="80" src="{{ asset('uploads/product').'/'.$product->photo }}" alt="">
                      <input type="hidden" name="old_photo" value="{{ $product->photo }}">
                  </div>
                  <div class="col-md-9">
                      <div class="mb-3">
                          <label class="form-label" for="photo">Photo</label>
                          <input type="file" name="photo" class="form-control" id="photo" />
                        </div>
                  </div>
                </div>
  
  
                <div class="mb-3">
                  <label class="form-label" for="description">Description</label>
                  <textarea name="description"   class="form-control" id="description" cols="30" rows="10">{{ $product->description }}</textarea>
                </div>
  
                <div class="mb-3">
                  <label class="form-label" for="short-description">Short Description</label>
                  <textarea name="short_description"  class="form-control" id="short-description" cols="30" rows="10">{{ $product->short_description }}</textarea>
                </div>
  
                <div class="mb-3">
                  <label class="form-label" for="price">Price</label>
                  <input type="number" value="{{ $product->price }}" name="price" class="form-control" id="price" />
                </div>
  
                <div class="mb-3">
                  <label class="form-label" for="stock">Stock</label>
                  <input type="number" value="{{ $product->stock }}" name="stock" class="form-control" id="stock" />
                </div>
  
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="discount">Discount</label>
                    <input type="number" value="{{ $product->discount }}" name="discount" class="form-control" id="discount" />
                  </div>
  
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="discount-type">Discount Type</label>
                    <select  class="form-control" name="discount_type" id="discount-type">
                      <option {{ $product->discount_type == 'persent'?'selected':'' }} value="persent">Persent</option>
                      <option {{ $product->discount_type == 'flat'?'selected':'' }} value="flat">Flat</option>
                    </select>
                    
                  </div>
                </div>
                

              <div class="mb-3">
                <label class="form-label" for="status">Status</label>
                <select name="status" class="form-control"  id="status">
                    <option {{ $product->status =='active'?'selected':'' }} value="active">Active</option>
                    <option {{ $product->status =='inactive'?'selected':'' }} value="inactive">InActive</option>
                </select>
              </div>
              <button type="submit" class="btn btn-success">Update Product</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop

@push('admin_script')
<script>
  $(document).ready(function () {
            $('#category').on('change', function () {
                var abc = this.value;
                $("#sub-category").html('');
                $.ajax({
                    url: "{{url('admin/get_sub_categories')}}",
                    type: "POST",
                    data: {
                      category_id: abc,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#sub-category').html('<option value="">Select Sub category</option>');
                        $.each(result.sub_categories, function (key, value) {
                            $("#sub-category").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
</script>
@endpush