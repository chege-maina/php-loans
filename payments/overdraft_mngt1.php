<?php
include "../includes/base_page/shared_top_tags.php"
?>


<div class="block title">
  Overdraft Management
</div>

<div class="card">
  <div class="card-content">
    <!-- Content is to start here -->
    <div class="columns ">
      <div class="column is-4">
        <label for="bank_name" class="label">Select Bank Name</label>
        <div class="select is-fullwidth">
          <div class="control">
            <select id="bank_name" required>
            </select>
          </div>
        </div>
      </div>
      <div class="column-auto pt-5">
        <div class="control">
          <div class="column">
            <label for="bank" class="label"> </label>
            <button class="button is-info" onclick="filterRequisitions()">Filter</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card mt-1">
  <div class="card-content">
    <hr>
    <div class="table-container">
      <table class="table is-hoverable is-fullwidth is-striped">
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
      <!-- Content ends here -->
    </div>
  </div>
</div>

<script>
  const bank_name = document.querySelector('#bank_name');
  const table_body = document.querySelector('#table_body');
  const table_foot = document.querySelector('#table_foot');


  let updateTable = (data) => {
    table_body.innerHTML = "";
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

      btn.setAttribute("onclick", "detailedView(" + value["bank_name"] + ")");
      btn.appendChild(document.createTextNode("Manage"));
      btn.classList.add("button", "is-small", "is-info");
      req_actions.appendChild(btn);

      this_row.append(date, trans, bank, req_actions);
      table_body.appendChild(this_row);
    });

  }

  function detailedView(bank_name) {
    console.log("Bank Name: ", bank_name);
    sessionStorage.setItem('bank_name', bank_name);
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
        updateTable(data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  });


  function filterRequisitions() {
    const formData = new FormData();

    formData.append("bank", bank.value);
    console.log(branch);

    fetch('../includes/#.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
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