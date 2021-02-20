<?php
include "../includes/base_page/shared_top_tags.php"
?>
<div class="block title">
  Add Customer
</div>
<form>
  <div class="card">
    <div class="card-content">
      <div class="columns">
        <div class="column">
          <label for="name" class="label">Name*</label>
          <input name="name" class="input is-link" type="text" placeholder="Name" id="sup_nm" required>
        </div>
        <div class="column">
          <label for="email" class="label">Email*</label>
          <input name="email" class="input is-link" type="email" placeholder="Email" id="sup_email" required>
        </div>
        <div class="column">
          <label for="tel_no" class="label">Telephone Number*</label>
          <input name="tel_no" class="input is-link" type="tel" placeholder="Tel No" id="sup_tel" required>
        </div>
      </div>
      <div class="columns mt-2">
        <div class="column">
          <label for="postal_address" class="label">Postal Address*</label>
          <input name="postal_address" id="sup_postal" class="input is-link" type="text" placeholder="Postal Address" required>
        </div>
        <div class="column">
          <label for="physical_address" class="label">Physical Address*</label>
          <input name="physical_address" id="sup_physical_address" class="input is-link" type="text" placeholder="Physical Address" required>
        </div>
      </div>
      <div class="column">
        <button class="button is-link ">Submit</button>
      </div>
    </div>
  </div>
</form>
<?php
include "../includes/base_page/shared_bottom_tags.php"
?>