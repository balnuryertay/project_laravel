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
                <th scope="col">{{ __('messages.category') }}</th>
                <th scope="col">{{ __('messages.price') }}</th>
                <th scope="col">{{ __('messages.number') }}</th>
                <th scope="col">{{ __('messages.status') }}</th>
                <th scope="col">{{ __('messages.cancel') }}</th>
            </tr>
            </thead>
            <tbody>
            @for ($i=1; $i<=count($basket); $i++)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$basket[$i-1]->food->{'name_'.app()->getLocale()} }}</td>
                    <td>{{$basket[$i-1]->food->category->{'name_'.app()->getLocale()} }}</td>
                    <td>{{$basket[$i-1]->food->price}}</td>
                    <td>{{$basket[$i-1]->number}}</td>
                    <td>{{$basket[$i-1]->{'status_'.app()->getLocale()} }}</td>
                    <td>
                        <form action="{{route('basket.destroy', $basket[$i-1]->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger" type="submit">{{ __('messages.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <form action="{{route('basket.buy')}}" method="post">
                @csrf
                <button class="btn btn-outline-success mr-md-2" type="submit">{{ __('messages.corder') }}</button>
            </form>
        </div>
    </div>
@endsection
