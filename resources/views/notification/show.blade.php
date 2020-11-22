@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12" style="margin-left: 100px">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Notifications</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Notification Name</th>
                            <th scope="col">Notification Status</th>
                            <th scope="col">Notification Content</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notifies as $notify)
                            <tr>
                                <th scope="row">
                                    {{$notify->name}}
                                </th>
                                <th>
                                    {{$notify->content}}
                                </th>
                                <td>
                                    @if($notify->status == 0)
                                        <span class="badge badge-secondary">Unseen</span>
                                    @else
                                        <span class="badge badge-secondary">Seen</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('notifiy.statusChange',['id' => $notify->id, 'status' => 0])}}">Unseen</a>
                                            <a class="dropdown-item" href="{{route('notifiy.statusChange',['id' => $notify->id, 'status' => 1])}}">Seen</a>
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
