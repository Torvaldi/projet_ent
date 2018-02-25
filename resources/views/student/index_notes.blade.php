@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mes notes</h1>

        <div class="card mb-3">
            <div class="card-body">
                Moyenne totale : {{ $average }} / 20
            </div>
        </div>

        <ul class="nav nav-pills nav-fill mb-3" id="semester_tab">
            @foreach($semesters as $semester)
                <li class="nav-item">
                    <a class="nav-link" id="{{ $semester->id }}_tab" href="#{{$semester->id}}" onclick="active_class({{ $semester->id }}, {{ count($semesters) }})">{{ $semester->name }}</a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="myTabContent">
            @foreach($semesters as $semester)
                <div class="tab-pane fade" id="{{ $semester->id }}" role="tabpanel" aria-labelledby="{{ $semester->name }}">
                    <table class="table table-striped table-hover text-center">
                        <thead>
                        <tr>
                            <th scope="col">Module</th>
                            <th scope="col">Examen</th>
                            <th scope="col">Note</th>
                            <th scope="col">Coef.</th>
                            <th scope="col">Correcteur</th>
                            <th scope="col">Ajoutée le</th>
                            <th scope="col">Modifiée le</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($user->notes as $note)
                                @if($note->exam->module->semester->name == $semester->name)
                                    <td>M{{ $note->exam->module->number }} - {{ $note->exam->module->name }}</td>
                                    <td>{{ $note->exam->name }}</td>
                                    <td>{{ $note->value }} / {{ $note->exam->maxPoints }}</td>
                                    <td>{{ $note->exam->coef }}</td>
                                    <td>{{ $note->exam->prof->firstName }} {{ $note->exam->prof->lastName }}</td>
                                    <td>{{ $note->created_at->format('d/m/Y \\à H:i') }}</td>
                                    <td>
                                        @if($note->created_at == $note->updated_at)
                                            <i class="fas fa-times"></i>
                                        @else
                                            {{ $note->updated_at->format('d/m/Y \\à H:i') }}
                                        @endif
                                    </td>
                                @endif
                            @endforeach
                        </tr>
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