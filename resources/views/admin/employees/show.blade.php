@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8 col-12">
                <h4 class="m-0">
                    <i class="fas fa-solid fa-book-open"></i>
                    Preview
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
        <div class="header-box py-3 border-bottom mb-3">
            <h3 class="text-uppercase bg-primary p-2 text-light">Employee Description</h3>
            <div class="row pl-2">
                <div class="col-3">Name of Employee: </div>
                <div class="col-9 font-weight-bold">{{ $employee['first_name'] }}</div>
            </div>
            <div class="row pl-2">
                <div class="col-3">Company Name: </div>
                <div class="col-9 font-weight-bold">{{ $employee['company_name'] }}</div>
            </div>
        </div>

        <h5 class="text-uppercase">Middle Name</h5>
        {!! $employee['middle_name'] !!}
        <hr>
        <h5 class="text-uppercase">Last Name</h5>
        {!! $employee['last_name'] !!}
        <hr>
        <h5 class="text-uppercase">Contact Number</h5>
        {!! $employee['contact_number'] !!}
        <hr>
        <h5 class="text-uppercase">Type of Job</h5>
        {!! $employee['type_of_job'] !!}
        <hr>

        
    </div>
</div>


@endsection