


@extends('employer.internships.layouts')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Your posted internships
                            <a href="{{ route('internships.create') }}"class="btn btn-primary float-end">Add Internship</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stiped table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Requirements</th>
                                    <th>location</th>
                                    <th>start Date</th>
                                    <th>End Date</th>
                                    <th>Application Deadline</th>
                                    <th>Contact Information</th>
                                </tr>
                            </thead>
                            <tbody>



                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
