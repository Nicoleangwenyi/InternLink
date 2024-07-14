<!DOCTYPE html>
<html>
<head>
    <title>Statistics</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            position: relative;
            margin: auto;
            height: 60vh;
            width: 80vw;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center my-4">Monthly Statistics</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="chart-container">
                <canvas id="applicantsChart"></canvas>
            </div>
        </div>
        <div class="col-md-4">
            <div class="chart-container">
                <canvas id="usersChart"></canvas>
            </div>
        </div>
        <div class="col-md-4">
            <div class="chart-container">
                <canvas id="internshipsChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Helper function to format data
    function formatData(data) {
        const labels = [];
        const counts = [];
        data.forEach(item => {
            labels.push(item.year + '-' + String(item.month).padStart(2, '0'));
            counts.push(item.count);
        });
        return { labels, counts };
    }

    // Applicants data
    const applicantsData = @json($applicants);
    const formattedApplicantsData = formatData(applicantsData);

    // Users data
    const usersData = @json($users);
    const formattedUsersData = formatData(usersData);

    // Internships data
    const internshipsData = @json($internships);
    const formattedInternshipsData = formatData(internshipsData);

    // Applicants Chart
    new Chart(document.getElementById('applicantsChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: formattedApplicantsData.labels,
            datasets: [{
                label: 'Applicants',
                data: formattedApplicantsData.counts,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
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

    // Users Chart
    new Chart(document.getElementById('usersChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: formattedUsersData.labels,
            datasets: [{
                label: 'Users',
                data: formattedUsersData.counts,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
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

    // Internships Chart
    new Chart(document.getElementById('internshipsChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: formattedInternshipsData.labels,
            datasets: [{
                label: 'Internships',
                data: formattedInternshipsData.counts,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
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
});
</script>
</body>
</html>
