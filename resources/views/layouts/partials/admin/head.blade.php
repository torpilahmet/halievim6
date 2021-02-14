<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Admin</title>
<meta name="description" content="" />
<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

<!-- mobile settings -->
<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

<!-- WEB FONTS -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

<!-- CORE CSS -->
<link href="{{ asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

<!-- THEME CSS -->
<link href="{{ asset('assets/admin/css/essentials.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/css/layout.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/css/color_scheme/green.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
@yield('css')
@yield('style')
