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

    <div class="row">
        <!-- Reports road race -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Statistik Peserta Berdasarkan Kategori Road Race</h5>

                    <!-- Pie Chart -->
                    <div id="pieChart"></div>

                    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            const data = @json($data); // Data dari controller


                            const labels = data.map(item => 'Kategori ' + item.nama_road_race + 'K ');
                            const series = data.map(item => item.total);

                            new ApexCharts(document.querySelector("#pieChart"), {
                                series: series,
                                chart: {
                                    height: 350,
                                    type: 'pie',
                                    toolbar: {
                                        show: true
                                    }
                                },
                                labels: labels,
                                tooltip: {
                                    y: {
                                        formatter: function(val) {
                                            return val + " Peserta";
                                        }
                                    }
                                }
                            }).render();
                        });
                    </script>
                    <!-- End Pie Chart -->
                </div>
            </div>
        </div>
        <!-- End Reports -->
        <!-- Reports kategori pelari -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Statistik Peserta Berdasarkan Kategori Usia</h5>

                    <!-- Pie Chart -->
                    <div id="chat-2"></div>

                    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            const data = @json($data2); // Data dari controller


                            const labels = data.map(item => 'Kategori ' + item.name_kategori);
                            const series = data.map(item => item.total);

                            new ApexCharts(document.querySelector("#chat-2"), {
                                series: series,
                                chart: {
                                    height: 350,
                                    type: 'pie',
                                    toolbar: {
                                        show: true
                                    }
                                },
                                labels: labels,
                                tooltip: {
                                    y: {
                                        formatter: function(val) {
                                            return val + " Peserta";
                                        }
                                    }
                                }
                            }).render();
                        });
                    </script>
                    <!-- End Pie Chart -->
                </div>
            </div>
        </div>
        <!-- End Reports -->
    </div>
@endsection
