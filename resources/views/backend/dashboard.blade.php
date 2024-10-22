@extends('backend.layouts.main', ['title' => 'Dashboard'])
@section('main')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- Reports -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Reports Judul <span>/Tahun</span></h5>

            </div>
        </div>
    </div><!-- End Reports -->
@endsection
