<nav id="sideNav"><!-- MAIN MENU -->
    <ul class="nav nav-list">
        <li><!-- dashboard -->
            <a class="dashboard" href="{{ route('admin.dashboard') }}"><!-- warning - url used by default by ajax (if eneabled) -->
                <i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-menu-arrow pull-right"></i>
                <i class="main-icon fa fa-users"></i> <span>Kullanıcılar</span>
            </a>
            <ul><!-- submenus -->
                <li><a href="{{ route('admin.customers.index') }}">Müşteri Listesi</a></li>
                <li><a href="{{ route('admin.users.index') }}">Yönetici Listesi</a></li>
{{--                <li><a href="{{ route('admin.roles.index') }}">Roller</a></li>--}}
{{--                <li><a href="{{ route('admin.roles.create') }}">Rol Ekle</a></li>--}}
{{--                <li><a href="{{ route('admin.permissions.index') }}">İzinler</a></li>--}}
{{--                <li><a href="{{ route('admin.permissions.create') }}">İzin Ekle</a></li>--}}
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-menu-arrow pull-right"></i>
                <i class="main-icon fa fa-table"></i> <span>Sistem</span>
            </a>
            <ul><!-- submenus -->
{{--                <li><a href="{{ route('admin.activities.index') }}">Etkinlik Günlüğü</a></li>--}}
{{--                <li><a href="#">Sistem Yedekleri</a></li>--}}
{{--                <li><a href="{{ route('admin.settings.index') }}">Site Ayarları</a></li>--}}
                <li>
                    <a href="#">
                        <i class="fa fa-menu-arrow pull-right"></i>
                        Datatables
                    </a>
                    <ul>
                        <li><a href="tables-datatable-managed.html">Managed Datatables</a></li>
                        <li><a href="tables-datatable-editable.html">Editable Datatables</a></li>
                        <li><a href="tables-datatable-advanced.html">Advanced Datatables</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-menu-arrow pull-right"></i>
                <i class="main-icon fa fa-pencil-square-o"></i> <span>Ürünler</span>
            </a>
            <ul><!-- submenus -->
                <li><a href="{{route('admin.products.index')}}">Ürün Listesi</a></li>
                <li><a href="{{ route('admin.products.create') }}">Ürün Ekle</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-menu-arrow pull-right"></i>
                <i class="main-icon fa fa-shopping-cart"></i> <span>Satış</span>
            </a>
            <ul><!-- submenus -->

                <li><a href="{{route('admin.orders.index')}}">Sipariş Listesi</a></li>
                <li><a href="{{ route('admin.orders.create') }}">Sipariş Oluştur</a></li>
            </ul>
        </li>
    </ul>

    <!-- SECOND MAIN LIST -->
    <h3>MORE</h3>
    <ul class="nav nav-list">
        <li>
            <a href="calendar.html">
                <i class="main-icon fa fa-calendar"></i>
                <span class="label label-warning pull-right">2</span> <span>Calendar</span>
            </a>
        </li>
        <li>
            <a href="../../HTML/start.html">
                <i class="main-icon fa fa-link"></i>
                <span class="label label-danger pull-right">PRO</span> <span>Frontend</span>
            </a>
        </li>
    </ul>

</nav>
