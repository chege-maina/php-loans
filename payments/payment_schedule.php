<?php
include "../includes/base_page/shared_top_tags.php"
?>


<h4>
  Loan Payment Schedule
</h4>

<div class="card">
  <div class="card-body ">
    <!-- Content is to start here -->
    <div class="row ">
      <div class="col col-md-4">
        <label for=" branch_name" class="form-label">Select Bank</label>
        <div class="input-group">
          <select class="form-select" name="bank_name" id="bank_name" required>
          </select>
          <button class="btn btn-primary" type="button" onclick="selectBank()">Select</button>
        </div>
      </div>
    </div>

    <hr>
    <div class="row">
      <div class="col is-4">
        <label for=" branch_name" class="form-label">Select Loan Disbursement Date</label>
        <div class="input-group">
          <select class="form-select" id="disbursment_date" required>
          </select>
          <button type="button" class="btn btn-primary" onclick="selectDisbursment()">Select</button>
        </div>
      </div>

      <div class="col">
        <div class="field">
          <label class="form-label">Balance</label>
          <div class="control">
            <input class="form-control" type="text" id="balance" readonly>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="field">
          <label class="form-label">Next Payment Date</label>
          <div class="control">
            <input class="form-control" type="date" id="payment_date" readonly>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="field">
          <label class="form-label">Next Installment</label>
          <div class="control">
            <input class="form-control" type="text" id="installment" readonly>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card mt-1">
  <script src="../external/vue"></script>
  <script src="../components/payschedule-list/dist/payschedule-list.min.js"></script>
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
  const balance = document.querySelector('#balance');
  const payment_date = document.querySelector('#payment_date');
  const installment = document.querySelector('#installment');

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

    sessionStorage.setItem("disbursment_date", disbursment_date.value);
    sessionStorage.setItem("bank_name", bank_name.value);
    const formData = new FormData();
    formData.append("bank", bank_name.value);
    formData.append("disbursment_date", disbursment_date.value);
    fetch('../includes/loan_schedule.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        data = data[0];
        balance.value = numberWithCommas(data.balance_dd);
        payment_date.value = data.paymentdate_dd;
        installment.value = numberWithCommas(data.installment_dd);
        console.log(data);
        updateTable(data.table_items);
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
    const elem = document.createElement("payschedule-list");
    elem.setAttribute("json_header", JSON.stringify(getHeaders(data)));
    elem.setAttribute("json_items", JSON.stringify(getItems(data)));
    // elem.setAttribute("managing", true);
    elem.setAttribute("manage_key", "payment_no");
    elem.setAttribute("manage_key_2", "payment_date");
    elem.setAttribute("redirect", getBaseUrl() + "/payments/loan_repayment.php");
    elem.classList.add("is-fullwidth");
    datatable.appendChild(elem);
  }
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>