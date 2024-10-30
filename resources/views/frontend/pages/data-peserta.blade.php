@extends('frontend.layouts.main')
@section('head')
    <style>
        /* Warna kuning untuk tab yang aktif */
        .nav-tabs .nav-link.active {
            background-color: #FFC107 !important;
            /* Warna kuning */
            color: #000 !important;
            /* Warna teks hitam */
        }

        .nav-tabs .nav-link {
            /* Warna kuning */
            color: #000 !important;
            /* Warna teks hitam */
            border: #000 1px solid;
        }

        .nav-tabs button:hover {
            /* Warna kuning */
            background-color: #ffc107cc !important;
            color: #000 !important;
            /* Warna teks hitam */
            border: #000 1px solid;
        }
    </style>
@endsection
@section('body')
    @include('frontend.layouts.header')

    <!-- Section untuk Data Peserta -->
    <section class="section mt-5">
        <div class="w-full mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 text-center pb-5" data-aos="fade-up" data-aos-duration="15000">
                DAFTAR PESERTA</h2>
            <div class="bg-white shadow-md rounded-lg" data-aos="fade-up" data-aos-duration="15000">
                <div class="p-6">
                    <!-- Tabs for different packages -->
                    <ul class="nav nav-tabs" id="packageTabs" role="tablist">
                        @foreach ($data_peserta->groupBy('roadRace.nama') as $package => $participants)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $loop->first ? 'active text-yellow' : '' }} m-1"
                                    id="tab-{{ $package }}-tab" data-bs-toggle="tab"
                                    data-bs-target="#tab-{{ $package }}" type="button" role="tab"
                                    aria-controls="tab-{{ $package }}" aria-selected="true">
                                    Paket {{ $package }} KM
                                </button>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Tab content for each package -->
                    <div class="tab-content" id="packageTabContent">
                        @foreach ($data_peserta->groupBy('roadRace.nama') as $package => $participants)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ $package }}"
                                role="tabpanel" aria-labelledby="tab-{{ $package }}-tab">
                                <div class="overflow-x-auto mt-4">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Size Jersey</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($participants as $peserta)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $peserta->nama_lengkap }}</td>
                                                    </td>
                                                    <td>{{ $peserta->size_jersey }}</td>
                                                    <td>
                                                        <a href="javascript:void(0)"
                                                            class="btn {{ $peserta->status == 'terverifikasi' ? 'btn-success' : 'btn-danger' }} text-light">
                                                            {{ $peserta->status }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- End Table with striped rows for each package -->
                </div>
            </div>
        </div>
    </section>

    <!-- Scroll to Top Button -->
    @include('frontend.components.to-top')
@endsection

@section('js')
    <!-- jQuery and Bootstrap JS for Tabs -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                "order": [], // By default, it will be unsorted; you can set initial sorting here.
                "language": {
                    "search": "Cari di tabel:" // Customizes the search field placeholder text.
                }
            });
        });
    </script>
@endsection
