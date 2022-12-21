@extends('layouts.adm')

@section('title', 'CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                @can('create', App\Models\Role::class)
                    <form action="{{route('adm.roles.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="roleInput">{{ __('messages.role') }}:</label>
                            <input type="text" name="name" id="type" class="form-control">
                            @error('role')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <button class="btn btn-outline-success" type="submit">{{ __('messages.save') }}</button>
                        </div>
                    </form>
                @endcan
            </div>
        </div>
    </div>
@endsection


