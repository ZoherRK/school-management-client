@extends('layout')

@section('content')
<h1 class="mb-4">Editar Student</h1>

<form action="{{ route('students.update', $student['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="name" class="form-control" value="{{ $student['name'] }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $student['email'] }}" required>
    </div>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel·lar</a>
    <button type="submit" class="btn btn-primary">Actualitzar</button>
</form>
@endsection
