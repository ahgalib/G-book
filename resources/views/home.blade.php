@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3">
                <a href="/addpost"><button class="btn btn-primary">Add a new post</button></a>
            </div>
            <!--   -->
            <div class="card bg-dark text-light">
                @foreach($posts as $post)
                <!--Post body and post image part start   -->
                    <div class="card-header p-4">
                        <h3><a href="/profilepage/{{$post->user->id}}"style="text-decoration:none;">{{$post->user->name}}</a></h3>
                        <p>{{$post->created_at->diffForHumans()}}</p>
                    </div>
                    <div class="card-body m-auto">
                        <p style="font-weight:bold;font-size:20px;">{{$post['body']}}</p>
                        <img src="storage/{{$post['image']}}" style="width:500px;height:460px;" alt="">
                    </div>
                    <div style="width:734px;height:2px;background-color:white;"></div>
                <!-- Post body and post image start part end  -->
                @endforeach
            </div>
            {{$posts->links()}}
            <style>
                .w-5{
                    display:none;
                }
            </style>
        </div>
    </div>
</div>
@endsection
