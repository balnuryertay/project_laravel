@extends('layouts.app')

@section('title', 'HOME PAGE')

@section('content')
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="background-color: #DDFAFF">
    <div class="container">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block" src="img/first.png" alt="Первый слайд" width="100%">
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="img/second.png" alt="Второй слайд" width="100%">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Prev</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div><br><br>

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
{{--                                        <form action="#">--}}
{{--                                            <button type="submit" class="border-0 bg-transparent">--}}
{{--                                                <i class="fa fa-heart-o" aria-hidden="true"></i>--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
                                    </div>
                                    <p class="card-text">{{ __('messages.price') }}: {{$foods->price}}</p>
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

