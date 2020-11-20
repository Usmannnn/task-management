@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Generate User') }}</div>
                    <form action="{{route('user.store')}}" method="POST">
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
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name"  placeholder="Type a name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Select a Type</label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="1">Standart User</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Type a password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success w-100">Generate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
