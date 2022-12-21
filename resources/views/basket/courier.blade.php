@extends('layouts.app')

@section('title', 'BASKET PAGE')

@section('content')
    <body style="background-color: #DDFAFF">
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('messages.name') }}</th>
                <th scope="col">{{ __('messages.nameu') }}</th>
                <th scope="col">{{ __('messages.number') }}</th>
                <th scope="col">{{ __('messages.status') }}</th>
                <th scope="col">###</th>
            </tr>
            </thead>
            <tbody>
            @for ($i=1; $i<=count($foodsInBasket); $i++)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$foodsInBasket[$i-1]->food->{'name_'.app()->getLocale()} }}</td>
                    <td>{{$foodsInBasket[$i-1]->user->name}}</td>
                    <td>{{$foodsInBasket[$i-1]->number}}</td>
                    <td>{{$foodsInBasket[$i-1]->{'status_'.app()->getLocale()} }}</td>
                    <td>
                        <form action="{{route('basket.delivered', $foodsInBasket[$i-1]->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="btn-outline-danger" type="submit">{{ __('messages.delivered') }}</button>
                        </form>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
@endsection
