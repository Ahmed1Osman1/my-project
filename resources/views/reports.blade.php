<h1>Top 10 Countries by Population</h1>
<canvas id="populationChart" width="100" height="100"></canvas>
<h1>Top 10 Countries by Life Expectancy</h1>
<canvas id="lifeExpectancyChart" width="100" height="100"></canvas>
<h1>Top 10 Countries by Surface Area</h1>
<canvas id="surfaceAreaChart" width="100" height="100"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Population Chart
        const ctxPopulation = document.getElementById('populationChart').getContext('2d');
        const populationChart = new Chart(ctxPopulation, {
            type: 'pie',
            data: {
                labels: {!! json_encode($countries->sortByDesc('Population')->take(10)->pluck('Name')) !!},
                datasets: [{
                    label: 'Population',
                    data: {!! json_encode($countries->sortByDesc('Population')->take(10)->pluck('Population')) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(199, 199, 199, 0.2)',
                        'rgba(255, 105, 180, 0.2)',
                        'rgba(255, 165, 0, 0.2)',
                        'rgba(0, 128, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(169, 169, 169, 1)',
                        'rgba(255, 105, 180, 1)',
                        'rgba(255, 165, 0, 1)',
                        'rgba(0, 128, 0, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                }
            }
        });

        // Life Expectancy Chart
        const ctxLifeExpectancy = document.getElementById('lifeExpectancyChart').getContext('2d');
        const lifeExpectancyChart = new Chart(ctxLifeExpectancy, {
            type: 'pie',
            data: {
                labels: {!! json_encode($countries->sortByDesc('LifeExpectancy')->take(10)->pluck('Name')) !!},
                datasets: [{
                    label: 'Life Expectancy',
                    data: {!! json_encode($countries->sortByDesc('LifeExpectancy')->take(10)->pluck('LifeExpectancy')) !!},
                    backgroundColor: [
                        'rgba(102, 205, 170, 0.2)',
                        'rgba(32, 178, 170, 0.2)',
                        'rgba(47, 79, 79, 0.2)',
                        'rgba(0, 139, 139, 0.2)',
                        'rgba(0, 255, 255, 0.2)',
                        'rgba(70, 130, 180, 0.2)',
                        'rgba(176, 224, 230, 0.2)',
                        'rgba(95, 158, 160, 0.2)',
                        'rgba(70, 130, 180, 0.2)',
                        'rgba(0, 206, 209, 0.2)'
                    ],
                    borderColor: [
                        'rgba(102, 205, 170, 1)',
                        'rgba(32, 178, 170, 1)',
                        'rgba(47, 79, 79, 1)',
                        'rgba(0, 139, 139, 1)',
                        'rgba(0, 255, 255, 1)',
                        'rgba(70, 130, 180, 1)',
                        'rgba(176, 224, 230, 1)',
                        'rgba(95, 158, 160, 1)',
                        'rgba(70, 130, 180, 1)',
                        'rgba(0, 206, 209, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                }
            }
        });

        // Languages Chart
        const ctxSurfaceArea = document.getElementById('surfaceAreaChart').getContext('2d');
        const surfaceAreaChart = new Chart(ctxSurfaceArea, {
            type: 'pie',
            data: {
                labels: {!! json_encode($countries->sortByDesc('SurfaceArea')->take(10)->pluck('Name')) !!},
                datasets: [{
                    label: 'Surface Area',
                    data: {!! json_encode($countries->sortByDesc('SurfaceArea')->take(10)->pluck('SurfaceArea')) !!},
                    backgroundColor: [
                        'rgba(218, 112, 214, 0.2)',
                        'rgba(221, 160, 221, 0.2)',
                        'rgba(216, 191, 216, 0.2)',
                        'rgba(255, 182, 193, 0.2)',
                        'rgba(255, 105, 180, 0.2)',
                        'rgba(255, 20, 147, 0.2)',
                        'rgba(199, 21, 133, 0.2)',
                        'rgba(219, 112, 147, 0.2)',
                        'rgba(255, 160, 122, 0.2)',
                        'rgba(255, 127, 80, 0.2)'
                    ],
                    borderColor: [
                        'rgba(218, 112, 214, 1)',
                        'rgba(221, 160, 221, 1)',
                        'rgba(216, 191, 216, 1)',
                        'rgba(255, 182, 193, 1)',
                        'rgba(255, 105, 180, 1)',
                        'rgba(255, 20, 147, 1)',
                        'rgba(199, 21, 133, 1)',
                        'rgba(219, 112, 147, 1)',
                        'rgba(255, 160, 122, 1)',
                        'rgba(255, 127, 80, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                }
            }
        });
    });
</script>
