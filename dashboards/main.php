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
  <div class="col col-md-3 ml-0">
    <div class="card">
      <div class="card-body position-relative">
        <div id="ob_rose" style="height: 400px" data-echart-responsive="true">
        </div>
      </div>
    </div>
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

  <div class="col col-md-3 ml-0">
    <div class="card">
      <div class="card-body position-relative">
        <div id="rb_pie" style="height: 400px" data-echart-responsive="true">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-2">
  <div class="col col-md-3 ml-0">
    <div class="card">
      <div class="card-body position-relative">
        <div id="cl_pie" style="height: 400px" data-echart-responsive="true">
        </div>
      </div>
    </div>
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
    let myChart = echarts.init(document.getElementById(id));

    // specify chart configuration item and data
    let option = {
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


  // let createRose = (id, headers, values, title, legend) => {
  let createRose = (id, data, legend) => {
    let myChart = echarts.init(document.getElementById(id));
    let option = {
      legend: {
        top: 'bottom'
      },
      tooltip: {},
      toolbox: {
        show: true,
        feature: {
          mark: {
            show: true
          },
          dataView: {
            show: true,
            readOnly: false
          },
          restore: {
            show: true
          },
          saveAsImage: {
            show: true
          }
        }
      },
      series: [{
        name: legend,
        type: 'pie',
        radius: [30, 100],
        center: ['50%', '50%'],
        roseType: 'area',
        itemStyle: {
          borderRadius: 8
        },
        data: data,
      }]
    };
    // use configuration item and data specified to show chart
    myChart.setOption(option);

  };

  function nbrSign(val) {
    return val < 0 ? "-" : "+";
  }


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

        let p_headers = data.map(row => row.bank);
        let pie_data = [];
        for (let i = 0; i < headers.length; i++) {
          pie_data.push({
            value: Math.abs(values[i]),
            name: p_headers[i] + ` (${nbrSign(values[i])})`
          })
        }
        createRose("cl_pie", pie_data, "closing balance");
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

        let p_headers = data.map(row => row.bank);
        let pie_data = [];
        for (let i = 0; i < headers.length; i++) {
          pie_data.push({
            value: Math.abs(values[i]),
            name: p_headers[i] + ` (${nbrSign(values[i])})`
          })
        }
        createRose("ob_rose", pie_data, "opening balance");

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

        let p_headers = data.map(row => row.bank);
        let pie_data = [];
        for (let i = 0; i < headers.length; i++) {
          pie_data.push({
            value: Math.abs(values[i]),
            name: p_headers[i] + ` (${nbrSign(values[i])})`
          })
        }
        createRose("rb_pie", pie_data, "running balance");


      })
      .catch((error) => {
        console.error('Error:', error);
      });
  });
</script>



<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
