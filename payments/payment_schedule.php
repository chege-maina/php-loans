<?php
include "../includes/base_page/shared_top_tags.php"
?>


<div class="block title">
  Loan Payment Schedule
</div>

<div class="card">
  <div class="card-content ">
    <!-- Content is to start here -->
    <div class="columns ">
      <div class="column is-4">
        <label for=" branch_name" class="label">Select Bank</label>
        <div class="field has-addons">
          <div class="control is-expanded">
            <div class="select is-fullwidth">
              <select name="bank_name" id="bank_name" required>
              </select>
            </div>
          </div>
          <div class="control">
            <button type="button" class="button is-info" onclick="selectBank()">Select</button>
          </div>
        </div>
      </div>
    </div>

    <hr>
    <div class="columns">
      <div class="column is-4">
        <label for=" branch_name" class="label">Select Loan Disbursement Date</label>
        <div class="field has-addons">
          <div class="control is-expanded">
            <div class="select is-fullwidth">
              <select id="disbursment_date" required>
              </select>
            </div>
          </div>
          <div class="control">
            <button type="button" class="button is-info">Select</button>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label class="label">Balance</label>
          <div class="control">
            <input class="input" type="text">
          </div>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label class="label">Next Payment Date</label>
          <div class="control">
            <input class="input" type="text">
          </div>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label class="label">Installment</label>
          <div class="control">
            <input class="input" type="text">
          </div>
        </div>
      </div>
    </div>

    <hr>
    <div class="table-container">
      <table class="table is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>Payment Number</th>
            <th>Payment Date</th>
            <th>Principle(P)</th>
            <th>Interest(I)</th>
            <th>Installment(P+I)</th>
            <th>Balance</th>
          </tr>
        </thead>
        <tbody id="table_body">
        </tbody>
      </table>

      <!-- Content ends here -->
    </div>
  </div>
</div>

<script>
  window.addEventListener('DOMContentLoaded', (event) => {
    initSelectElement("#bank_name", "-- Select Bank --");
    populateSelectElement("#bank_name", "../includes/load_bank_schedule.php", "name");
  });

  function selectBank() {
    const disbursment_date = document.querySelector('#disbursment_date');
    const bank_name = document.querySelector('#bank_name');
    if (!bank_name.validity.valid) {
      bank_name.focus();
    }

    const formData = new FormData();
    formData.append("bank", bank_name.value);
    fetch('../includes/load_loans_bank.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        initSelectElement("#disbursment_date", "-- Select Disbursment --");
        result.forEach((value) => {
          let opt = document.createElement("option");
          opt.appendChild(document.createTextNode(value["disbursment_date"]));
          opt.value = value["disbursment_date"];
          disbursment_date.appendChild(opt);
        });
      })
      .catch(error => {
        console.error('Error:', error);
      });

  }
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>