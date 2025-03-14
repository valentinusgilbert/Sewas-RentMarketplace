<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
      <!-- Sidebar toggle button-->
    <div>
      <ul class="nav">
      
      </ul>
    </div>
  
      {{-- @php
        $id = Auth::user()->id;
        $adminData = DB::table('admins')->find($id);
      @endphp --}}
    
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">		
          {{-- <!-- User Account-->
          <li class="dropdown user user-menu">	
            <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
              <img src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/no_image.jpg') }}" alt="Avatar User">
            </a>
            <ul class="dropdown-menu animated flipInX">
              <li class="user-body">
                <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ti-user text-muted mr-2"></i> Profile</a>
                <a class="dropdown-item" href="{{ route('admin.change.password') }}"><i class="ti-wallet text-muted mr-2"></i> Ubah Password</a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                  this.closest('form').submit();"><i class="fa fa-sign-out mr-2"></i> Keluar</a>
                </form>
              </li>
            </ul>
          </li>	 --}}
          <form method="POST" action="{{ route('logout') }}">
          <li class="pt-3">
              @csrf
              <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
              this.closest('form').submit();"><i class="fa fa-sign-out" style="font-size: 15px"></i> Keluar</a>
          </li>
        </form>
        </ul>
      </div>
    </nav>
  </header>