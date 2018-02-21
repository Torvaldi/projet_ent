@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Liste des utilisateur du groupe {{ $tdgroup->name }} - {{ $tdgroup->promotion->name }}</h3>
            @foreach($semesters as $semester)
                <ul class="list-group">
                    <li class="list-group-item active">{{ $semester->name }}</li>
                    @foreach($tdgroup->users as $user)
                        @if($user->semester->name == $semester->name)
                            <li class="list-group-item">{{ $user->firstName }} {{ $user->lastName }} - {{ $user->semester->name }}</li>
                        @endif
                    @endforeach
                </ul>
            @endforeach
    </div>
@endsection
