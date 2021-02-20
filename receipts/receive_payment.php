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

        <div class="column">
          <label for="customer" class="label">Select Customer</label>
          <div class="select is-fullwidth  ">
            <div class="control">
              <select id="customer" required>
              </select>
            </div>
          </div>
        </div>

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
          <label for="date" class="label">Select Payment Date</label>
          <!-- autofill current date  -->
          <div class="control">
            <input type="date" value="<?php echo date("Y-m-d"); ?>" id="p_date" class="input is-link" required>
          </div>
        </div>

      </div>

      <hr>

      <div class="columns">
        <div class="column">
          <label for="cheque_number" class="label">Enter Cheque Number</label>
          <div class="control">
            <input type="number" name="cheque_number" id="cheque_number" class="input" required placeholder="Cheque Number" required>
          </div>
        </div>

        <div class="column">
          <label for="amount_banked" class="label">Amount Banked</label>
          <div class="control">
            <input type="number" name="amount_paid" id="amount_banked" class="input" required placeholder="Amount Paid" required>
          </div>
        </div>

        <div class="column">
          <label for="payment_type" class="label">Select Cheque Type</label>
          <div class="select is-fullwidth" required>
            <select id="cheque_type" required>
              <option value disabled selected>-- Select Cheque Type --</option>
              <option value="inhouse">Inhouse</option>
              <option value="interbank">Interbank</option>
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

<script>
  window.addEventListener('DOMContentLoaded', (event) => {
    initSelectElement("#customer", "-- Select Customer --");
    populateSelectElement("#customer", "../includes/load_customer.php", "name");


    initSelectElement("#bank", "-- Select Bank --");
    populateSelectElement("#bank", "../includes/load_bank.php", "name");
  });
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
