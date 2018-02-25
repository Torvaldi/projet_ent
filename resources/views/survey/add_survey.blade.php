@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Création d'un sondage</h1>
        <form action="{{ route('create_survey_post') }}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" class="form-control" id="question" name="question" placeholder="Question">
            </div>
            <div class="form-row" id="reponses">
                <div class="form-group col-6">
                    <label>Réponse</label>
                    <input type="text" class="form-control" name="reponse[]" placeholder="Réponse">
                </div>
                <div class="form-group col-6">
                    <label>Réponse</label>
                    <input type="text" class="form-control" name="reponse[]" placeholder="Réponse">
                </div>
            </div>
            <button id="btn_add" type="button" class="btn btn-primary" onclick="add()">Ajouter un champ</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
    <script>
        var i = 0;
        function add() {
            var reponses = document.getElementById("reponses");
            var button = document.getElementById("btn_add");
            if (i < 8) {
                i+=1;
                reponses.innerHTML += '<div class="form-group col-6">' +
                    '<label>Réponse</label>' +
                    '<input type="text" class="form-control" name="reponse[]" placeholder="Réponse">' +
                    '</div>';
                if (i >= 8) {
                    button.disabled = true;
                }
            }
        }
    </script>
@endsection
