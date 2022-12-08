<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
        <div class="detail-gallery">
            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
            <!-- MAIN SLIDES -->
            <div class="product-image-slider">
                <figure class="border-radius-10">
                    <img src="{{ asset('uploads/product').'/'.$product->photo }}" alt="product image" />
                </figure>
            </div>
        </div>
        <!-- End Gallery -->
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="detail-info pr-30 pl-30">
            <h3 class="title-detail"><a href="{{ route('product-details',$product->id) }}" class="text-heading">{{ $product->name }}</a></h3>
            <div class="clearfix product-price-cover">
                <div class="product-price primary-color float-left">
                    <span class="current-price text-brand">${{ get_discount_price($product->id) }}</span>
                    <span>
                        <span class="save-price font-md color3 ml-15">{{ $product->discount }} {{ $product->discount_type == 'flat'?'FLAT':'%'  }} Off</span>
                        <span class="old-price font-md ml-15">${{ $product->price }}</span>
                    </span>
                </div>
            </div>
            <div class="detail-extralink mb-30">
                <div class="detail-qty border radius">
                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                    <span class="qty-val">1</span>
                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                </div>
                <div class="">
                    <a href="{{ route('addToCart',$product->id) }}" class="btn btn-success"><i class="fi-rs-shopping-cart"></i>Add to cart</a>
                </div>
            </div>
        </div>
        <!-- Detail Info -->
    </div>
</div>