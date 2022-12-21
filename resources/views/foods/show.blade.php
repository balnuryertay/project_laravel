@extends('layouts.app')

@section('title', 'FOOD PAGE')

@section('content')
    <body style="background-color: #DDFAFF">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="col-sm-6">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset($food->img)}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{$food->{'name_'.app()->getLocale()} }}</h5>
                            <p class="card-text">{{ __('messages.composition') }}: {{$food->{'composition_'.app()->getLocale()} }}</p>
                            <p class="card-text">{{ __('messages.price') }}: {{$food->price}}</p>
                            @auth
                                <form action="{{route('basket.add', $food->id)}}" method="post">
                                    @csrf
                                    <input type="number" name="number" placeholder="1">
                                    <button class="btn btn-outline-success">{{ __('messages.addtobasket') }}</button>
                                </form>
                            @endauth
                            @can('view',$food)
                                <div class="d-flex">
                                    <form action="{{route('foods.edit', $food->id)}}">
                                        <button class="btn btn-secondary" type="submit">{{ __('messages.edit') }}</button>
                                    </form>
                                    @can('delete', $food)
                                        <button type="submit" class="btn btn-danger form-group" data-bs-toggle="modal" data-bs-target="#exampleStatic">
                                            {{ __('messages.delete') }}
                                        </button>
                                        <div class="modal fade" id="exampleStatic" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleStaticLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ __('messages.really') }}
                                                    </div>
                                                    <div class="modal-footer" >
                                                        <form action="{{route('foods.destroy', $food->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit">{{ __('messages.yes') }}</button>
                                                        </form>
                                                        <a href="{{route('foods.show', $food->id)}}" class="btn btn-success">{{ __('messages.no') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan
                                </div>
                            @endcan
                        </div>
                    </div>
                    @auth
                        <form action="{{route('feedbacks.store', [$food->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="feedbackInput">{{ __('messages.feedback') }}:</label>
                                <textarea class="form-control" id="feedbackInput" rows="3" name="text"></textarea>
                                <input type="hidden" name="food_id" value="{{$food->id}}">
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-outline-success" type="submit">{{ __('messages.save') }}</button>
                            </div>
                        </form>

                        @foreach($food->feedbacks as $feedback)
                            <div class="row justify-content-center">
                                <div class="col md-3">
                                    <div class="card" style="width: 14rem;">
                                        <div class="card body">
                                            <h>{{$feedback->text}}</h>
                                            <small>{{$feedback->creted_at}} {{ __('messages.author') }}: {{$feedback->user->name}}</small>

                                            <div class="d-flex">
                                                <form action="{{route('feedbacks.edit', $feedback->id)}}">
                                                    <button class="btn btn-secondary" type="submit">{{ __('messages.edit') }}</button>
                                                </form>

                                                <form action="{{route('feedbacks.destroy', $feedback->id)}}" method="post">
                                                    <input type="hidden" name="food_id" value="{{$feedback->id}}">

                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">{{ __('messages.delete') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endauth
                </div>
            </div>
        </div>
    </div>


@endsection
