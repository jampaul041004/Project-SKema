@extends('layouts.app', ['noCarousel' => true, 'headerColor' => '#6a0dad'])

@section('content')
<div class="container" style="margin-top: 150px">
    <h1 class="my-4">Youth Database</h1>

    <!-- Top Buttons and Search Form -->
    <div class="d-flex justify-content-between mb-3 flex-wrap">
    
        <!-- Search Form -->
        <form action="{{ route('youths.index') }}" method="GET" class="form-inline w-100 w-md-auto mt-3 mt-md-0">
            <div class="input-group w-100">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control" 
                    placeholder="Search by name" 
                    value="{{ request('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th class="text-nowrap" style="background-color: white;">First Name</th>
                    <th class="text-nowrap" style="background-color: white;">Middle Name</th>
                    <th class="text-nowrap" style="background-color: white;">Last Name</th>
                    <th class="text-nowrap" style="background-color: white;">Age</th>
                    <th class="text-nowrap" style="background-color: white;">Birthdate</th>
                    <th class="text-nowrap" style="background-color: white;">Sex</th>
                    <th class="text-nowrap" style="background-color: white;">Civil Status</th>
                    <th class="text-nowrap" style="background-color: white;">Classification</th>
                    <th class="text-nowrap" style="background-color: white;">Age Group</th>
                    <th class="text-nowrap" style="background-color: white;">Sitio</th>
                    <th class="text-nowrap" style="background-color: white;">Highest Educational Attainment</th>
                    <th class="text-nowrap" style="background-color: white;">Email</th>
                    <th class="text-nowrap" style="background-color: white;">Contact Number</th>
                    <th class="text-nowrap" style="background-color: white;">Work Status</th>
                    <th class="text-nowrap" style="background-color: white;">Registered Voter</th>
                    <th class="text-nowrap" style="background-color: white;">Voted Last Election</th>
                    <th class="text-nowrap"style="background-color: white;">Attended KK Assembly</th>
                    <th class="text-center text-nowrap sticky-top" style="background-color: #fff; right: 0;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($youths as $youth)
                    <tr>
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->first_name }}</td>
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->middle_name }}</td>
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->last_name }}</td>
                        <td class="text-nowrap" style="background-color: white;">{{ \Carbon\Carbon::parse($youth->birthdate)->age }}</td> <!-- Age calculation based on birth_date -->
                        <td class="text-nowrap" style="background-color: white;">{{ \Carbon\Carbon::parse($youth->birthdate)->format('Y-m-d') }}</td> <!-- Birthdate format -->
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->sex }}</td>
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->civil_status }}</td>
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->youth_classification }}</td>
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->youth_age_group }}</td>
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->sitio }}</td>
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->highest_educational_attainment }}</td>
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->email }}</td>
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->contact_number }}</td>
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->work_status }}</td>
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->registered_voter ? 'Yes' : 'No' }}</td>
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->voted_last_election ? 'Yes' : 'No' }}</td>
                        <td class="text-nowrap" style="background-color: white;">{{ $youth->attended_kk_assembly ? 'Yes' : 'No' }}</td>
                        <td class="text-center text-nowrap sticky-top" style="background-color: white; right: 0;">
                            <!-- View, Edit, and Delete Buttons -->
                            <button type="button" class="btn btn-info btn-sm" data-id="{{ $youth->id }}" onclick="fetchYouthDetails({{ $youth->id }})">
                                View
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" onclick="editYouth({{ $youth->id }})">
                                Edit
                            </button>
                            <form action="{{ route('youths.destroy', $youth->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Fetch Youth Details for the View Modal
    function fetchYouthDetails(id) {
        // Make an AJAX request to fetch the youth details and show the modal
        $.ajax({
            url: `/youths/${id}`,
            type: 'GET',
            success: function (response) {
                // Populate modal with response data (e.g., name, email, etc.)
                $('#viewModal').modal('show');
            }
        });
    }



</script>
@endpush
