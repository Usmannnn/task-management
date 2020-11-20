@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($notifies as $notify)
                <div class="col-md-12" style="margin-bottom: 25px">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5 class="card-title">{{$notify->name}}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{$notify->content}}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
