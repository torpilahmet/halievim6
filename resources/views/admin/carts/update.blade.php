@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>Kullanıcı Düzenle</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.users.index') }}">Kullanıcılar</a></li>
                <li class="active">Düzenle</li>
                <li class="active">{{$user->name}}</li>
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
                    <strong>Kullanıcı Düzenle</strong>
                </div>

                <div class="panel-body">

                    <form action="{{ route('admin.users.update',$user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>Ad Soyad</label>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                               class="form-control" required>
                                        @error('name')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label>E-Posta Adresi</label>
                                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
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
                                               class="form-control">
                                        @error('password')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label>Şifre Tekrarı</label>
                                        <input type="password" name="password_confirmation" value="" class="form-control">
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

{{--                        <div class="content margin-top-30">--}}
{{--                            <span class="">İzin Listesi</span>--}}
{{--                            <input type="hidden" name="roles" :value="rolesSelected" />--}}
{{--                            <div class="row ">--}}
{{--                                @foreach($roles as $role)--}}
{{--                                    <div class="col-md-6 col-sm-6">--}}
{{--                                        <label class="checkbox">--}}
{{--                                            <input type="checkbox" value="{{ $role->id }}"--}}
{{--                                                   v-model="rolesSelected">--}}
{{--                                            <i></i> {{$role->display_name}} <em>({{$role->description}}--}}
{{--                                                )</em>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row">
                            <div class="col-md-12 margin-top-10 ">
                                <button type="submit" class="btn btn-success pull-right">
                                    Kullanıcı Güncelle
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
{{--    <script>--}}
{{--        var app = new Vue({--}}
{{--            el: '#app',--}}
{{--            data: {--}}
{{--                password_options: 'keep',--}}
{{--                rolesSelected: {!! $user->roles->pluck('id') !!}--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
@endsection
