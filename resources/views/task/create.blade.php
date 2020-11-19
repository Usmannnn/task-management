@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Define Task') }}</div>

                    <div class="card-body row">
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
                                    <option value="0">Ahmet</option>
                                    <option value="1">Ali</option>
                                    <option value="1">Mehmet</option>
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
                </div>
            </div>
        </div>
    </div>
@endsection
