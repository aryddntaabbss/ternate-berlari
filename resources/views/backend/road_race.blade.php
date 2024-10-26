@extends('backend.layouts.main', ['title' => 'Road Race'])
@section('main')
    <div class="pagetitle">
        <h1>Road Race</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Road Race</li>
            </ol>
        </nav>
    </div>

    <!-- Road Race List -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Daftar Road Race</h5>

                    <!-- Tombol untuk membuka modal tambah Road Race -->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#tambahRoadRaceModal">
                        Tambah Road Race
                    </button>
                </div>

                <!-- Modal Tambah Road Race -->
                <div class="modal fade" id="tambahRoadRaceModal" tabindex="-1" aria-labelledby="tambahRoadRaceModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahRoadRaceModalLabel">Tambah Road Race</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Form Tambah Road Race -->
                                <form action="{{ route('road-race.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="namaRoadRace" class="form-label">Nama Road Race</label>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror" id="namaRoadRace"
                                            placeholder="Masukkan nama" required>
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="biaya" class="form-label">Biaya</label>
                                        <input type="text" name="biaya"
                                            class="form-control @error('biaya') is-invalid @enderror" id="biaya"
                                            placeholder="Masukkan biaya" required>
                                        @error('biaya')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="palingLaris" name="paling_laris"
                                            value="1">
                                        <label class="form-check-label" for="palingLaris">Paling Laris</label>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Tambah Road Race -->

                <!-- Modal Edit Road Race -->
                <div class="modal fade" id="editRoadRaceModal" tabindex="-1" aria-labelledby="editRoadRaceModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editRoadRaceModalLabel">Edit Road Race</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Form Edit Road Race -->
                                <form id="editRoadRaceForm" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="editNama" class="form-label">Nama Road Race</label>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror" id="editNama"
                                            required>
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="editBiaya" class="form-label">Biaya</label>
                                        <input type="text" name="biaya"
                                            class="form-control @error('biaya') is-invalid @enderror" id="editBiaya"
                                            required>
                                        @error('biaya')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="editPalingLaris"
                                            name="paling_laris" value="1">
                                        <label class="form-check-label" for="editPalingLaris">Paling Laris</label>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Edit Road Race -->

                <!-- Table Road Race -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Nama Road Race</th>
                            <th>Biaya</th>
                            <th>Paling Laris</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($road_races as $road_race)
                            <tr>
                                <td>{{ $road_race->nama }} <small class="text-muted">Km</small></td>
                                <td>Rp. {{ $road_race->biaya }}</td>
                                <td>
                                    @if ($road_race->paling_laris)
                                        <span class="badge bg-success">Ya</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Tombol untuk mengubah status paling laris -->
                                    @if (!$road_race->paling_laris)
                                        <a href="{{ route('road-race.changePalingLaris', $road_race->id) }}"
                                            class="btn btn-outline-primary">
                                            <i class="bi bi-currency-dollar"></i>
                                        </a>
                                    @else
                                        <span class="text-muted btn btn-secondary"><i
                                                class="bi bi-currency-dollar"></i></span>
                                    @endif

                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-outline-warning btn-edit"
                                        data-id="{{ $road_race->id }}" data-nama="{{ $road_race->nama }}"
                                        data-biaya="{{ $road_race->biaya }}" data-bs-toggle="modal"
                                        data-bs-target="#editRoadRaceModal">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('road-race.destroy', $road_race->id) }}" method="POST"
                                        style="display:inline-block;" id="delete-form-{{ $road_race->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger ms-1"
                                            onclick="confirmDelete({{ $road_race->id }})"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                    {{--                                     
                                    <!-- Tombol Delete -->
                                    <button class="btn btn-outline-danger m-1"
                                        onclick="confirmDelete({{ $road_race->id }})">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <!-- Form delete, disembunyikan -->
                                    <form id="delete-form-{{ $road_race->id }}"
                                        action="{{ route('road-race.destroy', $road_race->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- End Road Race List -->
@endsection

@section('js')
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function formatRupiah(angka, prefix) {
            let number_string = angka.replace(/[^0-9]/g, '');
            let split = number_string.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/.{3}/gi);
            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.btn-edit');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const nama = this.getAttribute('data-nama');
                    const biaya = this.getAttribute('data-biaya');

                    // Isi data di dalam form edit
                    document.getElementById('editNama').value = nama;
                    document.getElementById('editBiaya').value = formatRupiah(biaya);

                    // Ubah action form edit agar mengarah ke route update dengan id yang benar
                    document.getElementById('editRoadRaceForm').setAttribute('action',
                        '/dashboard/road-race/' + id);
                });
            });

            // Format input biaya
            const biayaInput = document.getElementById('biaya');
            const editBiayaInput = document.getElementById('editBiaya');

            biayaInput.addEventListener('keyup', function() {
                this.value = formatRupiah(this.value);
            });

            editBiayaInput.addEventListener('keyup', function() {
                this.value = formatRupiah(this.value);
            });
        });
    </script>
@endsection
