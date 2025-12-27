@extends('template.app')
@section('title', 'Manage Bookings')
@section('content')
    <div class="page-heading">
        <h3>Kelola Booking</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Booking</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Check-in</th>
                                    <th>Check-out</th>
                                    <th>Jumlah Tamu</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Status</th>
                                    <th>Total Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->user->name ?? 'N/A' }}</td>
                                        <td>{{ $booking->check_in }}</td>
                                        <td>{{ $booking->check_out }}</td>
                                        <td>{{ $booking->jumlah_tamu }}</td>
                                        <td>{{ $booking->metode_pembayaran }}</td>
                                            <td>
                                            <span class="badge bg-success">Sudah Bayar</span>
                                            </td>

                                        <td>Rp {{ number_format($booking->total_price, 2, ',', '.') }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" class="me-2">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="dikonfirmasi" {{ $booking->status == 'dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
                                                        <option value="selesai" {{ $booking->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                    </select>
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
        </section>
    </div>
@endsection
