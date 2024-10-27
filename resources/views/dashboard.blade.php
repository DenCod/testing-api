<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>

  <style>
    .charts-box{
      display: flex
    }
    .charts:first-child{
      width: 500px;
    }
    .charts:nth-child(2){
      width: 1000px;
    }
  </style>
</head>
<body>
  <a href="/">Dashboard</a>
  <a href="/management-data">Management-Data</a>

  <div class="charts-box">
    <div class="charts">
      <canvas id="genreChart"></canvas>
    </div>
    <div class="charts">
      <canvas id="releaseChart"></canvas>
    </div>
    {{-- <div class="charts">
      <canvas id="publisherChart"></canvas>
    </div> --}}
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const genreChart = document.getElementById('genreChart');
    const labels = @json($labelsGenre);
    const data = @json($dataGenre);
  
    new Chart(genreChart, {
      type: 'pie',
      data: {
        labels: labels,
        datasets: [{
          label: 'Genre Games',
          data: data,
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
  </script>

  <script>
    const releaseChart = document.getElementById('releaseChart');
    const releaseLebels = @json($releaseLebels);
    const releaseData = @json($releaseData);
  
    new Chart(releaseChart, {
      type: 'bar',
      data: {
        labels: releaseLebels,
        datasets: [{
          label: 'Games By Year',
          data: releaseData,
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
  </script>

  {{-- <script>
    const publisherChart = document.getElementById('publisherChart');
    const publisherLebels = @json($publisherLebels);
    const publisherData = @json($publisherData);
  
    new Chart(publisherChart, {
      type: 'bar',
      data: {
        labels: publisherLebels,
        datasets: [{
          label: 'Games By Year',
          data: publisherData,
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
  </script> --}}
  
</body>
</html>