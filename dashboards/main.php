<?php
include "../includes/base_page/shared_top_tags.php"
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<script src="https://unpkg.com/vue"></script>
<script src="../components/fdash-components/dist/fdash.js"></script>

<h4>Dashboard</h4>
<div class="row mb-2">
  <!--
  <div class="col">
    <fdash-count-up-cyan></fdash-count-up-cyan>
  </div>
-->
  <div class="col">
    <fdash-count-up-green></fdash-count-up-green>
  </div>
  <div class="col">
    <div id="orangey"></div>
    <script>
      window.addEventListener('DOMContentLoaded', (event) => {
        const cOrangey = document.createElement("fdash-count-up-cyan");
        document.querySelector("#orangey").appendChild(cOrangey);
      });
    </script>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="card">
      <h6 class="card-header bg-light">Opening Balance</h6>
      <div class=" card-body position-relative">
        <canvas id="opening_bal" width="200" height="50"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row mt-2">
  <div class="col">
    <div class="card">
      <h6 class="card-header bg-light">Closing Balance</h6>
      <div class=" card-body position-relative">
        <canvas id="closing_bal" width="150" height="40"></canvas>
      </div>
    </div>
  </div>
</div>


<div class="row mt-2">
  <div class="col">
    <div class="card">
      <h6 class="card-header bg-light">Running Balance</h6>
      <div class=" card-body position-relative">
        <canvas id="running_bal" width="200" height="50"></canvas>
      </div>
    </div>
  </div>
</div>
<script>
  window.addEventListener('DOMContentLoaded', (event) => {
    fetch('./dashboard_od_closingbal.php')
      .then(response => response.json())
      .then(data => {
        let headers = data.map(row => row.bank + "\n" + row.date);
        let values = data.map(row => row["closing balance"]);
        drawClosingBalances(headers, values);
      })
      .catch((error) => {
        console.error('Error:', error);
      });

    fetch('./dashboard_od_openingbal.php')
      .then(response => response.json())
      .then(data => {
        let headers = data.map(row => row.bank + "\n" + row.date);
        let values = data.map(row => row["opening balance"]);
        drawOpeningBal(headers, values);
      })
      .catch((error) => {
        console.error('Error:', error);
      });

    fetch('./dashboard_od_stuff.php')
      .then(response => response.json())
      .then(data => {
        let headers = data.map(row => row.bank + "\n" + row.date);
        let values = data.map(row => row["Running_balance"]);
        drawRunningBal(headers, values);
      })
      .catch((error) => {
        console.error('Error:', error);
      });

    fetch('./dashboard_od_totaltransactions.php')
      .then(response => response.json())
      .then(data => {
        console.log(data);
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
          label: 'opening balance',
          data: values,
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
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

  function drawRunningBal(headers, values) {
    var ctx = document.getElementById('running_bal').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: headers,
        datasets: [{
          label: 'opening balance',
          data: values,
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
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
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
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

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
