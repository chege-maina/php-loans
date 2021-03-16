<?php
include "../includes/base_page/shared_top_tags.php"
?>

<h4>
  Add Customer
</h4>
<form onsubmit="return submitForm();">
  <div class="card">
    <div class="card-body">
      <div class="row">

        <div class="col">
          <label for="customer_name" class="form-label">Name*</label>
          <div class="field">
            <div class="control">
              <input class="form-control" type="text" id="customer_name" name="customer_name" placeholder="Name" required>
            </div>
          </div>
        </div>

        <div class="col">
          <label for="email" class="form-label">Email*</label>
          <div class="field">
            <p class="control has-icons-left">
              <input class="form-control" type="email" id="c_email" name="email" placeholder="Email">
            </p>
          </div>
        </div>

        <div class="col">
          <label for="tel_no" class="form-label">Telephone Number*</label>
          <input name="tel_no" class="form-control" type="tel" placeholder="Tel No" id="customer_tel">
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="postal_address" class="form-label">Postal Address*</label>
          <input name="postal_address" id="customer_postal" class="form-control" type="text" placeholder="Postal Address">
        </div>
        <div class="col">
          <label for="physical_address" class="form-label">Physical Address*</label>
          <input name="physical_address" id="customer_physical_address" class="form-control" type="text" placeholder="Physical Address">
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
  const customer_name = document.querySelector("#customer_name");
  const email = document.querySelector("#c_email");
  const customer_tel = document.querySelector("#customer_tel");
  const customer_postal = document.querySelector("#customer_postal");
  const customer_physical_address = document.querySelector("#customer_physical_address");


  function submitForm() {
    console.log("submitting");


    const formData = new FormData();
    formData.append("name", customer_name.value);
    formData.append("email", email.value);
    formData.append("tel_no", customer_tel.value);
    formData.append("postal_address", customer_postal.value);
    formData.append("physical_address", customer_physical_address.value);

    fetch('../includes/add_customer.php', {
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
