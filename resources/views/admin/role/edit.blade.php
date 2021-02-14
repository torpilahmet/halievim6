@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>{{ $role->display_name }} Düzenle</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.roles.index') }}">Roller</a></li>
                <li class="active">{{ $role->display_name }} Rolünü düzenle</li>
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
                    <strong>{{ $role->display_name }}</strong>
                </div>

                <div class="panel-body">

                    <form action="{{ route('admin.roles.update',$role->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-4">
                                        <label for="display_name">Görüntü Adı</label>
                                        <input type="text" name="display_name" id="display_name"
                                               value="{{ old('display_name', $role->display_name) }}"
                                               class="form-control" required>
                                        @error('display_name')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <label>Açıklama</label>
                                        <input type="text" name="description" id="description"
                                               value="{{ old('description', $role->description) }}"
                                               class="form-control" required>
                                        @error('email')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                    <input type="hidden" :value="permissionsSelected" name="permissions">
                                </div>
                            </div>
                        </fieldset>
                        <div class="content margin-top-30">
                            <span class="">İzin Listesi</span>
                            <div class="row ">
                                @foreach($permissions as $permission)
                                    <div class="col-md-6 col-sm-6">
                                        <label class="checkbox">
                                            <input type="checkbox" value="{{ $permission->id }}"
                                                   v-model="permissionsSelected">
                                            <i></i> {{$permission->display_name}} <em>({{$permission->description}}
                                                )</em>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 margin-top-10 ">
                                <button type="submit" class="btn btn-success pull-right">
                                    Yeni Rol Düzenle
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
                permissionsSelected: {!!$role->permissions->pluck('id')!!}
            },
        });
    </script>
@endsection
