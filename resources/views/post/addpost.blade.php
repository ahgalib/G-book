@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" style="margin-left:200px;">
            <form action="/savepost" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="body" class="col-md-4 col-form-label">{{ __(' Enter your post') }}</label>
                    <div class="col-md-6">
                        <textarea id="body" cols="10" rows="6"type="text" name="body"class="form-control @error('body') is-invalid @enderror"value="{{old('body')}}"></textarea>

                        @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- image -->
                <div class="form-group p-2">
                    <label for="image" name="image" class="col-md-4 col-form-label">{{ __('  Add your image') }}</label>

                    <div class="col-md-6">
                        <input type="file" multiple="" name="image[]" id="image"class="form-control @error('image') is-invalid @enderror">

                        @error('image')
                            <span style="color:red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit"class="btn btn-danger m-3">Upload</button>
            </form>
        </div>
    </div>
</div>
@endsection
