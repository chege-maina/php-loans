<?php
include "../includes/base_page/shared_top_tags.php"
?>


<div class="block title">
  Payment Schedule
</div>

<div class="card">
  <div class="card-content ">
    <!-- Content is to start here -->
    <div class="columns ">
      <div class="column is-4">
        <label for=" branch_name" class="label">Select Bank</label>
        <div class="field has-addons">
          <div class="control is-expanded">
            <div class="select is-fullwidth">
              <select name="bank_name" id="bank_name">
              </select>
            </div>
          </div>
          <div class="control">
            <button type="button" class="button is-info">Select</button>
          </div>
        </div>
      </div>
    </div>

    <hr>
    <div class="columns">
      <div class="column is-4">
        <label for=" branch_name" class="label">Select Loan</label>
        <div class="field has-addons">
          <div class="control is-expanded">
            <div class="select is-fullwidth">
              <select name="bank_loan">
              </select>
            </div>
          </div>
          <div class="control">
            <button type="button" class="button is-info">Select</button>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label class="label">Balance</label>
          <div class="control">
            <input class="input" type="text">
          </div>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label class="label">Next Payment</label>
          <div class="control">
            <input class="input" type="text">
          </div>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label class="label">Amount</label>
          <div class="control">
            <input class="input" type="text">
          </div>
        </div>
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
    populateSelectElement("#bank_name", "../includes/load_bank_schedule.php", "name");
  });
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
