<?php
include "../includes/base_page/shared_top_tags.php"
?>

<h4>
  Add New Bank
</h4>

<div class="card">
  <div class="card-body">

    <form id="form_tag" onsubmit="return submitForm();">
      <div class="row">

        <div class="col">
          <label for="bank_name" class="form-label">Name</label>
          <div class="control">
            <input type="text" name="bank_name" id="bank_name" class="form-control" required placeholder="Bank name">
          </div>
        </div>

        <div class="col">
          <label for="branch_name" class="form-label">Branch</label>
          <div class="control">
            <input type="text" name="branch_name" id="branch_name" class="form-control" required placeholder="Branch name">
          </div>
        </div>

        <div class="col">
          <label for="account_number" class="form-label">Account Number</label>
          <div class="control">
            <input type="number" class="form-control" id="account_number" required placeholder="Account number">
          </div>
        </div>

        <div class="col">
          <label for="account_number" class="form-label">Account Name</label>
          <div class="control">
            <input type="text" name="account_name" id="account_name" class="form-control" required placeholder="Account name">
          </div>
        </div>

      </div>
      <hr>
      <div class="row">

        <div class="col">
          <label for="opening_balance" class="form-label">Opening Balance</label>
          <div class="control commify">
            <input type="text" class="form-control" required placeholder="Opening balance" data-commify="opening_balance">
          </div>
        </div>
        <div class="col">
          <label for="date" class="form-label"> As of Date</label>
          <!-- autofill current date  -->
          <div class="control">
            <input type="date" value="<?php echo date("Y-m-d"); ?>" id="p_date" class="form-control" required>
          </div>
        </div>
        <div class="col">
          <label for="currency" class="form-label">Currency</label>
          <div class="control">
            <select id="currency" class="form-select" name="currency">
            </select>
          </div>

        </div>

        <div class="col">
          <label for="cheque_clear_days" class="form-label">Cheque Clear Days</label>
          <div class="control">
            <input type="number" name="cheque_clear_days" id="cheque_clear_days" class="form-control" required placeholder="Cheque clear days" max="15">
          </div>
        </div>

      </div>
      <hr>
      <div class="row">

        <div class="col">
          <label for="overdraft_interest" class="form-label">Overdraft Interest</label>
          <div class="input-group">
            <input type="number" name="overdraft_interest" id="overdraft_interest" class="form-control" required placeholder="Overdraft interest" max="100">
            <span class="input-group-text is-static">%</span>
          </div>
        </div>


        <div class="col is-fullwidth">
          <label for="overlimit_interest" class="form-label">Overdraft Limit Interest</label>
          <div class="input-group">
            <input type="number" name="overlimit_interest" id="overlimit_interest" class="form-control" required placeholder="Overdraft Limit interest" max="100">
            <span class="input-group-text is-static">%</span>
          </div>
        </div>

        <div class="col">
          <label for="overdraft_limit" class="form-label">Overdraft Limit</label>
          <div class="control">
            <input type="number" name="overdraft_limit" id="overdraft_limit" class="form-control" required placeholder="Overdraft charges">
          </div>
        </div>

      </div>

      <div class="row mt-2">
        <div class="col">
          <button class="btn btn-falcon-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  const form_tag = document.querySelector("#form_tag");

  const bank_name = document.querySelector("#bank_name");
  const branch_name = document.querySelector("#branch_name");
  const account_name = document.querySelector("#account_name");
  const account_number = document.querySelector("#account_number");

  const cheque_clear_days = document.querySelector("#cheque_clear_days");
  const currency = document.querySelector("#currency");

  const overdraft_interest = document.querySelector("#overdraft_interest");
  const overlimit_interest = document.querySelector("#overlimit_interest");
  const overdraft_limit = document.querySelector("#overdraft_limit");
  const p_date = document.querySelector("#p_date");


  let opening_balance;

  function submitForm() {

    console.log("Submitting");
    const formData = new FormData();
    formData.append("bank_name", bank_name.value);
    formData.append("acc_no", account_number.value);
    formData.append("acc_name", account_name.value);
    formData.append("currency", currency.value);
    formData.append("opening_bal", opening_balance.value);
    formData.append("clear_days", cheque_clear_days.value);
    formData.append("od_limit", overdraft_limit.value);
    formData.append("id_interest", overdraft_interest.value);
    formData.append("over_limit", overlimit_interest.value);
    formData.append("branch", branch_name.value);
    formData.append("date", p_date.value);
    // TODO: Remove this from the accompanying php
    formData.append("late_charges", "");

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

    initSelectElement("#currency", "-- Select Currency --");
    populateSelectElement("#currency", '../includes/load_currency.php', "name");

    commifyAll();
    opening_balance = document.querySelector("#opening_balance");


  });
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
