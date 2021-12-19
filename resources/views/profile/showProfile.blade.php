@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if($user->CoverPicture)
                <img src="/storage/{{$user->CoverPicture->cover_photo}}" style="width:1350px;height:400px;margin-left:-119px;margin-top:-25px;">
            @else
                <button class="btn btn-success btn-lg" style=""><a href="/createcoverphoto"style="color:white;text-decoration:none;">Add cover Photo</a></button>
                <img src="" style="width:1350px;height:400px;margin-left:-119px;margin-top:-75px;">
               
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
                <button class="btn btn-success btn-lg"><a href="/createprofile"style="color:white;text-decoration:none;">Create your profile</a></button>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3">
                <a href="/addpost"><button class="btn btn-primary">Add a new post</button></a>
            </div>
            <!--   -->
            <div class="card bg-dark text-light">
                @foreach($user->posts as $post)
                <!--Post body and post image part start   -->
                   
                    <div class="card-body m-auto">
                        <p style="font-weight:bold;font-size:20px;">{{$post->body}}</p>
                        <img src="/storage/{{$post->image}}" style="width:500px;height:460px;" alt="">
                    </div>
                    <div style="width:734px;height:2px;background-color:white;"></div>
                <!-- Post body and post image start part end  -->
                @endforeach
            </div>
            
        </div>
    </div>
</div>
@endsection
