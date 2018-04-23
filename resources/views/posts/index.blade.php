@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blogs
                    <a href="/posts/create" class="btn btn-primary pull-right" style="margin-top:-7px;"><i class="fa fa-plus"></i></a>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                                {!! session()->get('error') !!}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>	
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                                {!! session()->get('success') !!}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>	
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td class="text-center">{{$post->title}}</td>
                                        <td class="text-center">{{$post->user->name}}</td>
                                        <td class="text-center">{{$post->created_at}}</td>
                                        <td class="text-right">
                                            @if ($post->user->id == Auth::id())
                                                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="/posts/{{$post->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a> 
                                                <form action="/posts/{{$post->id}}" method="post" style="display:inline-block">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            @else
                                                <a href="/posts/{{$post->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a> 
                                            @endif
                                            
                                        </td>
                                    </tr> 
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4">No Record Found!!!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            
                        </table>
                        <div class="pull-right">
                                {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
