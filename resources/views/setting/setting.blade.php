@extends('layouts.app')

@section('content')
<div style="width:600px;background-color:orange;text-align-center;padding:10px;margin-left:450px;font-size:20px;">
@if(Session::get('success'))
    <div class="alert-success p-2 m-2">
    {{Session::get('success')}}
    <button class="btn btn-warning"><a href="/">back to home page</a></button>
    </div>
@endif

@if(Session::get('error'))
    <div class="alert-danger p-2 m-2">
    {{Session::get('error')}}
    </div>
@endif
<h3 class="m-3" style="border-bottom:4px solid white;">Update your Password</h3>
    <form action="updatePassword" method="post" style="margin-left:40px;">
    @csrf
    <div class="form-group">
            <label for="newPassword">Current Password</label>
            <div class="col-md-6">
                <input type="password" name="current_password">
               <span style="color:red;"> @error('current_password'){{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="newPassword">New Password</label>
            <div class="col-md-6">
                <input type="password" name="password">
                <span style="color:red;">@error('password'){{$message}}@enderror</span>
            </div>
        </div>
        <div class="form-group">
            <label for="newPassword"> Re-type New Password</label>
            <div class="col-md-6">
                <input type="password" name="password_confirmation">
            </div>
          </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>

@endsection