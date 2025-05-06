@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 col-12">
                <i class="fa-solid fa-pen"></i>
                Edit Employee
            </div>
        </div>
    </div>
    <div class="card-body mt-2">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') 
           
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $employee->first_name) }}">
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name', $employee->middle_name) }}">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $employee->last_name) }}">
            </div>
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $employee->company_name) }}">
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ old('contact_number', $employee->contact_number) }}">
            </div>
            <div class="form-group">
                <label for="type_of_job">Type of Job</label>
                <input type="text" class="form-control" id="type_of_job" name="type_of_job" value="{{ old('type_of_job', $employee->type_of_job) }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">{{ $employee->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="requirements">Requirements</label>
                <input type="text" class="form-control" id="requirements" name="requirements" value="{{ old('requirements', $employee->requirements) }}">
            </div>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="p-0 m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <button type="submit" class="mt-2 btn btn-success btn-sm">Update</button>
            <a href="{{ route('employees.index') }}" class="mt-2 btn btn-secondary btn-sm">Cancel</a>
        </form>
    </div>
</div>


{{-- <script>
    document.getElementById('role').addEventListener('change', function() {
        var studentFields = document.getElementById('studentFields');
        if (this.value == '3') {
            studentFields.style.display = 'block'; 
        } else {
            studentFields.style.display = 'none';
        }
    });
</script> --}}
@endsection
