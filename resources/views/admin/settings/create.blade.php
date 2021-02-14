@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>Site Ayarı Ekle</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.settings.index') }}">Site Ayarları</a></li>
                <li class="active">Yeni İzin Ekle</li>
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
                    <strong>İzin Ekle</strong>
                </div>

                <div class="panel-body">

                    <form action="{{ route('admin.settings.store') }}" method="post">
                        @csrf
                        <fieldset>

                            <div class="row" >
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-6">
                                        <label for="display_name">Anahtar İsmi</label>
                                        <input type="text" name="key" id="key"
                                               value="{{ old('key') }}"
                                               class="form-control" required>
                                        @error('key')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-8 col-sm-6">
                                        <label>Açıklama</label>
                                        <input type="text" name="value" id="value"
                                               value="{{ old('value') }}"
                                               class="form-control" required>
                                        @error('value')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <div class="row">
                            <div class="col-md-12 margin-top-10 ">
                                <button type="submit" class="btn btn-success pull-right">
                                    Yeni Ayar Ekle
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
