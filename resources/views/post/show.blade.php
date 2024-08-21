@extends('layout')

@section('content')
    {{-- Detail Post --}}
    <section id="detail">
        <div class="container col-xxl-12 d-flex justify-content-center py-5">

            <div class="card bg-white col-xxl-10 text-left border-0">
                <p class="mb-4">
                    <a href="/" class="text-decoration-none text-dark">Beranda</a> /
                    <a href="/category/{{ $post->category->id }}" class="text-decoration-none text-dark">{{ $post->category->title }}</a> /
                    {{ $post->title }}
                </p>

                <h3 class="fw-bold mb-3">{{ $post->title }}</h3>
                <p class="mb-3">Published on {{ $post->created_at->format('d M Y') }}</p>

                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded-4 mb-3" alt="{{ $post->title }}">
                @else
                    <p>No Image Available</p>
                @endif

                <div class="mt-4">
                    {!! $post->description !!}
                </div>
            </div>

        </div>
    </section>
    {{-- Detail Post --}}
@endsection
