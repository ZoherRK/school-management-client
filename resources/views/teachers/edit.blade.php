@extends('layout')

@section('content')
<h1 class="mb-4">Editar Teacher</h1>

<form action="{{ route('teachers.update', $teacher['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="name" class="form-control" value="{{ $teacher['name'] }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $teacher['email'] }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Especialitat</label>
        <input type="text" name="specialty" class="form-control" value="{{ $teacher['specialty'] }}" required>
    </div>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel·lar</a>
    <button type="submit" class="btn btn-primary">Actualitzar</button>
</form>
@endsection
