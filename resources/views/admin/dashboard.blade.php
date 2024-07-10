<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Wrap the row div with a flex container -->
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
                <div class="row">
                    <!-- Pie Chart for User Distribution -->
                    <div class="col-md-6">
                        <h2>Users Distribution</h2>
                        <div style="height: 500px; width: 500px;">
                            <canvas id="userDistributionChart"></canvas>
                            <br><br><br>
                        </div>

                    </div>
                    <br>

                    <!-- Line/Area Chart for Internship Applications -->
                    <div class="col-md-6">
                        <h2>Internship Applications</h2>
                        <div style="height: 500px; width: 500px;">
                            <canvas id="internshipApplicationsChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <!-- Bar Chart for Internship Postings by Month -->
                    <div class="col-md-3">
                        <h2>Internship Postings by Month</h2>
                        <div style="height: 500px; width: 500px;">
                            <br><br><br><br><br><br>
                            <canvas id="internshipPostingsChart"></canvas>
                        </div>
                    </div>
                    <!-- Line Chart for User Registration Trends -->
                    <div class="col-md-6">
                        <h2>User Registration Trends</h2>
                        <div style="height: 500px; width: 500px;">
                            <canvas id="userRegistrationChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // User Distribution Chart
        var ctx = document.getElementById('userDistributionChart').getContext('2d');
        var userDistributionChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Students', 'Employers', 'Active Users', 'Inactive Users'],
                    datasets: [{
                        data: [
                            {{ $studentCount }},
                            {{ $employerCount }},
                            {{ $activeUsersCount }},
                            {{ $inactiveUsersCount }}
                        ],
                    backgroundColor: [
                        'rgba(95, 240, 192, 0.2)',
                        'rgba(94, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(95, 192, 192, 1)',
                        'rgba(94, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw.toLocaleString();
                                    }
                                }
                            }
                        }
                    }
        });

        // Internship Applications Chart
        var ctx2 = document.getElementById('internshipApplicationsChart').getContext('2d');
        var internshipApplicationsChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['May', 'June', 'July', 'August'],
                datasets: [{
                    label: 'Applications',
                    data: [0, 0, 0, 0, 0], // Example data
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1,
                    fill: true,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Internship Postings by Month Chart
        var ctx3 = document.getElementById('internshipPostingsChart').getContext('2d');
        var internshipPostingsChart = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ['May', 'June', 'July', 'August'],
                datasets: [{
                    label: 'Postings',
                    data: [0, 0, 1, 0], // Example data
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        // User Registration Trends Chart
        var ctx4 = document.getElementById('userRegistrationChart').getContext('2d');
        var userRegistrationChart = new Chart(ctx4, {
            type: 'line',
            data: {
                labels: ['May','June','July','August'],
                datasets: [{
                    label: 'Registrations',
                    data: [0, 0, 3, 0], // Example data
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
