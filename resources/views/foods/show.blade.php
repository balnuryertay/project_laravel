@extends('layouts.app')

@section('title', 'FOOD PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="col-sm-6">
                    <div class="card" style="width: 18rem;">
                        <img src="{{$food->img}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{$food->name}}</h5>
                            <p class="card-text">Sostav:{{$food->composition}}</p>
                            <p class="card-text">Price:{{$food->price}}</p>
                            <form action="{{route('foods.edit', $food->id)}}">
                                <button class="btn btn-secondary" type="submit">Edit</button>
                            </form>
                            <form action="{{route('foods.destroy', $food->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                    <form action="{{route('feedbacks.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="food_id" value="{{$food->id}}">
                        <div class="form-group">
                            <label for="feedbackInput">Feedback:</label>
                            <textarea class="form-control" id="feedbackInput" rows="3" name="text"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-outline-success" type="submit">Save feedback</button>
                        </div>
                    </form>

                    @foreach($feedbacks as $feedback)
                        <div class="row justify-content-center">
                            <div class="col md-3">
                                <div class="card" style="width: 14rem;">
                                    <div class="card body">
                                        <h>{{$feedback->text}}</h>
                                        <small>{{$feedback->creted_at}} author: {{$feedback->user->name}}</small>

                                        <form action="{{route('feedbacks.edit', $feedback->id)}}">
                                            <button class="btn btn-secondary" type="submit">Edit</button>
                                        </form>

                                        <form action="{{route('feedbacks.destroy', $feedback->id)}}" method="post">
                                            <input type="hidden" name="food_id" value="{{$feedback->id}}">

                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
