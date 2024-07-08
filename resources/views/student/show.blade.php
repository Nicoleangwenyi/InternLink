<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" >

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Internship Details
                            <a href="{{ route('internships') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Title</label>
                            <p>{{ $internships->title }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Location</label>
                            <p>{{ $internships->location }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Start Date</label>
                            <p>{{ $internships->start_date ? \Carbon\Carbon::parse($internships->start_date)->format('Y-m-d') : 'N/A' }}</p>
                        </div>

                        <div class="mb-3">
                            <label>End Date</label>
                            <p>{{ $internships->end_date ? \Carbon\Carbon::parse($internships->end_date)->format('Y-m-d') : 'N/A' }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <p>{{ $internships->description }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Requirements</label>
                            <p>{{ $internships->requirements }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Application Deadline</label>
                            <p>{{ $internships->application_deadline ? \Carbon\Carbon::parse($internships->application_deadline)->format('Y-m-d') : 'N/A' }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Stipend/Salary</label>
                            <p>{{ $internships->stipend_salary }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Contact Information</label>
                            <p>{{ $internships->contact_information }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Company Overview</label>
                            <p>{{ $internships->company_overview }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Benefits</label>
                            <p>{{ $internships->benefits }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Working Hours</label>
                            <p>{{ $internships->working_hours }}</p>
                        </div>

                        <div class="mb-3">
                            <label>Eligibility Criteria</label>
                            <p>{{ $internships->eligibility_criteria }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

