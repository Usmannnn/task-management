@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>All Tasks</h5></div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Owner Name</th>
                                <th scope="col">Task Name</th>
                                <th scope="col">Task Content</th>
                                <th scope="col">Task Status</th>
                                <th scope="col">Task Progress</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <th scope="row">{{$result->id}}</th>
                                    <td>
                                        <select class="form-control" name="type" id="type">
                                            @foreach($result->users as $user)
                                                @if($result->user_id == 0)
                                                    <option>All User</option>
                                                    @break
                                                @else
                                                    <option>{{$user->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>{{$result->task_name}}</td>
                                    <td>{{$result->content}}</td>
                                    <td>
                                        @if($result->status == 0)
                                            Waiting
                                        @else
                                            All Done
                                        @endif
                                    </td>
                                    <td>
                                        @if($result->status == 0)
                                            0%
                                        @else
                                            100%
                                        @endif</td>
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