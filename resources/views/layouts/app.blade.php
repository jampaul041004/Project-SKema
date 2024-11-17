<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project SKema</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            background: linear-gradient(to bottom, #ffffff, #f2e1f5, #6a0dad);
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Header Section */
        .header {
            height: 70px; /* Reduced header height by 60% */
            position: relative;
            overflow: hidden;
            z-index: 10;
           
            background-color: #6a0dad;
        }

        .header-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            height: fit-content;
            justify-content: center;
            margin-top: -10px;
            align-items: center;
            gap: 20px;
            padding: 10px 0px;
            z-index: 10;
            background-color: transparent;
        }

        .logo-container img {
            width: 150px; /* Reduced logo size */
            height: auto;
        }

        .nav-buttons {
            display: flex;
            gap: 20px;
        }

        .nav-buttons a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-buttons a:hover {
            background-color: white;
            color: #6a0dad;
        }

        /* Carousel Styling */
        .carousel-container {
            height: 45vh; /* Set carousel height to 45% of the viewport height */
            overflow: hidden; /* Hide the upper part of the images */
        }

        .carousel-inner {
            position: relative;
            overflow: hidden;
        }

        /* Gradient Overlay */
        .carousel-inner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), transparent);
            z-index: 1;
        }

        /* Adjust carousel images to show the bottom part */
        .carousel-image {
            position: relative;
            height: 100%;
            overflow: hidden; /* Hide upper part of the image */
        }

        .carousel-inner img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure the image fills the space */
            object-position: center bottom; /* Shift image to show more of the bottom half */
            transform: translateY(-35%); /* Move the image up to crop the top part */
        }

        /* Footer */
        .footer {
            background-color: #d3d3d3;
            color: #333;
            padding: 20px 0;
            text-align: center;
        }

        .footer a {
            color: #333;
            text-decoration: none;
            margin: 0 15px;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Navigation and Logo (Header) -->
    <div class="header">
        <div class="header-container">
            <div class="nav-buttons">
                <a href="{{ url('/') }}" style="margin-left: 90px; margin-right: 50px">Home</a>
                <a href="{{ route('database') }}">KK Database</a>
            </div>
            <div class="logo-container">
                <img src="{{ asset('images/SK LOGO.png') }}" style="width: 120px" alt="Project SKema Logo">
            </div>
            <div class="nav-buttons">
                <a href="{{ route('create') }}">Profiling Form</a>
                <a href="{{ route('youths.report_pdf') }}">Reports and Logs</a>
            </div>
        </div>
    </div>

    <!-- Carousel Section (Below Header) -->
    @if(!isset($noCarousel) || !$noCarousel)
    <header class="carousel-container">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-image">
                        <img src="{{ asset('images/received_1194358368276821.jpeg') }}" alt="Image 1">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-image">
                        <img src="{{ asset('images/received_284875647938045.jpeg') }}" alt="Image 2">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-image">
                        <img src="{{ asset('images/received_465349712988724.jpeg') }}" alt="Image 3">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-image">
                        <img src="{{ asset('images/received_1151750706070694.jpeg') }}" alt="Image 4">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-image">
                        <img src="{{ asset('images/received_881162606884723.jpeg') }}" alt="Image 5">
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>
    @endif

    <!-- Main Content -->
    <div class="container my-5 content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Project SKema | All Rights Reserved</p>
        <div>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
            <a href="#">Help</a>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>




        <!-- AJAX Scripts -->
        <script>
            // Ensure CSRF token is included in AJAX headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            // Redirect to Edit Page
            function editYouth(id) {
                window.location.href = `/youths/${id}/edit`; // Adjust route as needed
            }
        </script>