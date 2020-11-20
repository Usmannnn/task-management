@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($tasks as $task)
            <div class="col-md-12" style="margin-bottom: 25px">
                <div class="card text-center">
                    <div class="card-header">
                        <h5 class="card-title">{{$task->task_name}}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$task->content}}</p>
                    </div>
                    <div class="card-footer text-muted">
                        {{$task->start_date}} {{$task->end_date}}
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection
