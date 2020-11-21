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
                    <div class="row card-body align-items-center">
                        <div class="col-md-3">
                            <p class="card-text">{{$task->content}}</p>
                        </div>
                        <div class="col-md-3">
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            @if($task->status == 0)
                                <span class="badge badge-secondary">Waiting</span>
                            @else
                                <span class="badge badge-secondary">All Done</span>
                            @endif
                        </div>
                        <div class="col-3 dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Task Status
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('task.statusChange',['id' => $task->id, 'status' => 0])}}">Waiting</a>
                                <a class="dropdown-item" href="{{route('task.statusChange',['id' => $task->id, 'status' => 1])}}">Done</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        @if(session('message'))
                            <div class="col-md-12">
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    {{session('message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <form action="{{route('comment.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="task_id" value="{{$task->id}}">
                            <div class="input-group mb-3">
                                <textarea type="text" class="form-control" placeholder="Type Comment" name="comment" id="" cols="30" rows="4"></textarea>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-success w-100" type="submit" id="button-addon2">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
