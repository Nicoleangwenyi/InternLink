


@extends('employer.internships.layouts')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create InternShip
                            <a href="{{ route('internships.index') }}"  class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('internships.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="company_id" value="{{ $userId }}" />

                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" />
                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Location</label>
                                <input type="text" name="location" class="form-control" />
                                @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Start Date</label>
                                <input type="date" name="start_date" class="form-control" />
                                @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>End Date</label>
                                <input type="date" name="end_date" class="form-control" />
                                @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Requirements</label>
                                <textarea name="requirements" rows="3" class="form-control"></textarea>
                                @error('requirements') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Application Deadline</label>
                                <input type="date" name="application_deadline" class="form-control" />
                                @error('application_deadline') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            

                            <div class="mb-3">
                                <label>Stipend/Salary</label>
                                <input type="text" name="stipend_salary" class="form-control" />
                                @error('stipend_salary') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Contact Information</label>
                                <input type="text" name="contact_information" class="form-control" />
                                @error('contact_information') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Company Overview</label>
                                <textarea name="company_overview" rows="3" class="form-control"></textarea>
                                @error('company_overview') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Benefits</label>
                                <textarea name="benefits" rows="3" class="form-control"></textarea>
                                @error('benefits') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Working Hours</label>
                                <input type="text" name="working_hours" class="form-control" />
                                @error('working_hours') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Eligibility Criteria</label>
                                <textarea name="eligibility_criteria" rows="3" class="form-control"></textarea>
                                @error('eligibility_criteria') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>



                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
