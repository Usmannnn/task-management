@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-left: 175px">
            <div class="col-12" >
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Define Subtask</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('task.storeSub')}}" method="POST">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">Subtask information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Select Person</label>
                                            <select class="form-control" name="person" id="person">
                                                <option value="0">All User</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Parent Task Name</label>
                                            <select class="form-control" name="task_id" id="person">
                                                <option value="0">All Task</option>
                                                @foreach($tasks as $task)
                                                    <option value="{{$task->id}}">{{$task->task_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Sub Content</label>
                                            <textarea rows="4" class="form-control"name="subContent" placeholder="A few words about task ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                @if(session('message'))
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                {{session('message')}}
                                                <button type="button" class="close mt-4" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary w-100">Define Sub</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
