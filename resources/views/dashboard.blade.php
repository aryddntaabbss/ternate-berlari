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
                <h5 class="card-title">Pie Chart</h5>

                <!-- Pie Chart -->
                <div id="pieChart"></div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#pieChart"), {
                            series: [44, 55, 13, 43, 22],
                            chart: {
                                height: 350,
                                type: 'pie',
                                toolbar: {
                                    show: true
                                }
                            },
                            labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E']
                        }).render();
                    });
                </script>
                <!-- End Pie Chart -->
            </div>
        </div>
    </div>
    <!-- End Reports -->
@endsection
