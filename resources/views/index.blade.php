@extends('layout')

@section('content')
    {{-- Background Section with Search Form --}}
    <!-- Search Form Section -->
    <section id="search-section"
        style="background-image: url('{{ asset('images/OKU Timur.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 755px; margin-top: -80px">
        <!-- Overlay -->
        <div
            style="background: radial-gradient(110% 300% at 2% 0%, rgba(0, 39, 106, 0.999) 5%, rgba(0, 0, 0, 0.200) 62%); position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
        </div>

        <!-- Search Form -->
        <div class="container-fluid d-flex flex-column justify-content-center align-items-center"
            style="height: 173%; position: relative;">
            <form class="d-flex justify-content-center" role="search"
                style="height: 40px; width: 50%; position: relative; margin-bottom: 0px;">
                <input class="form-control" type="search" placeholder="Cari informasi disini...." aria-label="Search"
                    style="background-color: white; color: #6c757d; border: none; border-radius: 10px; box-shadow: none; font-size: 18px; padding: 10px 20px; width: 100%;">
                <button class="btn btn-primary" type="submit"
                    style="position: absolute; right: 5px; top: 5px; bottom: 5px; padding: 0 20px; background-color: #213349; border: none; border-radius: 10px;">Cari</button>
            </form>

            <!-- Icon Section -->
            <div class="icon-section d-flex justify-content-center align-items-center" style="width: 70%;">
                <div class="row">
                    <div class="col text-center">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <img src="{{ URL::asset('/images/agent.png') }}" alt="Pelayanan Kependudukan"
                                    class="icon-img">
                                <p class="mt-2">Pelayanan Kependudukan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <img src="{{ URL::asset('/images/public-service.png') }}" alt="Pelayanan Masyarakat"
                                    class="icon-img">
                                <p class="mt-2">Pelayanan Masyarakat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <img src="{{ URL::asset('/images/taxes.png') }}" alt="Pelayanan Pajak" class="icon-img">
                                <p class="mt-2">Pelayanan Pajak</p>
                            </div>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <img src="{{ URL::asset('/images/petition.png') }}" alt="Pengaduan Masyarakat"
                                    class="icon-img">
                                <p class="mt-2">Pengaduan Masyarakat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <img src="{{ URL::asset('/images/calculator.png') }}" alt="Transparansi Anggaran"
                                    class="icon-img">
                                <p class="mt-2">Transparansi Anggaran</p>
                            </div>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <img src="{{ URL::asset('/images/travel-map.png') }}" alt="Destinasi Wisata"
                                    class="icon-img">
                                <p class="mt-2">Destinasi Wisata</p>
                            </div>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <img src="{{ URL::asset('/images/legal-document.png') }}" alt="Produk Hukum"
                                    class="icon-img">
                                <p class="mt-2">Produk Hukum</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    {{-- Pengumuman --}}
    <section id="pengumuman-section"
        style="position: relative; background-image: url('{{ asset('images/cover.png') }}'); 
background-size: auto; background-position: right bottom; background-repeat: no-repeat; 
height: 250px; background-color: #fff; width: 82vw; margin: 0; padding: 0;">
        <!-- Overlay -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(6, 7, 29, 0);">
        </div>

        <!-- Content inside pengumuman-section, if any -->
        <div class="container" style="max-width: 1200px; margin: auto;">
            <div class="row">
                <div class="col">
                    <!-- Your content here -->
                </div>
            </div>
        </div>
    </section>

    {{-- Headline --}}
    <section id="headline" class="py-4" style="margin-left: -20%; margin-right: -20%">
        <div class="container">
            <h2 class="mb-4" style="font-family: 'Roboto', serif; font-size: 23px;">Berita Lainnya</h2>
            <div class="row">
                @foreach ($posts->whereNotNull('headline_id')->sortByDesc('id')->take(6) as $post)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <a href="/post/show/{{ $post->id }}" class="text-decoration-none">
                            <div class="card border-0 shadow-sm">
                                @if (Str::startsWith($post->image, ['http://', 'https://']))
                                    <img src="{{ $post->image }}" class="img-fluid"
                                        style="height: 300px;   object-fit: cover; border-radius: 10px;"
                                        alt="{{ $post->title }}">
                                @else
                                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid"
                                        style="height: 300px; object-fit: cover; border-radius: 10px;"
                                        alt="{{ $post->title }}">
                                @endif
                                <div class="card-body p-3"
                                    style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 0, 0, 0.7); border-radius: 0 0 10px 10px;">
                                    <h5 class="card-title text-white" style="font-size: 16px;">{{ $post->title }}</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-white-50" style="font-size: 12px;">
                                            <i class="bi bi-calendar"></i>
                                            @if ($post->published_at)
                                                Published on {{ $post->published_at->format('d M Y') }}
                                            @endif
                                        </span>
                                        <span class="text-white-50" style="font-size: 12px;">
                                            <i class="bi bi-person"></i> Admin
                                        </span>
                                        <span class="text-white-50" style="font-size: 12px;">
                                            <i class="bi bi-eye"></i> {{ $post->views }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-end">
                <a href="/headlines" class="btn btn-outline-primary">
                    Selengkapnya <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
    {{-- Headline --}}
@endsection