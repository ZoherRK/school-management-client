@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Nou Student</a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Accions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student['name'] }}</td>
            <td>{{ $student['email'] }}</td>
            <td>
                <a href="{{ route('students.edit', $student['id']) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('students.destroy', $student['id']) }}" method="POST" style="display:inline">
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
