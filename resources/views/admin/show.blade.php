<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Link to Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

            <div class="card">
                <div class="card-header">
                    <h4>Show User Detail
                        <a href="{{ route('admin.manageUsers') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label>Role</label>
                        <p>{{ $user->role->name }}</p>
                    </div>
                </div>

            <!-- Script to include Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        </div>
    </div>
</x-app-layout>
