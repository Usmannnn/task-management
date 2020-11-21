@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10" style="margin-left: 175px">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Generate User</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Full Name</label>
                                        <input type="text" id="input-username" name="name" class="form-control" placeholder="John Doe">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email address</label>
                                        <input type="email" name="email" id="input-email" class="form-control" placeholder="jesse@example.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="type">Select a Type</label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="1">Standart User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Password</label>
                                        <input type="password" name="password" id="input-last-name" class="form-control" placeholder="password123">
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
                                    <button type="submit" class="btn btn-primary w-100">Generate</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
