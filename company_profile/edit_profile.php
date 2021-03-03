<?php
include "../includes/base_page/shared_top_tags.php"
?>
<div class="block title">
  Edit Profile
</div>
<form onsubmit="return submitForm();">
  <div class="card">
    <div class="card-content">
      <div class="columns">

        <div class="column">
          <label for="company_name" class="label">Name*</label>
          <div class="field">
            <div class="control">
              <input class="input" type="text" id="company_name" name="company_name" placeholder="Name" required>
            </div>
          </div>
        </div>

        <div class="column">
          <label for="email" class="label">Email*</label>
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" type="email" id="email" name="email" required placeholder="Email">
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
            </p>
          </div>
        </div>

        <div class="column">
          <label for="tel_no" class="label">Telephone Number*</label>
          <input name="tel_no" class="input" type="tel" placeholder="Tel No" id="tel" required>
        </div>
      </div>

      <div class="columns mt-2">
        <div class="column">
          <label for="postal_address" class="label">Postal Address*</label>
          <input name="postal_address" id="sup_postal" class="input" type="text" placeholder="Postal Address" required>
        </div>
        <div class="column">
          <label for="physical_address" class="label">Physical Address*</label>
          <input name="physical_address" id="sup_physical_address" class="input" type="text" placeholder="Physical Address" required>
        </div>
      </div>
      <div class="column">
        <button class="button is-link">Submit</button>
      </div>
    </div>
  </div>
</form>

<script>
  const company_name = document.querySelector("#company_name");
  const email = document.querySelector("#email");
  const tel = document.querySelector("#tel");
  const sup_postal = document.querySelector("#sup_postal");
  const sup_physical_address = document.querySelector("#sup_physical_address");


  function submitForm() {
    console.log("submitting");


    const formData = new FormData();
    formData.append("name", company_name.value);
    formData.append("email", email.value);
    formData.append("tel_no", tel.value);
    formData.append("postal_address", sup_postal.value);
    formData.append("physical_address", sup_physical_address.value);

    console.warn("Add php to submit to");
    return false;
    fetch('../includes/add_company_profile.php', {
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

    // TODO: Clear session storage on successful submit
    return false;
  }


  window.addEventListener('DOMContentLoaded', (event) => {
    if (this.sessionStorage.length <= 0) {
      window.history.back();
    }
    const s_email = this.sessionStorage.getItem("email");
    const s_name = this.sessionStorage.getItem("name");

    company_name.value = s_name;
    email.value = s_email;
    company_name.setAttribute("disabled", "");
    email.setAttribute("disabled", "");

    const formData = new FormData();
    formData.append("company_name", s_name);
    formData.append("email", s_email);

    console.warn("Add php to submit to");
    return;
    fetch('../includes/#.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        console.log('Success:', result);
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });
</script>


<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
