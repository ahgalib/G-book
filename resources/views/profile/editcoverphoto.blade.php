@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Edit Cover Photo</h2>
            <form  method="POST" action="/saveeditcoverphoto/{{$user->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group row pb-2">
                    <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('caption') }}</label>

                    <div class="col-md-6">
                        <input id="cover_photo_caption" type="text" class="form-control @error('cover_photo_caption') is-invalid @enderror" name="cover_photo_caption" value="{{$user->CoverPicture->cover_photo_caption}}"  autocomplete="bio" autofocus>

                        @error('cover_photo_caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row pb-2">
                    <label for="cover_photo" class="col-md-4 col-form-label text-md-right">{{ __('cover_photo') }}</label>
                    
                    <div class="col-md-6">
                        <input id="cover_photo" type="file" class="form-control @error('cover_photo') is-invalid @enderror" name="cover_photo" value="{{ old('cover_photo') }}"  autocomplete="cover_photo" autofocus>

                        @error('cover_photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">Upload </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
        

@endsection