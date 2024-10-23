@extends('backend.layouts.main', ['title' => 'Tambah Pages'])

@section('main')
    <div class="pagetitle">
        <h1>Create Pages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"> Pages</li>
                <li class="breadcrumb-item active">Create Pages</li>
            </ol>
        </nav>
    </div>
    <div class="col-12 col-md-8 mx-auto">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center pt-2 pb-4">
                    <div>
                        <h3 class="card-title">Tambah Halaman Baru</h3>
                    </div>
                </div>

                <form method="POST" action="{{ route('pages.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Nama Halaman -->
                    <div class="mb-4">
                        <label for="name" class="form-label">Nama Halaman</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"
                            required placeholder="Masukkan nama halaman" oninput="generateSlug()">
                    </div>

                    <!-- Slug (Otomatis dari nama halaman) -->
                    <div class="mb-4">
                        <label for="slug" class="form-label">Permalink</label>
                        <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}"
                            required readonly>
                    </div>


                    <!-- Konten (Trix Editor) -->
                    <div class="mb-4">
                        <label for="content" class="form-label">Konten</label>
                        <input id="x" type="hidden" name="content" value="{{ old('content') }}">
                        <trix-editor input="x" class="form-control"></trix-editor>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label for="status" class="form-label">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_aktif" value="aktif"
                                {{ old('status') == 'aktif' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="status_aktif">
                                Aktif
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_tidak_aktif"
                                value="tidak" {{ old('status') == 'tidak' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="status_tidak_aktif">
                                Tidak Aktif
                            </label>
                        </div>
                    </div>


                    <!-- Pilih Menu (Dropdown) -->
                    <div class="mb-4">
                        <label for="menu_id" class="form-label">Pilih Sub Dari Menu</label>
                        <select name="menu_id" id="menu_id" class="form-select" required>
                            <option value="">-- Pilih Menu --</option>
                            </option>
                            @foreach ($menu as $m)
                                <option value="{{ $m->id }}" {{ old('menu_id') == $m->id ? 'selected' : '' }}>
                                    {{ $m->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function generateSlug() {
            let name = document.getElementById('name').value;
            let domain = "{{ config('app.url') }}/";

            // Membuat slug otomatis berdasarkan input
            let slug = name.trim().toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '') // Hapus karakter spesial
                .replace(/\s+/g, '-') // Ganti spasi dengan tanda hubung
                .replace(/-+/g, '-'); // Hapus tanda hubung berlebih

            // Menambahkan domain di awal slug
            document.getElementById('slug').value = domain + slug;
        }
    </script>
@endsection
