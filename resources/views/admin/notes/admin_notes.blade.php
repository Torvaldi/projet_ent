@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-add" role="tab" aria-controls="v-pills-home" aria-selected="true">Ajouter une note</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-get" role="tab" aria-controls="v-pills-profile" aria-selected="false">Récupérer une liste</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-add" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h1>Ajouter une note</h1>

                        <form class="form-horizontal" method="POST" action="{{ route('prof_students_get') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom de l'examen</label>
                                <input type="email" class="form-control" id="examName" placeholder="Nom de l'examen">
                            </div>

                            <div class="form-group {{ $errors->has('module') ? ' has-error' : ''}}" >
                                <label for="module">Module</label>
                                <select id="module_select" class="form-control" name="module" required>
                                    <option value="" selected disabled hidden>Choisissez un module</option>
                                    @foreach($prof->prof_modules as $module)
                                        <option value={{ $module->id }}>M{{ $module->number }} - {{ $module->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group {{ $errors->has('tdgroup') ? ' has-error' : ''}}">
                                <label for="tdgroup">Groupe(s) TD</label>
                                <select disabled id="tdgroup_select" class="form-control" name="tdgroup">
                                    <option value="" selected disabled hidden>Choisissez un TD</option>
                                </select>
                            </div>

                            <div class="form-group {{ $errors->has('tpgroup') ? ' has-error' : ''}}">
                                <label for="tpgroup">Groupe(s) TD</label>
                                <select disabled id="tpgroup_select" class="form-control" name="tpgroup">
                                    <option value="" selected disabled hidden>Choisissez un groupe TP</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="excelFile">Fichier de notes</label>
                                <input type="file" class="form-control-file" id="excelFile">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Valider</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-get" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <h1>Récupérer une liste</h1>
                        <div class="card">
                            <div class="card-body">

                                <form class="form-horizontal" method="POST" action="{{ route('prof_students_get') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('module') ? ' has-error' : ''}}" >
                                        <label for="module">Module</label>
                                        <select id="module_select" class="form-control" name="module" required>
                                            <option value="" selected disabled hidden>Choisissez un module</option>
                                            @foreach($prof->prof_modules as $module)
                                                <option value={{ $module->id }}>M{{ $module->number }} - {{ $module->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group {{ $errors->has('tdgroup') ? ' has-error' : ''}}">
                                        <label for="tdgroup">Groupe(s) TD</label>
                                        <select disabled id="tdgroup_select" class="form-control" name="tdgroup">
                                            <option value="" selected disabled hidden>Choisissez un TD</option>
                                        </select>
                                    </div>

                                    <div class="form-group {{ $errors->has('tpgroup') ? ' has-error' : ''}}">
                                        <label for="tpgroup">Groupe(s) TD</label>
                                        <select disabled id="tpgroup_select" class="form-control" name="tpgroup">
                                            <option value="" selected disabled hidden>Choisissez un groupe TP</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">Valider</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            // Ajout des groupes TD
            $( "#module_select" ).on("change", function(){
                $.getJSON("/prof/notes/students/tdgroup/" + $(this).val(), function(jsonData){
                    select = '<option value="" selected>Pas de groupe TD</option>';
                    $.each(jsonData, function(i, data) {
                        select +='<option value="'+data.id+'">'+data.name+'</option>';
                    });
                    $("#tdgroup_select").html(select);
                    $("#tdgroup_select").prop("disabled", false);
                    $("#wholePromo").prop("disabled", false);
                });
            });

            $( "#tdgroup_select" ).on("change", function(){
                $.getJSON("/prof/notes/students/tdgroup/" + $(this).val(), function(jsonData){
                    select = '<option value="" selected>Pas de groupe TP</option>';
                    $.each(jsonData, function(i, data) {
                        select +='<option value="'+data.id+'">'+data.name+'</option>';
                    });
                    $("#tpgroup_select").html(select);
                    $("#tpgroup_select").prop("disabled", false);
                });
            });
        });
    </script>
@endsection