@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>İzin Düzenle</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.permissions.index') }}">İzinler</a></li>
                <li class="active">Düzenle</li>
                <li class="active">{{ $permission->display_name }}</li>
            </ol>
        </header>
        <!-- /page title -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div id="content" class="padding-20">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
        @endif
        <!-- ------ -->
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-transparent">
                    <strong>Kullanıcı Ekle</strong>
                </div>

                <div class="panel-body">

                    <form action="{{ route('admin.permissions.update',$permission->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label for="display_name">Görüntü Adı</label>
                                        <input type="text" name="display_name" value="{{ old('display_name', $permission->display_name) }}"
                                               class="form-control" required>
                                        @error('display_name')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="name">İzin Adı</label>
                                        <input type="text" name="name" value="{{ $permission->name }}"
                                               class="form-control" disabled>
                                        <small class="text-danger">Bu alan değiştirilemez </small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="description">Açıklama</label>
                                        <input type="text" name="description" value="{{ old('email', $permission->description) }}"
                                               class="form-control" required>
                                        @error('description')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="row">
                            <div class="col-md-12 margin-top-10 ">
                                <button type="submit" class="btn btn-success pull-right">
                                    İzin Düzenle
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
