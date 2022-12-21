@extends('layouts.adm')

@section('title', 'CATEGORY PAGE')

@section('content')
     @can('create',App\Models\Category::class)
         <a class="btn btn-outline-primary mb-3" href="{{route('adm.categories.create')}}">{{ __('messages.ccc') }}</a>
     @endcan
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('messages.category') }}</th>
            <th scope="col">{{ __('messages.cancel') }}</th>

        </tr>
        </thead>
        <tbody>
        @for ($i=0; $i<count($categories); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$categories[$i]->{'name_'.app()->getLocale()} }}</td>
                <td>
                    @can('create',App\Models\Category::class)
                        <form action="{{route('adm.categories.destroy', $categories[$i]->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">{{ __('messages.delete') }}</button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endfor
        </tbody>
    </table>

@endsection
