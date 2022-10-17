@extends('layouts.app')

@section('title', 'CATEGORY PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach($categories as $cat)
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{route('foods.category', $cat->id)}}">{{$cat->name}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
