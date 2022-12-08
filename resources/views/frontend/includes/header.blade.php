<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ url('/') }}"><img src=" {{ asset('uploads/setting').'/'.get_setting_data('logo') }}"
                        alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">

                        @php
                            $categories = App\Models\Admin\Category::where('status','active')->take(5)->latest()->get();
                        @endphp
                                   

                        <form action="#">
                            <select class="select-active">
                                <option>All Categories</option>
                                @foreach ($categories as $category)
                                <option>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <input type="text" placeholder="Search for items..." />
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="search-location">
                                <form action="#">
                                    <select class="select-active">
                                        <option>Your Location</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>Arizona</option>
                                        <option>Delaware</option>
                                        <option>Florida</option>
                                        <option>Georgia</option>
                                        <option>Hawaii</option>
                                        <option>Indiana</option>
                                        <option>Maryland</option>
                                        <option>Nevada</option>
                                        <option>New Jersey</option>
                                        <option>New Mexico</option>
                                        <option>New York</option>
                                    </select>
                                </form>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="{{ route('dashboard') }}">
                                    <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                </a>
                                <span class="lable ml-0">Account</span>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="{{ route('wishlist') }}">
                                    <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                    @if (Auth::check())
                                    <span class="pro-count blue">{{ wishlist_count(Auth::user()->id) }}</span>
                                    @else
                                    <span class="pro-count blue">0</span>
                                    @endif
                                </a>
                                <span class="lable">Wishlist</span>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ route('getCarts') }}">
                                    <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count blue">{{ \Cart::getContent()->count() }}</span>
                                </a>
                                <span class="lable">Cart</span>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        @php
                                            $carts = \Cart::getContent();
                                        @endphp
                                        @foreach ($carts as $product)
                                            
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest" src="{{ $product->attributes['photo'] }}" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="{{ route('product-details',$product->id) }}">{{ $product->name }}</a></h4>
                                                <h4><span>{{ $product->quantity }} × </span>{{ $product->price }}</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        
                                        @endforeach
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>{{ \Cart::getTotal() }}</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{ route('getCarts') }}" class="outline">View cart</a>
                                            <a href="{{ route('checkout') }}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ url('/') }}"><img src=" {{ asset('uploads/setting').'/'.get_setting_data('logo') }}"
                        alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <span class="et">Browse</span> All Categories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @php
                                        $categories = App\Models\Admin\Category::where('status','active')->take(5)->latest()->get();
                                    @endphp
                                    @foreach ($categories as $category)
                                    <li>
                                        <a href="#"> <img src="{{ asset('uploads/category').'/'.$category->icon }}" alt="" />{{ $category->name }}</a>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                                <ul class="end">

                                    @php
                                        $categories = App\Models\Admin\Category::where('status','active')->skip(5)->take(5)->latest()->get();
                                    @endphp

                                    @foreach ($categories as $category)
                                    <li>
                                        <a href="#"> <img src="{{ asset('uploads/category').'/'.$category->icon }}" alt="" />{{ $category->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/icon-1.svg" alt="" />Milks and Dairies</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/icon-2.svg" alt="" />Clothing & beauty</a>
                                        </li>
                                    </ul>
                                    <ul class="end">
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/icon-3.svg" alt="" />Wines & Drinks</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/icon-4.svg" alt="" />Fresh Seafood</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li class="hot-deals"><img src="assets/imgs/theme/icons/icon-hot.svg" alt="hot deals" /><a href="shop-grid-right.html">Hot Deals</a></li>
                                <li>
                                    <a class="active" href="{{ url('/') }}">Home</a>
                                   
                                </li>
                                <li>
                                    <a href="page-about.html">About</a>
                                </li>
                                <li>
                                    <a href="{{ route('shop') }}">Shop</a>
                                   
                                </li>
                                <li>
                                    <a href="#">Pages <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="page-about.html">About Us</a></li>
                                        <li><a href="page-contact.html">Contact</a></li>
                                        <li><a href="page-account.html">My Account</a></li>
                                        <li><a href="page-login.html">Login</a></li>
                                        <li><a href="page-register.html">Register</a></li>
                                        <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                        <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="page-terms.html">Terms of Service</a></li>
                                        <li><a href="page-404.html">404 Page</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="page-contact.html">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>