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
        
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="img">Image</label>
                    <input type="file" class="form-control" id="img" placeholder="Image" name="img">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="1">Administrator</option>
                        <option value="2">Employee</option>
                        <option value="3">User</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Temporary Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="mt-2 btn btn-primary btn-sm">Create</button>
                <a href="{{route('users.index')}}" class="mt-2 btn btn-secondary btn-sm">Cancel</a>
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