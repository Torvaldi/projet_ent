@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Modification de la note "{{ $note->exam->name }}" du module M{{ $note->exam->module->number }} - {{ $note->exam->module->name }}
            pour {{ $note->user->firstName }} {{ $note->user->lastName }}</h2>

        <form class="form-horizontal" method="POST" action="{{ route('prof_students_note_edit_post', $note->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('value') ? ' has-error' : ''}}" >
                <label for="value">Nouvelle note /{{ $note->exam->maxPoints }}</label>
                <input type="number" class="form-control" id="value" name="value" value="{{ $note->value }}" max="{{ $note->exam->maxPoints }}" min="0" placeholder="Note de l'étudiant">
            </div>
            <button type="submit" class="btn btn-primary float-right">Valider</button>
        </form>
    </div>

@endsection