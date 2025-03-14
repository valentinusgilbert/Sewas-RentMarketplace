@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ url('/admin/dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>SEWAS</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ ($route == 'dashboard')? 'active':'' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="header nav-small-cap">Data Master</li>

            @php
            $brand = (auth()->guard('admin')->user()->brand == 1);
            $category = (auth()->guard('admin')->user()->category == 1);
            $product = (auth()->guard('admin')->user()->product == 1);
            $slider = (auth()->guard('admin')->user()->slider == 1);
            $coupons = (auth()->guard('admin')->user()->coupons == 1);
            $shipping = (auth()->guard('admin')->user()->shipping == 1);
            // $blog = (auth()->guard('admin')->user()->blog == 1);
            $setting = (auth()->guard('admin')->user()->setting == 1);
            $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
            $review = (auth()->guard('admin')->user()->review == 1);
            $orders = (auth()->guard('admin')->user()->orders == 1);
            $stock = (auth()->guard('admin')->user()->stock == 1);
            $reports = (auth()->guard('admin')->user()->reports == 1);
            $alluser = (auth()->guard('admin')->user()->alluser == 1);
            $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);

            @endphp


           
           
            @if($category == true)
            <li class="treeview {{ ($prefix == '/category')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i> <span>Kategori </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.category')? 'active':'' }}"><a href="{{ route('all.category') }}"><i
                                class="ti-more"></i>Kategori</a></li>
                    <li class="{{ ($route == 'all.subcategory')? 'active':'' }}"><a
                            href="{{ route('all.subcategory') }}"><i class="ti-more"></i>Sub Kategori</a></li>
                    <li class="{{ ($route == 'all.subsubcategory')? 'active':'' }}"><a
                            href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>Sub->SubKategori</a>
                    </li>
                </ul>
            </li>

            @else
            @endif

            @if($product == true)

            <li class="treeview {{ ($prefix == '/product')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Produk</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'add.product')? 'active':'' }}"><a href="{{ route('add.product') }}"><i
                                class="ti-more"></i>Tambah Produk</a></li>

                    <li class="{{ ($route == 'manage.product')? 'active':'' }}"><a
                            href="{{ route('manage.product') }}"><i class="ti-more"></i>Kelola Produk</a></li>

                </ul>
            </li>

            @else
            @endif

           

            @if($returnorder == true)
            
            <li class="header nav-small-cap">Kelola Pesanan</li>

            @if($orders == true)
            <li class="treeview {{ ($prefix == '/orders')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Pesanan </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'pending-orders')? 'active':'' }}"><a
                            href="{{ route('pending-orders') }}"><i class="ti-more"></i>Pesanan Masuk</a></li>

                    <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a
                            href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Pesanan Di Konfirmasi</a></li>

                    <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a
                            href="{{ route('processing-orders') }}"><i class="ti-more"></i>Pesanan Di Kemas</a></li>

                    <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i
                                class="ti-more"></i> Pesanan Dikirim</a></li>

                    <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a
                            href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Pesanan Dalam Perjalanan </a></li>

                    <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a
                            href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Pesanan Selesai</a></li>

                    {{-- <li class="{{ ($route == 'cancel-orders')? 'active':'' }}"><a href="{{ route('cancel-orders') }}"><i
                                class="ti-more"></i> Pembatalan Pesanan</a></li> --}}



                </ul>
            </li>
            @else
            @endif

            <li class="treeview {{ ($prefix == '/return')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Pengembalian</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'return.request')? 'active':'' }}"><a
                            href="{{ route('return.request') }}"><i class="ti-more"></i>Permintaan Pengembalian</a></li>

                    <li class="{{ ($route == 'all.request')? 'active':'' }}"><a href="{{ route('all.request') }}"><i
                                class="ti-more"></i>Data Pengembalian</a></li>


                </ul>
            </li>

            @else
            @endif

            

            @if($review == true)


            <li class="treeview {{ ($prefix == '/review')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Ulasan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'pending.review')? 'active':'' }}"><a
                            href="{{ route('pending.review') }}"><i class="ti-more"></i>Ulasan Masuk</a></li>

                    <li class="{{ ($route == 'publish.review')? 'active':'' }}"><a
                            href="{{ route('publish.review') }}"><i class="ti-more"></i>Data Ulasan</a></li>


                </ul>
            </li>

            @else
            @endif

           


            <li class="header nav-small-cap"></li>

            @if($alluser == true)

            <li class="treeview {{ ($prefix == '/alluser')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Data User </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all-users')? 'active':'' }}"><a href="{{ route('all-users') }}"><i
                                class="ti-more"></i>User</a></li>


                </ul>
            </li>
            @else
            @endif

            @if($adminuserrole == true)


            

            @else
            @endif

           

            @if($setting == true)

            
            @else
            @endif

            


        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
            aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>