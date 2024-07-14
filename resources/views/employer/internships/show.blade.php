@extends('employer.internships.layouts')

@section('content')

    <style>
        .container {
            max-width: 1200px;
        }
        .card-header h4 {
            font-size: 1.2rem;
        }
        .card-header .btn {
            font-size: 0.9rem;
        }
        .card-body {
            font-size: 0.9rem;
        }
        .mb-3 {
            margin-bottom: 0.5rem !important;
        }
    </style>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Show Internship Details</h4>
                        <a href="{{ route('internships.index') }}" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label><b>Position</b></label>
                                <p>{{ $internship->title }}</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label><b>Location</b></label>
                                <p>{{ $internship->location }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label><b>Start Date</b></label>
                                <p>{{ $internship->start_date ? \Carbon\Carbon::parse($internship->start_date)->format('Y-m-d') : 'N/A' }}</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label><b>End Date</b></label>
                                <p>{{ $internship->end_date ? \Carbon\Carbon::parse($internship->end_date)->format('Y-m-d') : 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label><b>Description</b></label>
                                <p>{{ $internship->description }}</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label><b>Requirements</b></label>
                                <p>{{ $internship->requirements }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label><b>Application Deadline</b></label>
                                <p>{{ $internship->application_deadline ? \Carbon\Carbon::parse($internship->application_deadline)->format('Y-m-d') : 'N/A' }}</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label><b>Salary</b></label>
                                <p>{{ $internship->stipend_salary }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label><b>Contact Information</b></label>
                                <p>{{ $internship->contact_information }}</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label><b>Company Overview</b></label>
                                <p>{{ $internship->company_overview }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label><b>Benefits</b></label>
                                <p>{{ $internship->benefits }}</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label><b>Working Hours</b></label>
                                <p>{{ $internship->working_hours }}</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label><b>Eligibility Criteria</b></label>
                            <p>{{ $internship->eligibility_criteria }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
