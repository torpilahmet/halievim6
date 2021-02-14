@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>Yeni İzin</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.permissions.index') }}">İzinler</a></li>
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

                    <form action="{{ route('admin.permissions.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="block">
                                <label class="radio">
                                    <input type="radio" v-model="permissionType" name="permission_type" value="basic">
                                    <i></i> Temel İzin
                                </label>
                                <label class="radio">
                                    <input type="radio" v-model="permissionType" name="permission_type" value="crud">
                                    <i></i> CRUD İzin
                                </label>
                            </div>
                            <div class="row" v-if="permissionType == 'basic'">
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-6">
                                        <label for="display_name">Görüntü Adı</label>
                                        <input type="text" name="display_name" id="display_name"
                                               value="{{ old('display_name') }}"
                                               class="form-control" required>
                                        @error('display_name')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-8 col-sm-6">
                                        <label>Açıklama</label>
                                        <input type="text" name="description" id="description"
                                               value="{{ old('description') }}"
                                               class="form-control" required>
                                        @error('email')
                                        <small class="text-danger">{{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row" v-if="permissionType == 'crud'">
                                <div class="col-md-12 col-sm-12">
                                    <label>Kaynak İsim</label>
                                    <input type="text"
                                           name="resource"
                                           id="resource"
                                           v-model="resource"
                                           value="{{ old('description') }}"
                                           class="form-control" required>
                                    @error('email')
                                    <small class="text-danger">{{$message}} </small>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <label class="checkbox">
                                        <input type="checkbox" v-model="crudSelected" value="ekle">
                                        <i></i> Ekle
                                    </label>
                                    <label class="checkbox">
                                        <input type="checkbox" v-model="crudSelected" value="listele">
                                        <i></i> Okuma
                                    </label>
                                    <label class="checkbox">
                                        <input type="checkbox" v-model="crudSelected" value="guncelle">
                                        <i></i> Güncelle
                                    </label>
                                    <label class="checkbox">
                                        <input type="checkbox" v-model="crudSelected" value="sil">
                                        <i></i> Sil
                                    </label>
                                </div>
                                <input type="hidden" name="crud_selected" :value="crudSelected">
                                <div class="col-md-12 col-sm-12">
                                    <table class="table" v-if="resource.length >= 3 && crudSelected.length > 0">
                                        <thead>
                                        <th>İsim</th>
                                        <th>Etiket</th>
                                        <th>Açıklama</th>
                                        </thead>
                                        <tbody>
                                        <tr v-for="item in crudSelected">
                                            <td v-text="crudName(item)"></td>
                                            <td v-text="crudSlug(item)"></td>
                                            <td v-text="crudDescription(item)"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </fieldset>

                        <div class="row">
                            <div class="col-md-12 margin-top-10 ">
                                <button type="submit" class="btn btn-success pull-right">
                                    Yeni İzin Ekle
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
                permissionType: 'basic',
                resource: '',
                crudSelected: ['ekle', 'listele', 'guncelle', 'sil']
            },
            methods: {
                crudName: function (item) {
                    return item.substr(0, 1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0, 1).toUpperCase() + app.resource.substr(1);
                },
                crudSlug: function (item) {
                    return item.toLowerCase() + "-" + app.resource.toLowerCase();
                },
                crudDescription: function (item) {
                    return "Kullanıcıya " + app.resource.substr(0, 1).toUpperCase() + app.resource.substr(1) + " bölümüne " + item.toUpperCase() + " izni verir. ";
                }
            }
        });
    </script>
@endsection
