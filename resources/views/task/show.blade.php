@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-11" style="margin-left: 175px">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Tasks</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Task Name</th>
                            <th scope="col">Task Content</th>
                            <th scope="col">Task Status</th>
                            <th scope="col">Task Progress</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <th scope="row">
                                    {{$task->task_name}}
                                </th>
                                <th scope="row">
                                    {{$task->content}}
                                </th>
                                <td>
                                    @if($task->progress !=  $task->subCount)
                                        <span class="badge badge-secondary">Waiting</span>
                                    @else
                                        <span class="badge badge-secondary">All Done</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="progress">
                                            @if($task->subCount == 0)
                                                <div class="progress-bar bg-gradient-danger"
                                                     role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: 0%;">
                                                </div>
                                            @else
                                                <div class="progress-bar bg-gradient-danger"
                                                     role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: {{ number_format($task->progress / $task->subCount, 2) * 100 }}%;">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('task.statusChange',['id' => $task->id, 'status' => 0])}}">Waiting</a>
                                            <a class="dropdown-item" href="{{route('task.statusChange',['id' => $task->id, 'status' => 1])}}">Done</a>
                                            <a class="dropdown-item" href="{{route('task.subtask',['id' => $task->user_id, 'status' => 1])}}">Subtask</a>
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
@endsection
