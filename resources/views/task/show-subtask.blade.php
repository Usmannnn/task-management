@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12" style="margin-left: 100px">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">SubTasks</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Parent Task Name</th>
                            <th scope="col">SubTask Content</th>
                            <th scope="col">Task Progress
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subTasks as $subTask)
                            <tr>
                                <th scope="row">
                                    @foreach($subTask->tasks as $task)
                                        {{$subTask->tasks->task_name}}
                                        @break
                                    @endforeach
                                </th>
                                <th scope="row">
                                    {{$subTask->content}}
                                </th>
                                <td>
                                    @if($subTask->status == 0)
                                        <span class="badge badge-secondary">Waiting</span>
                                    @else
                                        <span class="badge badge-secondary">All Done</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('task.subtaskupdate',['id' => $subTask->id, 'task_id' =>  $subTask->task_id, 'status' => 0])}}">Waiting</a>
                                            <a class="dropdown-item" href="{{route('task.subtaskupdate',['id' => $subTask->id, 'task_id' =>  $subTask->task_id, 'status' => 1])}}">Done</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--}}
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
        {{--}}
@endsection
