<?php
include "../includes/base_page/shared_top_tags.php"
?>

<div class="block title">
  Manage Receipt
</div>
<form onsubmit="return submitForm();">
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
            <input type="date" value="<?php echo date("Y-m-d"); ?>" id="p_date" class="input" required>
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


  const customer = document.querySelector("#customer");
  const bank = document.querySelector("#bank");
  const p_date = document.querySelector("#p_date");
  const cheque_number = document.querySelector("#cheque_number");
  const amount_banked = document.querySelector("#amount_banked");
  const cheque_type = document.querySelector("#cheque_type");

  function submitForm() {

    console.log("submitting");


    const formData = new FormData();

    console.log("====================================");
    console.log("customer_name", customer.value);
    console.log("bank_name", bank.value);
    console.log("date", p_date.value);
    console.log("cheque_type", cheque_type.value);
    console.log("cheque_no", cheque_number.value);
    console.log("amount", amount_banked.value);
    console.log("====================================");


    formData.append("customer_name", customer.value);
    formData.append("bank_name", bank.value);
    formData.append("date", p_date.value);
    formData.append("cheque_type", cheque_type.value);
    formData.append("cheque_no", cheque_number.value);
    formData.append("amount", amount_banked.value);

    fetch('../includes/add_receipt.php', {
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
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
