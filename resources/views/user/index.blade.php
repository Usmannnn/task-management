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
                                <th scope="col" class="sort" data-sort="name">Full Name</th>
                                <th scope="col" class="sort" data-sort="budget">E-Mail Address</th>
                                <th scope="col" class="sort" data-sort="status">Type of User</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($users as $user)
                                @if($user->id != 0)
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">{{$user->name}}</span>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">{{$user->email}}r</span>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    @if($user->type == 1)
                                                        <span class="name mb-0 text-sm">Standart User</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
