@extends('backend.layouts.main', ['title' => 'Dashboard'])
@section('main')
    <div class="pagetitle">
        <h1>Detail Peserta</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Peserta</li>
                <li class="breadcrumb-item active">Detail Peserta {{ $peserta->nama_lengkap }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        {{-- <h5 class="card-title">Datatables</h5> --}}
                        <table class="table">
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>{{ $peserta->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td>{{ $peserta->nik }}</td>
                            </tr>
                            <tr>
                                <th>Golongan Darah</th>
                                <td>{{ $peserta->golongan_darah }}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>{{ $peserta->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <th>No Telepon</th>
                                <td>{{ $peserta->no_tlp }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $peserta->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Komunitas</th>
                                <td>{{ $peserta->komunitas }}</td>
                            </tr>
                            <tr>
                                <th>Riwayat Penyakit</th>
                                <td>{{ $peserta->riwayat_penyakit }}</td>
                            </tr>
                            <tr>
                                <th>Kontak Darurat</th>
                                <td>{{ $peserta->kontak_darurat }}</td>
                            </tr>
                            <tr>
                                <th>Kategori Usia</th>
                                @if ($peserta->kategori->id != 1)
                                    <td>{{ $peserta->kategori->name }} {{ $peserta->kategori->umur }}
                                        ({{ $peserta->kategori->gender }})</td>
                                @else
                                    <td>-</td>
                                @endif

                            </tr>
                            <tr>
                                <th>Road Race</th>
                                <td>{{ $peserta->roadRace->nama }} <small class="text-muted">Km</small></td>
                            </tr>
                            <tr>
                                <th>Ukuran Jersey</th>
                                <td>{{ $peserta->size_jersey }}</td>
                            </tr>
                            <tr>
                                <th>Bukti Bayar</th>
                                <td>
                                    <a href="{{ asset('storage/' . $peserta->bukti_bayar) }}" target="_blank">Lihat
                                        Bukti</a>
                                </td>
                            </tr>
                        </table>

                        <a href="{{ route('peserta.index') }}" class="btn btn-primary"><i
                                class="bi bi-arrow-return-left"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
