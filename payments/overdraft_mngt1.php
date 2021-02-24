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

    <div class="columns">
      <div class="column has-text-right has-text-weight-bold">
        Sub Total</div>
      <div class="column is-3">
        <div class="control">
          <input class="input" type="text" readonly id="sub_total" />
        </div>
      </div>
    </div>
    <div class="columns">
      <div class="column has-text-right has-text-weight-bold">
        16% VAT
      </div>
      <div class="column is-3">
        <div class="control">
          <input class="input" type="text" readonly id="tax" />
        </div>
      </div>
    </div>
    <div class="columns">
      <div class="column has-text-right has-text-weight-bold">
        Total Amount
      </div>
      <div class="column is-3">
        <div class="control">
          <input class="input" type="text" readonly id="amount" />
        </div>
      </div>
    </div>

    <div class="columns">
      <div class="column">
        <button class="button is-link">Submit</button>
      </div>
    </div>

  </div>
</div>

<script>
  const bank_name = document.querySelector('#bank_name');
  const sub_total = document.querySelector("#sub_total");
  const tax = document.querySelector("#tax");
  const amount = document.querySelector("#amount");
  const table_body = document.querySelector('#table_body');
  const table_foot = document.querySelector('#table_foot');


  let updateTable = (data) => {
    table_body.innerHTML = "";
    data.forEach(value => {
      const this_row = document.createElement("tr");

      const date = document.createElement("td");
      date.appendChild(document.createTextNode(value["date"]));
      date.classList.add("align-middle");

      const pendingtr = document.createElement("td");
      pendingtr.appendChild(document.createTextNode(value["pendingtr"]));
      pendingtr.classList.add("align-middle");

      const bank = document.createElement("td");
      bank.appendChild(document.createTextNode(value["bank"]));
      bank.classList.add("align-middle");

      const req_actions = document.createElement("td");
      const btn = document.createElement("button");
      //****//
      btn.setAttribute("onclick", "detailedView(" + value["req_no"] + ")");
      btn.appendChild(document.createTextNode("Manage"));
      btn.classList.add("btn", "btn-falcon-primary", "btn-sm");
      req_actions.appendChild(btn);

      this_row.append(date, pendingtr, bank, req_actions);
      table_body.appendChild(this_row);
    });

  }
  //load the table
  window.addEventListener('DOMContentLoaded', (event) => {
    fetch('../includes/#.php')
      .then(response => response.json())
      .then(data => {
        updateTable(data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  });

  window.addEventListener('DOMContentLoaded', (event) => {
    initSelectElement("#bank_name", "-- Select Bank --");
    populateSelectElement("#bank_name", "../includes/load_bank.php", "name");

    //load three fields at the bottom 
    const formData = new FormData();
    //  formData.append("req_no", reqNo)
    fetch('../includes/#.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        data = result[0];
        sub_total.value = data["sub_total"];
        tax.value = data["tax"];
        amount.value = data["amount"];
        // Nested fetch start
        // fetchTableItems();
        // Nested fetch end

      })
      .catch(error => {
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