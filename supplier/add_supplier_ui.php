<?php
include "../includes/base_page/shared_top_tags.php"
?>
<div class="block title">
  Add Supplier
</div>
<form onsubmit="return submitForm();">
  <div class="card">
    <div class="card-content">
      <div class="columns">

        <div class="column">
          <label for="supplier_name" class="label">Name*</label>
          <div class="field">
            <input class="input" type="text" id="supplier_name" name="supplier_name" placeholder="Name" required>
          </div>
        </div>

        <div class="column">
          <label for="email" class="label">Email*</label>
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" type="email" id="email" name="email" placeholder="Email">
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
            </p>
          </div>
        </div>

        <div class="column">
          <label for="tel_no" class="label">Telephone Number*</label>
          <input name="tel_no" class="input" type="tel" placeholder="Tel No" id="sup_tel" required>
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
  const supplier_name = document.querySelector("#supplier_name");
  const email = document.querySelector("#email");
  const sup_tel = document.querySelector("#sup_tel");
  const sup_postal = document.querySelector("#sup_postal");
  const sup_physical_address = document.querySelector("#sup_physical_address");


  function submitForm() {
    console.log("submitting");
    return false;
  }
</script>


<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
