@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.balance') }}</div>

                    <form action="{{route('balance.update',$user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('messages.balance') }}</label>

                                <div class="col-md-6">
                                    <label for="balanceInput">{{ __('messages.balance') }}</label>
                                    <textarea class="form-control @error('balance') is-invalid @enderror" id="balanceInput" rows="3" name="balance">{{Auth::user()->payment}}</textarea>
                                    @error('balance')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-outline-success mt-3" type="submit">{{ __('messages.update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
