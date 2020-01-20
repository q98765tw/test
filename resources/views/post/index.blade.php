@extends('layouts.app') 

@section('content')
    <div class="container">
        <div align="center">
            <form action="{{ route('post.user') }}" method="post">
                @csrf
                <textarea style="width:600px; height:30px;" class="form-control" id="content" name="content">
                </textarea>
                <input type="submit" value="我要搜尋la">
            </form>
        </div>
        <div>
            &nbsp
        </div>
        <div align="center">
            <a href="{{ route('post.create') }}" class="btn btn-primary">我要貼文</a>
        </div>
        {{-- <a href="{{ route('post.user') }}" class="btn btn-secondary">111</a> --}}

        @foreach ($posts as $key => $post)
        
            <div class="card text-center">
                <div class="card-header">
                    標題：{{ $post->title }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        作者：{{ $post->user->name }}
                    </h5>
                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-secondary">查看文章</a>
                </div>
                <div class="card-footer text-muted">
                    發文日期：{{ $post->created_at }}
                </div>
            </div><br>
        @endforeach
    {!! $posts->links() !!}
@endsection