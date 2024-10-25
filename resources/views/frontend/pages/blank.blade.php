@extends('frontend.layouts.main')

@section('body')
    @include('frontend.layouts.header')

    <!-- Section untuk Data Peserta -->
    <section class="mt-4 px-5">
        <div class="w-full max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold text-gray-800 text-center pb-5" data-aos="fade-up" data-aos-duration="1500">
                {{ $page->name }}
            </h2>

            <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-6 space-y-6 md:space-y-0">
                <!-- Card Paket -->
                <div class="w-full bg-white border rounded-lg py-8 px-10 text-justify shadow-xl" data-aos="fade-up">
                    {{-- Blank --}}
                    <p>{!! $page->content !!}</p>
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
@endsection
