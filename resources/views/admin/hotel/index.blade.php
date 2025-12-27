@extends('template.app')
@section('title', 'Hotel')
@section('content')
    <div class="page-heading">
        <h3>Kelola Hotel</h3>
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
                        <h5 class="card-title">DAFTAR Hotel</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <a href="{{ route('admin.hotel.create') }}" class="btn btn-success">Tambah Hotel</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="hotel" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar Hotel</th>
                                <th>Nama Hotel</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotel as $index => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Hotel"
                                                style="width: 100px; height: auto; border-radius: 5px;">
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->nama_hotel ?? '-' }}</td>
                                    <td>{{ $item->alamat ?? '-' }}</td>
                                    <td>{{ $item->kota ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-2"> <!-- Gunakan flex-wrap untuk responsif -->
                                            <a href="{{ route('admin.hotel.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.hotel.destroy', $item->id) }}" method="POST"
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
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            $('#hotel').DataTable({
                responsive: true,
                columnDefs: [{
                    orderable: false,
                    targets: [
                        3
                    ] // Non-aktifkan sorting untuk kolom aksi (indeks 3 karena sekarang ada kolom gambar)
                }],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                }
            });
        });
    </script>
@endpush
