@extends('employer.internships.layouts')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Internship--Admin
                            <a href="{{ route('admin.manageInternships') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('internships.update.admin', $internship->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="company_id" value="{{ $userId }}" />

                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $internship->title }}" />
                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Location</label>
                                <input type="text" name="location" class="form-control" value="{{ $internship->location }}" />
                                @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Start Date</label>
                                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $internship->start_date ? \Carbon\Carbon::parse($internship->start_date)->format('Y-m-d') : '') }}" />
                                @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>End Date</label>
                                <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $internship->end_date ? \Carbon\Carbon::parse($internship->end_date)->format('Y-m-d') : '') }}" />
                                @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="3" class="form-control">{{ $internship->description }}</textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Requirements</label>
                                <textarea name="requirements" rows="3" class="form-control">{{ $internship->requirements }}</textarea>
                                @error('requirements') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Application Deadline</label>
                                <input type="date" name="application_deadline" class="form-control" value="{{ old('application_deadline', $internship->application_deadline ? \Carbon\Carbon::parse($internship->application_deadline)->format('Y-m-d') : '') }}" />
                                @error('application_deadline') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Salary</label>
                                <input type="text" name="stipend_salary" class="form-control" value="{{ $internship->stipend_salary }}" />
                                @error('stipend_salary') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Contact Information</label>
                                <input type="text" name="contact_information" class="form-control" value="{{ $internship->contact_information }}" />
                                @error('contact_information') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Company Overview</label>
                                <textarea name="company_overview" rows="3" class="form-control">{{ $internship->company_overview }}</textarea>
                                @error('company_overview') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Benefits</label>
                                <textarea name="benefits" rows="3" class="form-control">{{ $internship->benefits }}</textarea>
                                @error('benefits') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Working Hours</label>
                                <input type="text" name="working_hours" class="form-control" value="{{ $internship->working_hours }}" />
                                @error('working_hours') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Eligibility Criteria</label>
                                <textarea name="eligibility_criteria" rows="3" class="form-control">{{ $internship->eligibility_criteria }}</textarea>
                                @error('eligibility_criteria') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
