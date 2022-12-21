@extends('layouts.adm')

@section('title','Edit page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10"><br>
                <form action="{{route('profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-3">
                        <label for="nameInput">{{ __('messages.nameu') }}</label>
                        <textarea class="form-control @error('name') is-invalid @enderror" id="nameInput" rows="3" name="name">{{Auth::user()->name}}</textarea>
                        @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="emailInput">{{ __('messages.email') }}</label>
                        <textarea class="form-control @error('email') is-invalid @enderror" id="emailInput" rows="3" name="email">{{Auth::user()->email}}</textarea>
                        @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="imgInput">{{ __('messages.img') }}</label>
                        <input type="file" name="img" id="imgInput" class="form-control" placeholder="Please select a photo">
                        @error('img')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <button class="btn btn-outline-success mt-3" type="submit">{{ __('messages.update') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
