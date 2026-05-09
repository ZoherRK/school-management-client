@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Subjects</h1>
    <a href="{{ route('subjects.create') }}" class="btn btn-primary">Nova Subject</a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Nom</th>
            <th>Crèdits</th>
            <th>Teacher</th>
            <th>Accions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subjects as $subject)
        <tr>
            <td>{{ $subject['name'] }}</td>
            <td>{{ $subject['credits'] }}</td>
            <td>{{ $subject['teacher']['name'] ?? 'Sense teacher' }}</td>
            <td>
                <a href="{{ route('subjects.edit', $subject['id']) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('subjects.destroy', $subject['id']) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Segur?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

