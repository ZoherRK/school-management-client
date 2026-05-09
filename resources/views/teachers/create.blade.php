@extends('layout')

@section('content')
<h1 class="mb-4">Nou Teacher</h1>

<form action="{{ route('teachers.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Especialitat</label>
        <input type="text" name="specialty" class="form-control" required>
    </div>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel·lar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
