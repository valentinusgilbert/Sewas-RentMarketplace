<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
    
                        <li>
                            @auth
                            <a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>Akun Saya</a>
                            @else
                            <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Masuk/Daftar</a>
                            @endauth
                        </li>
                    </ul>
                </div>
             

                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
           
        </div>
     
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    @php
                    $setting = App\Models\SiteSetting::find(1);
                    @endphp
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <a href="{{ url('/') }}"> <img src="{{ asset($setting->logo) }}" alt="logo"></a>
                        </a>
                    </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form method="post" action="{{ route('product.search') }}">
                            @csrf
                            <div class="control-group">
                                <input class="search-field" onfocus="search_result_show()" onblur="search_result_hide()"
                                    id="search" name="search" placeholder="Cari Disini..." />
                                <button class="search-button" type="submit"></button>
                            </div>
                        </form>
                        <div id="searchProducts"></div>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ===== === SHOPPING CART DROPDOWN ===== == -->
                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
                                <div class="total-price-basket">
                                    </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                            
                                <div id="miniCart">
                                </div>

                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span>
                                        <span class='price' id="cartSubTotal"> </span> </div>
                                    <div class="clearfix"></div>
                                    <a href="{{ route('mycart') }}"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Keranjang</a>
                                </div>

                            </li>
                        </ul>
                    </div>


                    <!-- == === SHOPPING CART DROPDOWN : END=== === -->
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle"
                                        data-toggle="dropdown">
                                        Beranda
                                    </a>
                                </li>

                                @php
                                $categories = App\Models\Category::orderBy('category_name','ASC')->get();
                                @endphp

                                @foreach($categories as $category)
                                <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown"
                                        class="dropdown-toggle" data-toggle="dropdown">
                                        {{ $category->category_name }}
                                    </a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">

                                                    @php
                                                    $subcategories =
                                                    App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                                    @endphp

                                                    @foreach($subcategories as $subcategory)
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <a
                                                            href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug ) }}">
                                                            <h2 class="title">{{ $subcategory->subcategory_name }}
                                                            </h2>
                                                        </a>

                                                        @php
                                                        $subsubcategories =
                                                        App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name','ASC')->get();
                                                        @endphp

                                                        @foreach($subsubcategories as $subsubcategory)
                                                        <ul class="links">
                                                            <li><a
                                                                    href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug ) }}">
                                                                    {{ $subsubcategory->subsubcategory_name }}
                                                                </a></li>

                                                        </ul>
                                                        @endforeach

                                                    </div>
                                                    @endforeach

                                                
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach


                           
                                <li class="dropdown  navbar-right special-menu"> <a href="#">Cara Sewa</li>
                             
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

  
</header>

<style>
    .search-area {
        position: relative;
    }

    #searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }
</style>
<script>
    function search_result_hide() {
        $("#searchProducts").slideUp();
    }

    function search_result_show() {
        $("#searchProducts").slideDown();
    }
</script>