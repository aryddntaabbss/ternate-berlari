@extends('backend.layouts.main', ['title' => 'Settings'])

@section('main')
    <div class="pagetitle">
        <h1>Settings</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Settings</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Website Settings</h5>
                        <form action="{{ route('deskripsi_website.update', 1) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <!-- Logo Upload -->
                            <img src="{{ asset('storage/' . $websiteLogo) }}" alt="" width="100">
                            <div class="mb-3">
                                <label for="logo" class="form-label">Upload Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo">
                                <div class="form-text">- Upload Logo, tipe file .PNG<br>-
                                    Ukuran File &lt; 2MB</div>
                            </div>

                            <!-- Website URL -->
                            <div class="mb-3">
                                <label for="url" class="form-label">Link Website</label>
                                <input type="text" class="form-control" id="url" name="url"
                                    value="{{ $websiteUrl }}">
                                {{-- <input type="hidden" class="form-control" id="url" name="logo"
                                    value="{{ $websiteUrl }}"> --}}
                            </div>

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $websiteTitle }}">
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>

                                <!-- Input Trix -->
                                <input id="deskripsi" type="hidden" name="deskripsi" value="{{ $websiteDeskripsi }}">
                                <trix-editor input="deskripsi"></trix-editor>
                            </div>


                            <!-- Keywords -->
                            <div class="mb-3">
                                <label for="keyword" class="form-label">Keyword</label>
                                <input type="text" class="form-control" id="keyword" name="keyword"
                                    value="{{ $websiteKeyword }}">
                            </div>

                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Social Media</h5>
                        <form action="" method="POST">
                            @csrf
                            <!-- Social Media Links -->
                            <div class="mb-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" value="RivoArman">
                            </div>

                            <div class="mb-3">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" value="RivoArman">
                            </div>

                            <div class="mb-3">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" value="xx">
                            </div>

                            <div class="mb-3">
                                <label for="youtube" class="form-label">YouTube</label>
                                <input type="text" class="form-control" id="youtube" name="youtube" value="xx">
                            </div>

                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Footer Text</h5>
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" id="footer_text" name="footer_text"
                                    value="© All right reserved.">
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Event Date</h5>
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="date" class="form-control" id="event_date" name="event_date">
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rekening Bank</h5>
                        <form action="" method="POST">
                            @csrf
                            <!-- Bank Details -->
                            <div class="mb-3">
                                <label for="bank_name" class="form-label">Nama Bank</label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name">
                            </div>

                            <div class="mb-3">
                                <label for="bank_account" class="form-label">No. Rekening</label>
                                <input type="text" class="form-control" id="bank_account" name="bank_account">
                            </div>

                            <div class="mb-3">
                                <label for="account_name" class="form-label">Nama Rekening</label>
                                <input type="text" class="form-control" id="account_name" name="account_name">
                            </div>

                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
