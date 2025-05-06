@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8 col-12">
                <h4 class="m-0">
                    <i class="fas fa-solid fa-book-open"></i>
                    Job Listings
                </h4>
            </div>
            <div class="col-md-4 col-12 text-right">
                <a href="{{ back()->getTargetUrl() }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-solid fa-chevron-left"></i>
                    Back
                </a>
                {{-- @if ($diary['diary']->status == 1)
                    <a href="{{ route('diaries.print', $diary['diary']->id) }}" class="btn btn-sm btn-warning" target="_blank">
                        <i class="fas fa-solid fa-print"></i>
                    </a>
                @endif --}}
            </div>
        </div>
    </div>
    <div class="card-body">
        @foreach ($listings as $listing)
            <div class="header-box py-3 border-bottom mb-3">
                <h3 class="text-uppercase bg-primary p-2 text-light">Job Listings</h3>
                <div class="row pl-2">
                    <div class="col-3">Company Name: </div>
                    <div class="col-9 font-weight-bold">{{$listing->company_name}}</div>
                </div>
            </div>
                <div class="border p-3 mb-4 rounded shadow-sm">
                    <h5 class="text-uppercase">First Name</h5>
                    {!! $listing->first_name !!}
                    <hr>

                    <h5 class="text-uppercase">Middle Name</h5>
                    {!! $listing->middle_name !!}
                    <hr>

                    <h5 class="text-uppercase">Last Name</h5>
                    {!! $listing->last_name !!}
                    <hr>

                    <h5 class="text-uppercase">Contact Number</h5>
                    {!! $listing->contact_number !!}
                    <hr>

                    <h5 class="text-uppercase">Type of Job</h5>
                    {!! $listing->type_of_job !!}
                    <hr>

                    <h5 class="text-uppercase">Requirements:</h5>
                    {!! $listing->requirements !!}
                    <hr>

                    <h5 class="text-uppercase">Description:</h5>
                    {!! $listing->description !!}
                    <hr>
                    <div class="card-footer">
                        <a href="{{ route('apply', $listing->id) }}" class="btn btn-sm btn-warning">Apply</a>
                    </div>
                </div>
        @endforeach

    </div>
</div>
@endsection