@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h3 class="m-0 font-weight-bold"><i class="fas fa-solid fa-users"></i> <b>Employees</b> </h3>
                </div>
                <div class="col-md-6 col-12 text-right">
                    <a href="{{ route('employees.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-solid fa-plus"></i> Add New Employee</a>
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
                <caption>Employees Table</caption>
                
                <!-- Wrap the table inside a table-responsive div for mobile scrolling -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="employeeTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Contact Number</th>
                                <th>Company Name</th>
                                <th>Type of Job</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->middle_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->contact_number }}</td>
                                <td>{{ $employee->company_name }}</td>
                                <td>{{ $employee->type_of_job }}</td>
                                
                                <td>
                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-primary mb-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $employee->id }})">
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

    @include('admin.employees.partials.script')

@endsection
