@extends('template.app')
@section('title', isset($kamar) ? 'Edit Kamar' : 'Tambah Kamar')
@section('content')
    <div class="page-heading mb-4">
        <h3>{{ isset($kamar) ? 'Edit' : 'Tambah' }} Kamar</h3>
    </div>

    <div class="page-content">
        {{-- Error Handling --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('message'))
            <div class="alert alert-{{ session('message_type') ?? 'danger' }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Form Card --}}
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Form {{ isset($kamar) ? 'Edit' : 'Tambah' }} Kamar</h5>
            </div>

            <div class="card-body">
                <form method="POST"
                    action="{{ isset($kamar) ? route('admin.kamar.update', $kamar->id) : route('admin.kamar.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($kamar))
                        @method('PUT')
                    @endif

                    <div class="mb-3 row">
                        <label for="id_hotel" class="col-sm-2 col-form-label">Hotel</label>
                        <div class="col-sm-10">
                            <select name="id_hotel" id="id_hotel"
                                class="form-control @error('id_hotel') is-invalid @enderror" required>
                                <option value="">Pilih Hotel</option>
                                @foreach ($hotels as $hotel)
                                    <option value="{{ $hotel->id }}"
                                        {{ old('id_hotel', isset($kamar) ? $kamar->id_hotel : '') == $hotel->id ? 'selected' : '' }}>
                                        {{ $hotel->nama_hotel }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_hotel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_kamar" class="col-sm-2 col-form-label">Nama Kamar</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_kamar" id="nama_kamar"
                                class="form-control @error('nama_kamar') is-invalid @enderror"
                                value="{{ old('nama_kamar', isset($kamar) ? $kamar->nama_kamar : '') }}"
                                placeholder="Nama Kamar" required>
                            @error('nama_kamar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga Kamar</label>
                        <div class="col-sm-10">
                            <input type="text" name="harga" id="harga"
                                class="form-control @error('harga') is-invalid @enderror"
                                value="{{ old('harga', isset($kamar) ? number_format($kamar->harga, 0, ',', '.') : '') }}"
                                placeholder="Harga Kamar" required>
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                placeholder="Deskripsi Kamar">{{ old('description', isset($kamar) ? $kamar->description : '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="fitur_kamar" class="col-sm-2 col-form-label">Fitur Kamar</label>
                        <div class="col-sm-10">
                            <textarea name="fitur_kamar" id="fitur_kamar" class="form-control @error('fitur_kamar') is-invalid @enderror"
                                placeholder="Fitur-fitur kamar (pisahkan dengan koma)">{{ old('fitur_kamar', isset($kamar) ? $kamar->fitur_kamar : '') }}</textarea>
                            @error('fitur_kamar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="gambar_kamar" class="col-sm-2 col-form-label">Gambar Kamar</label>
                        <div class="col-sm-10">
                            <input type="file" name="gambar_kamar" id="gambar_kamar"
                                class="form-control @error('gambar_kamar') is-invalid @enderror">
                            @error('gambar_kamar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @if (isset($kamar) && $kamar->gambar_kamar)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $kamar->gambar_kamar) }}" width="150">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.kamar.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hargaInput = document.getElementById('harga');

            hargaInput.addEventListener('keyup', function(e) {
                let value = this.value.replace(/[^0-9]/g, '');

                if (value) {
                    value = parseInt(value, 10);
                    this.value = value.toLocaleString('id-ID');
                } else {
                    this.value = '';
                }
            });

            const form = document.querySelector('form');
            form.addEventListener('submit', function() {
                if (hargaInput.value) {
                    hargaInput.value = hargaInput.value.replace(/[^0-9]/g, '');
                }
            });
        });
    </script>
@endpush
