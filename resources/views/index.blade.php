@extends('layout')

@section('content')
    {{-- Background Section with Search Form --}}
    <section id="search-section" style="position: relative; background-image: url('{{ asset('images/okut.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 500px;">
        <!-- Overlay -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(6, 7, 29, 0.045);"></div>

        <!-- Search Form -->
        <div class="container-fluid p-0 m-0 d-flex justify-content-center align-items-center" style="height: 100%; position: relative;">
            <form class="d-flex justify-content-center" role="search" style="width: 50%; z-index: 1; margin-top: 310px; position: relative;">
                <input class="form-control" type="search" placeholder="Cari informasi disini...." aria-label="Search" style="background-color: white; color: #6c757d; border: none; border-radius: 10px; box-shadow: none; font-size: 18px; padding: 10px 20px; width: 100%;">
                <button class="btn btn-primary" type="submit" style="position: absolute; right: 5px; top: 5px; bottom: 5px; padding: 0 20px; background-color: #213349; border: none; border-radius: 10px;">Cari</button>
            </form>
        </div>
    </section>

    {{-- Headline --}}
    <section id="headline" style="width: 100%; margin: 0 auto;"> <!-- Mengatur lebar section headline -->
        <div class="container-fluid py-4"> <!-- Ubah container menjadi container-fluid untuk lebar penuh -->
            <h2 class="text-center mb-5" style="font-family: 'Roboto', serif; font-size: 23px;">Headline OKU Timur</h2> <!-- Judul di bagian atas -->
            <div class="row">
                @foreach ($posts->take(4) as $post) <!-- Menampilkan hanya 4 post -->
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <a href="/post/show/{{ $post->id }}" class="text-decoration-none text-dark">
                            <div class="card bg-white border-0">
                                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded-4 mb-4"
                                    style="height: 150px; width: 100%; object-fit: cover; border-radius: 15px;" alt="{{ $post->title }}">
                                <h3 class="fw-bold mb-3 text-center" style="font-family: 'Georgia', serif; font-size: 16px;"> <!-- Ubah ukuran font di sini -->
                                    {{ $post->title }}
                                </h3>
                                <p class="text-center">Published on {{ $post->created_at->format('d M Y') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Tombol Lihat Headline Lainnya -->
            <div class="d-flex justify-content-center mt-4">
                <a href="/headlines" class="btn btn-dark" style="background-color: #213349; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px;">Lihat Headline Lainnya</a>
            </div>
        </div>
    </section>
    {{-- Headline --}}
@endsection
