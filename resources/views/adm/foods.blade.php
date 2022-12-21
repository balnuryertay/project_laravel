@extends('layouts.adm')

@section('title', 'FOODS PAGE')

@section('content')
    <h1>{{ __('messages.menu') }}</h1>

    <form action="{{route('adm.foods.search')}}" method="GET">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" name="search" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
            <button class="btn btn-success" type="submit">{{ __('messages.search') }}</button>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('messages.name') }}</th>
            <th scope="col">{{ __('messages.composition') }}</th>
            <th scope="col">{{ __('messages.price') }}</th>
            <th scope="col">{{ __('messages.category') }}</th>
            <th scope="col">{{ __('messages.edit') }}</th>
            <th scope="col">{{ __('messages.delete') }}</th>
        </tr>
        </thead>
        <tbody>
        @for ($i=0; $i<count($food); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$food[$i]->{'name_'.app()->getLocale()} }}</td>
                <td>{{$food[$i]->{'composition_'.app()->getLocale()} }}</td>
                <td>{{$food[$i]->price}}</td>
                <td>{{$food[$i]->category->{'name_'.app()->getLocale()} }}</td>
                <td>
                    <div class="d-flex">
                        <form action="{{route('adm.foods.edit', $food[$i]->id)}}">
                            <button class="btn btn-secondary" type="submit">{{ __('messages.edit') }}</button>
                        </form>
                    </div>
                </td>
                <td>
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
                                    <form action="{{route('adm.foods.destroy', $food[$i]->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">{{ __('messages.yes') }}</button>
                                    </form>
                                    <a href="{{route('adm.foods.index', $food->id)}}" class="btn btn-success">{{ __('messages.no') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
