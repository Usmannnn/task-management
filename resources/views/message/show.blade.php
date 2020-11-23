@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10" style="margin-left: 175px">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Show Message</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Sender</th>
                                    <th scope="col">Message Head</th>
                                    <th scope="col">Message Content</th>
                                    <th scope="col">Message Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <th>
                                        @foreach($message as $user)
                                            {{$message->users->name}}
                                            @break
                                        @endforeach
                                    </th>
                                    <th>
                                        {{$message->m_head}}
                                    </th>
                                    <th scope="row">
                                        {{$message->message}}
                                    </th>
                                    <td>
                                        @if($message->isRead == 0)
                                            <span class="badge badge-secondary">UNSEEN</span>
                                        @else
                                            <span class="badge badge-secondary">SEEN</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{route('message.statusChange',['id' => $message->id, 'status' => 0])}}">Unseen</a>
                                                <a class="dropdown-item" href="{{route('message.statusChange',['id' => $message->id, 'status' => 1])}}">Seen</a>
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
    </div>
@endsection
