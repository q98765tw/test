@extends('layouts.app') 

@section('content')
    <div class="container">      
        <div class="card text-center">
            <div class="card-header">
           
                標題：{{ $post->title }}
            </div>
            
            <div class="card-body">
                <h5 class="card-title">
                    作者：{{ $post->user->name }}
                </h5>
                <p class="card-text">
                    {{ $post->content }}
               
                </p>
            </div>
            <div class="card-footer text-muted">
                發文日期：{{ $post->created_at }}
            </div>
            @if (auth()->user()->name == $post->user->name)
            
             <div align="center">
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">編輯</a>

                <form action="{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">刪除</button>
                </form>
            </div>   
            
            @else 
                <div align="center">
                <!-- <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">編輯</a> -->

                <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <!-- <button class="btn btn-danger">刪除</button> -->
                </form>
            </div>
            
            @endif
            
        @foreach ($messages as $key => $message)
            <div class="card-footer text-muted">
                   
                    發文者：{{ $message->user->name  }}發文日期：{{ $message->created_at }}
            </div>
                <div >
                       
                    <div class="col-sm-4 text-center " >
                        {{$message->content}}
                    </div>
                    
                </div>
           
        @endforeach
            <div class="card-footer text-muted">
                <div style='display:none;'><input type="text" id="user_id" name="user_id"></div>
                發文者：{{ auth()->user()->name }}
            </div>
            <div >
                <form action="{{ route('message.store') }}" method="post">
                @csrf
                <div class="col-sm-4">
                <input type="hidden" name="post_id" value="{{$post->id}}">
                    <textarea style="width:1050px; height:200px;" class="form-control" id="content" name="content">
                    </textarea>
                </div>
                <button class="btn btn-primary">送出</button>
                <button class="btn btn-danger">刪除</button>
                </form> 
            </div>
        </div>
    </div>
@endsection

