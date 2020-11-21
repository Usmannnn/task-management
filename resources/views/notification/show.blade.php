@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($notifies as $notify)
                <div class="col-md-12" style="margin-bottom: 25px">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5 class="card-title">{{$notify->name}}</h5>
                        </div>
                        <div class="row card-body align-items-center">
                            <div class="col-md-4">
                                <p class="card-text">{{$notify->content}}</p>
                            </div>
                            <div class="col-md-4">
                                @if($notify->status == 0)
                                    <span class="badge badge-secondary">Unseen</span>
                                @else
                                    <span class="badge badge-success">Seen</span>
                                @endif
                            </div>
                            <div class="col-4 dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Task Status
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('notifiy.statusChange',['id' => $notify->id, 'status' => 0])}}">Unseen</a>
                                    <a class="dropdown-item" href="{{route('notifiy.statusChange',['id' => $notify->id, 'status' => 1])}}">Seen</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
