@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($promotions as $promotion)
        <ul class="list-group mt-3">
            <li class="list-group-item active">{{ $promotion->name }}</li>
            @foreach($promotion->tdgroups as $tdgroup)
                <li class="list-group-item">{{ $tdgroup->name }}</li>
                    @foreach($tdgroup->tpgroups as $tpgroup)
                        <li class="list-group-item tpgroup">{{ $tpgroup->name }}</li>
                    @endforeach
            @endforeach
        </ul>
        @endforeach
    </div>
@endsection
