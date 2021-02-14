@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>Sipariş Görüntüle</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.orders.index') }}">Siparişler</a></li>
                <li class="active">{{ $order->session_id }}</li>
            </ol>
        </header>
        <!-- /page title -->

        <div id="content" class="padding-20">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        <!-- ------ -->
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-transparent">
                    <strong>{{ $order->Customer->name.' - '.$order->session_id}}</strong>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4 text-left">
                            <h4><strong>Kargo</strong> Detayları</h4>
                            <p class="nomargin nopadding">
                                {{ $order->Customer->name }}
                            </p><br><!-- no P margin for printing - use <br> instead -->
                            <address>
                                {{ $order->cargo_address }} <br>
                                {{ $order->cargo_phone }} <br>
                                Email : {{ $order->Customer->email }}
                            </address>
                        </div>
                        @if($order->invoice_method == 1)
                            <div class="col-sm-4 text-left">
                                <h4><strong>Fatura</strong> Detayları</h4>
                                <p class="nomargin nopadding">
                                    {{ $order->Customer->name }}
                                </p><br><!-- no P margin for printing - use <br> instead -->
                                <address>
                                    {{ $order->cargo_address }} <br>
                                    {{ $order->invoice_tax_no }} <br>
                                </address>
                            </div>
                        @else
                            <div class="col-sm-4 text-left">
                                <h4><strong>Fatura</strong> Detayları</h4>
                                <p class="nomargin nopadding">
                                    {{ $order->invoice_name }}
                                </p><br><!-- no P margin for printing - use <br> instead -->
                                <address>
                                    {{ $order->invoice_address }} <br>
                                    {{ $order->invoice_tax_office.' / '.$order->invoice_tax_no }} <br>
                                </address>
                            </div>
                        @endif
                        <div class="col-sm-4 text-left" v-if="invoiceMethod == '2'">
                            <h4><strong>Diğer</strong> Detaylar</h4>

                            <ul class="list-unstyled">
                                <li>
                                    <strong>Sipariş Durumu:</strong> @switch($order->status)
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
                                </li>
                                <li>
                                    <strong>Ödeme Şekli:</strong> {{ $order->payment_method == 1 ? 'Banka Havalesi' : 'Kapıda Ödeme' }}
                                </li>
                                <li>
                                    <strong>Kalem Adedi:</strong> {{ $carts->count() }}&nbsp;Adet
                                </li>
                                <li>
                                    <strong>Ürün Adedi:</strong> {{ Cart::getTotalQuantity() }}&nbsp;Adet
                                </li>
                                <li>
                                    <strong>Toplam Tutar: {{ Cart::getTotal() }}&nbsp;TL</strong>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-transparent">
                    <strong>Sipariş Ürün Bilgileri</strong>
                </div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-6">
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
                                        <th colspan="2"></th>
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
                                            <form method="post" action="{{route('admin.carts.update', $cart->id)}}">
                                                @csrf
                                                @method('put')
                                                <td>
                                                    <input type="number" name="piece" value="{{ $cart->quantity }}"
                                                           min="0" max="100"
                                                           class="form-control">
                                                    <input type="hidden" name="order_id"
                                                           value="{{ $order->id }}">
                                                </td>
                                                <td>{{ $cart->price }}&nbsp;TL</td>
                                                <td>{{ Cart::get($cart->id)->getPriceSum() }}&nbsp;TL</td>
                                                <td>
                                                    <button type="submit" class="btn btn-success btn-xs"><i
                                                            class="fa fa-edit white"></i> Düzenle
                                                    </button>
                                                </td>
                                            </form>
                                            <td>
                                                <form method="post" action="{{route('admin.carts.destroy', $cart->id)}}">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="session_id"
                                                           value="{{ $order->session_id }}">
                                                    <button type="submit" class="btn btn-danger btn-xs"><i
                                                            class="fa fa-remove white"></i> Sil
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('admin.carts.store') }}" method="post">
                                @csrf
                                <fieldset>

                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-4 col-sm-4">
                                                <label for="product_id">Ürün </label>
                                                <select class="form-control select2" name="product_id">
                                                    <option value="">Ürün Seçiniz</option>
                                                    @foreach($products as $row)
                                                        <option value="{{$row->id}}">{{ $row->sku }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-4 col-sm-4">
                                                <label for="product_id">Ürün </label>
                                                <select class="form-control select2" name="dimension_id">
                                                    <option value="">Ebat</option>
                                                    @foreach($dimensions as $row)
                                                        <option value="{{$row->id}}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <label for="piece">Adet</label>
                                                    <input type="text" id="piece" name="piece"
                                                           class="form-control required">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="row">
                                    <div class="col-md-12 margin-top-10 ">
                                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                                        <button type="submit" class="btn btn-success pull-right">
                                            Sipariş Ekle
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

                <div class="panel-footer">
                    Halı Evim
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
@endsection

@section('style')
@endsection

@section('script')
@endsection
