

@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manage Internships</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($internships as $internship)
                                    <tr>
                                        <td>{{ $internship->title }}</td>
                                        <td>{{ $internship->location }}</td>
                                        <td>{{ $internship->start_date }}</td>
                                        <td>{{ $internship->end_date }}</td>
                                        <td>
                                            <a href="{{ route('admin.internships.edit', $internship->id) }}" class="btn btn-primary">Edit</a>
                                            <!-- Add more actions as needed -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
