<?php
include "../includes/base_page/shared_top_tags.php"
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<div class="container">
  <h4>Dashboard</h4>
  <div class="card p-2">
    <canvas id="closing_bal" width="200" height="50"></canvas>
  </div>
  <div class="card mt-2 p-2">
    <canvas id="opening_bal" width="200" height="50"></canvas>
  </div>
  <script>
    window.addEventListener('DOMContentLoaded', (event) => {
      fetch('./dashboard_od_closingbal.php')
        .then(response => response.json())
        .then(data => {
          console.log(data);
          let headers = data.map(row => row.bank + "\n" + row.date);
          let values = data.map(row => row["closing balance"]);
          console.log(headers, values);
          drawClosingBalances(headers, values);
        })
        .catch((error) => {
          console.error('Error:', error);
        });

      fetch('./dashboard_od_openingbal.php')
        .then(response => response.json())
        .then(data => {
          console.log(data);
          let headers = data.map(row => row.bank + "\n" + row.date);
          let values = data.map(row => row["opening balance"]);
          console.log(headers, values);
          drawOpeningBal(headers, values);
        })
        .catch((error) => {
          console.error('Error:', error);
        });
    });

    function drawOpeningBal(headers, values) {
      var ctx = document.getElementById('opening_bal').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: headers,
          datasets: [{
            label: 'opening Balance',
            data: values,
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
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    }


    function drawClosingBalances(headers, values) {
      var ctx = document.getElementById('closing_bal').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: headers,
          datasets: [{
            label: 'Closing Balance',
            data: values,
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
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    }
  </script>
</div>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
