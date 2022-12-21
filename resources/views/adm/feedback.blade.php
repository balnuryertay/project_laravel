@extends('layouts.adm')

@section('title', 'CATEGORY PAGE')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('messages.feedback') }}</th>
            <th scope="col">{{ __('messages.cancel') }}</th>
        </tr>
        </thead>
        <tbody>
        @for ($i=0; $i<count($feedbacks); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$feedbacks[$i]->{'text_'.app()->getLocale()} }}</td>
                <td>
                    @can('create',App\Models\Category::class)
                        <form action="{{route('adm.feedbacks.destroy', $feedbacks[$i]->id)}}" method="post">
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
