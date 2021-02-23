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
      <div class="column">
        <label for="date" class="label">From</label>
        <!-- autofill current date  -->
        <div class="control">
          <input type="date" value="<?php echo date("Y-m-d"); ?>" id="date_from" class="input">
        </div>
      </div>
      <div class="column">
        <label for="date" class="label">To</label>
        <!-- autofill current date  -->
        <div class="control">
          <input type="date" value="<?php echo date("Y-m-d"); ?>" id="date_to" class="input">
        </div>
      </div>
      <div class="column">
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
            <button class="button is-info" onclick="getOverDrafts()">Search</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card mt-1">
  <div class="card-content">
    <div class="columns">
      <div class="column">
        <label for="bank_name" class="label">Bank Name*</label>
        <input name="bank_name" id="bank_name_data" class="input" type="text" placeholder="bank name" required readonly>
      </div>
      <div class="column">
        <label for="acc_name" class="label">Account Name*</label>
        <input name="acc_name" id="acc_name" class="input" type="text" placeholder="account name" required readonly>
      </div>
      <div class="column">
        <label for="acc_number" class="label">Account Number*</label>
        <input name="acc_number" id="acc_number" class="input" type="text" placeholder="account number" required readonly>
      </div>
    </div>
    <hr>
    <div class="table-container">
      <table class="table is-hoverable is-fullwidth is-striped">
        <thead>
          <tr>
            <th>Opening Balance</th>
            <th>Value Date</th>
            <th>DR</th>
            <th>CR</th>
            <th>Closing Balance</th>
            <th>OD Daily Interest</th>
          </tr>
        </thead>
        <tbody id="table_body">
        </tbody>
        <tfoot id="table_foot">
        </tfoot>
      </table>
      <div class="column">
        <div class="field has-addons has-addons-centered is-grouped is-grouped-right">

          <p class="control">
            <input type="number" class="input" name="total" id="total" required>
          </p>
          <p class="control">
            <a class="button is-info">
              Total
            </a>
          </p>
        </div>
      </div>
      <!-- Content ends here -->
    </div>
  </div>
</div>

<script>
  window.addEventListener('DOMContentLoaded', (event) => {
    initSelectElement("#bank_name", "-- Select Bank --");
    populateSelectElement("#bank_name", "../includes/load_bank.php", "name");
  });

  const date_from = document.querySelector('#date_from');
  const date_to = document.querySelector('#date_to');
  const bank_name = document.querySelector('#bank_name');
  const bank_name_data = document.querySelector('#bank_name_data');
  const acc_name = document.querySelector('#acc_name');
  const acc_number = document.querySelector('#acc_number');
  const table_body = document.querySelector('#table_body');
  const table_foot = document.querySelector('#table_foot');


  function getOverDrafts() {
    if (!bank_name.value) {
      bank_name.focus();
      return;
    }
    console.log("sending");

    const formData = new FormData();
    formData.append("date1", date_from.value);
    formData.append("date2", date_to.value);
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
        acc_name.value = result.acc_name;
        acc_number.value = result.acc_no;
        console.log(result.table_items);
        let cumulative_sum = 0;

        result.table_items.forEach((value) => {
          console.log(value);

          const tr = document.createElement("tr");

          const opening_bal = document.createElement("td");
          opening_bal.appendChild(document.createTextNode(value["opening_bal"]));

          const value_date = document.createElement("td");
          value_date.appendChild(document.createTextNode(value["value_date"]));

          const dr = document.createElement("td");
          dr.appendChild(document.createTextNode(value["dr"]));

          const cr = document.createElement("td");
          cr.appendChild(document.createTextNode(value["cr"]));

          const closing_bal = document.createElement("td");
          closing_bal.appendChild(document.createTextNode(value["closing_bal"]));

          const od_interest = document.createElement("td");
          od_interest.appendChild(document.createTextNode(value["od_interest"]));

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