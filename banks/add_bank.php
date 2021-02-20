<?php
include "../includes/base_page/shared_top_tags.php"
?>

<div class="block title">
  Add New Bank
</div>

<div class="box">

  <form id="form_tag" onsubmit="return submitForm();">
    <div class="columns">

      <div class="column">
        <label for="bank_name" class="label">Name</label>
        <div class="control">
          <input type="text" name="bank_name" id="bank_name" class="input is-link" required placeholder="Bank name">
        </div>
      </div>

      <div class="column">
        <label for="branch_name" class="label">Branch</label>
        <div class="control">
          <input type="text" name="branch_name" id="branch_name" class="input is-link" required placeholder="Branch name">
        </div>
      </div>

      <div class="column">
        <label for="account_number" class="label">Account Number</label>
        <div class="control">
          <input type="number" name="account_number" id="account_number" class="input is-link" required placeholder="Account number">
        </div>
      </div>

      <div class="column">
        <label for="account_number" class="label">Account Name</label>
        <div class="control commify">
          <input type="text" name="account_name" id="account_name" class="input is-link" required placeholder="Account name">
        </div>
      </div>

    </div>

    <div class="columns">

      <div class="column commify">
        <label for="opening_balance" class="label">Opening Balance</label>
        <div class="control">
          <input type="number" name="opening_balance" id="opening_balance" class="input is-link" required placeholder="Opening balance">
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
          <input type="number" name="cheque_clear_days" id="cheque_clear_days" class="input is-link" required placeholder="Cheque clear days" max="15">
        </div>
      </div>

    </div>

    <div class="columns">

      <div class="column">
        <label for="overdraft_interest" class="label">Overdraft Interest</label>
        <div class="control">
          <input type="number" name="overdraft_interest" id="overdraft_interest" class="input is-link" required placeholder="Overdraft interest" max="100">
        </div>
      </div>

      <div class="column">
        <label for="overlimit_interest" class="label">Overdraft Limit Interest</label>
        <div class="control">
          <input type="number" name="overlimit_interest" id="overlimit_interest" class="input is-link" required placeholder="Overdraft Limit interest" max="100">
        </div>
      </div>

      <div class="column">
        <label for="late_payment_charges" class="label">Late Payment Charges</label>
        <div class="control">
          <input type="number" name="late_payment_charges" id="late_payment_charges" class="input is-link" required placeholder="Late payment charges" max="100">
        </div>
      </div>

      <div class="column">
        <label for="overdraft_limit" class="label">Overdraft Limit</label>
        <div class="control">
          <input type="number" name="overdraft_limit" id="overdraft_limit" class="input is-link" required placeholder="Overdraft charges">
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
  const form_tag = document.querySelector("#form_tag");

  const bank_name = document.querySelector("#bank_name");
  const branch_name = document.querySelector("#branch_name");
  const account_number = document.querySelector("#account_number");
  const account_name = document.querySelector("#account_name");

  const opening_balance = document.querySelector("#opening_balance");
  const cheque_clear_days = document.querySelector("#cheque_clear_days");
  const currency = document.querySelector("#currency");

  const overdraft_interest = document.querySelector("#overdraft_interest");
  const overlimit_interest = document.querySelector("#overlimit_interest");
  const overdraft_limit = document.querySelector("#overdraft_limit");
  const late_payment_charges = document.querySelector("#late_payment_charges");

  function submitForm() {

    console.log("Submitting");
    const formData = new FormData();
    formData.append("bank_name", bank_name.value);
    formData.append("branch", branch_name.value);
    formData.append("acc_no", account_number.value);
    formData.append("acc_name", account_name.value);
    formData.append("currency", currency.value);
    formData.append("opening_bal", opening_balance.value);
    formData.append("clear_days", cheque_clear_days.value);
    formData.append("od_limit", overdraft_limit.value);
    formData.append("id_interest", overlimit_interest.value);
    formData.append("over_limit", overdraft_limit.value);
    formData.append("late_charges", late_payment_charges.value);

    fetch('../includes/add_bank.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        console.log('Success:', result);
        if (result["message"] === "success") {
          showSuccessAlert("Record stored successfuly");
          reloadPage();
        } else {
          let msg = !("desc" in result) || result["desc"].trim() === "" ?
            "Record not stored" : result["desc"];
          showDangerAlert(msg);
          removeAlert();
        }
      })
      .catch(error => {
        console.log(error)
        showDangerAlert("Could not send data to server");
        removeAlert();
        // reloadPage(5000);
      });

    return false;
  }


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
