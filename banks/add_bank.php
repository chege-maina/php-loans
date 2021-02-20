<?php
include "../includes/base_page/shared_top_tags.php"
?>

<div class="block title">
  Add New Bank
</div>

<div class="box">

  <form action="#" method="post">
    <div class="columns">

      <div class="column">
        <label for="bank_name" class="label">Name</label>
        <div class="control">
          <input type="text" name="bank_name" id="bank_name" class="input" required>
        </div>
      </div>

      <div class="column">
        <label for="branch_name" class="label">Branch</label>
        <div class="control">
          <input type="text" name="branch_name" id="branch_name" class="input" required>
        </div>
      </div>

      <div class="column">
        <label for="account_number" class="label">Account Number</label>
        <div class="control">
          <input type="text" name="account_number" id="account_number" class="input" required>
        </div>
      </div>

      <div class="column">
        <label for="account_number" class="label">Account Name</label>
        <div class="control">
          <input type="text" name="account_number" id="account_number" class="input" required>
        </div>
      </div>

    </div>

    <div class="columns">

      <div class="column">
        <label for="opening_balance" class="label">Opening Balance</label>
        <div class="control">
          <input type="text" name="opening_balance" id="opening_balance" class="input" required>
        </div>
      </div>

      <div class="column">
        <label for="currency" class="label">Currency</label>
        <div class="control">
          <input type="text" name="currency" id="currency" class="input" required>
        </div>
      </div>

      <div class="column">
        <label for="cheque_clear_days" class="label">Cheque Clear Days</label>
        <div class="control">
          <input type="text" name="cheque_clear_days" id="cheque_clear_days" class="input" required>
        </div>
      </div>

    </div>

    <div class="columns">

      <div class="column">
        <label for="overdraft_interest" class="label">Overdraft Interest</label>
        <div class="control">
          <input type="text" name="overdraft_interest" id="overdraft_interest" class="input" required>
        </div>
      </div>

      <div class="column">
        <label for="overlimit_interest" class="label">Overlimit Interest</label>
        <div class="control">
          <input type="text" name="overlimit_interest" id="overlimit_interest" class="input" required>
        </div>
      </div>

      <div class="column">
        <label for="late_payment_charges" class="label">Late Payment Charges</label>
        <div class="control">
          <input type="text" name="late_payment_charges" id="late_payment_charges" class="input" required>
        </div>
      </div>

      <div class="column">
        <label for="overdraft_limit" class="label">Overdraft Limit</label>
        <div class="control">
          <input type="text" name="overdraft_limit" id="overdraft_limit" class="input" required>
        </div>
      </div>

    </div>

    <div class="field is-grouped">
      <div class="control">
        <button class="button is-link">Submit</button>
      </div>
    </div>
  </form>
</div>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
