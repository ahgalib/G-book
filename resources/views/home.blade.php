@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-6 bg-dark"style="margin-top:-25px;">
            <div class="card bg-dark text-light">
                <form action="/savepostOnlyPost" method="post" enctype="multipart/form-data">
                    <p style="margin-left:50px;margin-top:20px;font-weight:bold;font-size:20px;">Show your creativity, your Emotion,your fellings</p>
                    @csrf
                    <div class="form-group row"style="margin-top:-30px;">
                        <div class="col-md-12 p-5">
                            <textarea type="text"  cols="6" rows="6" placeholder="Write whatever is on your mind"class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}"  autocomplete="body" autofocus></textarea>

                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0" style="margin-top:-30px;">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-success p-2">
                                {{ __('share with others') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4 bg-dark" style="margin-top:-25px;">
            <!-- button design  -->
            <div class="bg-dark p-3" >
                <a href="/addpost"><button class="btn btn-primary m-3">Add a new post with picture!!</button></a>
                <a href="/profilepage/{{Auth::user()->id}}"><button class="btn btn-danger m-3">Visit Your Profile</button></a>
            </div>
            <!-- button design end -->
        </div>
    </div>
    
    <div class="row justify-content-center">   
        <div class="col-md-10 bg-dark">
            
            <div class="card bg-dark text-light">
               @foreach($posts as $post)
                <!--Post body and post image part start   -->
                
                    <div class="card-header p-4">
                        <div class="d-flex">
                            <div>
                                <a href="/profilepage/{{$post->user->id}}"style="text-decoration:none;"><img src="/storage/{{$post->user->profile->profile_picture}}" style="width:150px;height:120px;border-radius:50%;" alt=""></a>
                            </div>
                            <div>
                                <h2 style="margin-top:20px;margin-left:20px;"><a href="/profilepage/{{$post->user->id}}"style="text-decoration:none;">{{$post->user->name}}</a></h2>
                                <p style="margin-left:20px;">{{$post->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                    @if($post['image'])
                        <div class="card-body m-auto">
                            <p style="font-weight:bold;font-size:20px;">{{$post['body']}}</p>
                            <img src="storage/{{$post['image']}}" style="width:500px;height:490px;" alt="">
                        </div>
                    @else
                        <div class="card-body m-auto">
                            <p style="font-weight:bold;font-size:20px;">{{$post['body']}}</p>
                            
                        </div>
                    @endif
                <!-- Post body and post image start part end  -->
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
                                <button class="btn btn-danger mr-3">Unlike</button>
                            </form>
                        @endif
                        <p style="font-weight:bold;margin:5px;font-size:18px;color:gold;">{{$post->likes->count()}} Like</p>
                        <!--like option end -->
                        <!--comment option start -->
                        <a href="/viewcomments/{{$post->id}}"><button class="btn btn-light mr-3" style="margin-left:70px;">Comments</button></a>
                      
                        <p style="font-weight:bold;margin:5px;font-size:18px;color:gold;">{{$post->PostComment->count()}} Comments</p>
                    </div>
                
                    <div class="card-footer ">
                        <form action="/comment/{{$post->id}}" method="post">
                            @csrf
                            <div class="d-flex">
                                <div class="m-2">
                                    <img src="/storage/{{Auth::user()->profile->profile_picture}}" class="img-fluid img-circle img-sm" alt="Alt Text" style="width:50px;height:40px;border-radius:50%;">
                                </div>
                            <!-- .img-push is used to add margin to elements next to floating images -->
                                <div class="img-push m-2">
                                    <input type="text" name="comment"placeholder="Press enter to post comment">
                                </div>
                                <div class="m-2">
                                    <button class="btn btn-primary btn-sm">comment</button>
                                  
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-footer -->
                    <!--comment option end -->
                    <div style="width:924px;height:2px;background-color:white;"></div>
                @endforeach
                
            </div>
            <div style="margin-top:20px;">
                    {{$posts->links()}}
                <style>
                    .w-5{
                        display:none;
                    }
                </style>
            </div>
        </div>
    </div>
</div>
@endsection
