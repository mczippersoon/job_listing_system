@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 col-12">
                <i class="fa-solid fa-plus"></i>
                Create New User
            </div>
        </div>
    </div>
    <div class="card-body mt-2">
        
            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" required>
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                </div>
                <div class="form-group">
                    <label for="type_of_job">Type of Job</label>
                    <input type="text" class="form-control" id="type_of_job" name="type_of_job" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="requirements">Requirements</label>
                    <input type="text" class="form-control" id="requirements" name="requirements" required>
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
                
                <div class="card-footer">
                    <button type="submit" class="mt-2 btn btn-primary btn-sm">Create</button>
                    <a href="{{route('employees.index')}}" class="mt-2 btn btn-secondary btn-sm">Cancel</a>
                </div>
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