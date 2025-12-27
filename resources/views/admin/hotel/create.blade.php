@extends('template.app') /*Menggunakan layout 
template.app sebagai dasar tampilan (biasanya 
ada navbar, sidebar, dsb). */

@section('title', isset($hotel) ? 'Edit Hotel' : 'Tambah Hotel')// Menggunakan layout template.app sebagai dasar tampilan (biasanya ada navbar, sidebar, dsb).
@section('content')
    <div class="page-heading mb-4">
        <h3>{{ isset($hotel) ? 'Edit' : 'Tambah' }} Hotel</h3>
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
                <h5 class="card-title mb-0">Form {{ isset($hotel) ? 'Edit' : 'Tambah' }} Hotel</h5>
            </div>

            <div class="card-body">
                <form method="POST"
                    action="{{ isset($hotel) ? route('admin.hotel.update', $hotel->id) : route('admin.hotel.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($hotel))
                        @method('PUT')
                    @endif

                    <div class="mb-3 row">
                        <label for="nama_hotel" class="col-sm-2 col-form-label">Nama Hotel</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_hotel" id="nama_hotel"
                                class="form-control @error('nama_hotel') is-invalid @enderror"
                                value="{{ old('nama_hotel', isset($hotel) ? $hotel->nama_hotel : '') }}"
                                placeholder="Nama Hotel" required>
                            @error('nama_hotel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                placeholder="Alamat Hotel" required>{{ old('alamat', isset($hotel) ? $hotel->alamat : '') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                        <div class="col-sm-10">
                            <input type="text" name="kota" id="kota"
                                class="form-control @error('kota') is-invalid @enderror"
                                value="{{ old('kota', isset($hotel) ? $hotel->kota : '') }}" placeholder="Kota" required>
                            @error('kota')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="fitur_hotel" class="col-sm-2 col-form-label">Fitur Hotel</label>
                        <div class="col-sm-10">
                            <textarea name="fitur_hotel" id="fitur_hotel" class="form-control @error('fitur_hotel') is-invalid @enderror"
                                placeholder="Fitur-fitur Hotel (pisahkan dengan koma)">{{ old('fitur_hotel', isset($hotel) ? $hotel->fitur_hotel : '') }}</textarea>
                            @error('fitur_hotel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Deskripsi Hotel">{{ old('deskripsi', isset($hotel) ? $hotel->description : '') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar Hotel</label>
                        <div class="col-sm-10">
                            <input type="file" name="gambar" id="gambar"
                                class="form-control @error('gambar') is-invalid @enderror">
                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @if (isset($hotel) && $hotel->gambar)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $hotel->gambar) }}" width="150">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.hotel.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
