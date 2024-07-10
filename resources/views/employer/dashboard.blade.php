<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello {{ Auth::user()->name }}!
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
                        <h4>Applications</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Internship Title</th>
                                    <th>User Email</th>
                                    <th>Cover Letter</th>
                                    <th>Resume</th>
                                    <th>Status</th>
                                    <th>Applied At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $application->internship->title }}</td>
                                    <td>{{ $application->user->email }}</td>
                                    <td><a href="{{ asset('storage/' . $application->cover_letter) }}">Download</a></td>
                                    <td><a href="{{ asset('storage/' . $application->resume) }}">Download</a></td>
                                    <td>{{ $application->status }}</td>
                                    <td>{{ $application->applied_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $applications->links() }}
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        </div>
    </div>
</x-app-layout>
