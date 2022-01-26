@extends('layouts.app')
@section('content')

<div class="wrapper"><!-- Content Wrapper. Contains page content -->
    <div class="content"> <!-- Content Header (Page header) -->
        <section class="content"> <!-- Main content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if($user->CoverPicture)
                            <img src="/storage/{{$user->CoverPicture->cover_photo}}" style="width:1332px;margin-top:-23px;height:400px;">
                        @else
                            
                            @can('update',$user->profile)
                                <button class="btn btn-success btn-lg"><a href="/createcoverphoto"style="color:white;text-decoration:none;">Add cover Photo</a></button>
                            @endcan
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if($user->profile)
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="/storage/{{$user->profile->profile_picture}}"
                                            alt="User profile picture" style="width:250px;height:230px;">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src=""
                                            alt="User profile picture">
                                    @endif
                                </div>

                                <h2 class="profile-username text-center">{{$user->name}}</h2>

                                <p class="text-muted text-center">Software Engineer</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>{{$user->profile->bio}}</b> 
                                </li>
                                <li class="list-group-item">
                                <b><a href="">{{$user->profile->url}}</a></b> 
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
                            @can('aboutUpdate',$user->aboutMe)
                                <a href="/aboutMe"><button class="btn btn-warning p-3 m-3">Update About yourself</button></a>
                            @endcan
                            @if(!$user->aboutMe)
                                <a href="/aboutMe"><button class="btn btn-warning p-3 m-3">Add About yourself</button></a>
                            @else
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                    <p class="text-muted">
                                    {{$user->aboutMe->Education}}
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                    <p class="text-muted"> {{$user->aboutMe->location}}</p>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                    <p class="text-muted">
                                    {{$user->aboutMe->skill}}
                                    </p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                    <p class="text-muted"> {{$user->aboutMe->note}}</p>
                                </div>
                            @endif
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a href="/" class="nav-link active m-2">NewsFeed</a></li>
                                    @can('update',$user->profile)
                                        <a href="/addpost"><button class="btn btn-primary m-2">Add a new post</button></a>
                                        <a href="/editprofile/{{$user->id}}"><button class="btn btn-secondary m-2 ">Edit profile</button></a>
                                        @if($user->CoverPicture)
                                            <a href="/editcoverphoto/{{$user->id}}"><button class="btn btn-success m-2">Edit CoverPhoto</button></a>
                                        @endif
                                    @endcan
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        @foreach($user->posts as $post)
                                            <div class="post">
                                                <div class="user-block">
                                                    @if($post->user->profile)
                                                        <img class="img-circle img-bordered-sm" src="/storage/{{$post->user->profile->profile_picture}}" alt="user image" style="width:100px;height:80px;">
                                                    @else
                                                        <img class="img-circle img-bordered-sm" src="" alt="user image" style="width:100px;height:80px;">
                                                    @endif
                                                    <p style="margin-top:10px;margin-left:230px;"><span style="color: #035ab5;font-size: 20px;font-weight: 700;">{{$post->user->username}} </span> share his filling {{$post->created_at->diffForHumans()}}</p>
                                                </div>
                                                <!-- /.user-block -->
                                                <div class="body" style="margin-left:200px;">
                                                    @if($post['image'])
                                                        <p style="font-weight:bold;font-size:20px;">{{$post['body']}}</p>
                                                        <img src="/storage/{{$post['image']}}" style="width:500px;height:460px;" alt="">
                                                    
                                                    @else
                                                        <p style="font-weight:bold;font-size:20px;">{{$post['body']}}</p>
                                                    @endif
                                                </div>
                                                <!--like option start -->
                                                <div class="d-flex p-4">
                                                    @if(!$post->likedBy(auth()->user()))
                                                        <form action="/like/{{$post->id}}" method="post">
                                                            @csrf
                                                            <button class="btn btn-primary mr-3"> <i class="far fa-thumbs-up mr-1"></i></button>
                                                        </form>
                                                    @else
                                                        <form action="/deletelike/{{$post->id}}" method="post">
                                                            @csrf
                                                            <button class="btn btn-dark mr-3"><i class="far fa-thumbs-down mr-1"></i></button>
                                                        </form>
                                                    @endif
                                                    <p style="font-weight:bold;margin:5px;font-size:18px;color:#078bc1;">{{$post->likes->count()}} Like</p>
                                                    
                                                   
                                                    <!--comment option start -->
                                                    <a href="/viewcomments/{{$post->id}}"><button class="btn btn-secondary mr-3" style="margin-left:70px;">Comments</button></a>
                                                
                                                    <p style="font-weight:bold;margin:5px;font-size:18px;color:#b5079f;">{{$post->PostComment->count()}} Comments</p>
                                                </div>
                                                <div class="card-footer ">
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
                                                                <input type="text" class="form-control" name="comment"placeholder="Press enter to post comment">
                                                                <span style="color:red;">@error('comment'){{$message}} @enderror</span>
                                                            </div>
                                                            <div class="m-2">
                                                                <button class="btn btn-primary btn-sm">comment</button>
                                                            
                                                            </div>
                                                        </div>
                                                        @can('update',$user->profile)
                                                            <form action="/deletepost/{{$post->id}}" method="post" style="margin-left:20px;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger">wana delete this post!!</button>
                                                            </form>
                                                        @endcan
                                                    </form>
                                                </div>
                                                <!--like option end -->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row bg-light text-dark p-3 text-center"> <!-- footer.row -->
                    <div class="col-md-12"><!-- footer.col -->
                        <footer class="footer">
                            <div class="">
                            <b>Version</b> 3.0.5
                            </div>
                            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
                            reserved.
                        </footer>
                    </div><!-- footer.col -->
                </div> <!-- /. footer row -->
            </div><!-- /.container-fluid -->
        </section> <!-- /.section -->
     </div><!-- /Content Header (Page header) -->
</div><!-- ./wrapper -->



 
@endsection