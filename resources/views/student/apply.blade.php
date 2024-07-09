
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" >
<div class="container">
    <div class="row">
        <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="card">
                        <div class="card-header">
                            <h4>Apply for Internship
                                <a href="{{ route('internships') }}"  class="btn btn-danger float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label>Cover Letter</label>
                                    <input type="file" name="resume" class="form-control" />
                                    @error('cover_letter') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>


                                <div class="mb-3">
                                    <label>Resume</label>
                                    <input type="file" name="resume" class="form-control" />
                                    @error('resume') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" ></script>

