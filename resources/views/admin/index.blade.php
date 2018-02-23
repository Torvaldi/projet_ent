@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Tableau de bord</div>

            <div class="card-body">
                Bonjour {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6 col-lg-3 mt-3">
                <a class="card-link" href="{{ route('prof_users') }}">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h5 class="card-title">Étudiants</h5>
                                    <p class="card-text">Consultez la liste des étudiants</p>
                                </div>

                                <div class="col-4">
                                    <i class="fas fa-user fa-4x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-6 col-lg-3 mt-3">
                <a class="card-link" href="{{ route('prof_notes') }}">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h5 class="card-title">Vos notes</h5>
                                    <p class="card-text">Ajoutez ou consultez vos notes</p>
                                </div>

                                <div class="col-4">
                                    <i class="far fa-clipboard fa-4x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-6 col-lg-3 mt-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h5 class="card-title">Sondages</h5>
                                <p class="card-text">Créez ou consultez un sondage</p>
                            </div>

                            <div class="col-4">
                                <i class="fas fa-chart-pie fa-4x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3 mt-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h5 class="card-title">Absences</h5>
                                <p class="card-text">Consultez la liste des absences</p>
                            </div>

                            <div class="col-4">
                                <i class="fas fa-exclamation-triangle fa-4x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
