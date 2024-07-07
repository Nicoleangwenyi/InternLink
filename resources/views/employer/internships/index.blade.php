

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Post Internships
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        </div>
    </div>

</x-app-layout>
