@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if($user->CoverPicture)
                <img src="/storage/{{$user->CoverPicture->cover_photo}}" style="width:1350px;height:400px;margin-left:-119px;margin-top:-25px;">
            @else
               
                <img src="" style="width:1350px;height:400px;margin-left:-119px;margin-top:-75px;">
                @can('update',$user->profile)
                    <button class="btn btn-success btn-lg"><a href="/createcoverphoto"style="color:white;text-decoration:none;">Add cover Photo</a></button>
                @endcan
            @endif
            @if($user->profile)
                <img src="/storage/{{$user->profile->profile_picture}}" class="rounded-circle" style="width:270px;height:220px;margin-top:-115px;margin-left:420px;">
                <div style="margin-left:450px;">
                    <h2 style="color:green;margin-left:20px;font-weight:bold;">{{$user->name}}</h2>
                    <h5>{{$user->profile->bio}}</h5>
                    <h5>{{$user->profile->url}}</h5>
                </div>
            @else
                <img src="" class="rounded-circle" style="width:270px;height:220px;margin-top:-115px;margin-left:300px;">
                @can('update',$user->profile)
                    <button class="btn btn-success btn-lg"><a href="/createprofile"style="color:white;text-decoration:none;">Create your profile</a></button>
                @endcan
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3">
                <a href="/"><button class="btn btn-primary m-2">NewsFeed</button></a>
                @can('update',$user->profile)
                    <a href="/addpost"><button class="btn btn-primary m-2">Add a new post</button></a>
                    <a href="/editprofile/{{$user->id}}"><button class="btn btn-secondary m-3">Edit profile</button></a>
                    <a href="/editcoverphoto/{{$user->id}}"><button class="btn btn-success m-2">Edit CoverPhoto</button></a>
                @endcan
            </div>
            <!--   -->
            <div class="card bg-dark text-light">
                @foreach($user->posts as $post)
                <!--Post body and post image part start   -->
                    @if($post['image'])
                        <div class="card-body m-auto">
                            <p style="font-weight:bold;font-size:20px;">{{$post['body']}}</p>
                            <img src="/storage/{{$post['image']}}" style="width:500px;height:460px;" alt="">
                        </div>
                    @else
                        <div class="card-body m-auto">
                            <p style="font-weight:bold;font-size:20px;">{{$post['body']}}</p>
                        </div>
                    @endif
                    <!--like option start -->
                    <div class="d-flex p-4">
                        @if(!$post->likedBy(auth()->user()))
                            <form action="/like/{{$post->id}}" method="post">
                                @csrf
                                <button class="btn btn-success mr-3"> like</button>
                            </form>
                        @else
                            <form action="/deletelike/{{$post->id}}" method="post">
                                @csrf
                                <button class="btn btn-secondary mr-3">Unlike</button>
                            </form>
                        @endif
                        @can('update',$user->profile)
                            <form action="/deletepost/{{$post->id}}" method="post" style="margin-left:20px;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        @endcan
                        <p style="font-weight:bold;margin:5px;font-size:18px;color:gold;">{{$post->likes->count()}} Like</p>
                    </div>
                <!--like option end -->
                    <div style="width:924px;height:2px;background-color:white;"></div>
                <!-- Post body and post image start part end  -->
                @endforeach
            </div>
            
        </div>
    </div>
</div>
@endsection
