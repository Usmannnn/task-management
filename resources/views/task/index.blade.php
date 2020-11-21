@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-11" style="margin-left: 150px;">
                <div class="card bg-light shadow">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="text-dark mb-0">Users Info</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-light table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">#</th>
                                <th scope="col" class="sort" data-sort="budget">Owner Names</th>
                                <th scope="col" class="sort" data-sort="status">Task Name</th>
                                <th scope="col" class="sort" data-sort="status">Task Content</th>
                                <th scope="col" class="sort" data-sort="status">Task Status</th>
                                <th scope="col" class="sort" data-sort="status">Task Progress</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($results as $result)
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">{{$result->id}}</span>
                                                </div>
                                            </div>
                                        </th>
                                        <th>
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
                                        </th>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">{{$result->task_name}}</span>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">{{$result->content}}</span>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="row">
                                            @if($result->status == 0)
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-sm">Waiting</span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-sm">All Done</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </th>
                                        <th scope="row">
                                            @if($result->status == 0)
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-sm">0%</span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-sm">100%</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </th>
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
