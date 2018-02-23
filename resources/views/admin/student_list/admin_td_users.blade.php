@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('prof_users') }}" type="button" class="btn btn-secondary btn-sm mb-3"><i class="fas fa-arrow-left"></i> Retour</a>
        <h3>Liste des utilisateur du groupe {{ $tdgroup->name }} - {{ $tdgroup->promotion->name }}</h3>
        <ul class="nav nav-pills nav-fill" id="semester_tab">
            @foreach($semesters as $semester)
            <li class="nav-item">
                <a class="nav-link" id="{{ $semester->id }}_tab" href="#{{$semester->id}}" onclick="active_class({{ $semester->id }}, {{ count($semesters) }})">{{ $semester->name }}</a>
            </li>
            @endforeach
        </ul>
        <div class="tab-content" id="semester_tabContent">
            @foreach($semesters as $semester)
                <div class="tab-pane fade" id="{{ $semester->id }}" role="tabpanel" aria-labelledby="{{ $semester->name }}">
                    <table class="table mt-3">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($semester->users as $user)
                            @if(($user->tpgroup->tdgroup->id == $tdgroup->id) && !($user->hasRole('Administrateur')) && !($user->hasRole('Professeur')))
                                <tr>
                                    <td>{{ $user->lastName }}</td>
                                    <td>{{ $user->firstName }}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        window.onload = function () {
            $('#1').addClass('show active');
            $('#1_tab').addClass('active');
        };
        function active_class(id, count) {
            for (var i = 1; i <= count; i++) {
                $('#' + i).removeClass('show active');
                $('#' + i + '_tab').removeClass('active');
            }
            $('#' + id).addClass('show active');
            $('#' + id + '_tab').addClass('active');
        }
    </script>
@endsection
