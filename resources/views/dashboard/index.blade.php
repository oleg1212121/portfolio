@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col mb-5">
                    <h1>Распределение слов по статусам</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <canvas id="myChart" width="800" height="800"></canvas>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script>

        let data = @json($data);


        let ctx = document.getElementById('myChart').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'Распределение слов по статусам',
                    data: [],
                    backgroundColor: [
                        'rgba(0, 102, 51, 0.8)',
                        'rgba(0, 153, 102, 0.8)',
                        'rgba(50, 220, 0, 0.8)',
                        'rgba(250, 250, 0, 0.8)',
                        'rgba(250, 200, 0, 0.8)',
                        'rgba(250, 150, 0, 0.8)',
                        'rgba(250, 110, 0, 0.8)',
                        'rgba(250, 80, 0, 0.8)',
                        'rgba(250, 40, 0, 0.8)',
                        'rgba(250, 0, 0, 0.8)',
                    ],
                    borderColor: [
                        'rgba(0, 102, 51, 1)',
                        'rgba(0, 153, 102, 1)',
                        'rgba(50, 220, 0, 1)',
                        'rgba(250, 250, 0, 1)',
                        'rgba(250, 200, 0, 1)',
                        'rgba(250, 150, 0, 1)',
                        'rgba(250, 110, 0, 1)',
                        'rgba(250, 80, 0, 1)',
                        'rgba(250, 40, 0, 1)',
                        'rgba(250, 0, 0, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: { responsive: true,
                maintainAspectRatio: false,}
        });
        for(let i = 0; i < data.length ; i++){
            myChart.data.datasets[0].data[i] = data[i];
            myChart.data.labels[i] = 'Статус - ' + i;
        }

        myChart.update();
    </script>
@endsection
