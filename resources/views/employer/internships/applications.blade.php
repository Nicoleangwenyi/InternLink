<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Applications
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
                        <h4>Applications                           
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Applicant Name</th>
                                    <th>Internship</th>
                                    <th>Date Posted</th>
                                    <th>Status</th>
                                    <th>Resume</th>
                                    <th>Cover Letter</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications as $application)
                                    <tr>
                                        <td>{{ $application->name }}</td>
                                        <td>{{ $application->internship_title }}</td>
                                        <td>{{ $application->created_at }}</td>
                                        <td>{{ $application->status }}</td>
                                        <td>
                                            @if ($application->resume)
                                                <a href="{{ Storage::url($application->resume) }}" target="_blank">Download Resume</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if ($application->cover_letter)
                                                <a href="{{ Storage::url($application->cover_letter) }}" target="_blank">Download Cover Letter</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('applications.updateStatus', $application->id) }}" method="POST">
                                                @csrf
                                                <select name="status" class="form-control">
                                                    <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                    <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary mt-2">Update</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                       <!---->
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        </div>
    </div>

</x-app-layout>
