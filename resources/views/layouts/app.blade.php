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
            height: 350px; /* Reduced height by 20% */
            position: relative;
            overflow: hidden;
        }

    /* General Carousel Styling */
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

    /* Adjust the carousel image and move upwards */
    .carousel-image {
        position: relative;
        transform: translateY(-45%); /* Move image up by 45% */
    }
        /* Specific Adjustment for Carousel Item 1 and 4 */
    .carousel-inner .carousel-item:nth-child(1) .carousel-image,
    .carousel-inner .carousel-item:nth-child(4) .carousel-image {
        transform: translateY(-35%); /* Move 1st and 4th images down by 18% */
    }

    .carousel-inner img {
        width: 100%;
        height: 120%;
        object-fit: cover; /* Ensure the image covers the container */
    }

    /* Ensure images have proper position and gradient is visible */
    .carousel-inner .carousel-item img {
        object-position: center; /* Center image */
    }
        /* Navigation and Logo Overlay */
        .header-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            padding: 15px 0;
            z-index: 10;
            background-color: transparent; /* Default transparent or overridden */
        }

        .logo-container img {
            width: 150px;
            height: auto;
        }

        .nav-buttons {
            display: flex;
            gap: 20px;
        }

        .nav-buttons a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            padding: 8px 12px;
            background-color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-buttons a:hover {
            background-color: #6a0dad;
            color: white;
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
    <!-- Header Section -->
    @if(!isset($noCarousel) || !$noCarousel)
    <header class="header">
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

    <!-- Navigation and Logo -->
    <div class="header-container">
        <div class="nav-buttons">
            <a href="{{ url('/') }}" style="margin-left: 90px; margin-right: 50px">Home</a>
            <a href="{{ route('database') }}">KK Database</a>
        </div>
        <div class="logo-container">
            <img src="{{ asset('images/SK LOGO.png') }}" style=" width: 210px" alt="Project SKema Logo">
        </div>
        <div class="nav-buttons">
            <a href="{{ route('create') }}">Profiling Form</a>
            <a href="#">Reports and Logs</a>
        </div>
    </div>

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
