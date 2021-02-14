@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>Roller</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.roles.index') }}">İzinler</a></li>
                <li class="active">Rol Listesi</li>
            </ol>
        </header>
        <!-- /page title -->
        <div id="content" class="padding-20">
            <div class="row">
                @foreach ($roles as $role)
                <div class="col-md-4">
                    <!-- Buttons -->
                    <div id="panel-misc-portlet-l4" class="panel panel-default col-sm4 col-md4">

                        <div class="panel-heading">

                    <span class="elipsis"><!-- panel title -->
                        <strong>{{ $role->display_name }}&nbsp;<small>{{$role->name}}</small></strong>
                    </span>

                            <!-- right options -->
                            <ul class="options pull-right relative list-unstyled">
                                <li><a href="{{ route('admin.roles.edit',$role->id) }}" class="btn btn-success btn-xs white"><i class="fa fa-edit"></i> Düzenle</a></li>
                            </ul>
                            <!-- /right options -->
                        </div>
                        <!-- panel content -->
                        <div class="panel-body">

                            {{ $role->description }}
                        </div>
                        <!-- /panel content -->

                    </div>
                    <!-- /Buttons -->
                </div>
                @endforeach
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
