<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo d-flex">
                    <h1 class="mr-3">{{config('app.name')}}</h1>
                    <a href="{{url('/')}}"><img src="{{asset('frontend/assets/images/logo/logo.png')}}" alt="Logo"
                                                srcset="" style="height: 70px !important;"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item
                {{(Request::is('admin')) ? 'active' : ''}}
                {{(Request::is('staff')) ? 'active' : ''}}
                {{(Request::is('user')) ? 'active' : ''}}
                    ">
                    <a href="{{url('/home')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub {{ (Request::is('admin/user/*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Manajemen User</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('admin/user/*')) ? 'active' : ''}} ">
                        <li class="submenu-item  {{ (Request::is('/admin/user/create')) ? 'active' : ''}}">
                            <a href="{{url('/admin/user/create')}}">Tambah User</a>
                        </li>
                        <li class="submenu-item  {{ (Request::is('/admin/user/manage')) ? 'active' : ''}}">
                            <a href="{{url('/admin/user/manage')}}">Manage</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Penjualan Sawit</li>

                <li class="sidebar-item  has-sub {{ (Request::is('rs/*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Permintaan Jual</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('rs/*')) ? 'active' : ''}} ">
                        <li class="submenu-item  {{ (Request::is('/rs/manage')) ? 'active' : ''}}">
                            <a href="{{url('rs/manage')}}">Semua Request</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub {{ (Request::is('news/*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Berita</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('news/*')) ? 'active' : ''}} ">
                        <li class="submenu-item  {{ (Request::is('/news/create')) ? 'active' : ''}}">
                            <a href="{{url('news/create')}}">Tambah Berita</a>
                        </li>
                        <li class="submenu-item  {{ (Request::is('/news/manage')) ? 'active' : ''}}">
                            <a href="{{url('news/manage')}}">Manage Berita</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub {{ (Request::is('armada/*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Manajemen Armada</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('armada/*')) ? 'active' : ''}} ">
                        <li class="submenu-item  {{ (Request::is('/armada/create')) ? 'active' : ''}}">
                            <a href="{{url('armada/create')}}">Tambah Armada</a>
                        </li>
                        <li class="submenu-item  {{ (Request::is('/armada/manage')) ? 'active' : ''}}">
                            <a href="{{url('armada/manage')}}">Manage Armada</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub  {{ (Request::is('price/*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Harga TBS</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('price/*')) ? 'active' : ''}} ">
                        <li class="submenu-item   {{ (Request::is('price/create')) ? 'active' : ''}}">
                            <a href="{{url('/price/create')}}">Input Harga TBS</a>
                        </li>
                        <li class="submenu-item  {{ (Request::is('price/manage')) ? 'active' : ''}}">
                            <a href="{{url('/price/manage')}}">Manage Harga TBS</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Logout</li>
                <li class="sidebar-item  ">

                    <a href="{{url('/logout')}}" class="sidebar-link">
                        <i class="bi bi-life-preserver"></i>
                        <span>Logout</span>
                    </a>
                </li>


            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
