@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 col-12">
                <i class="fa-solid fa-plus"></i>
               Apply
            </div>
        </div>
    </div>
    <div class="card-body mt-2">
        @foreach ($listings as $listing)
        <div class="header-box py-3 mb-4 rounded shadow-sm bg-light">
            <h3 class="text-uppercase bg-warning text-center text-light p-3 rounded">Apply for a Job</h3>

            <div class="row no-gutters mt-3">
                <!-- Left Column: Job Details -->
                <div class="col-md-4 border-right pr-4 pl-3">
                    <div class="mb-3">
                        <h6 class="text-muted text-uppercase mb-1">Company Name</h6>
                        <p class="font-weight-bold mb-0">{!! $listing->company_name !!}</p>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <h6 class="text-muted text-uppercase mb-1">First Name</h6>
                        <p class="mb-0">{!! $listing->first_name !!}</p>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <h6 class="text-muted text-uppercase mb-1">Middle Name</h6>
                        <p class="mb-0">{!! $listing->middle_name !!}</p>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <h6 class="text-muted text-uppercase mb-1">Last Name</h6>
                        <p class="mb-0">{!! $listing->last_name !!}</p>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <h6 class="text-muted text-uppercase mb-1">Contact Number</h6>
                        <p class="mb-0">{!! $listing->contact_number !!}</p>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <h6 class="text-muted text-uppercase mb-1">Type of Job</h6>
                        <p class="mb-0">{!! $listing->type_of_job !!}</p>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <h6 class="text-muted text-uppercase mb-1">Requirements</h6>
                        <p class="mb-0">{!! $listing->requirements !!}</p>
                    </div>
                </div>

                <!-- Right Column: Description -->
                <div class="col-md-4 pl-4">
                    <div class="mb-3">
                        <h5 class="text-uppercase text-primary">Job Description</h5>
                        <p>{!! $listing->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="submit" class="mt-2 btn btn-warning btn-sm">Submit</button>
                <a href="{{ back()->getTargetUrl() }}" class="btn btn-sm btn-secondary mt-2">
                    <i class="fas fa-solid fa-chevron-left"></i>
                    Back
                </a>
            </form>
    </div>
</div>


@endsection