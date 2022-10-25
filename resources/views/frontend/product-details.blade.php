@extends('frontend.layouts.front')

@section('content')

{{-- <div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> <a href="shop-grid-right.html">Vegetables & tubers</a> <span></span> Seeds of Change Organic
        </div>
    </div>
</div> --}}
<div class="container mb-30">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="product-detail accordion-detail">
                <div class="row mb-50 mt-30">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-2.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-1.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-3.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-4.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-5.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-6.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/imgs/shop/product-16-7.jpg" alt="product image" />
                                </figure>
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                <div><img src="assets/imgs/shop/thumbnail-3.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-4.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-5.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-6.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-7.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-8.jpg" alt="product image" /></div>
                                <div><img src="assets/imgs/shop/thumbnail-9.jpg" alt="product image" /></div>
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            {{-- <span class="stock-status out-stock"> Sale Off </span> --}}
                            <h2 class="title-detail">{{ $product->name }}</h2>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">{{ get_discount_price($product->id) }}</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15">{{ $product->discount }} {{ $product->discount_type == 'flat'?'FLAT':'%'  }} Off</span>
                                        <span class="old-price font-md ml-15">{{ $product->price }}</span>
                                    </span>
                                </div>
                            </div>
                            <div class="short-desc mb-30">
                                <p class="font-lg">{{ $product->short_description }}</p>
                            </div>
                            {{-- <div class="attr-detail attr-size mb-30">
                                <strong class="mr-10">Size / Weight: </strong>
                                <ul class="list-filter size-filter font-small">
                                    <li><a href="#">50g</a></li>
                                    <li class="active"><a href="#">60g</a></li>
                                    <li><a href="#">80g</a></li>
                                    <li><a href="#">100g</a></li>
                                    <li><a href="#">150g</a></li>
                                </ul>
                            </div> --}}
                            <div class="detail-extralink mb-50">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <span class="qty-val">1</span>
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                </div>
                            </div>
                            {{-- <div class="font-xs">
                                <ul class="mr-50 float-start">
                                    <li class="mb-5">Type: <span class="text-brand">Organic</span></li>
                                    <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2021</span></li>
                                    <li>LIFE: <span class="text-brand">70 days</span></li>
                                </ul>
                                <ul class="float-start">
                                    <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                    <li class="mb-5">Tags: <a href="#" rel="tag">Snack</a>, <a href="#" rel="tag">Organic</a>, <a href="#" rel="tag">Brown</a></li>
                                    <li>Stock:<span class="in-stock text-brand ml-5">8 Items In Stock</span></li>
                                </ul>
                            </div> --}}
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
                <div class="product-info">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs text-uppercase">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab entry-main-content">
                            <div class="tab-pane fade show active" id="Description">
                                <div class="">
                                    {{ $product->details }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-60">
                    <div class="col-12">
                        <h2 class="section-title style-1 mb-30">Related products</h2>
                    </div>
                    
                    <div class="col-12">
                        <div class="row related-products">

                            @foreach ($reletade_product as $item)
                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap hover-up">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="shop-product-right.html" tabindex="0">
                                                <img class="default-img" src="assets/imgs/shop/product-2-1.jpg" alt="" />
                                                <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="shop-product-right.html" tabindex="0">Ulstra Bass Headphone</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span> </span>
                                        </div>
                                        <div class="product-price">
                                            <span>$238.85 </span>
                                            <span class="old-price">$245.8</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection