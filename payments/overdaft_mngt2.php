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
        <label for="date" class="label">Date</label>
        <input type="date" value="<?php echo date("Y-m-d"); ?>" id="date_from" class="input has-background-info-light" readonly>
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
  </div>
</div>

<script>
  window.addEventListener('DOMContentLoaded', (event) => {


  });

  const date_from = document.querySelector('#date_from');
  const date_to = document.querySelector('#date_to');
  const bank_name = document.querySelector('#bank_name');
  const bank_name_data = document.querySelector('#bank_name_data');
  const acc_name = document.querySelector('#acc_name');
  const acc_number = document.querySelector('#acc_number');
  const table_body = document.querySelector('#table_body');
  const table_foot = document.querySelector('#table_foot');
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>