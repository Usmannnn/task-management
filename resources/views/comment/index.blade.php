@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-11" style="margin-left: 150px;">
                <div class="card bg-light shadow">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="text-dark mb-0">Tasks Info</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-light table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">#</th>
                                <th scope="col" class="sort" data-sort="budget">User Name</th>
                                <th scope="col" class="sort" data-sort="status">Task Name</th>
                                <th scope="col" class="sort" data-sort="status">Task Content</th>
                                <th scope="col" class="sort" data-sort="status">Comment</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($comments as $comment)
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{$comment->id}}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{$comment->user->name}}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{$comment->task->task_name}}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{$comment->task->content}}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                    <span class="name mb-0 text-sm">{{$comment->comment}}</span>
                                            </div>
                                        </div>
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
