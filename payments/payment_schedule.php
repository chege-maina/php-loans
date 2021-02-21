<?php
include "../includes/base_page/shared_top_tags.php"
?>


<div class="block title">
  Overdraft Management
</div>

<div class="card">
  <div class="card-content ">
    <!-- Content is to start here -->
    <div class="columns ">
      <div class="column is-4">
        <label for=" branch_name" class="label">Select Bank Name</label>
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
            <button class="button is-info">Search</button>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="columns">
      <div class="column">
        <label for="loan_number" class="label">Loan Number</label>
        <input name="loan_number" id="loan_number" class="input" type="number" placeholder="Loan Number" required readonly>
      </div>
      <div class="column">
        <label for="bank_name" class="label">Bank Name*</label>
        <input name="bank_name" id="acc_name" class="input" type="text" placeholder="Bank Name" required readonly>
      </div>
      <div class="column">
        <label for="bank_acc" class="label">Bank Account*</label>
        <input name="bank_acc" id="bank_acc" class="input" type="text" placeholder="Bank Account" required readonly>
      </div>
    </div>
    <hr>
    <div class="table-container">
      <table class="table is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>Payment Number</th>
            <th>Payment Date</th>
            <th>Principle(P)</th>
            <th>Interest(I)</th>
            <th>Installment(P+I)</th>
            <th>Balance</th>
          </tr>
        </thead>
        <tbody id="table_body">
        </tbody>
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
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>