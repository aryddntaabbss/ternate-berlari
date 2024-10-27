@extends('backend.layouts.main', ['title' => 'Menu'])
@section('main')
    <div class="pagetitle">
        <h1>Menu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Menu</li>
            </ol>
        </nav>
    </div>

    <!-- Reports -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">List Menu</h5>

                    <!-- Tombol untuk membuka modal tambah dosen -->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#tambahDosenModal">
                        Tambah Menu
                    </button>
                </div>

                {{-- Modal Tambah Dosen --}}
                <div class="modal fade" id="tambahDosenModal" tabindex="-1" aria-labelledby="tambahDosenModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahDosenModalLabel">Tambah Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Form Tambah Dosen -->
                                <form action="{{ route('menu.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="namaMenu" class="form-label">Nama Menu</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="namaMenu"
                                            placeholder="Masukkan nama menu" required>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="url" class="form-label">Url</label>
                                        <input type="text" name="url"
                                            class="form-control @error('url') is-invalid @enderror" id="url"
                                            placeholder="Masukkan Url" required value="#">
                                        @error('url')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
                {{-- End Modal Tambah Dosen --}}

                {{-- Modal Edit Dosen --}}
                <div class="modal fade" id="editDosenModal" tabindex="-1" aria-labelledby="editDosenModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editDosenModalLabel">Edit Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Form Edit Dosen -->
                                <form action="" method="POST" id="editMenuForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="editName" class="form-label">Nama</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="editName"
                                            required>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="editUrl" class="form-label">Url</label>
                                        <input type="text" name="url"
                                            class="form-control @error('url') is-invalid @enderror" id="editUrl" required>
                                        @error('url')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
                {{-- End Modal Edit Dosen --}}

                {{-- Table Dosen --}}
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Url</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->url }}</td>
                                <td>
                                    @if ($item->id != 1)
                                        <!-- Tombol Edit: Menampilkan modal edit dan mengisi data -->
                                        <button type="button" class="btn btn-outline-warning btn-edit"
                                            data-id="{{ $item->id }}" data-nama="{{ $item->name }}"
                                            data-url="{{ $item->url }}" data-bs-toggle="modal"
                                            data-bs-target="#editDosenModal">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <!-- Tombol Delete -->
                                        <button class="btn btn-outline-danger m-1"
                                            onclick="confirmDelete({{ $item->id }})">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                        <!-- Form delete, disembunyikan -->
                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('menu.destroy', $item->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- End Reports -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.btn-edit');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-nama');
                    const url = this.getAttribute('data-url');

                    // Isi data di dalam form edit
                    document.getElementById('editName').value = name;
                    document.getElementById('editUrl').value = url;

                    // Ubah action form edit agar mengarah ke route update dengan id yang benar
                    document.getElementById('editMenuForm').setAttribute('action',
                        '/dashboard/menu/' + id);
                });
            });
        });
    </script>
@endsection
