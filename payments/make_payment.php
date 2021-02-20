<?php
include "../includes/base_page/shared_top_tags.php"
?>

<div class="block title">
  Make Payment
</div>
<form action="#" method="post">
  <div class="card">

    <div class="card-content">
      <!-- Content is to start here -->
      <div class="columns">
        <div class="column is-vcentered">
          <label for="supplier" class="label">Select Supplier</label>
          <div class="select is-link is-normal  ">
            <div class="control">
              <select>
                <option value="#">Select Supplier</option>
              </select>
            </div>
          </div>
        </div>
        <div class="column">
          <label for="bank" class="label">Select Bank</label>
          <div class="select is-link is-normal">
            <div class="control">
              <select>
                <option value="#">Select Bank</option>
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
          <label for="amount_paid" class="label">Amount Paid</label>
          <div class="control">
            <input type="number" name="amount_paid" id="amount_paid" class="input" required placeholder="Amount Paid">
          </div>
        </div>

        <div class="column">
          <label for="payment_type" class="label">Select Payment Type</label>
          <div class="select is-link is-normal">
            <select>
              <option value="#">Select Payment</option>
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