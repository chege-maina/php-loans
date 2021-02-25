<?php
include "../includes/base_page/shared_top_tags.php"
?>


<div class="block title">
  Overdraft Management
</div>

<div class="card">
  <div class="card-content">
    <div class="columns">
      <div class="column">
        <label for="r_date" class="label">Date</label>
        <input type="date" id="r_date" class="input has-background-info-light" readonly>
      </div>
      <div class="column">
        <label for="bank_name" class="label">Bank</label>
        <input name="bank_name" id="bank_name" class="input has-background-info-light" type="text" placeholder="Bank Name" required readonly>
      </div>
      <div class="column">
        <label for="opening_balance" class="label">Opening Balance</label>
        <input name="opening_balance" id="opening_balance" class="input has-background-info-light" type="text" placeholder="Opening Balance" required readonly>
      </div>
    </div>
    <hr>
    <div class="table-container">
      <table class="table is-hoverable is-fullwidth is-striped">
        <thead>
          <tr>
            <th>Banking Date</th>
            <th>CHR No#</th>
            <th>Supplier/Customer</th>
            <th>Value Date</th>
            <th>Money In</th>
            <th>Money Out</th>
            <th>Balance</th>
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
    <div class="columns">
      <div class="column ">
        <button class="button is-link">Submit</button>
      </div>
    </div>
  </div>
</div>

<script>
  const date = document.querySelector('#date');
  const bank_name = document.querySelector('#bank_name');
  const table_body = document.querySelector('#table_body');
  const table_foot = document.querySelector('#table_foot');
  window.addEventListener('DOMContentLoaded', (event) => {

    if (sessionStorage.length <= 0) {
      window.history.back();
    }

    bank_row = JSON.parse(sessionStorage.getItem('bank_row'));
    // Clear data
    // sessionStorage.clear();


    console.log(bank_row);
    //stored data in the defined constant variables
    r_date.value = bank_row["date"];
    bank_name.value = bank_row["bank"];

    const formData = new FormData();
    formData.append("date", bank_row["date"]);
    formData.append("bank", bank_row["bank"]);

    return;
    fetch('../includes/', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        console.log('Success:', result);
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
