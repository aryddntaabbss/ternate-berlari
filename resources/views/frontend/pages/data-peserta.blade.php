@extends('frontend.layouts.main')

@section('body')
@include('frontend.layouts.header')

<!-- Section untuk Data Peserta -->
<section class="section mt-5">
    <div class="w-full mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-800 text-center pb-5" data-aos="fade-up" data-aos-duration="15000">
            DAFTAR PESERTA</h2>
        <div class="bg-white shadow-md rounded-lg" data-aos="fade-up" data-aos-duration="15000">
            <div class="p-6">
                <!-- Table with striped rows -->
                <div class="overflow-x-auto">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Paket</th>
                                <th>Kategori Usia</th>
                                <th>Size Jersey</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_peserta as $peserta)
                            <!-- Looping data dari controller -->
                            <tr>
                                <td>{{ $peserta->nama_lengkap }}</td>
                                <td>{{ $peserta->roadRace->nama }} <small>KM</small></td>
                                @if ($peserta->kategori->id != 1)
                                <td>{{ $peserta->kategori->name }}</td>
                                @else
                                <td>-</td>
                                @endif
                                <td>{{ $peserta->size_jersey }}</td>
                                <td>
                                    <a href="javascript:void(0)"
                                        class="btn {{ $peserta->status == 'terverifikasi' ? 'btn-success' : 'btn-danger' }} text-light"
                                        onclick="confirmStatusChange({{ $peserta->id }}, '{{ $peserta->status }}')">
                                        {{ $peserta->status }}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Table with striped rows -->
            </div>
        </div>
    </div>
</section>

<!-- Scroll to Top Button -->
@include('frontend.components.to-top')
@endsection

@section('js')
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
            $('#pesertaTable').DataTable({
                "order": [], // By default, it will be unsorted; you can set initial sorting here.
                "language": {
                    "search": "Cari di tabel:" // Customizes the search field placeholder text.
                }
            });
        });
</script>
@endsection