@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-add" role="tab" aria-controls="v-pills-home" aria-selected="true">Ajouter une note</a>
                    <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-list" role="tab" aria-controls="v-pills-list" aria-selected="true">Voir vos notes</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-get" role="tab" aria-controls="v-pills-profile" aria-selected="false">Récupérer une liste</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-add" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h1>Ajouter une note</h1>
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal" method="POST" action="{{ route('prof_students_post') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="examName">Nom de l'examen</label>
                                        <input type="text" class="form-control" id="examName" name="examName" placeholder="Nom de l'examen">
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

                                    <div class="form-group">
                                        <label for="maxPoints">Barème total</label>
                                        <input type="number" class="form-control" id="maxPoints" name="maxPoints" placeholder="Barème total">
                                    </div>

                                    <div class="form-group {{ $errors->has('excelFile') ? ' has-error' : ''}}">
                                        <label for="excelFile">Fichier de notes</label>
                                        <input type="file" class="form-control-file" id="excelFile" name="excelFile">
                                    </div>

                                    <button type="submit" class="btn btn-primary float-right">Valider</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-list" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <h1>Vos notes</h1>
                            <div class="list-group">
                                <li class="list-group-item active">
                                    Vos modules
                                </li>
                                @foreach($prof->prof_modules as $module)
                                    <a href="{{ route('prof_students_view', $module->id) }}" class="list-group-item list-group-item-action">M{{ $module->number }} - {{ $module->name }}</a>
                                @endforeach
                            </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-get" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <h1>Récupérer une liste</h1>
                        <div class="card">
                            <div class="card-body">

                                <form class="form-horizontal" method="POST" action="{{ route('prof_students_get') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('module') ? ' has-error' : ''}}" >
                                        <label for="module">Module</label>
                                        <select id="module_select_get" class="form-control" name="module" required>
                                            <option value="" selected disabled hidden>Choisissez un module</option>
                                            @foreach($prof->prof_modules as $module)
                                                <option value={{ $module->id }}>M{{ $module->number }} - {{ $module->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Valider</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection