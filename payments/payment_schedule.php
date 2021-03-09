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
            <button type="button" class="button is-info" onclick="selectDisbursment()">Select</button>
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
  </div>
</div>

<div class="card mt-1">
  <script src="../external/vue"></script>
  <script src="../components/datatable-listing/dist/datatable-list.min.js"></script>
  <div id="datatable" class="p-2">
  </div>
</div>

<script>
  window.addEventListener('DOMContentLoaded', (event) => {
    initSelectElement("#bank_name", "-- Select Bank --");
    populateSelectElement("#bank_name", "../includes/load_bank_schedule.php", "name");
  });

  const disbursment_date = document.querySelector('#disbursment_date');
  const bank_name = document.querySelector('#bank_name');

  function selectBank() {
    if (!bank_name.validity.valid) {
      bank_name.focus();
      return;
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

  function selectDisbursment() {
    if (!bank_name.validity.valid) {
      bank_name.focus();
      return;
    }
    if (!disbursment_date.validity.valid) {
      disbursment_date.focus();
      return;
    }
    const formData = new FormData();
    formData.append("bank", bank_name.value);
    formData.append("disbursment_date", disbursment_date.value);
    fetch('../includes/loan_schedule.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        table_items = data
        updateTable(data);
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }

  let updateTable = (data) => {
    const datatable = document.querySelector("#datatable");
    datatable.innerHTML = "";
    if (data.length <= 0) {
      return;
    }
    const elem = document.createElement("datatable-list");
    elem.setAttribute("json_header", JSON.stringify(getHeaders(data)));
    elem.setAttribute("json_items", JSON.stringify(getItems(data)));
    elem.setAttribute("managing", false);
    elem.classList.add("is-fullwidth");
    datatable.appendChild(elem);
  }
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>