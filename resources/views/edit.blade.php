@extends('layouts.app', ['noCarousel' => true, 'headerColor' => '#6a0dad'])

@section('content')
    <div class="card shadow-lg" style="border-radius: 15px; padding: 30px 50px; max-width: 1200px; margin-top: 25px; margin:auto">
        <!-- Return to Database Button -->
        <a href="{{ route('database') }}" class="btn btn-secondary mb-3" style="border-radius: 5px; margin-top: -40px;">
            Return to Database
        </a>

        <h2 class="text-center mb-4" style="font-size: 28px; color: #333;">Update Youth Profile</h2>
        <div class="progress mb-4" style="height: 8px; border-radius: 5px; background-color: #dcdfe1;">
            <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #3498db;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <!-- Main Form -->
        <form method="POST" action="{{ route('youths.update', $youth->id) }}">
            @csrf
            @method('PUT') <!-- Add PUT method for updating data -->

            <!-- Sub-Form 1: Personal Information -->
            <div class="mb-4">
                <h4 class="mb-3" style="font-size: 22px;">Personal Information</h4>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $youth->first_name) }}" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name', $youth->middle_name) }}">
                    </div>
                    <div class="col-lg-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $youth->last_name) }}" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="birthdate" class="form-label">Birthdate</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate', $youth->birthdate) }}" required onchange="calculateAge()">
                    </div>
                </div>
                <div class="row mt-3">
                  
                    <div class="col-lg-3">
                        <label for="sex" class="form-label">Sex</label>
                        <select class="form-select" id="sex" name="sex" required>
                            <option value="male" {{ $youth->sex == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $youth->sex == 'female' ? 'selected' : '' }}>Female</option>
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
                            <option value="single" {{ $youth->civil_status == 'single' ? 'selected' : '' }}>Single</option>
                            <option value="married" {{ $youth->civil_status == 'married' ? 'selected' : '' }}>Married</option>
                            <option value="divorced" {{ $youth->civil_status == 'divorced' ? 'selected' : '' }}>Divorced</option>
                            <option value="widowed" {{ $youth->civil_status == 'widowed' ? 'selected' : '' }}>Widowed</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="youth_classification" class="form-label">Youth Classification</label>
                        <select class="form-select" id="youth_classification" name="youth_classification" required>
                            <option value="in_school_youth" {{ $youth->youth_classification == 'in_school_youth' ? 'selected' : '' }}>In School Youth</option>
                            <option value="out_of_school_youth" {{ $youth->youth_classification == 'out_of_school_youth' ? 'selected' : '' }}>Out of School Youth</option>
                            <option value="working_youth" {{ $youth->youth_classification == 'working_youth' ? 'selected' : '' }}>Working Youth</option>
                            <option value="youth_with_specific_needs" {{ $youth->youth_classification == 'youth_with_specific_needs' ? 'selected' : '' }}>Youth with Specific Needs</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="youth_age_group" class="form-label">Youth Age Group</label>
                        <select class="form-select" id="youth_age_group" name="youth_age_group" required>
                            <option value="child_youth" {{ $youth->youth_age_group == 'child_youth' ? 'selected' : '' }}>Child Youth (15-18 y.o.)</option>
                            <option value="core_youth" {{ $youth->youth_age_group == 'core_youth' ? 'selected' : '' }}>Core Youth (19-24 y.o.)</option>
                            <option value="adult_youth" {{ $youth->youth_age_group == 'adult_youth' ? 'selected' : '' }}>Adult Youth (25-30 y.o.)</option>
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
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $youth->email) }}" required>
                    </div>
                    <div class="col-lg-4">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ old('contact_number', $youth->contact_number) }}" required>
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
                            <option value="pagdulang" {{ $youth->sitio == 'pagdulang' ? 'selected' : '' }}>Pagdulang</option>
                            <option value="proper" {{ $youth->sitio == 'proper' ? 'selected' : '' }}>Proper</option>
                            <option value="213" {{ $youth->sitio == '213' ? 'selected' : '' }}>213</option>
                            <option value="hilltop" {{ $youth->sitio == 'hilltop' ? 'selected' : '' }}>Hilltop</option>
                            <option value="ipilan" {{ $youth->sitio == 'ipilan' ? 'selected' : '' }}>Ipilan</option>
                            <option value="kaldayapan" {{ $youth->sitio == 'kaldayapan' ? 'selected' : '' }}>Kaldayapan</option>
                            <option value="murangan" {{ $youth->sitio == 'murangan' ? 'selected' : '' }}>Murangan</option>
                            <option value="vmc" {{ $youth->sitio == 'vmc' ? 'selected' : '' }}>VMC</option>
                            <option value="pinescamp" {{ $youth->sitio == 'pinescamp' ? 'selected' : '' }}>Pinescamp</option>
                            <option value="bagong_pook" {{ $youth->sitio == 'bagong_pook' ? 'selected' : '' }}>Bagong Pook</option>
                            <option value="bpi" {{ $youth->sitio == 'bpi' ? 'selected' : '' }}>BPI</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="highest_educational_attainment" class="form-label">Highest Educational Attainment</label>
                        <select class="form-select" id="highest_educational_attainment" name="highest_educational_attainment" required>
                            <option value="" disabled selected>Choose Highest Education Attainment</option>
                            <option value="elementary_level" {{ $youth->highest_educational_attainment == 'elementary_level' ? 'selected' : '' }}>Elementary Level</option>
                            <option value="elementary_graduate" {{ $youth->highest_educational_attainment == 'elementary_graduate' ? 'selected' : '' }}>Elementary Graduate</option>
                            <option value="highschool_level" {{ $youth->highest_educational_attainment == 'highschool_level' ? 'selected' : '' }}>High School Level</option>
                            <option value="highschool_graduate" {{ $youth->highest_educational_attainment == 'highschool_graduate' ? 'selected' : '' }}>High School Graduate</option>
                            <option value="tech_voc_level" {{ $youth->highest_educational_attainment == 'tech_voc_level' ? 'selected' : '' }}>Tech Voc Level</option>
                            <option value="tech_voc_graduate" {{ $youth->highest_educational_attainment == 'tech_voc_graduate' ? 'selected' : '' }}>Tech Voc Graduate</option>
                            <option value="college_level" {{ $youth->highest_educational_attainment == 'college_level' ? 'selected' : '' }}>College Level</option>
                            <option value="college_graduate" {{ $youth->highest_educational_attainment == 'college_graduate' ? 'selected' : '' }}>College Graduate</option>
                            <option value="masteral_level" {{ $youth->highest_educational_attainment == 'masteral_level' ? 'selected' : '' }}>Masteral Level</option>
                            <option value="masteral_graduate" {{ $youth->highest_educational_attainment == 'masteral_graduate' ? 'selected' : '' }}>Masteral Graduate</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="work_status" class="form-label">Work Status</label>
                        <select class="form-select" id="work_status" name="work_status" required>
                            <option value="" disabled selected>Choose Work Status</option>
                            <option value="employed" {{ $youth->work_status == 'employed' ? 'selected' : '' }}>Employed</option>
                            <option value="unemployed" {{ $youth->work_status == 'unemployed' ? 'selected' : '' }}>Unemployed</option>
                            <option value="student" {{ $youth->work_status == 'student' ? 'selected' : '' }}>Student</option>
                            <option value="working_student" {{ $youth->work_status == 'working_student' ? 'selected' : '' }}>Working Student</option>
                            <option value="looking_for_job" {{ $youth->work_status == 'looking_for_job' ? 'selected' : '' }}>Looking for Job</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="registered_voter" class="form-label">Registered Voter</label>
                        <select class="form-select" id="registered_voter" name="registered_voter" required>
                            <option value="" disabled selected>Choose Option</option>
                            <option value="1" {{ $youth->registered_voter == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $youth->registered_voter == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="voted_last_election" class="form-label">Voted Last Election</label>
                        <select class="form-select" id="voted_last_election" name="voted_last_election" required>
                            <option value="" disabled selected>Choose Option</option>
                            <option value="1" {{ $youth->voted_last_election == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $youth->voted_last_election == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="attended_kk_assembly" class="form-label">Attended KK Assembly</label>
                        <select class="form-select" id="attended_kk_assembly" name="attended_kk_assembly" required onchange="toggleAssemblyCount()">
                            <option value="" disabled selected>Choose Option</option>
                            <option value="1" {{ $youth->attended_kk_assembly == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $youth->attended_kk_assembly == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="col-lg-4" id="attendance_count_section" style="display:{{ $youth->attended_kk_assembly == 1 ? 'block' : 'none' }};">
                        <label for="kk_assembly_count" class="form-label">Total Attended KK Assemblies</label>
                        <input type="number" class="form-control" id="kk_assembly_count" name="kk_assembly_count" value="{{ old('kk_assembly_count', $youth->kk_assembly_count) }}" placeholder="Enter the number of assemblies attended" min="0">
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
