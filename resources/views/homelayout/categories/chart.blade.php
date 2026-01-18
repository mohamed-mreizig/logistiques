@extends('welcome')
@section('title')
    {{ __('messages.Documents') }}
@endsection


@section('content')
<div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ $category->name }} - Valeurs par État</h1>
        <a href="{{ route('categories.index') }}" class="btn btn-outline-primary" style="    color: #0DA853 !important;
    border-color: #0DA853 !important; ">
            Retour aux Catégories
        </a>
    </div>
    
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="chartType">Type de Graphique:</label>
                <select id="chartType" class="form-control">
                    <option value="bar">Graphique à Barres</option>
                    <option value="line">Graphique Linéaire</option>
                    <option value="radar">Graphique Radar</option>
                </select>
            </div>
            
            <div class="chart-container" style="position: relative; height:60vh; width:100%">
                <canvas id="stateChart"></canvas>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('stateChart').getContext('2d');
        const chartData = @json($chartData);
        const stateNames = @json($states);
        
        const colorPalette = [
            { bg: 'rgba(54, 162, 235, 0.5)', border: 'rgba(54, 162, 235, 1)' },
            { bg: 'rgba(255, 99, 132, 0.5)', border: 'rgba(255, 99, 132, 1)' },
            { bg: 'rgba(75, 192, 192, 0.5)', border: 'rgba(75, 192, 192, 1)' },
            { bg: 'rgba(153, 102, 255, 0.5)', border: 'rgba(153, 102, 255, 1)' },
            { bg: 'rgba(255, 159, 64, 0.5)', border: 'rgba(255, 159, 64, 1)' }
        ];
        
        const datasets = chartData.map((item, index) => {
            const color = colorPalette[index] || {
                bg: `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.5)`,
                border: `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 1)`
            };
            
            return {
                label: item.name,
                data: stateNames.map(state => item.data[state]),
                backgroundColor: color.bg,
                borderColor: color.border,
                borderWidth: 1,
                pointBackgroundColor: color.border,
                pointRadius: 4
            };
        });
        
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: stateNames,
                datasets: datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Valeur'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'États'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Comparaison des valeurs par état pour ' + @json($category->name),
                        font: {
                            size: 16
                        }
                    },
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y.toFixed(2);
                            }
                        }
                    }
                }
            }
        });
        
        document.getElementById('chartType').addEventListener('change', function() {
            myChart.destroy();
            myChart = new Chart(ctx, {
                type: this.value,
                data: {
                    labels: stateNames,
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: this.value === 'radar' ? {
                        r: {
                            angleLines: {
                                display: true
                            },
                            beginAtZero: true
                        }
                    } : {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Valeur'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'États'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Comparaison des valeurs par état pour ' + @json($category->name),
                            font: {
                                size: 16
                            }
                        },
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false
                        }
                    }
                }
            });
        });
    });
</script>

@endsection