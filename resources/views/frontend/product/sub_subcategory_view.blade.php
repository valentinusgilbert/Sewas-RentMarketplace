@extends('frontend.main_master')
@section('content')
@section('title')
Sub - Sub Kategori
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                @foreach($breadsubsubcat as $item)
                <li class='active'>{{ $item->category->category_name }}</li>
                @endforeach

                @foreach($breadsubsubcat as $item)
                <li class='active'>{{ $item->subcategory->subcategory_name }}</li>
                @endforeach

                @foreach($breadsubsubcat as $item)
                <li class='active'>{{ $item->subsubcategory_name }}</li>
                @endforeach
            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>
            <div class='col-md-3 sidebar'>

                {{-- <!-- ===== == TOP NAVIGATION ======= ==== -->
                @include('frontend.common.vertical_menu')
                <!-- = ==== TOP NAVIGATION : END === ===== --> --}}

                <div class="sidebar-module-container">
                    <div class="sidebar-filter">
                        <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                        <div class="sidebar-widget wow ">
                            <h3 class="section-title">Filter</h3>
                            <div class="widget-header">
                                <h4 class="widget-title">Kategori</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <div class="accordion">
                                    @foreach($categories as $category)
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#collapse{{ $category->id }}" data-toggle="collapse"
                                                class="accordion-toggle collapsed">
                                                {{ $category->category_name }}
                                            </a>
                                        </div>
                               
                                        <div class="accordion-body collapse" id="collapse{{ $category->id }}"
                                            style="height: 0px;">
                                            <div class="accordion-inner">

                                                @php
                                                $subcategories =
                                                App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                                @endphp

                                                @foreach($subcategories as $subcategory)
                                                <ul>
                                                    <li>
                                                        <a
                                                            href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug ) }}">
                                                            {{ $subcategory->subcategory_name }}
                                                        </a>
                                                    </li>
                                                </ul>
                                                @endforeach
                                            </div>                     
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

                        <!-- ============================================== PRICE SILDER============================================== -->
                        <div class="sidebar-widget wow ">
                            <div class="widget-header">
                                <h4 class="widget-title">Harga</h4>
                            </div>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="price-range-holder">
                                    <span class="min-max"> <span class="pull-left">Rp200.000</span> <span
                                            class="pull-right">Rp800.000</span>
                                    </span>
                                    <input type="text" id="amount"
                                        style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                    <input type="text" class="price-slider" value="">
                                </div>
                            </div>
                        </div>
                        <!-- ============================================== PRICE SILDER : END ============================================== -->

                    
                    </div>
                </div>
            </div>
            <div class='col-md-9'>
                <!-- == ==== SECTION – HERO === ====== -->
                

                <h4>
                    <b>Total Pencarian </b>
                    <span class="badge badge-danger" style="background: #FF0000;">{{ count($products) }} </span> Items
                </h4>

                <div class="clearfix filters-container m-t-10">
                    <div class="row">
                        <div class="col col-sm-6 col-md-2">
                            <div class="filter-tabs">
                                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i
                                                class="icon fa fa-th-large"></i>Grid</a> </li>
                                    <li><a data-toggle="tab" href="#list-container"><i
                                                class="icon fa fa-th-list"></i>List</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-sm-6 col-md-4 text-right">

                        </div>
                    </div>
                </div>
                <!--    //////////////////// START Product Grid View  ////////////// -->

                <div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product">
                                <div class="row">
                                    @foreach($products as $product)
                                    <div class="col-sm-6 col-md-4 wow ">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <img src="{{ asset($product->product_thambnail) }}" alt="">
                                                    </div>
                                                    <!-- /.image -->

                                                    @php
                                                    $amount = $product->product_price - $product->product_discount;
                                                    $discount = ($amount/$product->product_price) * 100;
                                                    @endphp

                                               

                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name">
                                                        <a
                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                            {{ $product->product_name }}
                                                        </a>
                                                    </h3>
                                                    
                                                    <div class="description"></div>

                                                    <div class="description">Sewa Mulai Dari</div>
                                                    @if ($product->product_discount == NULL)
                                                    <div class="product-price"> <span class="price">
                                                            Rp{{ number_format($product->product_price, 0, '', '.') }} / Hari
                                                        </span> </div>

                                                    @else

                                                    <div class="product-price"> <span class="price">
                                                            Rp{{ number_format($product->product_discount, 0, '', '.') }} / Hari
                                                        </span> <span class="price-before-discount">
                                                            Rp{{ number_format($product->product_price, 0, '', '.') }} / Hari</span>
                                                    </div>
                                                    
                                                    @endif
                                                    <!-- /.product-price -->
                                                    <div class="rating rateit-small"></div>
                                                </div>
                                                <!-- /.product-info -->
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

                        <!-- //////////////////// Product List View Start ////////////// -->
                        <div class="tab-pane " id="list-container">
                            <div class="category-product">

                                @foreach($products as $product)
                                <div class="category-product-inner wow ">
                                    <div class="products">
                                        <div class="product-list product">
                                            <div class="row product-list-row">
                                                <div class="col col-sm-4 col-lg-4">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <img src="{{ asset($product->product_thambnail) }}" alt="">
                                                        </div>
                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-sm-8 col-lg-8">
                                                    <div class="product-info">
                                                        <h3 class="name">
                                                            <a
                                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                                {{ $product->product_name }}
                                                            </a>
                                                        </h3>
                                                       
                                                        <div class="description">Sewa Mulai Dari</div>
                                                        @if ($product->product_discount == NULL)
                                                        <div class="product-price"> <span class="price">
                                                                Rp{{ number_format($product->product_price, 0, '', '.') }} / Hari
                                                            </span> </div>
                                                        @else
                                                        <div class="product-price"> <span class="price">
                                                                Rp{{ number_format($product->product_discount, 0, '', '.') }} / Hari
                                                            </span> <span class="price-before-discount">$
                                                                {{ $product->product_price }}</span> </div>
                                                        @endif
                                                        
                                                        <div class="rating rateit-small"></div>

                                                        <!-- /.product-price -->
                                                        <div class="description m-t-10">
                                                            {{ $product->short_descp }}
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
                                                                            title="Detail Produk"> <i
                                                                                class="fa fa-signal"
                                                                                aria-hidden="true"></i> </a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @php
                                            $amount = $product->product_price - $product->product_discount;
                                            $discount = ($amount/$product->product_price) * 100;
                                            @endphp

                                            <!-- /.product-list-row -->
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="clearfix filters-container">
                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> 
    </div>

</div>
<!-- /.body-content -->

@endsection