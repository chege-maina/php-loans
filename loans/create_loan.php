<?php
include "../includes/base_page/shared_top_tags.php"
?>


<div class="block title">
  Create Loan
</div>
<form onsubmit="return submitForm();">
  <div class="card">
    <div class="card-content">
      <!-- Content is to start here -->
      <div class="columns ">

        <div class="column">
          <label for="bank" class="label">Select Bank</label>
          <div class="select is-fullwidth required">
            <div class="control">
              <select id="bank" required>
              </select>
            </div>
          </div>
        </div>

        <div class="column">
          <label for="d_date" class="label">Date of Disbursment*</label>
          <!-- autofill current date  -->
          <div class="control">
            <input type="date" value="<?php echo date("Y-m-d"); ?>" id="d_date" class="input" required>
          </div>
        </div>

        <div class="column">
          <label for="r_date" class="label">First Repayment Date*</label>
          <!-- autofill current date  -->
          <div class="control">
            <input type="date" value="<?php echo date("Y-m-d"); ?>" id="r_date" class="input" required>
          </div>
        </div>
      </div>

      <hr>

      <div class="columns">
        <div class="column">
          <label for="amt_dis" class="label">Amount Disbursed*</label>
          <input name="amt_dis" id="amt_dis" class="input" type="number" placeholder="Amount Disbursed" required>
        </div>
        <div class="column is-fullwidth">
          <label for="payment_period" class="label">Payment Period*</label>
          <div class="field has-addons">
            <p class="control">
              <input type="number" name="payment_period" id="payment_period" class="input" required placeholder="Payment Period" max="100" required>
            </p>
            <p class="control">
              <a>
                <a class="button is-static">Months</a>
              </a>
            </p>
          </div>
        </div>
        <div class="column">
          <label for="repayment_amount" class="label">Fixed Repayment amount*</label>
          <input name="repayment_amount" id="repayment_amount" class="input" type="number" placeholder="Repayment Amount" required>
        </div>
        <div class="column">
          <label for="next_payment" class="label">Next Payment Installment*</label>
          <input name="next_payment" id="next_payment" class="input" type="number" placeholder="Next Payment" required>
        </div>
      </div>

      <hr>

      <div class="columns">
        <div class="column is-fullwidth">
          <label for="interest_rate" class="label">Interest Rate %pa*</label>
          <div class="field has-addons">
            <p class="control is-expanded">
              <input type="number" name="interest_rate" id="interest_rate" class="input" required placeholder="Interest Rate" max="100" required>
            </p>
            <p class="control">
              <a>
                <a class="button is-static">%</a>
              </a>
            </p>
          </div>
        </div>

        <div class="column is-fullwidth">
          <label for="charges" class="label">Late Repayment Charges*</label>
          <div class="field has-addons">
            <p class="control is-expanded">
              <input type="number" name="charges" id="charges" class="input" required placeholder="Charges" max="100" required>
            </p>
            <p class="control">
              <a>
                <a class="button is-static">%</a>
              </a>
            </p>
          </div>
        </div>

        <div class="column">
          <label for="loan_category" class="label">Loan Category*</label>
          <div class="select is-fullwidth required">
            <div class="control">
              <select id="loan_category" required>
                <option value="Reducing Balance">Reducing Balance</option>
                <option value="Straight">Straight</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="columns">
        <div class="column">
          <button class="button is-link">Submit</button>
        </div>
      </div>

    </div>
  </div>

</form>
<?php
include "../includes/base_page/shared_bottom_tags.php"
?>

<script>
  const bank = document.querySelector("#bank");
  const d_date = document.querySelector("#d_date");
  const r_date = document.querySelector("#r_date");
  const amt_dis = document.querySelector("#amt_dis");
  const payment_period = document.querySelector("#payment_period");
  const repayment_amount = document.querySelector("#repayment_amount");
  const next_payment = document.querySelector("#next_payment");
  const interest_rate = document.querySelector("#interest_rate");
  const charges = document.querySelector("#charges");
  const loan_category = document.querySelector("#loan_category");

  function submitForm() {

    console.log("submitting");


    const formData = new FormData();

    console.log("====================================");
    console.log("bank_name", bank.value);
    console.log("dis_date", d_date.value);
    console.log("first_date", r_date.value);
    console.log("amount", amt_dis.value);
    console.log("period", payment_period.value);
    console.log("installment", repayment_amount.value);
    console.log("next_installment", next_payment.value);
    console.log("interest", interest_rate.value);
    console.log("late_repayment", charges.value);
    console.log("loan_category", loan_category.value);
    console.log("====================================");

    formData.append("bank_name", bank.value);
    formData.append("dis_date", d_date.value);
    formData.append("first_date", r_date.value);
    formData.append("amount", amt_dis.value);
    formData.append("period", payment_period.value);
    formData.append("installment", repayment_amount.value);
    formData.append("next_installment", next_payment.value);
    formData.append("interest", interest_rate.value);
    formData.append("late_repayment", charges.value);
    formData.append("loan_category", loan_category.value);

    fetch('../includes/add_loan.php', {
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
        console.error('Error:', error);
        showDangerAlert("Could not send data to server");
        removeAlert();
      });

    return false;
  }

  window.addEventListener('DOMContentLoaded', (event) => {
    initSelectElement("#bank", "-- Select Bank --");
    populateSelectElement("#bank", "../includes/load_bank.php", "name");


    // initSelectElement("#loan_category", "-- Select Loan Category --");
    // populateSelectElement("#loan_category", "../includes/#.php", "loan_category");



  });
</script>
