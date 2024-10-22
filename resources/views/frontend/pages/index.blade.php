@extends('layouts.main')

@section('body')
@section('outmain')
@include('layouts.header')
@include('layouts.hero')
@endsection

<!-- Features Section -->
<section class="container mx-auto px-6 py-16">
    <h2 class="text-3xl font-bold text-center text-gray-800">Our Features</h2>
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Feature Card 1 -->
        <div class="bg-white p-6 rounded-lg shadow-md transition duration-300">
            <div class="text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <h3 class="mt-4 text-xl font-semibold text-gray-800">Fast Performance</h3>
            <p class="mt-2 text-gray-600">Experience the speed and reliability your projects need to
                thrive.</p>
        </div>

        <!-- Feature Card 2 -->
        <div class="bg-white p-6 rounded-lg shadow-md transition duration-300">
            <div class="text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v2a2 2 0 001 1.73 2 2 0 002 0A2 2 0 0013 19v-2m4-10V5a2 2 0 10-4 0v2M9 7V5a2 2 0 00-4 0v2" />
                </svg>
            </div>
            <h3 class="mt-4 text-xl font-semibold text-gray-800">Security Focused</h3>
            <p class="mt-2 text-gray-600">Your data is safe with us, and we follow industry best
                practices.</p>
        </div>

        <!-- Feature Card 3 -->
        <div class="bg-white p-6 rounded-lg shadow-md transition duration-300">
            <div class="text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                </svg>
            </div>
            <h3 class="mt-4 text-xl font-semibold text-gray-800">Easy to Use</h3>
            <p class="mt-2 text-gray-600">Our platform is intuitive and simple for developers of all
                levels.</p>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="bg-gray-100 py-16">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800">Start Building Today</h2>
        <p class="mt-4 text-gray-600">Join thousands of developers using our platform to build the future.</p>
        <a href="#"
            class="mt-6 inline-block px-8 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600">Get
            Started for Free</a>
    </div>
</section>

@include('layouts.footer')
@endsection