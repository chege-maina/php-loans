<?php
include "../includes/base_page/shared_top_tags.php"
?>


<div class="block title">
  Create Loan
</div>
<div class="card">
  <div class="card-content">
    <!-- Content is to start here -->
    <div class="columns ">

      <div class="column">
        <label for="bank_name" class="label">Select Bank*</label>
        <div class="select is-fullwidth">
          <div class="control">
            <select>
              <option value="#">-- Select Bank --</option>
            </select>
          </div>
        </div>
      </div>

      <div class="column">
        <label for="date" class="label">Date of Disbursment*</label>
        <!-- autofill current date  -->
        <div class="control">
          <input type="date" value="<?php echo date("Y-m-d"); ?>" id="date" class="input is-link" required>
        </div>
      </div>

      <div class="column">
        <label for="date" class="label">Repayment Date*</label>
        <!-- autofill current date  -->
        <div class="control">
          <input type="date" value="<?php echo date("Y-m-d"); ?>" id="date" class="input is-link" required>
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
              <a class="button is-static">Days</a>
            </a>
          </p>
        </div>
      </div>
      <div class="column">
        <label for="repayment_amount" class="label">Repayment Amount*</label>
        <input name="repayment_amount" id="repayment_amount" class="input" type="number" placeholder="Repayment Amount" required>
      </div>
      <div class="column">
        <label for="next_payment" class="label">Next Payment*</label>
        <input name="next_payment" id="next_payment" class="input" type="numbe" placeholder="Next Payment" required>
      </div>
    </div>

    <hr>

    <div class="columns">
      <div class="column is-fullwidth">
        <label for="interest_rate" class="label">Interest Rate*</label>
        <div class="field has-addons">
          <p class="control">
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
        <label for="charges" class="label">Charges*</label>
        <div class="field has-addons">
          <p class="control">
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
        <div class="select is-fullwidth">
          <div class="control">
            <select>
              <option value="#">-- Loan Category --</option>
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
<?php
include "../includes/base_page/shared_bottom_tags.php"
?>