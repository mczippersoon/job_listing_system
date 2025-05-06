@extends('admin.admin')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="m-0 item-hover">User Profile</h1>
        </div>

        @if (isset($error))
            <div class="alert alert-danger m-3">
                <strong>Error:</strong> {!! $error !!}
                <p><strong>To edit,</strong> click the item you wish to update.</p>
            </div>
        @endif

        <div class="card-body">
            <div class="mb-4">
                <h5 class="text-uppercase text-muted">Name:  {{ $profile->name }}</h5>
            </div>

            <div class="mb-4">
                <h5 class="text-uppercase text-muted">Role: 
                    @php
                        $roles = [1 => 'Admin', 2 => 'Employee', 3 => 'User'];
                        echo $roles[$profile->role] ?? 'Unknown';
                    @endphp
                </h5>
            </div>

            <h5 class="text-uppercase text-muted">Profile Picture:</h5>
            <div class="row">
                <div class="col-md-4 col-12 text-center">
                    @if (isset($profile))
                        @php 
                            $profileImage = $profile->img 
                                ? asset('storage/' . $profile->img) 
                                : asset('/img/Admin.png'); 
                        @endphp
                        <img 
                            src="{{ $profileImage }}" 
                            alt="Profile Image" 
                            class="img-fluid item-hover shadow-sm"
                            id="editProfilePic" 
                            data-id="{{ $profile->id }}"
                            style="max-width: 200px;"
                        >
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('admin.profile.partials.profile-pic-modal')
    @include('admin.profile.partials.scripts')
@endsection
