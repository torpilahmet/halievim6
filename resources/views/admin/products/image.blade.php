@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>Yeni Ürün</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.products.index') }}">Ürünler</a></li>
                <li class="active">Yeni Ürün Ekle</li>
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
                    <strong>Ürün Ekle</strong>
                </div>

                <div class="panel-body">

                    <form action="{{ route('admin.products.filestore') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label>Avatar</label>
                                        <div class="fancy-file-upload fancy-file-default">
                                            <i class="fa fa-upload"></i>
                                            <input type="file" class="form-control" name="file"
                                                   onchange="jQuery(this).next('input').val(this.value);"/>
                                            <input type="text" class="form-control" placeholder="no file selected"
                                                   readonly=""/>
                                            <span class="button">Choose File</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row">
                            <div class="col-md-12 margin-top-10 ">
                                <button type="submit" class="btn btn-success pull-right">
                                    Yeni Ürün Ekle
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

@endsection
