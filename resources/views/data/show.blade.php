@extends('layout')

@section('title', $data->category->title)

@section('content')
    <section id="judul-section" style="position: relative; background-image: url('{{ asset('images/backgroundb.png') }}'); background-size: 1625px 225px; background-repeat: no-repeat; background-position: center 43%; padding-top: 150px; width: 154%; margin-left: -27%; margin-top: 120px;">
        <div id="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
        <div class="container" style="position: relative; z-index: 1; top: -100px; margin-left: 10%">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0" style="font-family: 'Roboto', sans-serif; font-weight: bold;">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-white">Beranda</a>
                        <span class="text-white mx-2">></span>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">{{ $data->category->title }}</li>
                </ol>
            </nav>
            <h2 class="text-white" style="font-family: 'Roboto', sans-serif; font-weight: bold;">{{ $data->title }}</h2>
        </div>
    </section>

    <section style="padding-top: 0px; width: 120%; margin-left: -10%; font-family: 'Roboto', sans-serif;">
        <div class="card bg-black text-white p-4 shadow rounded-4 border-0">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 id="selectedDocumentTitle">{{ $data->document->first()->title }}</h4>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="documentDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Dokumen
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="documentDropdown">
                        @foreach ($data->document as $document)
                            <li><a class="dropdown-item" href="#document-{{ $document->id }}">{{ $document->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-white">
                    @foreach ($data->document as $document)
                        <tbody id="document-{{ $document->id }}" class="document-section" style="display: none;">
                            <tr>
                                <td colspan="5" class="fw-bold bg-secondary text-white">{{ $document->title }}</td>
                            </tr>
                            <tr>
                                <th>No.</th>
                                <th>Tahun</th>
                                <th>Judul</th>
                                <th>Tanggal Upload</th>
                                <th>#</th>
                            </tr>
                            @foreach ($document->file as $file)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($file->file_date)->format('Y') }}</td>
                                    <td>{{ $file->title }}</td>
                                    <td>{{ \Carbon\Carbon::parse($file->file_date)->format('d F Y') }}</td>
                                    <td><a href="{{ route('file.download', $file->id) }}" class="btn btn-success">Download</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownItems = document.querySelectorAll('.dropdown-item');
            const selectedDocumentTitle = document.getElementById('selectedDocumentTitle');
            const firstDocumentId = '{{ $data->document->first()->id }}';

            // Show the first document section by default
            document.getElementById('document-' + firstDocumentId).style.display = 'table-row-group';

            dropdownItems.forEach(item => {
                item.addEventListener('click', function (event) {
                    event.preventDefault();
                    // Hide all document sections
                    document.querySelectorAll('.document-section').forEach(section => {
                        section.style.display = 'none';
                    });
                    // Show the selected document section
                    const targetId = this.getAttribute('href').substring(1);
                    document.getElementById(targetId).style.display = 'table-row-group';

                    // Update the selected document title
                    selectedDocumentTitle.textContent = this.textContent;
                });
            });
        });
    </script>
@endsection
