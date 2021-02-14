<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.admin.head')
    <script src="{{ asset('js/app.js') }}"></script>
{{--    <script src="{{ asset('css/app.css') }}" defer></script>--}}
</head>
<!--
    .boxed = boxed version
-->
<body>


<!-- WRAPPER -->
<div id="wrapper">

    <!--
        ASIDE
        Keep it outside of #wrapper (responsive purpose)
    -->
    <aside id="aside">
        <!--
            Always open:
            <li class="active alays-open">

            LABELS:
                <span class="label label-danger pull-right">1</span>
                <span class="label label-default pull-right">1</span>
                <span class="label label-warning pull-right">1</span>
                <span class="label label-success pull-right">1</span>
                <span class="label label-info pull-right">1</span>
        -->
        @include('layouts.partials.admin.navbar')

        <span id="asidebg"><!-- aside fixed background --></span>
    </aside>
    <!-- /ASIDE -->

    <!-- HEADER -->
    @include('layouts.partials.admin.header')
    <!-- /HEADER -->


    <!--
        MIDDLE
    -->
    <div id="app">
        @yield('content')
    </div>
    <!-- /MIDDLE -->

</div>
<!-- JAVASCRIPT FILES -->
<script type="text/javascript">var plugin_path = '{{ asset('assets/admin/plugins') }}/';</script>
<script type="text/javascript" src="{{ asset('assets/admin/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/app.js')}}"></script>

@yield('script')
</body>
</html>
