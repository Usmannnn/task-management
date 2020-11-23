@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10" style="margin-left: 175px">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Send Message</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('message.store')}}" method="POST">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">Notification information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">User Name</label>
                                        <select class="form-control" name="reciver_id" id="person">
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Message Head</label>
                                        <input type="text" id="input-username" name="m_head" class="form-control" placeholder="Message Head">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Message Content</label>
                                        <textarea rows="4" class="form-control"name="messageContent" placeholder="A few words about message ..."></textarea>
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
