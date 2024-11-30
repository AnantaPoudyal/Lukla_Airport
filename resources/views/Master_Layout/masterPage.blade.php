<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lukla Airport</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"> --}}
    <link rel="stylesheet" href="tailwind.config.js">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #007bff;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand .logo {
            height: 50px;
            border: none;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-size: 16px;
            margin-left: 20px;
            padding: 8px 15px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ffd700 !important;
            background-color: #0056b3;
            border-radius: 5px;
            text-decoration: none;
        }

        .navbar-toggler-icon {
            background-color: white;
        }

        .navbar-nav .nav-link:active {
            color: #ffd700 !important;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .navbar-nav .nav-link {
                font-size: 14px;
                margin-left: 15px;
                padding: 10px;
            }

            .navbar-brand .logo {
                height: 40px;
            }
        }

        /* Time Display */
        #time_p {
            /* display: block; */
            color: red;
            font-size: 17px;
            margin-bottom: 0px;
            padding: 2px;
            background-color: lightblue;
            text-align: right;
            font-weight: bold;
        }

        /* Footer Styling */
        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 15px;
            position: ;
            width: 100%;
            bottom: 0;
        }

        /* About Section Styling */
        .about-container {
            background: #fff;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .about-section {
            background: #f4f4f4;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .about-section:hover {
            transform: translateY(-5px);
        }

        .about-title {
            font-size: 2.5rem;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .about-detail {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #555;
            text-align: justify;
        }

        .about-detail p {
            margin-bottom: 15px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }


        .emp-card {
            width: 18rem;
            /* Set all cards to the same width */
        }


        #marquee-container {
        overflow: hidden;
        white-space: nowrap;
        width: 100%;
        border: 1px solid #ccc;
        background: #f9f9f9;
        position: relative;
        height: 50px; /* Adjust based on your content size */
    }

    /* Sliding content */
    #marquee-content {
        display: inline-block;
        white-space: nowrap;
        animation: slide 10s linear infinite;
    }

    .news-item {
        display: inline-block;
        margin-right: 50px; /* Space between items */
    }

    /* Animation */
    @keyframes slide {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
    </style>
</head>

<body>
    <!-- NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <img src="{{ asset('images/CAANLOGO.jpg') }}" alt="Logo" class="logo">

                {{ $nav_title }}

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @foreach ($navLinks as $key => $val)
                        @if ($key == 'About')
                        <li class="nav-item dropdown">
                            {{-- <pre>{{print_r()}}</pre> --}}
                            <a class="nav-link dropdown-toggle" href="{{$val["About Us"]}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $key }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($val as $temp => $datakey)
                                    <li><a class="dropdown-item" href="{{ $datakey }}">{{ $temp }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @else

                        <li class="nav-item">
                            <a class="nav-link" href="{{ $val }}">{{ $key }}</a>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
    {{-- <pre>{{ print_r($navLinks) }}</pre> --}}
    <!-- TIME DISPLAY -->

    {{-- new slider --}}
    <div id="time_display_div">
        <div id="marquee-container">
            <div id="marquee-content">
                @foreach ($newsData as $newsKey)
                    <span class="news-item"> <a href="{{ $newsKey->news_link }}" target="_blank">{{ $newsKey->news_title }}</a></span>
                @endforeach
            </div>
        </div>
        <p id="time_p">

        </p>
    </div>

{{-- <pre>{{print_r()}} --}}
{{-- </pre> --}}
    <!-- MAIN CONTENT -->
    @yield('content')
    @yield('Flight-content')

    <!-- FOOTER -->
    <footer>
        &copy; {{ date('Y') }} Lukla Airport. All rights reserved.
    </footer>

    <script src="{{ asset('js/time.js') }}"></script>
    <script src="{{ asset('js/newsSlider.js') }}"></script>
    <!-- Bootstrap JS and Popper.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>
