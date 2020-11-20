@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Define Task') }}</div>
                    <form action="{{route('task.store')}}" method="POST">
                        @csrf
                        <div class="card-body row">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="taskName">Task Name</label>
                                    <input type="text" class="form-control" id="taskName" name="taskName"  placeholder="Type Task Name">
                                </div>
                                <div class="form-group">
                                    <label for="startDate">Start Date</label>
                                    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" name="startDate" id="startDate">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="person">Select Person</label>
                                    <select class="form-control" name="person" id="person">
                                        <option value="1">Ahmet</option>
                                        <option value="2">Ali</option>
                                        <option value="3">Mehmet</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="endDate">End Date</label>
                                    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" name="endDate" id="endDate">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="taskContent">Task Content</label>
                                    <textarea class="form-control" style="height:150px;" id="taskContent" name="taskContent" placeholder="Task Content.."></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success w-100">Define</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
