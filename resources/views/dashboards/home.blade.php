@extends('templates.main')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        #chartjs-tooltip{
            background-color: floralwhite;
            padding: 5px;
            border-radius: 10px;
            font-size:1.2rem;
        }
        body{
            overflow-x: hidden;
        }
        .graf-container{
            display: flex;
        }
        .graf-legend{
            flex-grow: 1;
        }
        .graf-dona{
            position: relative; 
            height:100px; 
            width:100px
        }
        .graf-bar{
            position: relative; 
            height:100px; 
            width:200px
        }
        .row{
            margin:0;
            padding: 0;
        }
        .col{
            margin:0;
            padding: 0;
        }
    </style>
    <div>
        <div class="row">
            <div class="col ">
                <div class="card bg-success text-white m-2" align="center">
                    <div class="card-header">
                        Trabajos realizados
                    </div>
                    <div class="card-body">
                        <h1>10</h1>
                    </div>
                </div>
            </div>
            <div class="col ">
            <div class="card bg-danger text-white m-2" align="center">
                <div class="card-header">
                    Trabajos realizados
                </div>
                <div class="card-body">
                    <h1>10</h1>
                </div>
            </div>
            </div>
            <div class="col ">
            <div class="card bg-warning text-white m-2" align="center">
                <div class="card-header">
                    Trabajos realizados
                </div>
                <div class="card-body">
                    <h1>10</h1>
                </div>
            </div>
            </div>
            <div class="col ">
            <div class="card bg-info text-white m-2" align="center">
                <div class="card-header">
                    Trabajos realizados
                </div>
                <div class="card-body">
                    <h1>10</h1>
                </div>
            </div>
            </div>
        </div>
        <div class="row m-0">
            <div class="col ">
            <div class="card bg-ligth text-black m-2  col" align="center">
                <div class="card-header">
                    Trabajos realizados
                </div>
                <div class="card-body">
                    <div class="graf-container">
                        <div class="graf-legend">
                            
                        </div>
                        <div class="graf-bar">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="col ">
                <div class="card bg-ligth text-black m-2  col" align="center">
                    <div class="card-header">
                        Trabajos realizados
                    </div>
                    <div class="card-body">
                        <div class="graf-container">
                            <div class="graf-legend">
                                
                            </div>
                            <div class="graf-dona">
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{url('/js/chart.options.js')}}"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
                datasets: [{
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: opcionesBar
        });

        const ctx2 = document.getElementById('myChart2').getContext('2d');
        const myChart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [
                    {
                        label: 'Dataset 1',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                    }
                ]
            },
            options: opcionesPie
        });



    </script>
@stop