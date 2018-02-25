@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" name="EdT" id="EdT" src="https://ade6-upmf-ro.grenet.fr/direct/?top=top&projectId=1&login=etudiant-IUT-Valence&password=iutval&resources=342"></iframe>
            </div>
        </div>
        <div class="col-lg-3">
            @if((Auth::user()->hasRole('Administrateur')) || (Auth::user()->hasRole('Professeur')))
                <div class="card mb-3">
                    <div class="card-header">Accès rapide</div>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary btn-block">Ajout de notes</a>
                        <a href="#" class="btn btn-primary btn-block">Liste des étudiants</a>
                        <a href="#" class="btn btn-primary btn-block">Sondage</a>
                        <a href="#" class="btn btn-primary btn-block disabled">Absences</a>
                    </div>
                </div>
            @endif
                <div class="card mb-3">
                    <div class="card-header">Sondage</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $survey->question }}</h5>
                        @foreach($survey->responses as $response)
                            <p>{{ $response->response }}</p>
                        @endforeach
                    </div>
                    @if((Auth::user()->isDelegate) || (Auth::user()->hasRole('Administrateur')) || (Auth::user()->hasRole('Professeur')))
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-block disabled">Créer un sondage</a>
                    </div>
                    @endif
                </div>

                <div class="card mb-3">
                    <div class="card-header">Notifications</div>
                    <div class="card-body">
                        <p class="card-text">Nouvelle note ! - 12/01</p>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
