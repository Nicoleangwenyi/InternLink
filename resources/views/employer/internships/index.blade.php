


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
                                    <th>Location</th>
                                    <th>start Date</th>
                                    <th>End Date</th>
                                    <th>Application Deadline</th>
                                    <th>Contact Information</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($internships as $internship)
                                <tr>
                                    <td>{{ $internship->title }}</td>
                                    <td>{{ $internship->description }}</td>
                                    <td>{{ $internship->requirements }}</td>
                                    <td>{{ $internship->location }}</td>
                                    <td>{{ $internship->start_date }}</td>
                                    <td>{{ $internship->end_date }}</td>
                                    <td>{{ $internship->application_deadline }}</td>
                                    <td>{{ $internship->contact_information }}</td>

                                    <td>
                                        <a href="{{ route('internships.edit', $internship->id) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('internships.show', $internship->id) }}" class="btn btn-info">Show</a>

                                        {{--<form action="{{ route('internships.destroy', $category->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>--}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $internships->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
