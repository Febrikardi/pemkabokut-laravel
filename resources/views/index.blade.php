@extends('layout')

@section('content')
    {{-- Background Section with Search Form --}}
    <section id="search-section"
        style="position: relative; background-image: url('{{ asset('images/OKU Timur.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 500px;">
        <!-- Overlay -->
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(6, 7, 29, 0.045);">
        </div>

        <!-- Search Form -->
        <div class="container-fluid p-0 m-0 d-flex justify-content-center align-items-center"
            style="height: 100%; position: relative;">
            <form class="d-flex justify-content-center" role="search"
                style="width: 50%; z-index: 1; margin-top: 420px; position: relative;">
                <input class="form-control" type="search" placeholder="Cari informasi disini...." aria-label="Search"
                    style="background-color: white; color: #6c757d; border: none; border-radius: 10px; box-shadow: none; font-size: 18px; padding: 10px 20px; width: 100%;">
                <button class="btn btn-primary" type="submit"
                    style="position: absolute; right: 5px; top: 5px; bottom: 5px; padding: 0 20px; background-color: #213349; border: none; border-radius: 10px;">Cari</button>
            </form>
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
    <section id="headline" style="width: 120%; margin-left: -10%;">
        <div class="container-fluid py-4">
            <h2 class="text-center mb-5" style="font-family: 'Roboto', serif; font-size: 23px;">Headline OKU Timur</h2>
            <div class="row">
                @foreach ($posts->whereNotNull('headline_id')->sortByDesc('id')->take(4) as $post)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <a href="/post/show/{{ $post->id }}" class="text-decoration-none text-dark">
                            <div class="card bg-white border-0">
                                <img src="{{ $post->image }}" class="img-fluid rounded-4 mb-4"
                                    style="height: 170px; width: 100%;  border-radius: 15px;" alt="{{ $post->title }}">
                                <h3 class="fw-bold mb-3 text-center"
                                    style="font-family: 'Georgia', serif; font-size: 17px;">
                                    {{ $post->title }}
                                </h3>
                                <p style="font-family: 'Arial', sans-serif; font-size: 15px; font-weight: normal; text-align: center;">
                                    {{ substr(strip_tags(html_entity_decode($post->description)), 0, 200) }}...
                                </p>  
                                

                                <p class="text-center">Published on {{ $post->created_at->format('d M Y') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a href="/headlines" class="btn btn-dark"
                    style="background-color: #213349; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px;">Lihat
                    Headline Lainnya</a>
            </div>
        </div>
    </section>
    {{-- Headline --}}
@endsection
