@extends('layouts.app')
@section('titolo', 'edit Dessert')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    
    <form method="POST" action="{{ route('dessert.update', $dessert) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="inputName">Nome</label>
            <input name="name" type="text" class="form-control" id="inputName" value="{{ $dessert->name }}">
        </div>

        <div class="form-group">
            <label for="inputPrice">Prezzo</label>
            <input name="price" type="text" class="form-control" id="inputPrice" value="{{ $dessert->price }}">
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
    </div>
</div>
@endsection