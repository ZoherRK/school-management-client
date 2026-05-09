@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Teachers</h1>
    <a href="{{ route('teachers.create') }}" class="btn btn-primary">Nou Teacher</a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Especialitat</th>
            <th>Accions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
        <tr>
            <td>{{ $teacher['name'] }}</td>
            <td>{{ $teacher['email'] }}</td>
            <td>{{ $teacher['specialty'] }}</td>
            <td>
                <a href="{{ route('teachers.edit', $teacher['id']) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('teachers.destroy', $teacher['id']) }}" method="POST" style="display:inline">
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
