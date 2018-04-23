@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Blog
                    <a href="/posts" class="btn btn-default pull-right" style="margin-top:-7px;"><i class="fa fa-reply"></i></a>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['url' => '/posts/'.($post->id ?? ''), 'method' => ($edit_url ? 'PUT':'POST')]) !!}
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            {{Form::label('title', 'Post  Title',['class'=>'control-label'])}}
                            {{Form::text('title',$post->title ?? '',['class'=>'form-control','placeholder'=>'Title'])}}
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                {{Form::label('description', 'Post  Description',['class'=>'control-label'])}}
                                {{Form::textarea('description', $post->description ?? '',['class'=>'form-control','placeholder'=>'Description', 'id'=>'article-ckeditor'])}}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                        </div>
                        {{Form::submit('Save',['class'=>'btn btn-primary pull-right'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
