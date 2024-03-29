<?php
include "../includes/base_page/shared_top_tags.php"
?>


<h4>
  Post Daily Transactions
</h4>

<div class="card">
  <div class="card-body">
    <!-- Content is to start here -->
    <div class="row ">
      <div class="col col-md-4">
        <label for="bank_name" class="form-label">Select Bank Name</label>
        <div class="input-group">
          <select class="form-select" id="bank_name" required>
          </select>
          <button class="btn btn-primary" onclick="filterRequisitions()">Filter</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card mt-1">
  <div class="card-body">
    <hr>
    <table class="table table-sm is-hoverable is-fullwidth is-striped">
      <thead>
        <tr>
          <th>Date</th>
          <th>Pending Transactions</th>
          <th>Bank Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="table_body">
      </tbody>
      <tfoot id="table_foot">
      </tfoot>
    </table>
  </div>
</div>

<script>
  const bank_name = document.querySelector('#bank_name');
  const table_body = document.querySelector('#table_body');
  const table_foot = document.querySelector('#table_foot');
  let table_items = [];


  let updateTable = (data) => {
    table_body.innerHTML = "";
    let i = 0;
    data.forEach(value => {
      const this_row = document.createElement("tr");

      const date = document.createElement("td");
      date.appendChild(document.createTextNode(value["date"]));
      date.classList.add("align-middle");

      const trans = document.createElement("td");
      trans.appendChild(document.createTextNode(value["trans"]));
      trans.classList.add("align-middle");

      const bank = document.createElement("td");
      bank.appendChild(document.createTextNode(value["bank"]));
      bank.classList.add("align-middle");

      const req_actions = document.createElement("td");
      const btn = document.createElement("button");

      btn.setAttribute("onclick", "detailedView(" + i + ")");
      if (i > 0) {
        btn.setAttribute("disabled", "");
      }
      i++;
      btn.appendChild(document.createTextNode("Manage"));
      btn.classList.add("btn", "btn-sm", "btn-primary");
      req_actions.appendChild(btn);

      this_row.append(date, trans, bank, req_actions);
      table_body.appendChild(this_row);
    });

  }

  function detailedView(i) {
    console.log(table_items[i]);
    sessionStorage.setItem('bank_row', JSON.stringify(table_items[i]));
    window.location.href = "overdaft_mngt2.php";
  }

  //load the table

  window.addEventListener('DOMContentLoaded', (event) => {
    initSelectElement("#bank_name", "-- Select Bank --");
    populateSelectElement("#bank_name", "../includes/load_bank.php", "name");

    fetch('../includes/load_od_mngt.php')
      .then(response => response.json())
      .then(data => {
        console.log(data);
        table_items = data
        updateTable(data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  });


  function filterRequisitions() {
    const formData = new FormData();

    formData.append("bank", bank_name.value);
    fetch('../includes/filter_load_od_mngt.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        table_items = result;
        updateTable(result);
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
