<?php
include "../includes/base_page/shared_top_tags.php"
?>

<h4>
  Receive Payment
</h4>
<form onsubmit="return submitForm();">
  <div class="card">

    <div class="card-body">
      <!-- Content is to start here -->
      <div class="row">

        <div class="col">
          <label for="customer" class="form-label">Select Customer</label>
          <select class="form-select" id="customer" required>
          </select>
        </div>

        <div class="col">
          <label for="bank" class="form-label">Select Bank</label>
          <select class="form-select" id="bank" required>
          </select>
        </div>

        <div class="col">
          <label for="date" class="form-label">Select Payment Date</label>
          <!-- autofill current date  -->
          <div class="control">
            <input type="date" value="<?php echo date("Y-m-d"); ?>" id="p_date" class="form-control is-link" required>
          </div>
        </div>

      </div>

      <hr>

      <div class="row">
        <div class="col">
          <label for="cheque_number" class="form-label">Enter Cheque Number</label>
          <div class="control">
            <input type="number" name="cheque_number" id="cheque_number" class="form-control" required placeholder="Cheque Number" required>
          </div>
        </div>

        <div class="col">
          <label for="amount_banked" class="form-label">Amount Banked</label>
          <div class="control">
            <input type="number" name="amount_paid" id="amount_banked" class="form-control" required placeholder="Amount Paid" required>
          </div>
        </div>

        <div class="col">
          <label for="payment_type" class="form-label">Select Cheque Type</label>
          <select class="form-select" id="cheque_type" required>
            <option value disabled selected>-- Select Cheque Type --</option>
            <option value="inhouse">Inhouse</option>
            <option value="interbank">Interbank</option>
          </select>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col">
          <button class="btn btn-falcon-primary">Submit</button>
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
