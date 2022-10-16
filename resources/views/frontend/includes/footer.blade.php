<section class="newsletter mb-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="position-relative newsletter-inner">
                    <div class="newsletter-content">
                        <h2 class="mb-20">
                            Stay home & get your daily <br />
                            needs from our shop
                        </h2>
                        <p class="mb-45">Start You'r Daily Shopping with <span class="text-brand">Nest
                                Mart</span></p>
                        <form class="form-subcriber d-flex">
                            <input type="email" placeholder="Your emaill address" />
                            <button class="btn" type="submit">Subscribe</button>
                        </form>
                    </div>
                    <img src=" {{ asset('frontend/assets/imgs/banner/banner-9.png') }}" alt="newsletter" />
                </div>
            </div>
        </div>
    </div>
</section>
<section class="featured section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                    <div class="banner-icon">
                        <img src=" {{ asset('frontend/assets/imgs/theme/icons/icon-1.svg') }}" alt="" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Best prices & offers</h3>
                        <p>Orders $50 or more</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                    <div class="banner-icon">
                        <img src=" {{ asset('frontend/assets/imgs/theme/icons/icon-2.svg') }}" alt="" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Free delivery</h3>
                        <p>24/7 amazing services</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                    <div class="banner-icon">
                        <img src=" {{ asset('frontend/assets/imgs/theme/icons/icon-3.svg') }}" alt="" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Great daily deal</h3>
                        <p>When you sign up</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                    <div class="banner-icon">
                        <img src=" {{ asset('frontend/assets/imgs/theme/icons/icon-4.svg') }}" alt="" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Wide assortment</h3>
                        <p>Mega Discounts</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                    <div class="banner-icon">
                        <img src=" {{ asset('frontend/assets/imgs/theme/icons/icon-5.svg') }}" alt="" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Easy returns</h3>
                        <p>Within 30 days</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                    <div class="banner-icon">
                        <img src=" {{ asset('frontend/assets/imgs/theme/icons/icon-6.svg') }}" alt="" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title">Safe delivery</h3>
                        <p>Within 30 days</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding footer-mid">
    <div class="container pt-15 pb-20">
        <div class="row">
            <div class="col">
                <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0">
                    <div class="logo mb-30">
                        <a href="index.html" class="mb-15"><img
                                src=" {{ asset('frontend/assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
                        <p class="font-lg text-heading">Awesome grocery store website template</p>
                    </div>
                    <ul class="contact-infor">
                        <li><img src=" {{ asset('frontend/assets/imgs/theme/icons/icon-location.svg') }}"
                                alt="" /><strong>Address: </strong> <span>{{get_setting_data('company_address')}}</span></li>
                        <li><img src=" {{ asset('frontend/assets/imgs/theme/icons/icon-contact.svg') }}"
                                alt="" /><strong>Call Us:</strong><span>{{get_setting_data('company_phone')}}</span>
                        </li>
                        <li><img src=" {{ asset('frontend/assets/imgs/theme/icons/icon-email-2.svg') }}"
                                alt="" /><strong>Email:</strong><span>{{get_setting_data('company_email')}}</span></li>
                        <li><img src=" {{ asset('frontend/assets/imgs/theme/icons/icon-clock.svg') }}"
                                alt="" /><strong>Hours:</strong><span>{{get_setting_data('company_hour')}}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-link-widget col">
                <h4 class="widget-title">Company</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Delivery Information</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Support Center</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>
            <div class="footer-link-widget col">
                <h4 class="widget-title">Account</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    <li><a href="#">Sign In</a></li>
                    <li><a href="#">View Cart</a></li>
                    <li><a href="#">My Wishlist</a></li>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="#">Help Ticket</a></li>
                    <li><a href="#">Shipping Details</a></li>
                    <li><a href="#">Compare products</a></li>
                </ul>
            </div>
            <div class="footer-link-widget col">
                <h4 class="widget-title">Corporate</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    <li><a href="#">Become a Vendor</a></li>
                    <li><a href="#">Affiliate Program</a></li>
                    <li><a href="#">Farm Business</a></li>
                    <li><a href="#">Farm Careers</a></li>
                    <li><a href="#">Our Suppliers</a></li>
                    <li><a href="#">Accessibility</a></li>
                    <li><a href="#">Promotions</a></li>
                </ul>
            </div>
            <div class="footer-link-widget col">
                <h4 class="widget-title">Popular</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    <li><a href="#">Milk & Flavoured Milk</a></li>
                    <li><a href="#">Butter and Margarine</a></li>
                    <li><a href="#">Eggs Substitutes</a></li>
                    <li><a href="#">Marmalades</a></li>
                    <li><a href="#">Sour Cream and Dips</a></li>
                    <li><a href="#">Tea & Kombucha</a></li>
                    <li><a href="#">Cheese</a></li>
                </ul>
            </div>
            <div class="footer-link-widget widget-install-app col">
                <h4 class="widget-title">Install App</h4>
                <p class="wow fadeIn animated">From App Store or Google Play</p>
                <div class="download-app">
                    <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active"
                            src="{{ asset('frontend/assets/imgs/theme/app-store.jpg') }}" alt="" /></a>
                    <a href="#" class="hover-up mb-sm-2"><img
                            src=" {{ asset('frontend/assets/imgs/theme/google-play.jpg') }}" alt="" /></a>
                </div>
                <p class="mb-20">Secured Payment Gateways</p>
                <img class="wow fadeIn animated" src="{{ asset('frontend/assets/imgs/theme/payment-method.png') }}"
                    alt="" />
            </div>
        </div>
    </div>
</section>
<div class="container pb-30">
    <div class="row align-items-center">
        <div class="col-12 mb-30">
            <div class="footer-bottom"></div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
            <p class="font-sm mb-0">&copy; {{ date('Y') }}, <strong class="text-brand">Nest Mart</strong> All
                rights reserved</p>
        </div>
        <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
            <div class="hotline d-lg-inline-flex mr-30">
                <img src=" {{ asset('frontend/assets/imgs/theme/icons/phone-call.svg') }}" alt="hotline" />
                <p>1900 - 6666<span>Working 8:00 - 22:00</span></p>
            </div>
            <div class="hotline d-lg-inline-flex">
                <img src=" {{ asset('frontend/assets/imgs/theme/icons/phone-call.svg') }}" alt="hotline" />
                <p>1900 - 8888<span>24/7 Support Center</span></p>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
            <div class="mobile-social-icon">
                <h6>Follow Us</h6>
                <a href="{{get_setting_data('facebook')}}"><img src=" {{ asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg') }}"
                        alt="" /></a>
                <a href="{{get_setting_data('twitter')}}"><img src=" {{ asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg') }}"
                        alt="" /></a>
                <a href="{{get_setting_data('instagram')}}"><img
                        src=" {{ asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg') }}"
                        alt="" /></a>
                <a href="{{get_setting_data('linkedin')}}"><img
                        src=" {{ asset('frontend/assets/imgs/theme/icons/icon-pinterest-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src=" {{ asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg') }}"
                        alt="" /></a>
            </div>
            <p class="font-sm">Up to 15% discount on your first subscribe</p>
        </div>
    </div>
</div>
