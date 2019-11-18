@extends('layouts.admin_layouts.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <h2 class="text-center lead">Surveys</h2>
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
                    <th>Id</th>
                    <th>Title</th>
                    <th>ID User</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($surveys as $sv)
                    <tr>
                        <td>{{$sv->id}}</td>
                        <td>{{$sv->title}}</td>
                        <td>{{$sv->user_id}}</td>
                        <td>{{$sv->description}}</td>
                        <td>{{$sv->create_at}}</td>
                        <td>{{$sv->updated_at}}</td>
                        <td>
                            <a href="{{url('admin/surveys/delete/'.$sv->id)}}">Xoá</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>

@endsection
