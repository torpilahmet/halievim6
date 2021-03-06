@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>Ürünler</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.products.index') }}">Ürünler</a></li>
                <li class="active">Ürün Listesi</li>
            </ol>
        </header>
        <!-- /page title -->
<div class="row">

</div>
        <div id="content" class="padding-20 panel-success">
            <a class="btn btn-success margin-bottom-10" href="{{route('admin.products.export')}}"><i class="fa fa-arrow-circle-up"></i>Ürün Aktar</a>
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
                        <strong>Ürün Listesi</strong> <!-- panel title -->
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
                                <th>Resim</th>
                                <th>Ürün Kodu</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td><img src="{{ asset('images/products').'/'.$product->image }}" alt="" width="120"></td>
                                    <td>{{ $product->sku }}</td>
                                    <td>
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                           class="btn btn-success btn-xs"><i class="fa fa-edit white"></i> Düzenle </a>
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
