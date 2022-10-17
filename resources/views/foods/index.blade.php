@extends('layouts.app')

@section('title', 'INDEX PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <a class="btn btn-outline-primary mb-4" href="{{route('foods.create')}}">Add a new food</a><br>
                @foreach($food as $foods)
                    <div class="col d-inline-flex mx-2">
                        <div class="card" style="width: 18rem;">
                            <img src="{{$foods->img}}" class="card-img-top w-100" style="height: 200px" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{$foods->name}}</h5>
                                <p class="card-text">Sostav:{{$foods->composition}}</p>
                                <p class="card-text">Price:{{$foods->price}}</p>
                                <a href="{{route('foods.show', $foods->id)}}" class="btn btn-primary">Read more..</a>
                                <a href="{{route('foods.show', $foods->id)}}" class="btn btn-secondary">Add to cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

