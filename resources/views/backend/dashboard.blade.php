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
                    <div id="pieChart" style="height: 400px;"></div>



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
                    <div id="chart-2" style="height: 400px;"></div>


                </div>
            </div>
        </div>
        <!-- End Reports -->
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const data = @json($data); // Data dari controller

            console.log(data); // Debugging: Pastikan data muncul di konsol

            // Siapkan data untuk ECharts
            const seriesData = data.map(item => ({
                name: 'Kategori ' + item.nama_road_race + 'K',
                value: item.total
            }));

            // Inisialisasi ECharts
            const chartDom = document.getElementById('pieChart');
            const myChart = echarts.init(chartDom);

            const option = {

                tooltip: {
                    trigger: 'item',
                    formatter: '{a} <br/>{b}: {c} ({d}%)'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                },
                series: [{
                    name: 'Peserta',
                    type: 'pie',
                    radius: '50%',
                    data: seriesData,
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }]
            };

            // Render chart
            myChart.setOption(option);
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const data = @json($data2); // Data dari controller

            console.log(data); // Debugging: pastikan data muncul di konsol

            // Siapkan data untuk ECharts
            const seriesData = data.map(item => ({
                name: 'Kategori ' + item.name_kategori,
                value: item.total
            }));

            // Inisialisasi ECharts
            const chartDom = document.getElementById('chart-2');
            const myChart = echarts.init(chartDom);

            const option = {

                tooltip: {
                    trigger: 'item',
                    formatter: '{a} <br/>{b}: {c} ({d}%)'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                },
                series: [{
                    name: 'Peserta',
                    type: 'pie',
                    radius: '50%',
                    data: seriesData,
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }]
            };

            // Render chart
            myChart.setOption(option);
        });
    </script>
    <!-- End Pie Chart -->
@endsection
