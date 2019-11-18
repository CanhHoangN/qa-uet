@extends('layouts.admin_layouts.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <h2 class="text-center lead">Sessions</h2>
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif
        </div>
        <div id="container-fluid">
            <table class="table table-dark table-hover">
                <thead>
                <tr>
                    <th>Id Session</th>
                    <th>Id User</th>
                    <th>Name</th>
                    <th>type</th>
                    <th>date</th>
                    <th>description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sessions as $ss)
                    <tr>
                        <td>{{$ss->id_session}}</td>
                        <td>{{$ss->id_user}}</td>
                        <td>{{$ss->name_session}}</td>
                        <td>{{$ss->type_session}}</td>
                        <td>{{$ss->date_session}}</td>
                        <td>{{$ss->description}}</td>
                        <td>
                            <a href="{{url('admin/sessions/delete/'.$ss->id_session)}}">Xoá</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
