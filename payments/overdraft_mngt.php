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
        <label for="date" class="label">To</label>
        <!-- autofill current date  -->
        <div class="control">
          <input type="date" value="<?php echo date("Y-m-d"); ?>" id="date" class="input is-link">
        </div>
      </div>
      <div class="column">
        <label for="date" class="label">From</label>
        <!-- autofill current date  -->
        <div class="control">
          <input type="date" value="<?php echo date("Y-m-d"); ?>" id="date" class="input is-link">
        </div>
      </div>
      <div class="column">
        <label for="branch_name" class="label">Select Bank Name</label>
        <div class="select is-fullwidth">
          <div class="control">
            <select>
              <option value="#">-- Select Bank Name --</option>
            </select>
          </div>
        </div>
      </div>
      <div class="column-auto ">
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
        <label for="bank_name" class="label">Bank Name*</label>
        <input name="bank_name" id="bank_name" class="input" type="text" placeholder="bank name" required readonly>
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
      <table class="table is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>Date Banked</th>
            <th>Value Date</th>
            <th>Details</th>
            <th>Cheque Number</th>
            <th>DR</th>
            <th>CR</th>
            <th>Balance</th>
            <th>OD Interest</th>
          </tr>
        </thead>
        <tbody id="table_body">
        </tbody>
      </table>
      <div class="field has-addons has-addons-centered is-grouped is-grouped-right">
        <p class="control">
          <a class="button is-info is-light">
            Total
          </a>
        </p>
        <div class="column-left ">
          <p class="control">
            <input type="number" class="input" name="total" id="total" required>
          </p>
        </div>
      </div>
      <!-- Content ends here -->
    </div>

    <?php
    include "../includes/base_page/shared_bottom_tags.php"
    ?>