@extends('layouts.app', ['noCarousel' => true, 'headerColor' => '#6a0dad'])

@section('content')
<div class="container my-5">
  

    <!-- Youth Details -->
    <div class="card shadow-lg" style="margin-top: 25px">
        <div class="card-header text-white" style="background-color: #6a0dad">
            <h4 class="mb-0">Personal Information</h4>
        </div>
        <div class="card-body" style="max-height: 75vh; overflow-y: auto;">
            <div class="row">
                <!-- Personal Details -->
                <div class="col-md-6" style="max-height: 50vh; overflow-y: auto;">
                    <h5>Basic Information</h5>
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>First Name</th>
                            <td>{{ $youth->first_name }}</td>
                        </tr>
                        <tr>
                            <th>Middle Name</th>
                            <td>{{ $youth->middle_name }}</td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>{{ $youth->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td>{{ \Carbon\Carbon::parse($youth->birthdate)->age }}</td>
                        </tr>
                        <tr>
                            <th>Birthdate</th>
                            <td>{{ \Carbon\Carbon::parse($youth->birthdate)->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <th>Sex</th>
                            <td>{{ $youth->sex }}</td>
                        </tr>
                        <tr>
                            <th>Civil Status</th>
                            <td>{{ $youth->civil_status }}</td>
                        </tr>
                    </table>
                </div>

                <!-- Contact Details -->
                <div class="col-md-6" style="max-height: 50vh; overflow-y: auto;">
                    <h5>Contact Information</h5>
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>Email</th>
                            <td>{{ $youth->email }}</td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>{{ $youth->contact_number }}</td>
                        </tr>
                        <tr>
                            <th>Sitio</th>
                            <td>{{ $youth->sitio }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Educational and Work Information -->
            <div class="row mt-4">
                <div class="col-md-6" style="max-height: 50vh; overflow-y: auto;">
                    <h5>Educational Details</h5>
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>Highest Educational Attainment</th>
                            <td>{{ $youth->highest_educational_attainment }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6" style="max-height: 50vh; overflow-y: auto;">
                    <h5>Work Information</h5>
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>Work Status</th>
                            <td>{{ $youth->work_status }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Voter and KK Assembly Details -->
            <div class="row mt-4">
                <div class="col-md-6" style="max-height: 50vh; overflow-y: auto;">
                    <h5>Voter Information</h5>
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>Registered Voter</th>
                            <td>{{ $youth->registered_voter ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <th>Voted Last Election</th>
                            <td>{{ $youth->voted_last_election ? 'Yes' : 'No' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6" style="max-height: 50vh; overflow-y: auto;">
                    <h5>KK Assembly Details</h5>
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>Attended KK Assembly</th>
                            <td>{{ $youth->attended_kk_assembly ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <th>Assembly Count</th>
                            <td>{{ $youth->kk_assembly_count }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('youths.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
