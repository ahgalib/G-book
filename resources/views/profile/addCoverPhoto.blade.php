@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 p-5">
            <div class="card p-5">
                <div class="card-header"><h2>{{ __('Create your Profile') }}</h2></div>

                <div class="card-body">
                    <form method="POST" action="/savecreatecoverphoto" enctype="multipart/form-data">
                        @csrf
  
                        <div class="form-group row pb-2">
                            <label for="cover_photo_caption" class="col-md-4 col-form-label text-md-right">{{ __('caption') }}</label>

                            <div class="col-md-6">
                                <input id="cover_photo_caption" type="text" class="form-control @error('cover_photo_caption') is-invalid @enderror" name="cover_photo_caption" value="{{ old('cover_photo_caption') }}"  autocomplete="cover_photo_caption">

                                @error('cover_photo_caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pb-2 pt-2">
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
                                <button type="submit" class="btn btn-primary">
                                    {{ __('upload CoverPhoto') }}
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
