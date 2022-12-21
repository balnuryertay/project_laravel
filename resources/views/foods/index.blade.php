@extends('layouts.app')

@section('title', 'INDEX PAGE')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <body style="background-color: #DDFAFF">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                @foreach($food as $foods)
                    <div class="col d-inline-flex mx-2">
                        <div class="card" style="width: 18rem;">
                            <img src="{{$foods->img}}" class="card-img-top w-100" style="height: 200px" alt="">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">{{$foods->{'name_'.app()->getLocale()} }}</h5>
                                    <div class="d-inline-flex">
                                        <form action="{{route('foods.liked', $foods->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        <form action="{{route('foods.unliked', $foods->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <p class="card-text">{{ __('messages.price') }}:{{$foods->price}}</p>
                                <a href="{{route('foods.show', $foods->id)}}" class="btn btn-outline-primary">{{ __('messages.readmore') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </body>

@endsection


