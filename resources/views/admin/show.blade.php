@extends('admin.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show User Detail
                            <a href="{{ route('admin.manageUsers') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Name</label>
                            <p>
                                {{ $user->name }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <p>
                                {{ $user->email }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Role</label>
                            <p>
                                {{ $user->role->name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
