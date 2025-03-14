<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Sewas</h4>
                    </div>
                
                    <div class="module-body">
                        <a href="">
                            <p style="color: #000000;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab
                                mollitia cumque, explicabo iste quibusdam enim quia minus laborum vero deserunt!</p>
                        </a>
                    </div>
              
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                   
                </div>
           
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Pelayanan Pelanggan</h4>
                    </div>
             

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="Contact us">Akun Saya</a></li>
                            <li><a href="#" title="About us">Riwayat Transaksi</a></li>
                            <li><a href="#" title="faq">FAQ</a></li>
                            <li><a href="#" title="Popular Searches">Promo</a></li>
                            <li class="last"><a href="#" title="Where is my order?">Bantuan</a></li>
                        </ul>
                    </div>
                 
                </div>
            

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Hubungi Kami</h4>
                    </div>
             

                    @php
                    $setting = App\Models\SiteSetting::find(1);
                    @endphp

                    <div class="module-body">
                        <ul class="toggle-footer" style="">
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-whatsapp fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>{{ $setting->phone_one }}<br>
                                        {{ $setting->phone_two }}</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body"> <span><a href="#">{{ $setting->email }}</a></span> </div>
                            </li>
                        </ul>
                    </div>
                 
                </div>
       

            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-12 no-padding social">
                <p class="text-center" style="color: #000000"><i class="fa fa-copyright" aria-hidden="true"></i>2023 Sewas. Kelompok 1 SoftWare Engineer LO01</p>
            </div>
        </div>
    </div>
</footer>