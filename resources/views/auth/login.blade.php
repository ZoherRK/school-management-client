@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <h1 class="mb-4">Iniciar sessió</h1>

        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contrasenya</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>

        <hr>
        <a href="{{ route('google.login') }}" class="btn btn-danger w-100">
            Iniciar sessió amb Google
        </a>

        <p class="mt-3 text-center">No tens compte? <a href="{{ route('register') }}">Registra't</a></p>
    </div>
</div>
@endsection
