@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>Sipariş Düzenle</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.orders.index') }}">Siparişler</a></li>
                <li class="active">Sipariş Düzenle</li>
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
        <!-- ------ -->
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-transparent">
                    <strong>Yeni Sipariş</strong>
                </div>
                <div class="panel-body">
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label for="customer_id">Müşteri</label>
                                        <select class="form-control select2" v-model="customerId" name="customer_id">
                                            <option value="">Müşteri Seçin</option>
                                            @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('customer_id')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <label for="customer_id">Sipariş Durumu</label>
                                        <select class="form-control select2" v-model="OrderStatus" name="status">
                                            <option value="1">Hazırlanıyor</option>
                                            <option value="2">Baskıya Verildi</option>
                                            <option value="3">Kargoya Verildi</option>
                                            <option value="4">Müşteriye Teslim Edildi</option>
                                            <option value="5">İptal</option>
                                        </select>
                                        @error('customer_id')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <h4><label for="">Teslimat ve Ödeme</label></h4>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label for="customer_id">Ödeme Tipi</label>
                                        <select class="form-control select2" v-model="paymentMethod" name="payment_method">
                                            <option value="1">Banka Havalesi</option>
                                            <option value="2">Kapıda Ödeme</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="block margin-top-30">
                                            <label class="radio">
                                                <input type="radio" v-model="invoiceMethod" name="invoice_method"
                                                       value="1">
                                                <i></i> Fatura / Kargo Aynı
                                            </label>
                                            <label class="radio">
                                                <input type="radio" v-model="invoiceMethod" name="invoice_method"
                                                       value="2">
                                                <i></i> Fatura / Kargo Farklı
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <h4><label for="">Kargo Bilgileri</label></h4>
                                    <div class="form-group">
                                        <label for="cargo_name">Ad Soyad</label>
                                        <input type="text" id="cargo_name" name="cargo_name"
                                               class="form-control" value="{{ old('cargo_name',$order->cargo_name) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cargo_address">Adres</label>
                                        <input type="text" id="cargo_address" name="cargo_address"
                                               class="form-control" value="{{ old('cargo_address',$order->cargo_address) }}"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cargo_phone">Telefon</label>
                                        <input type="text" id="cargo_phone" name="cargo_phone"
                                               class="form-control" value="{{ old('cargo_phone',$order->cargo_phone) }}" required>
                                    </div>
                                    <div class="form-group" v-if="invoiceMethod == '1'">
                                        <label for="invoice_tax_office">Vergi Dairesi</label>
                                        <input type="text" id="invoice_tax_office" name="invoice_tax_office"
                                               class="form-control" value="{{ old('invoice_tax_office',$order->invoice_tax_office) }}">
                                    </div>
                                    <div class="form-group" v-if="invoiceMethod == '1'">
                                        <label for="invoice_tax_no">Vergi No / TC Kimlik No</label>
                                        <input type="text" id="invoice_tax_no" name="invoice_tax_no"
                                               class="form-control" value="{{ old('invoice_tax_no',$order->invoice_tax_no) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6" v-if="invoiceMethod == '2'">
                                    <h4><label for="">Fatura Bilgileri</label></h4>
                                    <div class="form-group">
                                        <label for="invoice_name">Ad Soyad</label>
                                        <input type="text" id="invoice_name" name="invoice_name"
                                               class="form-control" value="{{ old('invoice_name',$order->invoice_name) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="invoice_address">Adres</label>
                                        <input type="text" id="invoice_address" name="invoice_address"
                                               class="form-control" value="{{ old('invoice_address',$order->invoice_address) }}" required>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <label for="invoice_tax_office">Vergi Dairesi</label>
                                                <input type="text" id="invoice_tax_office" name="invoice_tax_office"
                                                       class="form-control" value="{{ old('invoice_tax_office',$order->invoice_tax_office) }}" required>
                                            </div>

                                            <div class="col-md-6 col-sm-6">
                                                <label for="invoice_tax_no">Vergi No / TC Kimlik No</label>
                                                <input type="text" id="invoice_tax_no" name="invoice_tax_no"
                                                       class="form-control" value="{{ old('invoice_tax_no',$order->invoice_tax_no) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <div class="row">
                            <div class="col-md-12 margin-top-10 ">
                                <button type="submit" class="btn btn-success pull-right">
                                    Sipariş Düzenle
                                </button>
                            </div>
                        </div>

                    </form>
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
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                invoiceMethod: {{ old('invoice_method',$order->invoice_method) }},
                paymentMethod: {{ old('payment_method',$order->payment_method) }},
                customerId: {{ old('customer_id',$order->customer_id) }},
                OrderStatus: {{ old('status',$order->status) }},

            },
        });
    </script>
@endsection
