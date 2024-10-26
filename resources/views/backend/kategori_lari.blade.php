@extends('backend.layouts.main', ['title' => 'Kategori'])
@section('main')
    <div class="pagetitle">
        <h1>Kategori Lari</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Kategori</li>
            </ol>
        </nav>
    </div>

    <!-- Kategori List -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Daftar Kategori</h5>

                    <!-- Tombol untuk membuka modal tambah Kategori -->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#tambahKategoriModal">
                        Tambah Kategori
                    </button>
                </div>

                <!-- Modal Tambah Kategori -->
                <div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="tambahKategoriModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahKategoriModalLabel">Tambah Kategori</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Form Tambah Kategori -->
                                <form action="{{ route('kategori.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="namaKategori" class="form-label">Nama</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="namaKategori"
                                            placeholder="Masukkan nama" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="umurKategori" class="form-label">Umur</label>
                                        <input type="text" name="umur"
                                            class="form-control @error('umur') is-invalid @enderror" id="umurKategori"
                                            placeholder="40 - 55" required>
                                        @error('umur')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="genderKategori" class="form-label">Gender</label>
                                        <select name="gender" class="form-select" id="genderKategori" required>
                                            <option value="" disabled selected>Pilih Gender</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                            <option value="Pria/Wanita">Pria/Wanita</option>
                                        </select>
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
                <!-- End Modal Tambah Kategori -->

                <!-- Modal Edit Kategori -->
                <div class="modal fade" id="editKategoriModal" tabindex="-1" aria-labelledby="editKategoriModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editKategoriModalLabel">Edit Kategori</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Form Edit Kategori -->
                                <form id="editKategoriForm" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="editNama" class="form-label">Nama</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="editNama"
                                            required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="editUmur" class="form-label">Umur</label>
                                        <input type="text" name="umur"
                                            class="form-control @error('umur') is-invalid @enderror" id="editUmur"
                                            required>
                                        @error('umur')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="editGender" class="form-label">Gender</label>
                                        <select name="gender" class="form-select" id="editGender" required>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                            <option value="Pria/Wanita">Pria/Wanita</option>
                                        </select>
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
                <!-- End Modal Edit Kategori -->

                <!-- Table Kategori -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Gender</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoris as $kategori)
                            @if ($kategori->name != 'Tidak Ada')
                                <tr>
                                    <td>{{ $kategori->name }}</td>
                                    <td>{{ $kategori->umur }}</td>
                                    <td>{{ $kategori->gender }}</td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <button type="button" class="btn btn-outline-warning btn-edit"
                                            data-id="{{ $kategori->id }}" data-name="{{ $kategori->name }}"
                                            data-umur="{{ $kategori->umur }}" data-gender="{{ $kategori->gender }}"
                                            data-bs-toggle="modal" data-bs-target="#editKategoriModal">
                                            <i class="bi bi-pencil"></i>
                                        </button>


                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                            style="display:inline-block;" id="delete-form-{{ $kategori->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger ms-1"
                                                onclick="confirmDelete({{ $kategori->id }})"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                        {{-- <!-- Tombol Delete -->
                                    <button class="btn btn-outline-danger m-1"
                                        onclick="confirmDelete({{ $kategori->id }})">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    

                                    <!-- Form delete, disembunyikan -->
                                    <form id="delete-form-{{ $kategori->id }}"
                                        action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form> --}}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- End Kategori List -->
@endsection

@section('js')
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.btn-edit');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const umur = this.getAttribute('data-umur');
                    const gender = this.getAttribute('data-gender');

                    // Isi data di dalam form edit
                    document.getElementById('editNama').value = name;
                    document.getElementById('editUmur').value = umur;
                    document.getElementById('editGender').value = gender;

                    // Ubah action form edit agar mengarah ke route update dengan id yang benar
                    document.getElementById('editKategoriForm').setAttribute('action',
                        '/dashboard/kategori/' + id);
                });
            });
        });
    </script>
@endsection
