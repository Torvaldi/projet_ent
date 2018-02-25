@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Notes de l'examen "{{ $exam->name }}" du module M{{ $module->number }} - {{ $module->name }}</h1>

        <div class="card">
            <h5 class="card-header">En bref</h5>
            <div class="card-body">
                <p class="card-text">
                    Moyenne de l'examen : {{ $average }} / {{ $exam->maxPoints }}<br/>
                    Note maximale : {{ $max }} / {{ $exam->maxPoints }}<br/>
                    Note minimale : {{ $min }} / {{ $exam->maxPoints }}<br/>
                </p>
            </div>
        </div>

        <table class="table table-hover table-striped text-center">
            <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Note</th>
                <th scope="col">Ajoutée le</th>
                <th scope="col">Modifiée le</th>
                <th scope="col">Modifier</th>
            </tr>
            </thead>
            <tbody>
            @foreach($exam->notes as $note)
            <tr>
                <td>{{ $note->user->lastName }} {{ $note->user->firstName }}</td>
                <td>{{ $note->value }} / {{ $exam->maxPoints }}</td>
                <td>{{ $note->created_at->format('d/m/Y \\à H:i') }}</td>
                <td>
                    @if(($exam->created_at == $exam->updated_at) || !$exam->updated_at)
                        <i class="fas fa-times"></i>
                    @else
                        {{ $exam->updated_at->format('d/m/Y \\à H:i') }}
                    @endif
                </td>
                <td><a href="{{ route('prof_students_note_edit_post', $note->id) }}"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
