@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>Siparişler</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.orders.index') }}">Siparişler</a></li>
                <li class="active">Sipariş Listesi</li>
            </ol>
        </header>
        <!-- /page title -->
<div class="row">

</div>
        <div id="content" class="padding-20 panel-success">
            <a class="btn btn-success margin-bottom-10" href="#"><i class="fa fa-arrow-circle-up"></i>Sipariş Aktar</a>
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
                                <th>Sipariş ID</th>
                                <th>Müşteri</th>
                                <th>Sipariş Durumu</th>
                                <th>Kargo Takip</th>
                                <th>Sipariş Tutarı</th>
                                <th>Sipariş Tarihi</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->session_id }}</td>
                                    <td>{{ $order->Customer->name }}</td>
                                    <td>
                                        @switch($order->status)
                                            @case(1)
                                            <span class="badge badge-primary">&nbsp;Hazırlanıyor&nbsp;</span>
                                            @break

                                            @case(2)
                                            <span class="badge badge-warning">&nbsp;Baskıya Verildi&nbsp;</span>
                                            @break
                                            @case(3)
                                            <span class="badge badge-info">&nbsp;Kargoya Verildi&nbsp;</span>
                                            @break
                                            @case(4)
                                            <span class="badge badge-success">&nbsp;Müşteriye Teslim Edildi&nbsp;</span>
                                            @break
                                            @case(5)
                                            <span class="badge badge-danger">&nbsp;Sipariş İptal&nbsp;</span>
                                            @break

                                            @default
                                            'Bu ne laaa :))'
                                        @endswitch
                                    </td>
                                    <td>{{ $order->cargo_no }}</td>
                                    <td>{{ $order->total_price }}&nbsp;TL</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.orders.edit', $order->id) }}"
                                           class="btn btn-success btn-xs"><i class="fa fa-edit white"></i> Düzenle </a>
                                        <a href="{{ route('admin.orders.show', $order->id) }}"
                                           class="btn btn-primary btn-xs"><i class="fa fa-shopping-cart white"></i> Sepet </a>
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
