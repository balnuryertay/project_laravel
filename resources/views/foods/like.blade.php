@extends('layouts.app')

@section('title', 'FOOD PAGE')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <body style="background-color: #DDFAFF">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach($foodsLiked as $food)
                        <div class="col d-inline-flex mx-2">
                            <div class="card" style="width: 18rem;">
                                <img src="{{asset($food->img)}}" class="card-img-top" alt="">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title">{{$food->{'name_'.app()->getLocale()} }}</h5>
                                        <form action="{{route('foods.unliked', $food->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <p class="card-text">{{ __('messages.price') }}: {{$food->price}}</p>
                                    @auth
                                        <form action="{{route('basket.add', $food->id)}}" method="post">
                                            @csrf
                                            <input type="number" name="number" placeholder="1">
                                            <button class="btn btn-outline-success">{{ __('messages.addtobasket') }}</button>
                                        </form>
                                    @endauth
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
