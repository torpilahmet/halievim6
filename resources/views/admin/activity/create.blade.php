@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>Yeni Kullanıcı</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.users.index') }}">Kullanıcılar</a></li>
                <li class="active">Yeni Kullanıcı Ekle</li>
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
                    <strong>Kullanıcı Ekle</strong>
                </div>

                <div class="panel-body">

                    <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>Ad Soyad</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                               class="form-control" required>
                                        @error('name')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label>E-Posta Adresi</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                               class="form-control" required>
                                        @error('email')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>Şifre</label>
                                        <input type="password" name="password" value=""
                                               class="form-control" required>
                                        @error('password')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label>Şifre Tekrarı</label>
                                        <input type="password" name="password_confirmation" value="" class="form-control"
                                               required>
                                        @error('password-confirm')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
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
                                    @error('file')
                                    <small class="text-danger">{{$message}} </small>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <div class="content margin-top-30">
                            <span class="">İzin Listesi</span>
                            <input type="hidden" name="roles" :value="rolesSelected" />
                            <div class="row ">
                                @foreach($roles as $role)
                                    <div class="col-md-6 col-sm-6">
                                        <label class="checkbox">
                                            <input type="checkbox" value="{{ $role->id }}"
                                                   v-model="rolesSelected">
                                            <i></i> {{$role->display_name}} <em>({{$role->description}}
                                                )</em>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 margin-top-10 ">
                                <button type="submit" class="btn btn-success pull-right">
                                    Yeni Kullanıcı Ekle
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
                rolesSelected: [{!! old('roles') ? old('roles') : '' !!}]
            }
        });
    </script>
@endsection
