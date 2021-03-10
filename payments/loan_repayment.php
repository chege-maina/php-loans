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
            <input class="input" type="text" id="bank" required readonly placeholder="Bank">
          </div>
        </div>
      </div>
      <div class="column">
        <label for="loan_amt" class="label">Loan Amount</label>
        <div class="field has-addons is-fullwidth">
          <p class="control is-expanded">
            <input type="number" name="loan_amt" id="loan_amt" class="input" required placeholder="Loan Amount" readonly>
          </p>
          <p class="control">
            <a>
              <a class="button is-static">KES</a>
            </a>
          </p>
        </div>
      </div>
      <div class="column">
        <label for="balance" class="label">Balance</label>
        <div class="field has-addons">
          <p class="control is-expanded">
            <input type="number" name="balance" id="balance" class="input" required placeholder="Balance" readonly>
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
          <label class="label">Next Repayment Date</label>
          <div class="control">
            <input class="input" type="date" id="next_repayment_date" readonly required placeholder="Next Repayment Date">
          </div>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label class="label">Disbursement Date</label>
          <div class="control">
            <input class="input" type="text" id="disbursment_date" required readonly placeholder="Disbursement Date">
          </div>
        </div>
      </div>

      <div class="column">
        <label for="principle" class="label">Principle</label>
        <div class="field has-addons">
          <p class="control is-expanded">
            <input type="number" name="principle" id="principle" class="input" required placeholder="Principle" readonly>
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
            <input type="number" name="interest" id="interest" class="input" required placeholder="Interest" readonly>
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
            <input class="input" type="text" id="installment_no" readonly required placeholder="Installment No">
          </div>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label class="label">Installment</label>
          <div class="control">
            <input class="input" type="text" id="installment" required readonly placeholder="Installment">
          </div>
        </div>
      </div>
    </div>

    <hr>
    <div class="columns ">
      <div class="column is-4">
        <label for="tr_date" class="label">Select Transaction Date</label>
        <div class="control">
          <input class="input" type="date" id="tr_date">
        </div>
      </div>
      <div class="column is-4">
        <div class="field">
          <label class="label">Days In Arrears</label>
          <div class="control">
            <input class="input" type="number" id="arrears" readonly>
          </div>
        </div>
      </div>
    </div>
    <div class="columns">

      <div class="column">
        <label for="early" class="label">Early Payment</label>
        <div class="field has-addons">
          <p class="control">
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
        <label for="late_charges" class="label">Late Charges</label>
        <div class="field has-addons">
          <p class="control is-expanded">
            <input type="number" name="late_charges" id="late_charges" class="input" required placeholder="Late Charges" readonly>
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
            <input type="number" name="total" id="total" class="input" required placeholder="Total Amount">
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
  const payment_date = document.querySelector('#payment_date');
  const disbursment_date = document.querySelector('#disbursment_date');
  const principle = document.querySelector('#principle');
  const interest = document.querySelector('#interest');
  const installment_no = document.querySelector('#installment_no');
  const installment = document.querySelector('#installment');
  const tr_date = document.querySelector('#tr_date');
  const arrears = document.querySelector('#arrears');
  const late_charges = document.querySelector('#late_charges');
  const total = document.querySelector('#total');
  const payment_method = document.querySelector('#payment_method');

  window.addEventListener('DOMContentLoaded', (event) => {
    // bank.value = sessionStorage.getItem("bank_name")
  });
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>