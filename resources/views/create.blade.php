@extends('layouts.app', ['noCarousel' => true, 'headerColor' => '#6a0dad'])

@section('content')
    <div class="card shadow-lg" style="border-radius: 15px; padding: 30px 50px; max-width: 1200px; margin: 0 auto; margin-top: 25px;">
        <!-- Return to Database Button -->
        <a href="{{ route('database') }}" class="btn btn-secondary mb-3" style="border-radius: 5px; margin-top: -40px;">
            Return to Database
        </a>
        
        <h2 class="text-center mb-4" style="font-size: 28px; color: #333;">Youth Profile Form</h2>
        <div class="progress mb-4" style="height: 8px; border-radius: 5px; background-color: #dcdfe1;">
            <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #3498db;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <!-- Main Form -->
        <form method="POST" action="{{ route('youths.store') }}">
            @csrf

            <!-- Sub-Form 1: Personal Information -->
            <div class="mb-4">
                <h4 class="mb-3" style="font-size: 22px;">Personal Information</h4>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name">
                    </div>
                    <div class="col-lg-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="birthdate" class="form-label">Birthdate</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required onchange="calculateAge()">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="age" name="age" readonly>
                    </div>
                    <div class="col-lg-3">
                        <label for="sex" class="form-label">Sex</label>
                        <select class="form-select" id="sex" name="sex" required>
                            <option value="" disabled selected>Choose Sex</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Sub-Form 2: Classification Information -->
            <div class="mb-4">
                <h4 class="mb-3" style="font-size: 22px;">Classification</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="civil_status" class="form-label">Civil Status</label>
                        <select class="form-select" id="civil_status" name="civil_status" required>
                            <option value="" disabled selected>Choose Civil Status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="youth_classification" class="form-label">Youth Classification</label>
                        <select class="form-select" id="youth_classification" name="youth_classification" required>
                            <option value="" disabled selected>Choose Classification</option>
                            <option value="in_school_youth">In School Youth</option>
                            <option value="out_of_school_youth">Out of School Youth</option>
                            <option value="working_youth">Working Youth</option>
                            <option value="youth_with_specific_needs">Youth with Specific Needs</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="youth_age_group" class="form-label">Youth Age Group</label>
                        <select class="form-select" id="youth_age_group" name="youth_age_group" required>
                            <option value="" disabled selected>Choose Age Group</option>
                            <option value="child_youth">Child Youth (15-18 y.o.)</option>
                            <option value="core_youth">Core Youth (19-24 y.o.)</option>
                            <option value="adult_youth">Adult Youth (25-30 y.o.)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Sub-Form 3: Contact Information -->
            <div class="mb-4">
                <h4 class="mb-3" style="font-size: 22px;">Contact Information</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-lg-4">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                    </div>
                </div>
            </div>

            <!-- Sub-Form 4: Additional Information -->
            <div class="mb-4">
                <h4 class="mb-3" style="font-size: 22px;">Additional Information</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="sitio" class="form-label">Sitio</label>
                        <select class="form-select" id="sitio" name="sitio" required>
                            <option value="" disabled selected>Choose Sitio</option>
                            <option value="pagdulang">Pagdulang</option>
                            <option value="proper">Proper</option>
                            <option value="213">213</option>
                            <option value="hilltop">Hilltop</option>
                            <option value="ipilan">Ipilan</option>
                            <option value="kaldayapan">Kaldayapan</option>
                            <option value="murangan">Murangan</option>
                            <option value="vmc">VMC</option>
                            <option value="pinescamp">Pinescamp</option>
                            <option value="bagong_pook">Bagong Pook</option>
                            <option value="bpi">BPI</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="highest_educational_attainment" class="form-label">Highest Educational Attainment</label>
                        <select class="form-select" id="highest_educational_attainment" name="highest_educational_attainment" required>
                            <option value="" disabled selected>Choose Highest Education Attainment</option>
                            <option value="elementary_level">Elementary Level</option>
                            <option value="elementary_graduate">Elementary Graduate</option>
                            <option value="highschool_level">High School Level</option>
                            <option value="highschool_graduate">High School Graduate</option>
                            <option value="tech_voc_level">Tech Voc Level</option>
                            <option value="tech_voc_graduate">Tech Voc Graduate</option>
                            <option value="college_level">College Level</option>
                            <option value="college_graduate">College Graduate</option>
                            <option value="masteral_level">Masteral Level</option>
                            <option value="masteral_graduate">Masteral Graduate</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="work_status" class="form-label">Work Status</label>
                        <select class="form-select" id="work_status" name="work_status" required>
                            <option value="" disabled selected>Choose Work Status</option>
                            <option value="employed">Employed</option>
                            <option value="unemployed">Unemployed</option>
                            <option value="student">Student</option>
                            <option value="working_student">Working Student</option>
                            <option value="looking_for_job">Looking for Job</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="registered_voter" class="form-label">Registered Voter</label>
                        <select class="form-select" id="registered_voter" name="registered_voter" required>
                            <option value="" disabled selected>Choose Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="voted_last_election" class="form-label">Voted Last Election</label>
                        <select class="form-select" id="voted_last_election" name="voted_last_election" required>
                            <option value="" disabled selected>Choose Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="attended_kk_assembly" class="form-label">Attended KK Assembly</label>
                        <select class="form-select" id="attended_kk_assembly" name="attended_kk_assembly" required onchange="toggleAssemblyCount()">
                            <option value="" disabled selected>Choose Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="col-lg-4" id="attendance_count_section" style="display:none;">
                        <label for="kk_assembly_count" class="form-label">Total Attended KK Assemblies</label>
                        <input type="number" class="form-control" id="kk_assembly_count" name="kk_assembly_count" placeholder="Enter the number of assemblies attended" min="0">
                    </div>
                </div>
            </div>

            <!-- Form Buttons -->
            <div class="row">
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
                <div class="col-lg-4">
                    <a href="{{ route('database') }}" class="btn btn-danger w-100">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Function to toggle the visibility of the assembly attendance count input
        function toggleAssemblyCount() {
            var attended = document.getElementById('attended_kk_assembly').value;
            var attendanceCountSection = document.getElementById('attendance_count_section');
            if (attended == "1") {
                attendanceCountSection.style.display = 'block'; // Show the section
            } else {
                attendanceCountSection.style.display = 'none'; // Hide the section
            }
        }

        // Function to calculate the age based on the birthdate
        function calculateAge() {
            var birthdate = document.getElementById('birthdate').value;
            var birthDateObject = new Date(birthdate);
            var today = new Date();
            var age = today.getFullYear() - birthDateObject.getFullYear();
            var m = today.getMonth() - birthDateObject.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDateObject.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
        }
    </script>
@endsection
