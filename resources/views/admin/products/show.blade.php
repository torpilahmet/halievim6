@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>{{ $user->name }} Görüntüle</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.users.index') }}">Kullanıcılar</a></li>
                <li class="active">{{ $user->name }}</li>
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
                    <strong>{{ $user->name }}</strong>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{asset('images/avatar'.'/'.$user->avatar)}}" alt="">
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Eposta Adresi : </label> {{ $user->email }}
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ekleme Tarihi : </label> {{ $user->created_at }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h3>Roller</h3>
                                    <ul class="list-icon angle-right"><!-- block 1 -->
                                        @foreach($user->getRoleNames() as $v)
                                        <li>{{ $v }}</li>
                                        @endforeach
                                    </ul><!-- /block 1 -->
                                </div>
                            </div>
                        </div>

                    </div>
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
