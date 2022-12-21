@extends('layouts.app')

@section('title', 'EDIT PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
{{--                <a class="btn btn-outline-primary" href="{{route('foods.create')}}">Add a new food</a>--}}
{{--                <div class="col-sm-6">--}}
{{--                    <div class="card" style="width: 18rem;">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">{{$foods->name}}</h5>--}}
{{--                            <p class="card-text">{{$foods->composition}}</p>--}}
{{--                            <p class="card-text">{{$foods->price}}</p>--}}
{{--                            <form action="{{route('$foods.edit', $foods->id)}}">--}}
{{--                                <button class="btn btn-secondary" type="submit">Edit</button>--}}
{{--                            </form>--}}
{{--                            <form action="{{route('foods.destroy', $foods->id)}}" method="post">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button class="btn btn-danger" type="submit">Delete</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                <form action="{{route('feedbacks.update', $feedback->id)}}" method="post">
                    <input type="hidden" name="food_id" value="{{$feedback->id}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="feedbackInput">{{ __('messages.feedback') }}:</label>
                        <textarea class="form-control" id="feedbackInput" rows="3" name="text">{{$feedback->text}}</textarea>
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-outline-success" type="submit">{{ __('messages.update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
