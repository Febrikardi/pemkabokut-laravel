@extends('layout')

@section('title', 'Data Headlines')

@section('content')
    <div class="card bg-white p-4 shadow rounded-4 border-0">
        <div class="d-flex justify-content-between mb-4">
            <div>
                <h4>Data Headlines</h4>
            </div>
            <div>
                <a href="{{ route('headline.create') }}" class="btn btn-primary">Add new Headline</a>
            </div>
        </div>

        {{-- Pesan Sukses di Simpan dan di Update --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Informasi</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- Pesan Sukses di Simpan dan di Update --}}

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($headlines as $headline)
                        <tr>
                            <td>{{ $headline->id }}</td>
                            <td>{{ $headline->title }}</td>
                            <td>{{ $headline->created_at->format('d M Y, H:i') }}</td>
                            <td>{{ $headline->updated_at->format('d M Y, H:i') }}</td>
                            <td>
                                <a href="{{ route('headline.edit', $headline->id) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('headline.destroy', $headline->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this headline?')">
                                        Delete
                                    </button>
                                </form>                                      
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
