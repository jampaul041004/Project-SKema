@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="my-4">Dashboard</h1>
        <a href="{{ route('database') }}" class="btn btn-secondary">View Database</a>
    </div>

    <!-- Youth Statistics Section -->
    <div class="row mb-4">
        <!-- Total Youth -->
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Youth</div>
                <div class="card-body">
                    <h2 class="card-title">{{ $totalYouth }}</h2>
                </div>
            </div>
        </div>

        <!-- Registered Voters -->
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Registered Voters</div>
                <div class="card-body">
                    <h2 class="card-title">{{ $registeredVoters }}</h2>
                </div>
            </div>
        </div>

        <!-- Voted Last Election -->
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Voted Last Election</div>
                <div class="card-body">
                    <h2 class="card-title">{{ $votedLastElection }}</h2>
                </div>
            </div>
        </div>

        <!-- Assembly Attendees -->
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Assembly Attendees</div>
                <div class="card-body">
                    <h2 class="card-title">{{ $assemblyAttendees }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <h3>Charts and Data Visualizations</h3>
    <div class="row">
        <!-- Sex Distribution -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">Sex Distribution</div>
                <div class="card-body">
                    <canvas id="sexChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Sitio Distribution -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">Sitio Distribution</div>
                <div class="card-body">
                    <canvas id="sitioChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Civil Status Distribution -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">Civil Status Distribution</div>
                <div class="card-body">
                    <canvas id="civilStatusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Youth Classification Distribution -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">Youth Classification</div>
                <div class="card-body">
                    <canvas id="youthClassificationChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Youth Age Group Distribution -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">Youth Age Group</div>
                <div class="card-body">
                    <canvas id="ageGroupChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Highest Educational Attainment Distribution Section -->
    <div class="card mt-4">
        <div class="card-header">
            <h5>Highest Educational Attainment Distribution</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Highest Educational Attainment</th>
                        <th>Total Youth</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($educationAttainmentDistribution as $education)
                        <tr>
                            <td>{{ ucfirst(str_replace('_', ' ', $education->highest_educational_attainment)) }}</td>
                            <td>{{ $education->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const colors = ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'];

    const generateChart = (ctx, type, labels, data, options = {}) => {
        new Chart(ctx, {
            type,
            data: {
                labels,
                datasets: [{
                    data,
                    backgroundColor: colors,
                }]
            },
            options: {
                responsive: true,
                ...options
            }
        });
    };

    // Chart Data
    generateChart(document.getElementById('sexChart').getContext('2d'), 'pie',
        @json($sexDistribution).map(item => item.sex),
        @json($sexDistribution).map(item => item.total)
    );

    generateChart(document.getElementById('sitioChart').getContext('2d'), 'bar',
        @json($sitioDistribution).map(item => item.sitio),
        @json($sitioDistribution).map(item => item.total)
    );

    generateChart(document.getElementById('civilStatusChart').getContext('2d'), 'doughnut',
        @json($civilStatusDistribution).map(item => item.civil_status),
        @json($civilStatusDistribution).map(item => item.total)
    );

    generateChart(document.getElementById('youthClassificationChart').getContext('2d'), 'bar',
        @json($youthClassificationDistribution).map(item => item.youth_classification),
        @json($youthClassificationDistribution).map(item => item.total)
    );

    generateChart(document.getElementById('ageGroupChart').getContext('2d'), 'pie',
        @json($ageGroupDistribution).map(item => item.youth_age_group),
        @json($ageGroupDistribution).map(item => item.total)
    );
</script>
@endsection
