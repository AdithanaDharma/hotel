@extends('template.app')
@section('title', 'Kamar')
@section('content')
    <div class="page-heading">
        <h3>Kelola Kamar</h3>
    </div>
    <div class="page-content">
        @if (session('message'))
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="card-title">DAFTAR Kamar</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <a href="{{ route('admin.kamar.create') }}" class="btn btn-success">Tambah Kamar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="Kamar" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar Kamar</th>
                                <th>Nama Hotel</th>
                                <th>Nama Kamar</th>
                                <th style="min-width: 100px;">Aksi</th> <!-- Tambahkan min-width untuk kolom aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kamars as $index => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($item->gambar_kamar)
                                            <img src="{{ asset('storage/' . $item->gambar_kamar) }}" alt="Gambar Kamar"
                                                style="width: 100px; height: auto; border-radius: 5px;">
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->nama_hotel ?? '-' }}</td>
                                    <td>{{ $item->nama_kamar ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-2"> <!-- Gunakan flex-wrap untuk responsif -->
                                            <a href="{{ route('admin.kamar.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.kamar.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus hotel ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .badge {
            font-size: 0.85em;
            padding: 0.35em 0.65em;
        }

        /* Tambahan style untuk gambar */
        .table img {
            max-width: 100px;
            height: auto;
            object-fit: cover;
        }

        /* Style untuk tombol aksi */
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }

        /* Style untuk tampilan mobile */
        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            #Kamar {
                width: 100% !important;
            }

            .btn-sm {
                padding: 0.2rem 0.4rem;
                font-size: 0.7rem;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            $('#Kamar').DataTable({ // Perbaikan: ganti '#hotel' menjadi '#Kamar' sesuai ID tabel
                responsive: true,
                columnDefs: [{
                    orderable: false,
                    targets: [
                        4
                    ] // Kolom aksi sekarang di indeks 4 (setelah penambahan kolom gambar)
                }],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                },
                autoWidth: false, // Tambahkan ini untuk kontrol lebar kolom yang lebih baik
                scrollX: true // Aktifkan scroll horizontal jika diperlukan
            });
        });
    </script>
@endpush
