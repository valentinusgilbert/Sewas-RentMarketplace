@extends('frontend.main_master')

@section('content')

@section('title')
Sewas : Rental Marketplace
@endsection

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <!-- === ========= SECTION – HERO ==== ======= -->
                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @foreach($sliders as $slider)
                    
                            <div class="item" style="background-image: url({{ asset($slider->slider_img) }});">
                                @if ($slider->title == NULL)

                               
                                @endif
                            </div>
                      
                        <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.owl-carousel -->
                </div>
                <!-- ==== ===== SECTION – HERO : END === ============== -->


                <!-- = ===== SCROLL TABS =============== ========== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">SEWA PRODUK</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all"
                                    data-toggle="tab">Semua</a>
                            </li>
                            @foreach($categories as $category)
                            <li><a data-transition-type="backSlide" href="#category{{ $category->id }}"
                                    data-toggle="tab">{{ $category->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content outer-top-xs">

                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    @foreach($products as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <img src="{{ asset($product->product_thambnail) }}" alt="">
                                                    </div>
                                            
                                                    @php
                                                    $amount = $product->product_price - $product->product_discount;
                                                    $discount = ($amount/$product->product_price) * 100;
                                                    @endphp

                                                    <div>
                                                        @if ($product->product_discount == NULL)
                                                        @else
                                                        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                        @endif
                                                    </div>
                                                </div>
                                              

                                                <div class="product-info text-left">
                                                    <h3 class="name">
                                                        <a
                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                            {{ $product->product_name }}
                                                        </a>
                                                    </h3>
                                                    
                                                   
                                                    <div class="description">Sewa Mulai Dari</div>
                                                    @if ($product->product_discount == NULL)
                                                    <div class="product-price"> <span class="price">
                                                            Rp{{ number_format($product->product_price, 0, '', '.') }} / hari
                                                        </span> </div>
                                                    @else
                                                    <div class="product-price"> <span class="price">
                                                            Rp{{ number_format($product->product_discount, 0, '', '.') }} / hari
                                                        </span> <span
                                                            class="price-before-discount">Rp{{ number_format($product->product_price, 0, '', '.') }} / hari</span> 
                                                        
                                                    </div>
                                                    @endif
                                                   
                                                    <div class="rating rateit-small"></div>
                                                </div>
                                               
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            
                                                            <button class="btn btn-primary icon" type="button"
                                                                title="Wishlist" id="{{ $product->id }}"
                                                                onclick="addToWishList(this.id)"> <i
                                                                    class="fa fa-heart"></i> </button>
                                                            <li class="lnk"> <a data-toggle="tooltip"
                                                                    class="add-to-cart"
                                                                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}"
                                                                    title="Detail Produk"> <i class="fa fa-signal"
                                                                        aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>                                      
                                                </div>                                             
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @foreach($categories as $category)
                        <div class="tab-pane" id="category{{ $category->id }}">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    @php
                                    $catwiseProduct =
                                    App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
                                    @endphp

                                    @forelse($catwiseProduct as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <img src="{{ asset($product->product_thambnail) }}" alt="">
                                                    </div>
                                                    @php
                                                    $amount = $product->product_price - $product->product_discount;
                                                    $discount = ($amount/$product->product_price) * 100;
                                                    @endphp

                                                    
                                                </div>

                                                <div class="product-info text-left">
                                                    <h3 class="name">
                                                        <a
                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                            {{ $product->product_name }}
                                                        </a>
                                                    </h3>
                                                  

                                                    
                                                    <div class="description">Sewa Mulai Dari</div>

                                                    @if ($product->product_discount == NULL)
                                                    <div class="product-price"> <span class="price">
                                                            Rp{{ number_format($product->product_price, 0, '', '.') }} / hari
                                                        </span> </div>
                                                    @else
                                                    <div class="product-price"> <span class="price">
                                                            Rp{{ number_format($product->product_discount, 0, '', '.') }} / hari
                                                        </span> <span
                                                            class="price-before-discount">Rp{{ number_format($product->product_price, 0, '', '.') }} / hari</span>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="rating rateit-small"></div>

                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <button class="btn btn-primary icon" type="button"
                                                                title="Wishlist" id="{{ $product->id }}"
                                                                onclick="addToWishList(this.id)"> <i
                                                                    class="fa fa-heart"></i> </button>
                                                            <li class="lnk"> <a data-toggle="tooltip"
                                                                    class="add-to-cart"
                                                                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}"
                                                                    title="Detail Produk"> <i class="fa fa-signal"
                                                                        aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @empty
                                    <h5 class="text-danger">Produk Tidak Ditemukan</h5>

                                    @endforelse





                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- end categor foreach -->

                    </div>
                </div>
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                
                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow">
                    <div class="row">
                        <div class="col-md-6 col-sm-3 col-lg-3">
                            <div class="info-boxes-inner">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12"> 
                                            <i class="fa fa-truck" style="color: ##000000; font-size: 30px"
                                                aria-hidden="true"></i>
                                            <h4 class="info-box-heading green">Jabodetabek Area</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Hanya Jabodetabek</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3 col-lg-3">
                            <div class="info-boxes-inner">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <i class="fa fa-check" style="color: ##000000; font-size: 30px"
                                                aria-hidden="true"></i>
                                            <h4 class="info-box-heading green">Support 24/7</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Dijamin barang sewa bagus</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3 col-lg-3">
                            <div class="info-boxes-inner">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <i class="fa fa-money" style="color: ##000000; font-size: 30px"
                                                aria-hidden="true"></i>
                                            <h4 class="info-box-heading green">Jaminan Barang Sewa</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">100% aman dan terpercaya</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3 col-lg-3">
                            <div class="info-boxes-inner">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <i class="fa fa-user" style="color: ##000000; font-size: 30px"
                                                aria-hidden="true"></i>
                                            <h4 class="info-box-heading green">100% Payment Secure</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Pembayaran Transaksi Aman</h6>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- ============================================== INFO BOXES : END ============================================== -->

                <!-- ============================================== WIDE BANNER ============================================== -->
                <div class="wide-banners wow outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/assets/images/banners/home-banner1.png') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/assets/images/banners/home-banner2.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           

            
    </div>
</div>
@endsection