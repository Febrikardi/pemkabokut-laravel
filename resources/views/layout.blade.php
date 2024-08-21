<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laravel 10 Summernote Text Editor with Image Upload CRUD')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            border-bottom: 4px solid #cfec4a;
            background-color: #213349;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: backdrop-filter 0.3s ease, background-color 0.3s ease, height 0.3s ease;
            height: 170px;
        }

        .navbar.blur {
            backdrop-filter: blur(10px);
            background-color: rgba(33, 51, 73, 0.832);
            height: 100px;
        }

        #search-section {
            width: 100vw;
            margin-left: calc(-50vw + 50%);
            margin-right: calc(-50vw + 50%);
        }

        .navbar .dropdown-toggle::after {
            display: none;
        }

        .navbar-nav {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg shadow py-3">
        <div class="container col-xxl-12 d-flex justify-content-between">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="https://okutimurkab.go.id/wp-content/themes/okutimurkab/images/logo_horisontal.png" height="71" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ url('/') }}">Beranda</a>
                    </li>
                    @foreach ($categories as $category)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $category->title }}
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($category->posts as $post)
                                    <li><a class="dropdown-item" href="{{ url('/post/show/' . $post->id) }}">{{ $post->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ url('/post/data') }}">Post Data</a></li>
                        <li><a class="dropdown-item" href="{{ url('/category/data') }}">Category Data</a></li>
                        <li><a class="dropdown-item" href="{{ url('/headline/data') }}">Headline Data</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    {{-- Navbar --}}
    <div class="container col-xxl-8 py-1">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 0) {
                navbar.classList.add('blur');
            } else {
                navbar.classList.remove('blur');
            }
        });
    </script>
</body>

</html>
