@extends('layout')

@section('content')
<h1 class="mb-4">Editar Subject</h1>

<form action="{{ route('subjects.update', $subject['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="name" class="form-control" value="{{ $subject['name'] }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Crèdits</label>
        <input type="number" name="credits" class="form-control" value="{{ $subject['credits'] }}" min="1" max="12" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Teacher</label>
        <select name="teacher_id" class="form-control">
            <option value="">Sense teacher</option>
            @foreach($teachers as $teacher)
            <option value="{{ $teacher['id'] }}" {{ isset($subject['teacher']) && $subject['teacher']['id'] === $teacher['id'] ? 'selected' : '' }}>
                {{ $teacher['name'] }}
            </option>
            @endforeach
        </select>
    </div>
    <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancel·lar</a>
    <button type="submit" class="btn btn-primary">Actualitzar</button>
</form>
@endsection
