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
                            <label>Title</label>
                            <p>{{ $internship->title }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Location</label>
                            <p>{{ $internship->location }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Start Date</label>
                            <p>{{ $internship->start_date ? \Carbon\Carbon::parse($internship->start_date)->format('Y-m-d') : 'N/A' }}</p>
                        </div>

                        <div class="mb-3">
                            <label>End Date</label>
                            <p>{{ $internship->end_date ? \Carbon\Carbon::parse($internship->end_date)->format('Y-m-d') : 'N/A' }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <p>{{ $internship->description }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Requirements</label>
                            <p>{{ $internship->requirements }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Application Deadline</label>
                            <p>{{ $internship->application_deadline ? \Carbon\Carbon::parse($internship->application_deadline)->format('Y-m-d') : 'N/A' }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Stipend/Salary</label>
                            <p>{{ $internship->stipend_salary }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Contact Information</label>
                            <p>{{ $internship->contact_information }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Company Overview</label>
                            <p>{{ $internship->company_overview }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Benefits</label>
                            <p>{{ $internship->benefits }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Working Hours</label>
                            <p>{{ $internship->working_hours }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Eligibility Criteria</label>
                            <p>{{ $internship->eligibility_criteria }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
