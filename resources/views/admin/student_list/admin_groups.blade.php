@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($promotions as $promotion)
        <ul class="list-group mt-3">
            <a href="{{ route('prof_list_promotion_users', $promotion) }}" class="list-group-item list-group-item-action active">{{ $promotion->name }}</a>
            @foreach($promotion->tdgroups as $tdgroup)
                <a href="{{ route('prof_list_td_users', $tdgroup->id) }}" class="list-group-item list-group-item-action">{{ $tdgroup->name }}</a>
                    @foreach($tdgroup->tpgroups as $tpgroup)
                        <a href="{{ route('prof_list_tp_users', $tpgroup->id) }}" class="list-group-item list-group-item-action tpgroup">{{ $tpgroup->name }}</a>
                    @endforeach
            @endforeach
        </ul>
        @endforeach
    </div>
@endsection
