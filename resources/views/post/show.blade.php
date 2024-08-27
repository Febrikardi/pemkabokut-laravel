@extends('layout')

@section('content')
    {{-- Detail Post --}}
    <section id="detail">
        <style>
            .container-fluid {
                padding-left: 0;
                padding-right: 0;
            }

            .col-md-15 {
                margin-left: -220px;
                margin-right: 50px;
            }
        </style>
        <div class="container-fluid col-xxl-12 py-3">
            <div class="row">
                <div class="col-md-15">
                    <div class="card bg-white text-left border-0">
                        <p class="mb-4">
                            <a href="/" class="text-decoration-none text-dark">Beranda</a> /
                            @if ($post->category)
                                <a href="/category/{{ $post->category->id }}"
                                    class="text-decoration-none text-dark">{{ $post->category->title }}</a> /
                            @endif
                            @if ($post->headline)
                                <a href="/headline/{{ $post->headline->id }}"
                                    class="text-decoration-none text-dark">{{ $post->headline->title }}</a> /
                            @endif
                            {{ $post->title }}
                        </p>

                        <h3 class="fw-bold mb-3">{{ $post->title }}</h3>
                        <p class="mb-3">Published on {{ $post->created_at->format('d M Y') }}</p>
                        <div class="mt-4">
                            {!! $post->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Detail Post --}}
@endsection
