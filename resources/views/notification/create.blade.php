@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Generate Notification') }}</div>

                    <div class="card-body row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="notificationName">Notification Name</label>
                                <input type="text" class="form-control" id="notificationName" name="notificationName"  placeholder="Type Notification Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="person">Select Destination</label>
                                <select class="form-control" name="person" id="person">
                                    <option value="0">All User</option>
                                    <option value="1">Ali</option>
                                    <option value="2">Mehmet</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="notificationContent">Notification Content</label>
                                <textarea class="form-control" style="height:150px;" id="notificationContent" name="notificationContent" placeholder="Notification Content.."></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success w-100">Notify</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
