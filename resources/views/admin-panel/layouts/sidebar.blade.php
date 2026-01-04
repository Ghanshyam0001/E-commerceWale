<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>{{ env('APP_NAME') }}</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
      
        <img src="{{ asset('default.jpg') }}" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{ Auth::user()->name }}</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="{{ route('users.list') }}"><i class="fa fa-users"></i> Users <span
                class="fa fa-chevron-right"></span></a>
          </li>
          <li><a><i class="fa fa-product-hunt"></i>Products <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('products.create') }}">create</a></li>
              <li><a href="{{ route('products.list') }}">List</a></li>
            </ul>

          </li>
         
            <li><a href="{{ route('admin.orders.index') }}"><i class="fa fa-shopping-bag"></i> Orders <span
                class="fa fa-chevron-right"></span></a>
          </li>

            <li><a href="{{ route('contacts') }}"><i class="fa fa-user"></i> Contact<span
                class="fa fa-chevron-right"></span></a>
          </li>





        </ul>
      </div>


    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <i class="fa fa-cog" aria-hidden="true"></i>
      </a>

      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <i class="fa fa-arrows-alt" aria-hidden="true"></i>
      </a>

      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <i class="fa fa-eye-slash" aria-hidden="true"></i>
      </a>

      <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('logout')}}">
        <i class="fa fa-power-off" aria-hidden="true"></i>
      </a>
    </div>

    <!-- /menu footer buttons -->
  </div>
</div>