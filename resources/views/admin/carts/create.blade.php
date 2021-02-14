@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>Sipariş Oluştur</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.carts.index') }}">Siparişler</a></li>
                <li class="active">Yeni Sipariş Oluştur</li>
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
                    <form action="{{ route('admin.carts.store') }}" method="post">
                        @csrf
                        <fieldset>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label for="customer_id">Müşteri</label>
                                        <select class="form-control select2" name="customer">
                                            <option value="">Müşteri Seçin</option>
                                            @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('customer_id')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <h4><label for="">Ürün Bilgileri</label></h4>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 col-sm-3">
                                        <label for="product_id">Ürün </label>
                                        <select class="form-control select2" name="product_id">
                                            <option value="">Ürün Seçiniz</option>
                                            @foreach($products as $row)
                                                <option value="{{$row->id}}">{{ $row->sku }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 col-sm-3">
                                        <label for="product_id">Ürün </label>
                                        <select class="form-control select2" name="dimension_id">
                                            <option value="">Ebat</option>
                                            @foreach($dimensions as $row)
                                                <option value="{{$row->id}}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 col-sm-3">
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
                                <input type="hidden" name="session_id" value="{{ time() }}">
                                <button type="submit" class="btn btn-success pull-right">
                                    Sipariş Ekle
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
                invoiceMethod: '1',
            },
        });
    </script>
@endsection
