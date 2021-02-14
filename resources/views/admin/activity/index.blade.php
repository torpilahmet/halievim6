@extends('layouts.admin')

@section('content')
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <h1>Olay Günlüğü</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.activities.index') }}">Olay Günlüğü</a></li>
                <li class="active">Olay Günlük Listesi</li>
            </ol>
        </header>
        <!-- /page title -->

        <div id="content" class="padding-20 panel-success">
            <!--
                PANEL CLASSES:
                    panel-default
                    panel-danger
                    panel-warning
                    panel-info
                    panel-success

                INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
                        All pannels should have an unique ID or the panel collapse status will not be stored!
            -->

            <div id="panel-1" class="panel panel-default">
                <div class="panel-heading">
                    <span class="title elipsis">
                        <strong>Kullanıcı Listesi</strong> <!-- panel title -->
                    </span>
                    <!-- right options -->
                    <ul class="options pull-right list-inline">
                        <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse"
                               data-placement="bottom"></a></li>
                        <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen"
                               data-placement="bottom"><i class="fa fa-expand"></i></a></li>
                        <li><a href="#" class="opt panel_close" data-confirm-title="Confirm"
                               data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip"
                               title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
                    </ul>
                    <!-- /right options -->

                </div>

                <!-- panel content -->
                <div class="panel-body">
                    <a href="{{ route('admin.activity.clean') }}" class="btn btn-danger"><i class="fa fa-icon-remove"></i> Tüm Olay Günlüğünü temizle</a>
                    <div class="table-responsive">
                        <table class="table table-hover table-vertical-middle nomargin">
                            <thead>
                            <tr>
                                <th> Günlük Adı</th>
                                <th> Günlük Tipi</th>
                                <th> Başlık</th>
                                <th> Model</th>
                                <th> Değiştiren</th>
                                <th> Günlük Tarihi</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($activities as $activity)
                                <tr>
                                    <td>{{ $activity->log_name }}</td>
                                    <td><span
                                            class="label @if($activity->description == 'created')label-primary @elseif($activity->description == 'updated')label-success @elseif($activity->description == 'deleted')label-danger @endif">{{ $activity->description }}</span>
                                    </td>
                                    <td>{{ $activity->subject['name'] }}</td>
                                    <td>{{ $activity->causer_type }}</td>
                                    <td>{{ $activity->causer['name'] }}</td>
                                    <td>{{ $activity->created_at }}</td>
                                    <td>
                                        <form action="{{ route('admin.activities.destroy',$activity->id) }}" method="POST">
                                            <a href="{{ route('admin.activities.show', $activity->id) }}"
                                               class="btn btn-success btn-xs"><i class="fa fa-eye white"></i> Görüntüle
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs"><i
                                                    class="fa fa-times white"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /panel content -->

                <!-- panel footer -->
                <div class="panel-footer">

                    <!-- pre code -->
                    <!-- /pre code -->

                </div>
                <!-- /panel footer -->

            </div>
            <!-- /PANEL -->

            <!--
                PANEL CLASSES:
                    panel-default
                    panel-danger
                    panel-warning
                    panel-info
                    panel-success

                INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
                        All pannels should have an unique ID or the panel collapse status will not be stored!
            -->
        </div>
    </section>
@endsection

@section('css')
@endsection

@section('style')
@endsection

@section('script')

@endsection
