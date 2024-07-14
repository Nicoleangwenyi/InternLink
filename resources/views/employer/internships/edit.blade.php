@extends('employer.internships.layouts')

@section('content')
    <style>
        .form-label, .form-control {
            font-size: 0.9rem;
        }
        .form-control {
            padding: 0.4rem;
        }
        .mb-3, .mb-2 {
            margin-bottom: 0.4rem !important;
        }
        .container {
            max-width: 1200px;
        }
        .btn-primary, .btn-danger {
            font-size: 0.9rem;
        }
        h4 {
            font-size: 1.2rem;
        }
    </style>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Edit Internship</h4>
                        <a href="{{ route('internships.index') }}" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('internships.update', $internship->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="company_id" value="{{ $userId }}" />

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="title" class="form-label">Position</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ $internship->title }}" />
                                    @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" name="location" id="location" class="form-control" value="{{ $internship->location }}" />
                                    @error('location') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $internship->start_date ? \Carbon\Carbon::parse($internship->start_date)->format('Y-m-d') : '') }}" />
                                    @error('start_date') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $internship->end_date ? \Carbon\Carbon::parse($internship->end_date)->format('Y-m-d') : '') }}" />
                                    @error('end_date') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" rows="2" class="form-control">{{ $internship->description }}</textarea>
                                @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-2">
                                <label for="requirements" class="form-label">Requirements</label>
                                <textarea name="requirements" id="requirements" rows="2" class="form-control">{{ $internship->requirements }}</textarea>
                                @error('requirements') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="application_deadline" class="form-label">Application Deadline</label>
                                    <input type="date" name="application_deadline" id="application_deadline" class="form-control" value="{{ old('application_deadline', $internship->application_deadline ? \Carbon\Carbon::parse($internship->application_deadline)->format('Y-m-d') : '') }}" />
                                    @error('application_deadline') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="stipend_salary" class="form-label">Salary</label>
                                    <input type="text" name="stipend_salary" id="stipend_salary" class="form-control" value="{{ $internship->stipend_salary }}" />
                                    @error('stipend_salary') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="contact_information" class="form-label">Contact Information</label>
                                <input type="text" name="contact_information" id="contact_information" class="form-control" value="{{ $internship->contact_information }}" />
                                @error('contact_information') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-2">
                                <label for="company_overview" class="form-label">Company Overview</label>
                                <textarea name="company_overview" id="company_overview" rows="2" class="form-control">{{ $internship->company_overview }}</textarea>
                                @error('company_overview') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-2">
                                <label for="benefits" class="form-label">Benefits</label>
                                <textarea name="benefits" id="benefits" rows="2" class="form-control">{{ $internship->benefits }}</textarea>
                                @error('benefits') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="working_hours" class="form-label">Working Hours</label>
                                    <input type="text" name="working_hours" id="working_hours" class="form-control" value="{{ $internship->working_hours }}" />
                                    @error('working_hours') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="eligibility_criteria" class="form-label">Eligibility Criteria</label>
                                    <textarea name="eligibility_criteria" id="eligibility_criteria" rows="2" class="form-control">{{ $internship->eligibility_criteria }}</textarea>
                                    @error('eligibility_criteria') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="mb-2">
                                <button type="submit" class="btn btn-primary w-100">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
