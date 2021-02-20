<?php
include "../includes/base_page/shared_top_tags.php"
?>
<div class="block title">
  Add Customer
</div>
<form onsubmit="return submitForm();">
  <div class="card">
    <div class="card-content">
      <div class="columns">

        <div class="column">
          <label for="customer_name" class="label">Name*</label>
          <div class="field">
            <div class="control">
              <input class="input" type="text" id="customer_name" name="customer_name" placeholder="Name" required>
            </div>
          </div>
        </div>

        <div class="column">
          <label for="email" class="label">Email*</label>
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" type="email" id="c_email" name="email" required placeholder="Email">
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
            </p>
          </div>
        </div>

        <div class="column">
          <label for="tel_no" class="label">Telephone Number*</label>
          <input name="tel_no" class="input" type="tel" placeholder="Tel No" id="customer_tel" required>
        </div>
      </div>

      <div class="columns mt-2">
        <div class="column">
          <label for="postal_address" class="label">Postal Address*</label>
          <input name="postal_address" id="customer_postal" class="input" type="text" placeholder="Postal Address" required>
        </div>
        <div class="column">
          <label for="physical_address" class="label">Physical Address*</label>
          <input name="physical_address" id="customer_physical_address" class="input" type="text" placeholder="Physical Address" required>
        </div>
      </div>
      <div class="column">
        <button class="button is-link">Submit</button>
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
