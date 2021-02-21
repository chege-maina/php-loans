<?php
include "../includes/base_page/shared_top_tags.php"
?>


<div class="block title">
  Overdraft Management
</div>

<div class="card">
  <div class="card-content">
    <!-- Content is to start here -->
    <div class="columns ">
      <div class="column">
        <label for="date" class="label">From</label>
        <!-- autofill current date  -->
        <div class="control">
          <input type="date" value="<?php echo date("Y-m-d"); ?>" id="date_from" class="input">
        </div>
      </div>
      <div class="column">
        <label for="date" class="label">To</label>
        <!-- autofill current date  -->
        <div class="control">
          <input type="date" value="<?php echo date("Y-m-d"); ?>" id="date_to" class="input">
        </div>
      </div>
      <div class="column">
        <label for="branch_name" class="label">Select Bank Name</label>
        <div class="select is-fullwidth">
          <div class="control">
            <select id="bank_name" required>
            </select>
          </div>
        </div>
      </div>
      <div class="column-auto py-5">
        <div class="control">
          <div class="column">
            <label for="branch" class="label"> </label>
            <button class="button is-info" onclick="getOverDrafts()">Search</button>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="columns">
      <div class="column">
        <label for="bank_name" class="label">Bank Name*</label>
        <input name="bank_name" id="bank_name" class="input" type="text" placeholder="bank name" required readonly>
      </div>
      <div class="column">
        <label for="acc_name" class="label">Account Name*</label>
        <input name="acc_name" id="acc_name" class="input" type="text" placeholder="account name" required readonly>
      </div>
      <div class="column">
        <label for="acc_number" class="label">Account Number*</label>
        <input name="acc_number" id="acc_number" class="input" type="text" placeholder="account number" required readonly>
      </div>
    </div>
    <hr>
    <div class="table-container">
      <table class="table is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>Opening Balance</th>
            <th>Value Date</th>
            <th>DR</th>
            <th>CR</th>
            <th>Closing Balance</th>
            <th>OD Daily Interest</th>
          </tr>
        </thead>
        <tbody id="table_body">
        </tbody>
      </table>
      <div class="column">
        <div class="field has-addons has-addons-centered is-grouped is-grouped-right">

          <p class="control">
            <input type="number" class="input" name="total" id="total" required>
          </p>
          <p class="control">
            <a class="button is-info">
              Total
            </a>
          </p>
        </div>
      </div>
      <!-- Content ends here -->
    </div>
  </div>
</div>

<script>
  window.addEventListener('DOMContentLoaded', (event) => {
    initSelectElement("#bank_name", "-- Select Bank --");
    populateSelectElement("#bank_name", "../includes/load_bank.php", "name");
  });

  const date_from = document.querySelector('#date_from');
  const date_to = document.querySelector('#date_to');
  const bank_name = document.querySelector('#bank_name');

  function getOverDrafts() {
    if (!bank_name.value) {
      bank_name.focus();
      return;
    }
    console.log("sending");

    const formData = new FormData();
    formData.append("date1", date_from.value);
    formData.append("date2", date_to.value);
    formData.append("bank", bank_name.value);

    fetch('../includes/overdraft_management.php', {
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
  }
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>