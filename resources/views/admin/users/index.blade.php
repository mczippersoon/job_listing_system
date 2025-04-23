@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h3 class="m-0 font-weight-bold"><i class="fas fa-solid fa-users"></i> <b>Users</b> </h3>
                </div>
                <div class="col-md-6 col-12 text-right">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-solid fa-plus"></i> Add New User</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success mt-2 mx-2">
                    {{ session('success') }}
                </div>
            @endif

            <div class="container">
                <caption>Users Table</caption>
                
                <!-- Wrap the table inside a table-responsive div for mobile scrolling -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="usersTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role == 1)
                                        <span class="badge badge-primary">Administrator</span>
                                    @elseif($user->role == 2)
                                        <span class="badge badge-warning">Employee</span>
                                    @elseif($user->role == 3)
                                        <span class="badge badge-secondary">User</span>
                                    @else
                                        <span class="badge badge-dark">Unknown</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $user->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('admin.users.partials.script')

@endsection
