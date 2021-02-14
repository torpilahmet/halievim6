@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>Siparişler</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.carts.index') }}">Siparişler</a></li>
                <li class="active">Sipariş Listesi</li>
            </ol>
        </header>
        <!-- /page title -->
<div class="row">

</div>
        <div id="content" class="padding-20 panel-success">
            <a class="btn btn-success margin-bottom-10" href="{{route('admin.carts.export')}}"><i class="fa fa-arrow-circle-up"></i>Sipariş Aktar</a>
            <!--
                PANEL CLASSES:
                    panel-default
                    panel-danger
                    panel-warning
                    panel-info
                    panel-success

                INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
                        All pannels should have an unique ID or the panel collapse status will not be stored!
            -->
            <div id="panel-1" class="panel panel-default">
                <div class="panel-heading">
                    <span class="title elipsis">
                        <strong>Sipariş Listesi</strong> <!-- panel title -->
                    </span>
                    <!-- right options -->
                    <ul class="options pull-right list-inline">
                        <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse"
                               data-placement="bottom"></a></li>
                        <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen"
                               data-placement="bottom"><i class="fa fa-expand"></i></a></li>
                        <li><a href="#" class="opt panel_close" data-confirm-title="Confirm"
                               data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip"
                               title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <!-- /right options -->

                </div>

                <!-- panel content -->
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-vertical-middle nomargin">
                            <thead>
                            <tr>
                                <th>Sepet No</th>
                                <th>Ürün Adı</th>
                                <th>Ebat</th>
                                <th>Adet</th>
                                <th>Birim Fiyat</th>
                                <th>Ara Toplam</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $cart)
                                <tr>
                                    <td>{{ $cart->id }}</td>
                                    <td>{{ $cart->name }}</td>
                                    <td>@foreach($cart->attributes as $key=>$value)
                                    {{ $value }}
                                        @endforeach
                                    </td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>{{ $cart->price }}</td>
                                    <td>{{ $cart->associatedModel }}</td>
                                    <td>
                                        <a href="{{ route('admin.carts.edit', $cart->id) }}"
                                           class="btn btn-success btn-xs"><i class="fa fa-edit white"></i> Düzenle </a>
                                        <a href="{{ route('admin.carts.show', $cart->id) }}"
                                           class="btn btn-success btn-xs"><i class="fa fa-edit white"></i> Görüntüle </a>
                                        <a href="" class="btn btn-danger btn-xs"><i class="fa fa-times white"></i>
                                            Delete </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /panel content -->

                <!-- panel footer -->
                <div class="panel-footer">

                    <!-- pre code -->
                    <!-- /pre code -->

                </div>
                <!-- /panel footer -->

            </div>
            <!-- /PANEL -->

            <!--
                PANEL CLASSES:
                    panel-default
                    panel-danger
                    panel-warning
                    panel-info
                    panel-success

                INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
                        All pannels should have an unique ID or the panel collapse status will not be stored!
            -->
        </div>
    </section>
@endsection

@section('css')
@endsection

@section('style')
@endsection

@section('script')

@endsection
