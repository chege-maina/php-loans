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
          <input type="text" name="cheque_no" id="cheque_no" class="form-control" required placeholder="Cheque Number" readonly>
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

  function submitForm() {
    const formData = new FormData();
    return false;
    fetch('', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        console.log('Success:', result);
      })
      .catch(error => {
        console.error('Error:', error);
      });

    return false;
  }

  let lc = 0;
  const total = document.querySelector('#total');
  const payment_method = document.querySelector('#payment_method');

  let setDateDifference = val => {
    const diff = ((new Date(val)).getTime() - (new Date(payment_date.value)).getTime()) / (1000 * 60 * 60 * 24)
    arrears.value = diff;
    calcLatePaymentCharges(diff);
  }

  let calcLatePaymentCharges = (diff) => {
    // charges = ((I / 100) * bl) / 365) * Arrear_Days
    late_charges.value = diff > 0 ?
      ((((lc) / 100) * Number(balance.value) / 365) * diff).toFixed(2) :
      0;
    total.value = Number(late_charges.value) + Number(installment.value);
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
