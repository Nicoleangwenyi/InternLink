@extends('employer.internships.layouts')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Internship Details
                            <a href="{{ route('internships.index') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">



                        <div class="mb-3">
                            <label><b>Title</b></label>
                            <p>{{ $internship->title }}</p>
                        </div>

                        <div class="mb-3">
                            <label><b>Location</b></label>
                            <p>{{ $internship->location }}</p>
                        </div>

                        <div class="mb-3">
                            <label><b>Start Date</b></label>
                            <p>{{ $internship->start_date ? \Carbon\Carbon::parse($internship->start_date)->format('Y-m-d') : 'N/A' }}</p>
                        </div>

                        <div class="mb-3">
                            <label><b>End Date</b></label>
                            <p>{{ $internship->end_date ? \Carbon\Carbon::parse($internship->end_date)->format('Y-m-d') : 'N/A' }}</p>
                        </div>

                        <div class="mb-3">
                            <label><b>Description,</b></label>
                            <p>{{ $internship->description }}</p>
                        </div>

                        <div class="mb-3">
                            <label><b>Requirements</b></label>
                            <p>{{ $internship->requirements }}</p>
                        </div>

                        <div class="mb-3">
                            <label><b>Application Deadline</b></label>
                            <p>{{ $internship->application_deadline ? \Carbon\Carbon::parse($internship->application_deadline)->format('Y-m-d') : 'N/A' }}</p>
                        </div>

                        <div class="mb-3">
                            <label><b>Salary</b></label>
                            <p>{{ $internship->stipend_salary }}</p>
                        </div>

                        <div class="mb-3">
                            <label><b>Contact Information</b></label>
                            <p>{{ $internship->contact_information }}</p>
                        </div>

                        <div class="mb-3">
                            <label><b>Company Overview</b></label>
                            <p>{{ $internship->company_overview }}</p>
                        </div>

                        <div class="mb-3">
                            <label><b>Benefits</b></label>
                            <p>{{ $internship->benefits }}</p>
                        </div>

                        <div class="mb-3">
                            <label><b>Working Hours</b></label>
                            <p>{{ $internship->working_hours }}</p>
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
