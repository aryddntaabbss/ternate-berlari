@extends('backend.layouts.main', ['title' => 'Dashboard'])
@section('main')
    <div class="pagetitle">
        <h1>Peserta</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Peserta</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body table-responsive">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <!-- Judul di sebelah kiri -->
                            <h5 class="card-title">Data Peserta</h5>

                            <!-- Tombol di sebelah kanan -->
                            <a href="{{ route('export.peserta') }}" class="btn btn-outline-success">
                                <i class="bi bi-file-earmark-excel-fill"></i> Export Excel
                            </a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>No Tlp</th>
                                    <th>Riwayat Penyakit</th>
                                    <th>Kategori Road Race</th>
                                    <th>Size Jersey</th>
                                    <th>Bukti Bayar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_peserta as $peserta)
                                    <!-- Looping data dari controller -->
                                    <tr>
                                        <td>{{ $peserta->nama_lengkap }}</td>
                                        <td>{{ $peserta->no_tlp }}</td>
                                        <td>{{ $peserta->riwayat_penyakit }}</td>
                                        <td>{{ $peserta->roadRace->nama }} Km</td>
                                        {{-- @if ($peserta->kategori->id != 1)
                                            <td>{{ $peserta->kategori->name }}</td>
                                        @else
                                            <td>-</td>
                                        @endif --}}
                                        <td>{{ $peserta->size_jersey }}</td>
                                        <td><a class="btn btn-secondary"
                                                href="{{ asset('storage/' . $peserta->bukti_bayar) }}" target="_blank">Lihat
                                                Bukti</a></td>
                                        <td>
                                            <a href="javascript:void(0)"
                                                class="btn {{ $peserta->status == 'terverifikasi' ? 'btn-success' : 'btn-danger' }} text-light"
                                                onclick="confirmStatusChange({{ $peserta->id }}, '{{ $peserta->status }}')">
                                                {{ $peserta->status }}
                                            </a>
                                        </td>



                                        {{-- <td><a class="btn btn-secondary"
                                                href="{{ asset('storage/' . $peserta->bukti_bayar) }}"
                                target="_blank">Lihat
                                Bukti</a></td> --}}
                                        <td>
                                            <div class="d-flex flex-column flex-md-row">
                                                <!-- Tombol Detail -->
                                                <a href="{{ route('peserta.show', $peserta->id) }}"
                                                    class="btn btn-primary btn-sm ms-1 mb-2 mb-md-0 mr-md-2"><i
                                                        class="bi bi-eye"></i></a>

                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('peserta.destroy', $peserta->id) }}" method="POST"
                                                    style="display:inline-block;" id="delete-form-{{ $peserta->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger ms-1 btn-sm"
                                                        onclick="confirmDelete({{ $peserta->id }})"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('js')
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function confirmStatusChange(pesertaId, currentStatus) {
            let newStatus = currentStatus === 'terverifikasi' ? 'tidak terverifikasi' : 'terverifikasi';
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: `Anda akan mengubah status menjadi ${newStatus}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Ubah!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim AJAX untuk mengubah status
                    changeStatus(pesertaId, newStatus);
                }
            })
        }

        function changeStatus(pesertaId, newStatus) {
            $.ajax({
                url: `/dashboard/data-peserta/${pesertaId}/update-status`, // Pastikan route sesuai
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token
                    status: newStatus
                },
                success: function(response) {
                    // Tidak ada SweetAlert, langsung reload halaman untuk menampilkan status terbaru
                    location.reload();
                },
                error: function(xhr) {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat mengubah status.',
                        'error'
                    );
                }
            });
        }
    </script>
@endsection
