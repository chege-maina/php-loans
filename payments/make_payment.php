<?php
include "../includes/base_page/shared_top_tags.php"
?>

<div class="block title">
  Make Payment
</div>
<form onsubmit="return submitForm();">
  <div class="card">

    <div class="card-content">
      <!-- Content is to start here -->
      <div class="columns">
        <div class="column">
          <label for="supplier" class="label">Select Supplier</label>
          <div class="select is-fullwidth  ">
            <div class="control">
              <select id="supplier" required>
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
          <label for="amount_paid" class="label">Amount Paid</label>
          <div class="control">
            <input type="number" name="amount_paid" id="amount_paid" class="input" required placeholder="Amount Paid" required>
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
  const supplier = document.querySelector("#supplier");
  const bank = document.querySelector("#bank");
  const p_date = document.querySelector("#p_date");
  const cheque_number = document.querySelector("#cheque_number");
  const amount_paid = document.querySelector("#amount_paid");
  const change_type = document.querySelector("#change_type");

  function submitForm() {

    console.log("submitting");


    const formData = new FormData();
    formData.append("supplier_name", supplier.value);
    formData.append("bank_name", bank.value);
    formData.append("date", p_date.value);
    formData.append("cheque_type", cheque_type.value);
    formData.append("cheque_no", cheque_number.value);
    formData.append("amount", amount_paid.value);

    fetch('../includes/add_payment.php', {
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
    initSelectElement("#supplier", "-- Select Supplier --");
    populateSelectElement("#supplier", "../includes/load_supplier.php", "name");


    initSelectElement("#bank", "-- Select Bank --");
    populateSelectElement("#bank", "../includes/load_bank.php", "name");


    // TODO: Fetch from the right table
    // initSelectElement("#cheque_type", "-- Select Cheque Type --");
    // populateSelectElement("#cheque_type", "../includes/load_currency.php", "name");
  });
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
