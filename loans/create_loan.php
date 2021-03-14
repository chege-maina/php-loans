<?php
include "../includes/base_page/shared_top_tags.php"
?>


<h4>
  Create Loan
</h4>

<form onsubmit="return submitForm();">
  <div class="card">
    <div class="card-body">
      <!-- Content is to start here -->
      <div class="row ">

        <div class="col">
          <label for="bank" class="form-label">Select Bank</label>
          <select class="form-select" id="bank" required>
          </select>
        </div>

        <div class="col">
          <label for="d_date" class="form-label">Date of Disbursment*</label>
          <!-- autofill current date  -->
          <div class="control">
            <input type="date" value="<?php echo date("Y-m-d"); ?>" id="d_date" class="form-control" required>
          </div>
        </div>

        <div class="col">
          <label for="r_date" class="form-label">First Repayment Date*</label>
          <!-- autofill current date  -->
          <div class="control">
            <input type="date" value="<?php echo date("Y-m-d"); ?>" id="r_date" class="form-control" required>
          </div>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col">
          <label for="amt_dis" class="form-label">Amount Disbursed*</label>
          <input name="amt_dis" id="amt_dis" class="form-control" type="number" placeholder="Amount Disbursed" required>
        </div>
        <div class="col is-fullwidth">
          <label for="payment_period" class="form-label">Payment Period*</label>
          <div class="input-group">
            <input type="number" name="payment_period" id="payment_period" class="form-control" required placeholder="Payment Period" max="100" required>
            <span class="input-group-text">Months</span>
          </div>
        </div>
        <div class="col">
          <label for="repayment_amount" class="form-label">Fixed Repayment amount*</label>
          <input name="repayment_amount" id="repayment_amount" class="form-control" type="number" placeholder="Repayment Amount" required>
        </div>
        <div class="col">
          <label for="next_payment" class="form-label">Next Payment Installment*</label>
          <input name="next_payment" id="next_payment" class="form-control" type="number" placeholder="Next Payment" required>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col is-fullwidth">
          <label for="interest_rate" class="form-label">Interest Rate %pa*</label>
          <div class="input-group">
            <input type="number" name="interest_rate" id="interest_rate" class="form-control" required placeholder="Interest Rate" max="100" required>
            <span class="input-group-text">%</span>
          </div>
        </div>

        <div class="col is-fullwidth">
          <label for="charges" class="form-label">Late Repayment Charges*</label>
          <div class="input-group">
            <input type="number" name="charges" id="charges" class="form-control" required placeholder="Charges" max="100" required>
            <span class="input-group-text">%</span>
          </div>
        </div>

        <div class="col">
          <label for="loan_category" class="form-label">Loan Category*</label>
          <select class="form-select" id="loan_category" required>
            <option value="Reducing Balance">Reducing Balance</option>
            <option value="Straight">Straight</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col">
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
