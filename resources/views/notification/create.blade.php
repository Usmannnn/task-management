@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Generate Notification') }}</div>
                    <form action="{{route('notification.store')}}" method="POST">
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
                                    <label for="notificationName">Notification Name</label>
                                    <input type="text" class="form-control" id="notificationName" name="notificationName"  placeholder="Type Notification Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="person">Select Destination</label>
                                    <select class="form-control" name="person" id="person">
                                        <option value="0">All User</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
