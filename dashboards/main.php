<?php
include "../includes/base_page/shared_top_tags.php"
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/echarts@5.0.2/dist/echarts.min.js"></script>

<script src="https://unpkg.com/vue"></script>
<script src="../components/fdash-components/dist/fdash.js"></script>

<h4>Dashboard</h4>
<div class="row mb-2">
  <div class="col">
    <div id="cyaney"></div>
  </div>
  <div class="col">
    <div id="greeney"></div>
  </div>
  <div class="col">
    <div id="orangey"></div>
    <script>
    </script>
  </div>
</div>

<div class="row">
  <div class="col col-md-2">
  </div>
  <div class="col">
    <div class="card">
      <div class=" card-body position-relative">
        <div id="opening_bal" style="height:400px;" data-echart-responsive="true"></div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-2">
  <div class="col">
    <div class="card">
      <div class=" card-body position-relative">
        <div id="running_bal" style="height:400px;" data-echart-responsive="true"></div>
      </div>
    </div>
  </div>
  <div class="col col-md-2">
  </div>
</div>

<div class="row mt-2">
  <div class="col col-md-2">
  </div>
  <div class="col">
    <div class="card">
      <div class=" card-body position-relative">
        <!-- prepare a DOM container with width and height -->
        <div id="closing_chart" style="height:400px;" data-echart-responsive="true"></div>
      </div>
    </div>
  </div>
</div>

<script>
  function addCountUpOrangey(data, key) {
    const elem = document.createElement("fdash-count-up-orangey");
    elem.setAttribute("title", data.bank);
    elem.setAttribute("title_chip", data.date);
    elem.setAttribute("end_value", data[key]);
    elem.setAttribute("prefix", "KSh. ");
    elem.setAttribute("footer", key.replaceAll("_", " ").trim().toLowerCase());
    document.querySelector("#orangey").appendChild(elem);
  }

  function addCountUpCyaney(data, key) {
    const elem = document.createElement("fdash-count-up-cyan");
    elem.setAttribute("title", data.bank);
    elem.setAttribute("title_chip", data.date);
    elem.setAttribute("end_value", data[key]);
    elem.setAttribute("prefix", "KSh. ");
    elem.setAttribute("footer", key.replaceAll("_", " ").trim().toLowerCase());
    document.querySelector("#cyaney").appendChild(elem);
  }

  function addCountUpGreeney(data, key) {
    const elem = document.createElement("fdash-count-up-green");
    elem.setAttribute("title", data.bank);
    elem.setAttribute("title_chip", data.date);
    elem.setAttribute("end_value", data[key]);
    elem.setAttribute("prefix", "KSh. ");
    elem.setAttribute("footer", key.replaceAll("_", " ").trim().toLowerCase());
    document.querySelector("#greeney").appendChild(elem);
  }



  let createEchart = (id, headers, values, title, legend) => {
    var myChart = echarts.init(document.getElementById(id));

    // specify chart configuration item and data
    var option = {
      title: {
        text: title,
      },
      tooltip: {},
      legend: {
        data: [legend]
      },
      xAxis: {
        data: headers,
      },
      yAxis: {},
      series: [{
        name: legend,
        type: 'bar',
        data: values,
      }]
    };

    // use configuration item and data specified to show chart
    myChart.setOption(option);

  };


  window.addEventListener('DOMContentLoaded', (event) => {
    fetch('./dashboard_od_closingbal.php')
      .then(response => response.json())
      .then(data => {

        let i = (Math.random() * (data.length - 1)).toFixed(0);
        const rand_row = data[i];
        addCountUpOrangey(rand_row, "closing balance");

        let headers = data.map(row => row.bank + "\n" + row.date);
        let values = data.map(row => row["closing balance"]);
        createEchart('closing_chart', headers, values, "Closing Balance", "closing balance");
      })
      .catch((error) => {
        console.error('Error:', error);
      });

    fetch('./dashboard_od_openingbal.php')
      .then(response => response.json())
      .then(data => {

        let i = (Math.random() * (data.length - 1)).toFixed(0);
        const rand_row = data[i];
        addCountUpCyaney(rand_row, "opening balance");

        console.log(data);
        let headers = data.map(row => row.bank + "\n" + row.date);
        let values = data.map(row => row["opening balance"]);
        createEchart('opening_bal', headers, values, "Opening Balance", "opening balance");
      })
      .catch((error) => {
        console.error('Error:', error);
      });

    fetch('./dashboard_od_stuff.php')
      .then(response => response.json())
      .then(data => {

        let i = (Math.random() * (data.length - 1)).toFixed(0);
        const rand_row = data[i];
        addCountUpGreeney(rand_row, "Running_balance");

        let headers = data.map(row => row.bank + "\n" + row.date);
        let values = data.map(row => row["Running_balance"]);
        createEchart('running_bal', headers, values, "Running Balance", "running balance");
        createEchart('running_bal', headers, values, "Running Balance", "running balance");
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  });
</script>



<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
