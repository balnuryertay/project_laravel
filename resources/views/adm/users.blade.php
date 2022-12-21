@extends('layouts.adm')

@section('title', 'USERS PAGE')

@section('content')
    <h1>{{ __('messages.up') }}</h1>

    <form action="{{route('adm.users.search')}}" method="GET">
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
            <th scope="col">{{ __('messages.nameu') }}</th>
            <th scope="col">{{ __('messages.email') }}</th>
            <th scope="col">{{ __('messages.status') }}</th>
            <th scope="col">{{ __('messages.role') }}</th>
        </tr>
        </thead>
        <tbody>
        @for ($i=0; $i<count($users); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$users[$i]->name}}</td>
                <td>{{$users[$i]->email}}</td>
                <td>
                    <form action="
                            @if($users[$i]->is_active)
                                {{route('adm.users.ban', $users[$i]->id)}}
                            @else
                                {{route('adm.users.unban', $users[$i]->id)}}
                            @endif
                            " method="post">
                        @csrf
                        @method('PUT')
                        <button class="btn {{$users[$i]->is_active ? 'btn-danger' : 'btn-success'}}" type="submit">
                            @if($users[$i]->is_active)
                                {{ __('messages.ban') }}
                            @else
                                {{ __('messages.unban') }}
                            @endif
                        </button>
                    </form>
                </td>
                <td>
                    <form action="{{route('adm.users.update',$users[$i]->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <select  name="role_id" >
                            @foreach($roles as $role)
                                <option @if($role->name == $users[$i]->role->name) selected @endif value="{{$role->id}}">{{$role->{'name_'.app()->getLocale()} }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">{{ __('messages.edit') }}</button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
