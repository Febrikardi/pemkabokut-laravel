<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Portal Resmi Pemerintah Kabupaten Ogan Komering Ulu Timur')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    {{-- Navbar --}}
    <nav class="{{ request()->is('/') ? 'navbar-index' : 'navbar-default' }} navbar navbar-expand-lg shadow py-4">
        <div class="container col-xxl-12 d-flex justify-content-between">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="https://okutimurkab.go.id/wp-content/themes/okutimurkab/images/logo_horisontal.png"
                    height="73" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ url('/') }}">Beranda</a>
                    </li>
                    @foreach ($categories as $category)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white ease-in-out transition-transform duration-300"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $category->title }}
                                <i class="bi bi-chevron-down transform transition-transform duration-300"></i>
                            </a>
                            <ul class="dropdown-menu">
                                @if ($category->id == 6 || $category->id == 7)
                                    @foreach ($category->data as $dataItem)
                                        <li><a class="dropdown-item"
                                                href="{{ url('/data/show/' . $dataItem->id) }}">{{ $dataItem->title }}</a>
                                        </li>
                                    @endforeach
                                @elseif ($category->id == 8)
                                    @if ($category->headlines)
                                        @foreach ($category->headlines as $headline)
                                            <li><a class="dropdown-item"
                                                    href="{{ url('/headline/show/' . $headline->id) }}">{{ $headline->title }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @foreach ($category->posts as $post)
                                        <li><a class="dropdown-item"
                                                href="{{ url('/post/show/' . $post->id) }}">{{ $post->title }}</a>
                                        </li>
                                    @endforeach
                                @else
                                    @foreach ($category->posts as $post)
                                        <li><a class="dropdown-item"
                                                href="{{ url('/post/show/' . $post->id) }}">{{ $post->title }}</a>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </li>
                    @endforeach
                </ul>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ url('/post/data') }}">Post Data</a></li>
                        <li><a class="dropdown-item" href="{{ url('/category/data') }}">Category Data</a></li>
                        <li><a class="dropdown-item" href="{{ url('/headline/data') }}">Headline Data</a></li>
                        <li><a class="dropdown-item" href="{{ url('/data/index') }}">Add Data</a></li>
                        <li><a class="dropdown-item" href="{{ url('/document/data') }}">Document Data</a></li>
                        <li><a class="dropdown-item" href="{{ url('/file/data') }}">File Data</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    {{-- Navbar --}}
    <div class="container col-xxl-8 py-0">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/layout.js') }}"></script>

</body>

</html>
