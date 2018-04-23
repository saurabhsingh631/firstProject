@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blogs id: {{$post->id}}
                    <a href="/posts" class="btn btn-default pull-right" style="margin-top:-7px;"><i class="fa fa-reply"></i></a>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-info">
                        <h3>{{$post->title}}</h3>
                        <span class="text-danger">
                            Created At {{$post->created_at}} By {{$post->user->name}}
                        </span>
                        <p>{{$post->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
