<?php
include "../includes/base_page/shared_top_tags.php"
?>

<div class="block title">
  Receive Payment
</div>
<form action="#" method="post">
  <div class="card">

    <div class="card-content">
      <!-- Content is to start here -->
      <div class="columns">
        <div class="column is-vcentered">
          <label for="supplier" class="label">Select Customer</label>
          <div class="select is-fullwidth  ">
            <div class="control">
              <select>
                <option value="#">-- Select Customer --</option>
              </select>
            </div>
          </div>
        </div>
        <div class="column">
          <label for="bank" class="label">Select Bank</label>
          <div class="select is-fullwidth">
            <div class="control">
              <select>
                <option value="#">-- Select Bank --</option>
              </select>
            </div>
          </div>
        </div>
        <div class="column">
          <label for="date" class="label">Select Payment Date</label>
          <!-- autofill current date  -->
          <div class="control">
            <input type="date" value="<?php echo date("Y-m-d"); ?>" id="date" class="input is-link">
          </div>
        </div>
      </div>

      <hr>
      <div class="columns">
        <div class="column">
          <label for="cheque_number" class="label">Enter Cheque Number</label>
          <div class="control">
            <input type="number" name="cheque_number" id="cheque_number" class="input" required placeholder="Cheque Number">
          </div>
        </div>

        <div class="column">
          <label for="amount_paid" class="label">Amount Banked</label>
          <div class="control">
            <input type="number" name="amount_paid" id="amount_paid" class="input" required placeholder="Amount Paid">
          </div>
        </div>

        <div class="column">
          <label for="payment_type" class="label">Select Cheque Type</label>
          <div class="select is-fullwidth">
            <select>
              <option value="#">-- Select Cheque Type --</option>
            </select>
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
</div>
<?php
include "../includes/base_page/shared_bottom_tags.php"
?>