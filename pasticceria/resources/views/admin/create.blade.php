@extends('layouts.app')
@section('titolo', 'Dessert')

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
<div class="container">

    <form method="POST" action="{{ route('dessert.store') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="inputName">Nome</label>
            <input name="name" type="text" class="form-control" id="inputName" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="inputPrice">Prezzo</label>
            <input name="price" type="text" class="form-control" id="inputPrice" value="{{ old('price') }}">
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>
@endsection