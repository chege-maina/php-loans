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
        <label for="branch_name" class="label">Select Bank Name</label>
        <div class="select is-fullwidth">
          <div class="control">
            <select id="bank_name" required>
            </select>
          </div>
        </div>
      </div>
      <div class="column-auto py-5">
        <div class="control">
          <div class="column">
            <label for="branch" class="label"> </label>
            <button class="button is-info" onclick="getOverDrafts()">Filter</button>
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
  window.addEventListener('DOMContentLoaded', (event) => {
    initSelectElement("#bank_name", "-- Select Bank --");
    populateSelectElement("#bank_name", "../includes/load_bank.php", "name");
  });

  const bank_name = document.querySelector('#bank_name');
  const bank_name_data = document.querySelector('#bank_name_data');
  const table_body = document.querySelector('#table_body');
  const table_foot = document.querySelector('#table_foot');


  function getOverDrafts() {
    if (!bank_name.value) {
      bank_name.focus();
      return;
    }
    console.log("sending");

    const formData = new FormData();
    formData.append("bank", bank_name.value);

    fetch('../includes/overdraft_management.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        if (result.length <= 0) {
          // TODO(c3n7): Show an appropriate alert
          return;
        }
        result = result[0];
        bank_name_data.value = result.bank;
        console.log(result.table_items);
        let cumulative_sum = 0;

        result.table_items.forEach((value) => {
          console.log(value);

          const tr = document.createElement("tr");

          const value_date = document.createElement("td");
          value_date.appendChild(document.createTextNode(value["date"]));

          const dr = document.createElement("td");
          dr.appendChild(document.createTextNode(value["pendingtr"]));

          const cr = document.createElement("td");
          cr.appendChild(document.createTextNode(value["cr"]));

          const closing_bal = document.createElement("td");
          closing_bal.appendChild(document.createTextNode(value["bank"]));

          const od_interest = document.createElement("td");
          od_interest.appendChild(document.createTextNode(value["action"]));

          tr.append(opening_bal,
            value_date, dr, cr, closing_bal, od_interest);
          table_body.appendChild(tr);
        });

        // const tr = document.createElement("tr");

        // const col_span = document.createElement("th");
        // col_span.setAttribute("colspan", 5);

        // const total_sum = document.createElement("th");
        // total_sum.appendChild(document.createTextNode("Pesa Mingi"));

        // tr.append(col_span, total_sum);
        // table_foot.appendChild(tr);
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>