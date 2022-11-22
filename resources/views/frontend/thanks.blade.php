@extends('frontend.layouts.front')

@section('content')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop <span></span> Fillter
            </div>
        </div>
    </div>
    <div class="container mb-30 mt-50">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="mb-50">
                    <h1 class="heading-2 mb-10">Your Wishlist</h1>
                    <h6 class="text-body">There are <span class="text-brand">5</span> products in this list</h6>
                </div>
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock Status</th>
                                <th scope="col">Action</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($models as $item)
                                
                            <tr class="pt-30">
                                <td class="image product-thumbnail pt-40"><img src="{{ asset('uploads/product').'/'. $item->product->photo }}" alt="#" /></td>
                                <td class="product-des product-name">
                                    <h6><a class="product-name mb-10" href="shop-product-right.html">{{ $item->product->name }}</a></h6>
                                </td>
                                <td class="price" data-title="Price">
                                    <h3 class="text-brand">{{ get_discount_price($item->product->id) }}</h3>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    @if ($item->product->stock > 0)
                                    <span class="stock-status in-stock mb-0"> In Stock </span>
                                    @else
                                    <span class="stock-status out-stock mb-0"> Out Stock </span>
                                    @endif
                                    
                                </td>
                                <td class="text-right" data-title="Cart">
                                    <a href="{{ route('addToCart',$item->product->id) }}" class="btn btn-sm">Add to cart</a>
                                </td>
                                <td class="action text-center" data-title="Remove">
                                    <a href="#" class="text-body"><i class="fi-rs-trash"></i></a>
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection