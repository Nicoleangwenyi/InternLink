
{{--
@extends('admin.layout')

@section('content')

@endsection--}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Internships
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
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Manage Internships
                                    <a href="{{ route('admin.manageUsers') }}" class="btn btn-primary float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <!--<th>Posted by</th>-->
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
                                                <td>{{ $internship->status }}</td>
                                               {{--@if($internship->user)
                                                    <td>{{ $internship->user->name }}</td>
                                                @else
                                                    <td >No User Assigned</td>
                                                @endif--}}
                                                <td>
                                                    <a href="{{ route('internships.edit.admin', $internship->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{-- route('admin.internships.edit', $internship->id) --}}" class="btn btn-danger">Delete</a>
                                                    <td>
                                                        @if($internship->status == 'pending')
                                                            <form action="{{ route('internships.updateStatus', $internship->id) }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('PATCH')
                                                                <input type="hidden" name="status" value="approved">
                                                                <button type="submit" class="btn btn-success">Approve</button>
                                                            </form>
                                                        @elseif($internship->status == 'approved')
                                                            <form action="{{ route('internships.updateStatus', $internship->id) }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('PATCH')
                                                                <input type="hidden" name="status" value="pending">
                                                                <button type="submit" class="btn btn-warning">Set Pending</button>
                                                            </form>
                                                        @endif
                                                    </td>


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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            <script>
                // Example inline JavaScript
               /* document.querySelectorAll('.btn-danger').forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        if (!confirm('Are you sure you want to delete this user?')) {
                            e.preventDefault();
                        }
                    });
                });*/
            </script>
        </div>
    </div>
</x-app-layout>
