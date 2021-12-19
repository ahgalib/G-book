@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit your Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="/saveeditporfile/{{$user->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row pb-2">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('bio') }}</label>

                            <div class="col-md-6">
                                <input id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{$user->profile->bio}}"  autocomplete="bio" autofocus>

                                @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('Url') }}</label>

                            <div class="col-md-6">
                                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{$user->profile->url}}"  autocomplete="url">

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pb-2">
                            <label for="profile_picture" class="col-md-4 col-form-label text-md-right">{{ __('profile_picture') }}</label>

                            <div class="col-md-6">
                                <input id="profile_picture" type="file" class="form-control @error('profile_picture') is-invalid @enderror" name="profile_picture" value="{{ old('profile_picture') }}"  autocomplete="profile_picture" autofocus>

                                @error('profile_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
