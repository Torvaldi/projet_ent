@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Notes pour le module M{{ $module->number }} - {{ $module->name }}</h1>
        <table class="table table-striped table-hover text-center">
            <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Enregistré par</th>
                <th scope="col">Enregistré le</th>
                <th scope="col">Dernière modification</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($module->exams as $exam)
                <a href="#">
                    <tr>
                        <td>{{ $exam->name }}</td>
                        <td>{{ $exam->prof->firstName }} {{ $exam->prof->lastName }}</td>
                        <td>{{ $exam->created_at->format('d/m/Y') }}</td>
                        <td>
                            @if(($exam->created_at == $exam->updated_at) || !$exam->updated_at)
                                <i class="fas fa-times"></i>
                            @else
                                {{ $exam->updated_at->format('d/m/Y') }}
                            @endif
                        </td>
                        <td><a href="{{ route('prof_students_view_notes', [$module->id, $exam->id]) }}" type="button" class="btn btn-primary btn-sm">Voir</a></td>
                    </tr>
                </a>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
