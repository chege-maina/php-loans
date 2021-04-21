<?php
include "../includes/base_page/shared_top_tags.php"
?>


<h4>
  Loan Repayment
</h4>

<div class="card">
  <div class="card-body ">
    <form onsubmit="return submitForm();">
      <!-- Content is to start here -->
      <div class="row">
        <div class="col">
          <div class="field">
            <label class="form-label">Bank</label>
            <div class="control">
              <input class="form-control has-background-light" type="text" id="bank" required readonly placeholder="Bank">
            </div>
          </div>
        </div>
        <div class="col">
          <label for="loan_amt" class="form-label">Disbursed Loan Amount</label>
          <div class="input-group">
            <input type="number" name="loan_amt" id="loan_amt" class="form-control has-background-light" required placeholder="Loan Amount" readonly>
            <span class="input-group-text">KES</span>
          </div>
        </div>
        <div class="col">
          <label for="balance" class="form-label">Principle Loan Outstanding</label>
          <div class="input-group">
            <input type="number" name="balance" id="balance" class="form-control has-background-light" required placeholder="Balance" readonly>
            <span class="input-group-text">KES</span>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col">
          <div class="field">
            <label class="form-label">Repayment Date</label>
            <div class="control">
              <input class="form-control has-background-light" type="date" id="next_repayment_date" readonly required placeholder="Next Repayment Date">
            </div>
          </div>
        </div>

        <div class="col">
          <div class="field">
            <label class="form-label">Disbursement Date</label>
            <div class="control">
              <input class="form-control has-background-light" type="date" id="disbursment_date" required readonly placeholder="Disbursement Date">
            </div>
          </div>
        </div>

        <div class="col">
          <label for="principle" class="form-label">Principle</label>
          <div class="input-group">
            <input type="number" name="principle" id="principle" class="form-control has-background-light" required placeholder="Principle" readonly>
            <span class="input-group-text">KES</span>
          </div>
        </div>
      </div>

      <div class="row mt-2">
        <div class="col">
          <label for="interest" class="form-label">Interest</label>
          <div class="input-group">
            <input type="number" name="interest" id="interest" class="form-control has-background-light" required placeholder="Interest" readonly>
            <span class="input-group-text">KES</span>
          </div>
        </div>

        <div class="col">
          <div class="field">
            <label class="form-label">Installment No</label>
            <div class="control">
              <input class="form-control has-background-light" type="text" id="installment_no" readonly required placeholder="Installment No">
            </div>
          </div>
        </div>

        <div class="col">
          <div class="field">
            <label class="form-label">Repayment Amount</label>
            <div class="control">
              <input class="form-control has-background-light" type="text" id="installment" required readonly placeholder="Installment">
            </div>
          </div>
        </div>
      </div>

      <hr>
      <div class="row ">
        <div class="col">
          <label for="tr_date" class="form-label">Select Transaction Date</label>
          <div class="control">
            <input class="form-control" type="date" id="tr_date" onchange="setDateDifference(this.value);" required>
          </div>
        </div>
        <div class="col">
          <div class="field">
            <label class="form-label">Days In Arrears</label>
            <div class="control">
              <input class="form-control has-background-light" type="number" id="arrears" readonly>
            </div>
          </div>
        </div>

        <div class="col">
          <label for="late_charges" class="form-label">Late Charges</label>
          <div class="input-group">
            <input type="number" name="late_charges" id="late_charges" class="form-control has-background-light" required placeholder="Late Charges" readonly>
            <span class="input-group-text">KES</span>
          </div>
        </div>

        <div class="col is-fullwidth">
          <label for="total" class="form-label">Total Amount</label>
          <div class="input-group">
            <input type="number" name="total" id="total" class="form-control has-background-light" required readonly placeholder="Total Amount">
            <span class="input-group-text">KES</span>
          </div>
        </div>

      </div>

      <div class="row mt-3">


        <div class="col is-fullwidth">
          <label for="paid" class="form-label">Amount Paid</label>
          <div class="input-group">
            <input type="number" name="paid" id="paid" class="form-control" required placeholder="Amount Paid">
            <span class="input-group-text">KES</span>
          </div>
        </div>

        <div class="col">
          <label for="cheque_no" class="form-label">Cheque No</label>
          <input type="number" name="cheque_no" id="cheque_no" class="form-control" required placeholder="Cheque Number">
        </div>

        <div class="col">
          <label for="payment_method" class="form-label">Select Cheque Type</label>
          <select class="form-select" name="payment_method" id="payment_method" required>
            <option value disabled selected>-- Select Cheque Type --</option>
            <option value="inhouse">Inhouse</option>
            <option value="interbank">Interbank</option>
            <option value="inhouse">RTGS</option>
          </select>
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
  const bank = document.querySelector('#bank');
  const loan_amt = document.querySelector('#loan_amt');
  const balance = document.querySelector('#balance');
  const payment_date = document.querySelector('#next_repayment_date');
  const disbursment_date = document.querySelector('#disbursment_date');
  const principle = document.querySelector('#principle');
  const interest = document.querySelector('#interest');
  const installment_no = document.querySelector('#installment_no');
  const installment = document.querySelector('#installment');
  const tr_date = document.querySelector('#tr_date');
  const arrears = document.querySelector('#arrears');
  const late_charges = document.querySelector('#late_charges');
  const cheque_no = document.querySelector("#cheque_no");
  const payment_method = document.querySelector("#payment_method");
  const total_field = document.querySelector("#total");
  const paid = document.querySelector("#paid");

  function updatePaidAmountMin() {
    return;
    paid.setAttribute("min", total.value);
    paid.setAttribute("max", total.value);
  }



  function submitForm() {
    const formData = new FormData();


    console.log("=================================================")
    console.log("'''''''''''''''''''''''''''''''''''''''''''''''''");
    console.log("pay_no", installment_no.value);
    console.log("installment", total_field.value);
    console.log("transct_date", tr_date.value);
    console.log("pay_date", payment_date.value);
    console.log("loan_acc", sessionStorage.getItem("loan_account"));
    console.log("bank", bank.value);
    console.log("amount", paid.value);
    console.log("late_charges", late_charges.value);
    console.log("arrear_days", arrears.value);
    console.log("cheque_no", cheque_no.value);
    console.log("cheque_type", payment_method.value);
    console.log("=================================================")



    formData.append("pay_no", installment_no.value);
    formData.append("installment", total_field.value);
    formData.append("transct_date", tr_date.value);
    formData.append("pay_date", payment_date.value);
    formData.append("loan_acc", sessionStorage.getItem("loan_account"));
    formData.append("bank", bank.value);
    formData.append("amount", loan_amt.value);
    formData.append("late_charges", late_charges.value);
    formData.append("arrear_days", arrears.value);
    formData.append("cheque_no", cheque_no.value);
    formData.append("cheque_type", payment_method.value);

    fetch('../includes/loan_repayment.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        console.log('Success:', result);
        if (result["message"] === "success") {
          showSuccessAlert("Record stored successfuly");
          window.setTimeout(() => {
            location.href = "./payment_schedule.php";
          }, 2500);
        } else {
          showDangerAlert("Record not saved");
          removeAlert();
        }
        return false;
      })
      .catch(error => {
        console.error('Error:', error);
        showDangerAlert("Could not send data to server");
        removeAlert();
      });

    return false;
  }

  let lc = 0;
  const total = document.querySelector('#total');

  let setDateDifference = val => {
    const diff = ((new Date(val)).getTime() - (new Date(payment_date.value)).getTime()) / (1000 * 60 * 60 * 24)
    arrears.value = diff;
    calcLatePaymentCharges(diff);
    updatePaidAmountMin();
  }

  let calcLatePaymentCharges = (diff) => {
    // charges = ((I / 100) * bl) / 365) * Arrear_Days
    late_charges.value = diff > 0 ?
      ((((lc) / 100) * Number(balance.value) / 365) * diff).toFixed(2) :
      0;
    total.value = (Number(late_charges.value) + Number(installment.value)).toFixed(2);
  }

  window.addEventListener('DOMContentLoaded', (event) => {
    bank.value = sessionStorage.getItem("bank_name");
    // disbursment_date.value = sessionStorage.getItem("disbursment_date");
    payment_date.value = sessionStorage.getItem("payment_date");
    installment_no.value = sessionStorage.getItem("payment_no");

    const formData = new FormData();
    formData.append("bank", bank.value);

    formData.append("dis_date", disbursment_date.value);
    formData.append("pay_date", payment_date.value);
    formData.append("loan_acc", sessionStorage.getItem("loan_account"));
    formData.append("pay_no", installment_no.value);

    fetch('../includes/load_loan_payment.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        result = result[0];
        console.log('Success:', result);
        loan_amt.value = result.loan_amt;
        balance.value = result.balance;
        principle.value = result.principle;
        interest.value = result.interest;
        disbursment_date.value = result.dis_date;
        installment.value = result.installment;
        lc = result.charge_pc;

      })
      .catch(error => {
        console.error('Error:', error);
      });

  });
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
