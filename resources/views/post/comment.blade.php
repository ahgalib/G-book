@extends('layouts.app')

@section('content')
<div class="container-fluid wrapper">
    <div class="row justify-content-center">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if($post->user->profile)
                            <img class="profile-user-img img-fluid img-circle"
                                src="/storage/{{$post->user->profile->profile_picture}}"
                                alt="User profile picture" style="width:200px;height:180px;">
                        @else
                            <img class="profile-user-img img-fluid img-circle"
                                src=""
                                alt="User profile picture">
                        @endif
                    </div>

                    <h3 class="profile-username text-center">{{$post->user->name}}</h3>

                    <p class="text-muted text-center">Software Engineer</p>

                    <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>{{$post->user->profile->bio}}</b> 
                    </li>
                    <li class="list-group-item">
                    <b><a href="">{{$post->user->profile->url}}</a></b> 
                    </li>
                    
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
                <!-- /.card-body -->
            </div>
                <!-- /.card -->

                <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Education</strong>

                    <p class="text-muted">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <p class="text-muted">Malibu, California</p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                    <p class="text-muted">
                    <span class="tag tag-danger">UI Design</span>
                    <span class="tag tag-success">Coding</span>
                    <span class="tag tag-info">Javascript</span>
                    <span class="tag tag-warning">PHP</span>
                    <span class="tag tag-primary">Node.js</span>
                    </p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9 bg-dark" style="margin-top:-25px;">
            <div class="card bg-dark text-light">
                <!--Post body and post image part start   -->
                <div class="card-header p-4">
                    <div class="d-flex">
                        @if($post->user->profile)
                        <div>
                            <a href="/profilepage/{{$post->user->id}}"style="text-decoration:none;"><img src="/storage/{{$post->user->profile->profile_picture}}" style="width:150px;height:120px;border-radius:50%;" alt=""></a>
                        </div>
                        @else
                        <div>
                            <a href="/profilepage/{{$post->user->id}}"style="text-decoration:none;"><img src="" style="width:150px;height:120px;border-radius:50%;" alt=""></a>
                        </div>
                        @endif
                        
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
                        <p style="font-weight:bold;font-size:20px;">{{$post->body}}</p>
                        
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
                <form action="/comment/{{$post->id}}" method="post">
                    @csrf
                    <div class="d-flex">
                    @if(Auth::user()->profile)
                        <div class="m-2">
                            <img src="/storage/{{Auth::user()->profile->profile_picture}}" class="img-fluid img-circle img-sm" alt="Alt Text" style="width:50px;height:40px;border-radius:50%;">
                        </div>
                        @else
                        <div class="m-2">
                            <img src="" class="img-fluid img-circle img-sm" alt="Alt Text" style="width:50px;height:40px;border-radius:50%;">
                        </div>
                        @endif

                    <!-- .img-push is used to add margin to elements next to floating images -->
                        <div class="img-push m-2">
                            <input type="text"  name="comment"placeholder="Press enter to post comment">
                            <span style="color:red;">@error('comment'){{$message}} @enderror</span>
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
                                <p>{{$post->user->name}}</p>
                                <img src="/storage/{{$post->user->profile->profile_picture}}" class="img-fluid img-circle img-sm" alt="Alt Text" style="width:50px;height:40px;border-radius:50%;">
                            </div>
                            
                        <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push m-2 d-flex">
                                <p style="font-weight:bold; margin-right:10px;margin-top:45px;">{{$post->comment}}</p>
                                <span style="font-size:10px;margin-left:-90px;margin-top:4px;">{{$post->created_at->diffForHumans()}}</span>
                            </div>
                        </div>
                    @endforeach
                    <a href="/"><button class="btn btn-sm btn-primary">back to home page</button></a>
                </div>
            </div>    
        </div>
    </div>
</div>
@endsection

