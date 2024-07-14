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
                labels: ['Students', 'Employers'],
                    datasets: [{
                        data: [
                            {{ $studentCount }},
                            {{ $employerCount }},

                        ],
                    backgroundColor: [
                        'rgba(95, 240, 192, 0.2)',
                        'rgba(94, 162, 235, 0.2)',

                    ],
                    borderColor: [
                        'rgba(95, 192, 192, 1)',
                        'rgba(94, 162, 235, 1)',

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


        function formatData(data) {
        const labels = [];
        const counts = [];
        data.forEach(item => {
            labels.push(item.year + '-' + String(item.month).padStart(2, '0'));
            counts.push(item.count);
        });
        return { labels, counts };
    }

    // Internship Applications data
    const internshipApplicationsData = @json($applicants);
    const formattedInternshipApplicationsData = formatData(internshipApplicationsData);

    // Internship Applications Chart
    var ctx2 = document.getElementById('internshipApplicationsChart').getContext('2d');
    var internshipApplicationsChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: formattedInternshipApplicationsData.labels,
            datasets: [{
                label: 'Applications',
                data: formattedInternshipApplicationsData.counts,
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1,
                fill: true,
                backgroundColor: 'rgba(153, 102, 255, 0.2)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


         // Internship Postings data
    const internshipPostingsData = @json($internships);
    const formattedInternshipPostingsData = formatData(internshipPostingsData);

    // Internship Postings Chart
   var ctx3 = document.getElementById('internshipPostingsChart').getContext('2d');
    var internshipApplicationsChart = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: formattedInternshipPostingsData.labels,
            datasets: [{
                label: 'Internship Postings',
                data: formattedInternshipPostingsData.counts,
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });



    // Internship Postings data
    const userData = @json($users);
    const formattedUserData = formatData(userData);

    // Internship Postings Chart
   var ctx4 = document.getElementById('userRegistrationChart').getContext('2d');
    var userDataChart = new Chart(ctx4, {
        type: 'line',
        data: {
            labels: formattedUserData.labels,
            datasets: [{
                label: 'User  Registration Trends ',
                data: formattedUserData.counts,
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    </script>
</x-app-layout>
