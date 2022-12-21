@extends('layouts.app')

@section('title', 'CREATE PAGE')

@section('content')
    <body style="background-color: #DDFAFF">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                @can('create', App\Models\Food::class)
                    <form action="{{route('foods.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="nameInput">{{ __('messages.name') }}:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name">
                            @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nameKzInput">Атауы:</label>
                            <input type="text" class="form-control @error('name_kz') is-invalid @enderror" id="nameKzInput" name="name_kz" placeholder="атауын енгізіңіз">
                            @error('name_kz')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nameRuInput">Название:</label>
                            <input type="text" class="form-control @error('name_ru') is-invalid @enderror" id="nameRuInput" name="name_ru" placeholder="введите название">
                            @error('name_ru')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nameEnInput">Name:</label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="nameEnInput" name="name_en" placeholder="Enter name">
                            @error('name_en')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="categoryInput">{{ __('messages.category') }}:</label>
                            <select class="form-control" id="categoryInput" name="category_id">
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->{'name_'.app()->getLocale()} }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="compositionInput">{{ __('messages.composition') }}:</label>
                            <textarea class="form-control @error('composition') is-invalid @enderror" id="compositionInput" rows="3" name="composition"></textarea>
                            @error('composition')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="compositionKzInput">Құрамы:</label>
                            <textarea class="form-control @error('composition_kz') is-invalid @enderror" id="compositionKzInput" rows="3" name="composition_kz"></textarea>
                            @error('composition_kz')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="compositionRuInput">Состав:</label>
                            <textarea class="form-control @error('composition_ru') is-invalid @enderror" id="compositionRuInput" rows="3" name="composition_ru"></textarea>
                            @error('composition_ru')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="compositionEnInput">Composition:</label>
                            <textarea class="form-control @error('composition_kz') is-invalid @enderror" id="compositionEnInput" rows="3" name="composition_en"></textarea>
                            @error('composition_kz')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="priceInput">{{ __('messages.price') }}:</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="priceInput" name="price" placeholder="Enter price">
                            @error('price')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="imgInput">{{ __('messages.img') }}:</label>
                            <input type="file" class="form-control @error('img') is-invalid @enderror" id="imgInput" name="img">
                            @error('img')
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


