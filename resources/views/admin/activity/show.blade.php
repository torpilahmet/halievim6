@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>Olay Görüntüleyici</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.activities.index') }}">Olay Günlüğü</a></li>
                <li class="active">{{ $activity->subject->name . ' ' . $activity->description }}</li>
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
                    <strong>{{ $activity->subject->name . ' ' . $activity->description }}</strong>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="bullet-list list-unstyled">
                                <li class="green">
                                    <h3>Olay ID</h3>
                                    <span class="text-gray size-16"> {{ $activity->id }}</span>
                                </li>
                                <li class="green">
                                    <h3>Olay Bölümü</h3>
                                    <span class="text-gray size-16"> {{ $activity->log_name }}</span>
                                </li>
                                <li class="green">
                                    <h3>Olay Tipi</h3>
                                    <span class="text-gray size-16"> {{ $activity->description }}</span>
                                </li>
                                <li class="green">
                                    <h3>Olay Başlığı</h3>
                                    <span class="text-gray size-16"> {{ $activity->subject->name }}</span>
                                </li>
                                <li class="green">
                                    <h3>Kullanıcı</h3>
                                    <span class="text-gray size-16"> {{ $activity->causer->name }}</span>
                                </li>
                                <li class="green">
                                    <h3>Olay Tarihi</h3>
                                    <span class="text-gray size-16"> {{ $activity->created_at }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Yapılan Değişiklikler</h3>
                                    {{ $activity->changes() }}
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
