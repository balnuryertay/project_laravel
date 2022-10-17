@extends('layouts.app')

@section('title', 'EDIT PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a href="{{route('foods.index')}}" class="btn btn-outline-primary">Go to index page</a>

                <form action="{{route('foods.update', $food->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nameInput">Name:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{$food->name}}">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="categoryInput">Category:</label>
                        <select class="form-control" id="categoryInput" name="category_id">
                            @foreach($categories as $cat)
                                <option @if($cat->id == $food->category_id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="compositionInput">Composition:</label>
                        <textarea class="form-control @error('composition') is-invalid @enderror" id="compositionInput" rows="3" name="composition">{{$food->composition}}</textarea>
                        @error('composition')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="priceInput">Price:</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="priceInput" name="price" value="{{$food->price}}">
                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="imgInput">Img:</label>
                        <input type="text" class="form-control @error('img') is-invalid @enderror" id="imgInput" name="img" value="{{$food->img}}">
                        @error('img')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-outline-success" type="submit">Update food</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
