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
          <input type="text" name="bank_name" id="bank_name" class="input" required placeholder="Bank name">
        </div>
      </div>

      <div class="column">
        <label for="branch_name" class="label">Branch</label>
        <div class="control">
          <input type="text" name="branch_name" id="branch_name" class="input" required placeholder="Branch name">
        </div>
      </div>

      <div class="column">
        <label for="account_number" class="label">Account Number</label>
        <div class="control">
          <input type="text" name="account_number" id="account_number" class="input" required placeholder="Account number">
        </div>
      </div>

      <div class="column">
        <label for="account_number" class="label">Account Name</label>
        <div class="control commify">
          <input type="text" name="account_number" id="account_number" class="input" required placeholder="Account name">
        </div>
      </div>

    </div>

    <div class="columns">

      <div class="column commify">
        <label for="opening_balance" class="label">Opening Balance</label>
        <div class="control">
          <input type="number" name="opening_balance" id="opening_balance" class="input" required placeholder="Opening balance">
        </div>
      </div>

      <div class="column">
        <label for="currency" class="label">Currency</label>
        <div class="control">
          <div class="select is-fullwidth">
            <select id="currency" name="currency">
            </select>
          </div>
        </div>

      </div>

      <div class="column">
        <label for="cheque_clear_days" class="label">Cheque Clear Days</label>
        <div class="control">
          <input type="number" name="cheque_clear_days" id="cheque_clear_days" class="input" required placeholder="Cheque clear days">
        </div>
      </div>

    </div>

    <div class="columns">

      <div class="column">
        <label for="overdraft_interest" class="label">Overdraft Interest</label>
        <div class="control">
          <input type="number" name="overdraft_interest" id="overdraft_interest" class="input" required placeholder="Overdraft interest">
        </div>
      </div>

      <div class="column">
        <label for="overlimit_interest" class="label">Overdraft Limit Interest</label>
        <div class="control">
          <input type="number" name="overlimit_interest" id="overlimit_interest" class="input" required placeholder="Overdraft Limit interest">
        </div>
      </div>

      <div class="column">
        <label for="late_payment_charges" class="label">Late Payment Charges</label>
        <div class="control">
          <input type="number" name="late_payment_charges" id="late_payment_charges" class="input" required placeholder="Late payment charges">
        </div>
      </div>

      <div class="column">
        <label for="overdraft_limit" class="label">Overdraft Limit</label>
        <div class="control">
          <input type="number" name="overdraft_limit" id="overdraft_limit" class="input" required placeholder="Overdraft charges">
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

<script>
  const currency = document.querySelector("#currency");
  window.addEventListener('DOMContentLoaded', (event) => {
    let opt = document.createElement("option");
    opt.appendChild(document.createTextNode("-- Select Currency --"));
    opt.setAttribute("value", "");
    opt.setAttribute("disabled", "");
    opt.setAttribute("selected", "");
    currency.appendChild(opt);


    fetch('../includes/load_currency.php')
      .then(response => response.json())
      .then(data => {
        console.log(data);
        data.forEach((value) => {
          let opt = document.createElement("option");
          opt.appendChild(document.createTextNode(value['name']));
          opt.value = value['name'];
          currency.appendChild(opt);
        });
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  });
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>