@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="d-flex justify-content-between">
        <h2>Dashboard di {{ Auth::user()->name }}</h2>
        <button class="btn btn-info">
            <a class="text-decoration-none" href="{{ url('admin/dessert/create') }}">
                <i class="fa-solid fa-plus"></i>
            </a>
        </button>
    </div>

    <div class="mt-5 d-flex justify-content-around align-items-center flex-wrap">
        @foreach ($desserts as $dessert)
            <div class="card mt-4">
                <img class="card-img-top" src="{{ asset('img/index.jpg') }}"" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        {{ $dessert->name }}
                    </h5>
                    <p class="card-text">
                        {{ $dessert->price }} euro
                    </p>

                    <form class="d-inline-block" method="POST" action="{{ route('dessert.destroy', $dessert) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Elimina</button>
                    </form>

                    <button type="button" class="btn btn-warning">
                        <a class="text-decoration-none" href="{{ route('dessert.edit', $dessert) }}">Modifica</a>
                    </button>

                </div>
            </div>

        @endforeach
    </div>




</div>
@endsection
