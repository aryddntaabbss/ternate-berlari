@extends('backend.layouts.main', ['title' => 'Pages'])
@section('main')
    <div class="pagetitle">
        <h1>Pages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Pages</li>
            </ol>
        </nav>
    </div>
    <!-- Reports -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">List Pages</h5>

                    <!-- Tombol untuk membuka modal tambah dosen -->
                    <a href="{{ route('pages.create') }}" class="btn btn-outline-success">
                        Tambah Pages
                    </a>
                </div>
                {{-- Table Dosen --}}
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Status</th>
                            <th>Url</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <span class="badge {{ $item->status == 'aktif' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $item->status }}
                                    </span>
                                </td>

                                <td>{{ config('app.url') }}/{{ $item->slug }}</td>
                                <td>
                                    <!-- Tombol Edit: Navigasi ke halaman edit -->
                                    <a href="{{ route('pages.edit', $item->id) }}" class="btn btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>



                                    @if ($item->slug != 'syarat-ketentuan')
                                        <!-- Tombol Delete -->
                                        <button class="btn btn-outline-danger m-1"
                                            onclick="confirmDelete({{ $item->id }})">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <!-- Form delete, disembunyikan -->
                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('pages.destroy', $item->id) }}" method="POST"
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
@endsection
