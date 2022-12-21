@extends('layouts.adm')

@section('title', 'Role PAGE')

@section('content')
     @can('create',App\Models\Role::class)
         <a class="btn btn-outline-primary mb-3" href="{{route('adm.roles.create')}}">{{ __('messages.crole') }}</a>
     @endcan
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('messages.role') }}</th>
            <th scope="col">{{ __('messages.cancel') }}</th>

        </tr>
        </thead>
        <tbody>
        @for ($i=0; $i<count($roles); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{ $roles[$i]->{'name_'.app()->getLocale()} }}</td>
                <td>
                    <form action="{{route('adm.roles.destroy', $roles[$i]->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">{{ __('messages.delete') }}</button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>

@endsection
