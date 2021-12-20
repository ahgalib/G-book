@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
      
    
        <div class="col-md-10 bg-dark">
            
            <div class="card bg-dark text-light">
              
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
                    @if($post->image)
                        <div class="card-body m-auto">
                            <p style="font-weight:bold;font-size:20px;">{{$post->body}}</p>
                            <img src="/storage/{{$post->image}}" style="width:500px;height:490px;" alt="">
                        </div>
                    @else
                        <div class="card-body m-auto">
                            <p style="font-weight:bold;font-size:20px;">{{$post->post->body}}</p>
                            
                        </div>
                    @endif
                <!-- Post body and post image start part end  -->
                <!--like option start -->
                    <div class="d-flex p-4">
                        @if(!$post->likedBy(auth()->user()))
                            <form action="/like/{{$post->post->id}}" method="post">
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
                    <form action="/comment/{{$post->id}}" method="post">
                        @csrf
                        <div class="d-flex">
                            <div class="m-2">
                                <img src="/storage/{{$post->user->profile->profile_picture}}" class="img-fluid img-circle img-sm" alt="Alt Text" style="width:50px;height:40px;border-radius:50%;">
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

                    <div class="card-footer">
                        
                         @foreach($post->PostComment as $post)
                        <div class="d-flex">
                            <div class="m-2">
                                <img src="/storage/{{$post->user->profile->profile_picture}}" class="img-fluid img-circle img-sm" alt="Alt Text" style="width:50px;height:40px;border-radius:50%;">
                            </div>
                        <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push m-2">
                                <p>{{$post->comment}}</p>
                            </div>
                                
                        </div>
                        @endforeach
                    </div>
                  
            </div>    
        </div>
    </div>
</div>
@endsection
