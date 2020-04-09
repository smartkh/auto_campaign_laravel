<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu">
        <li class="active">
            <a class="" href="{{ url('admin') }}">
                <i class="icon_house_alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="">
            <a class="" href="{{ route('register') }}">
                <i class="fa fa-user"></i>
                <span>Users</span>
            </a>
        </li>
        <li class="">
            <a class="" href="{{ route('lnglat') }}">
                <i class="fa fa-map-marker"></i>
                <span>Latitude/Longitude</span>
            </a>
        </li>
       {{-- <li class="">
            <a class="" href="{{ route('register') }}">
                <i class="icon_document_alt"></i>
                <span>Users</span>
            </a>
        </li>--}}

        {{--<li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon_cog"></i>
                <span>Settings</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="fa fa-user" href="{{ route('register') }}"> Users</a></li>
              <li><a class="fa fa-map-marker" href="{{ route('lnglat') }}"> Lng/Lat</a></li>
            </ul>
        </li>--}}
      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>
  <!--sidebar end-->