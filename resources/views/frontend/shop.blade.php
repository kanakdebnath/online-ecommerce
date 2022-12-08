@extends('frontend.layouts.front')

@section('content')

<main class="main">
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">ALl Products</h1>
                        <div class="breadcrumb">
                            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> Products
                        </div>
                    </div>
                    <div class="col-xl-9 text-end d-none d-xl-block">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row flex-row-reverse">
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>We found <strong class="text-brand">{{ count($products) }}</strong> items for you!</p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Featured</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                    <li><a href="#">Release Date</a></li>
                                    <li><a href="#">Avg. Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-grid">
                    @foreach ($products as $product)
                        
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product-details',$product->id) }}">
                                        <img class="default-img" src="{{ asset('uploads/product').'/'.$product->photo }}" alt="" />
                                        <img class="hover-img" src="{{ asset('uploads/product').'/'.$product->photo }}" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" href="{{ route('wishlist.store',$product->id) }}"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="best">-{{ $product->discount }} {{ $product->discount_type == 'flat'?'FLAT':'%'  }}</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{ route('category-shop',$product->category_id) }}">{{ $product->category->name }}</a>
                                </div>
                                <h2><a href="{{ route('product-details',$product->id) }}">{{ $product->name }}</a></h2>
                                <div>
                                    <span class="font-small text-muted">500g</span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>${{ get_discount_price($product->id) }}</span>
                                        <span class="old-price">${{ $product->price }}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="{{ route('addToCart',$product->id) }}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
                    <!--end product card-->
                </div>
                <!--product grid-->
                <div class="pagination-area mt-20 mb-20">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-30">Category</h5>
                    <ul>
                        @foreach ($categories as $category)
                            
                        <li>
                            <a href="{{ route('category-shop',$category->id) }}"> <img src="{{ asset('uploads/category').'/'.$category->icon }}" alt="" />{{ $category->name }}</a><span class="count">{{ category_count($category->id) }}</span>
                        </li>
                        
                        @endforeach
                    </ul>
                </div>
                <!-- Fillter By Price -->
                <div class="sidebar-widget price_range range mb-30">
                    <h5 class="section-title style-1 mb-30">Fill by price</h5>
                    <div class="price-filter">
                        <div class="price-filter-inner">
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input"><span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price" /></div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group">
                        <div class="list-group-item mb-10 mt-10">
                            <label class="fw-900">Color</label>
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="" />
                                <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="" />
                                <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
                            </div>
                            <label class="fw-900 mt-15">Item Condition</label>
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="" />
                                <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="" />
                                <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                            </div>
                        </div>
                    </div>
                    <a href="shop-grid-right.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
                </div>
                <!-- Product sidebar Widget -->
                <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                    <h5 class="section-title style-1 mb-30">New products</h5>
                    <div class="single-post clearfix">
                        <div class="image">
                            <img src="assets/imgs/shop/thumbnail-3.jpg" alt="#" />
                        </div>
                        <div class="content pt-10">
                            <h5><a href="shop-product-detail.html">Chen Cardigan</a></h5>
                            <p class="price mb-0 mt-5">$99.50</p>
                            <div class="product-rate">
                                <div class="product-rating" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single-post clearfix">
                        <div class="image">
                            <img src="assets/imgs/shop/thumbnail-4.jpg" alt="#" />
                        </div>
                        <div class="content pt-10">
                            <h6><a href="shop-product-detail.html">Chen Sweater</a></h6>
                            <p class="price mb-0 mt-5">$89.50</p>
                            <div class="product-rate">
                                <div class="product-rating" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="single-post clearfix">
                        <div class="image">
                            <img src="assets/imgs/shop/thumbnail-5.jpg" alt="#" />
                        </div>
                        <div class="content pt-10">
                            <h6><a href="shop-product-detail.html">Colorful Jacket</a></h6>
                            <p class="price mb-0 mt-5">$25</p>
                            <div class="product-rate">
                                <div class="product-rating" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                    <img src="assets/imgs/banner/banner-11.png" alt="" />
                    <div class="banner-text">
                        <span>Oganic</span>
                        <h4>
                            Save 17% <br />
                            on <span class="text-brand">Oganic</span><br />
                            Juice
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection