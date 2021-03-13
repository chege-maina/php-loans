<?php
include "../includes/base_page/shared_top_tags.php"
?>


<div class="block title">
  Loan Repayment
</div>

<div class="card">
  <div class="card-content ">
    <!-- Content is to start here -->
    <div class="columns">
      <div class="column">
        <div class="field">
          <label class="label">Bank</label>
          <div class="control">
            <input class="input has-background-light" type="text" id="bank" required readonly placeholder="Bank">
          </div>
        </div>
      </div>
      <div class="column">
        <label for="loan_amt" class="label">Disbursed Loan Amount</label>
        <div class="field has-addons is-fullwidth">
          <p class="control is-expanded">
            <input type="number" name="loan_amt" id="loan_amt" class="input has-background-light" required placeholder="Loan Amount" readonly>
          </p>
          <p class="control">
            <a>
              <a class="button is-static">KES</a>
            </a>
          </p>
        </div>
      </div>
      <div class="column">
        <label for="balance" class="label">Principle Loan Outstanding</label>
        <div class="field has-addons">
          <p class="control is-expanded">
            <input type="number" name="balance" id="balance" class="input has-background-light" required placeholder="Balance" readonly>
          </p>
          <p class="control">
            <a>
              <a class="button is-static">KES</a>
            </a>
          </p>
        </div>
      </div>
    </div>
    <hr>
    <div class="columns">
      <div class="column">
        <div class="field">
          <label class="label">Repayment Date</label>
          <div class="control">
            <input class="input has-background-light" type="date" id="next_repayment_date" readonly required placeholder="Next Repayment Date">
          </div>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label class="label">Disbursement Date</label>
          <div class="control">
            <input class="input has-background-light" type="date" id="disbursment_date" required readonly placeholder="Disbursement Date">
          </div>
        </div>
      </div>

      <div class="column">
        <label for="principle" class="label">Principle</label>
        <div class="field has-addons">
          <p class="control is-expanded">
            <input type="number" name="principle" id="principle" class="input has-background-light" required placeholder="Principle" readonly>
          </p>
          <p class="control">
            <a>
              <a class="button is-static">KES</a>
            </a>
          </p>
        </div>
      </div>
    </div>

    <div class="columns">
      <div class="column">
        <label for="interest" class="label">Interest</label>
        <div class="field has-addons">
          <p class="control is-expanded">
            <input type="number" name="interest" id="interest" class="input has-background-light" required placeholder="Interest" readonly>
          </p>
          <p class="control">
            <a>
              <a class="button is-static">KES</a>
            </a>
          </p>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label class="label">Installment No</label>
          <div class="control">
            <input class="input has-background-light" type="text" id="installment_no" readonly required placeholder="Installment No">
          </div>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label class="label">Repayment Amount</label>
          <div class="control">
            <input class="input has-background-light" type="text" id="installment" required readonly placeholder="Installment">
          </div>
        </div>
      </div>
    </div>

    <hr>
    <div class="columns ">
      <div class="column">
        <label for="tr_date" class="label">Select Transaction Date</label>
        <div class="control">
          <input class="input" type="date" id="tr_date" onchange="setDateDifference(this.value);">
        </div>
      </div>
      <div class="column">
        <div class="field">
          <label class="label">Days In Arrears</label>
          <div class="control">
            <input class="input has-background-light" type="number" id="arrears" readonly>
          </div>
        </div>
      </div>

      <div class="column">
        <label for="late_charges" class="label">Late Charges</label>
        <div class="field has-addons">
          <p class="control is-expanded">
            <input type="number" name="late_charges" id="late_charges" class="input has-background-light" required placeholder="Late Charges" readonly>
          </p>
          <p class="control">
            <a>
              <a class="button is-static">KES</a>
            </a>
          </p>
        </div>
      </div>

      <div class="column is-fullwidth">
        <label for="total" class="label">Total Amount</label>
        <div class="field has-addons">
          <p class="control is-expanded">
            <input type="number" name="total" id="total" class="input has-background-light" required readonly placeholder="Total Amount">
          </p>
          <p class="control">
            <a>
              <a class="button is-static">KES</a>
            </a>
          </p>
        </div>
      </div>
    </div>
    <div class="columns">


      <div class="column is-fullwidth">
        <label for="paid" class="label">Amount Paid</label>
        <div class="field has-addons">
          <p class="control is-expanded">
            <input type="number" name="paid" id="paid" class="input" required placeholder="Amount Paid">
          </p>
          <p class="control">
            <a>
              <a class="button is-static">KES</a>
            </a>
          </p>
        </div>
      </div>

      <div class="column">
        <label for="early" class="label">Early Payment</label>
        <div class="field has-addons">
          <p class="control is-expanded">
            <input type="number" name="early" id="early" class="input" required placeholder="Early Payment" readonly>
          </p>
          <p class="control">
            <a>
              <a class="button is-static">KES</a>
            </a>
          </p>
        </div>
      </div>

      <div class="column">
        <label for="payment_method" class="label">Select Payment Method</label>
        <div class="field has-addons">
          <div class="control is-expanded">
            <div class="select is-fullwidth">
              <select name="payment_method" id="payment_method">
              </select>
            </div>
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
    disbursment_date.value = sessionStorage.getItem("disbursment_date");
    payment_date.value = sessionStorage.getItem("payment_date");
    installment_no.value = sessionStorage.getItem("payment_no");

    const formData = new FormData();
    formData.append("bank", bank.value);
    formData.append("dis_date", disbursment_date.value);
    formData.append("pay_date", payment_date.value);
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