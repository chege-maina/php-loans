<?php
include "../includes/base_page/shared_top_tags.php"
?>

<h4>List Receipts</h4>
<form onsubmit="return filterResults();">
  <div class="card">
    <div class="card-body">
      <div class="row is-vcentered">

        <div class="col">
          <div class="field">
            <label class="form-label">From</label>
            <div class="control">
              <input class="form-control" type="date" required id="from_date" onchange="updateDateValidations();">
            </div>
          </div>
        </div>

        <div class="col">
          <div class="field">
            <label class="form-label">To</label>
            <div class="control">
              <input class="form-control" type="date" required id="to_date" onchange="updateDateValidations();">
            </div>
          </div>
        </div>

        <div class="col">
          <div class="field">
            <label class="form-label">Bank</label>
            <select class="form-select" required id="banks">
            </select>
          </div>
        </div>

        <div class="col is-flex is-align-items-end mt-4 pt-1">
          <button class="btn btn-primary">Filter</button>
        </div>
      </div>
    </div>
  </div>
</form>
<div class="card mt-1">
  <script src="../external/vue"></script>
  <script src="../components/datatable-listing/dist/datatable-list.min.js"></script>
  <div id="datatable" class="p-4">
  </div>
</div>

<script>
  const from_date = document.querySelector("#from_date");
  const to_date = document.querySelector("#to_date");
  const banks = document.querySelector("#banks");

  let updateDateValidations = () => {
    to_date.setAttribute("min", from_date.value);
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
    elem.setAttribute("manage_key", "customer");
    elem.setAttribute("manage_key_2", "cheque_no");
    elem.setAttribute("redirect", getBaseUrl() + "/receipts/edit_receipt.php");
    elem.classList.add("is-fullwidth");
    datatable.appendChild(elem);
  }

  window.addEventListener('DOMContentLoaded', (event) => {
    initSelectElement("#banks", "-- Select Bank --");
    populateSelectElement("#banks", "../includes/load_bank.php", "name");
  });

  function filterResults() {
    const formData = new FormData();

    formData.append("date1", from_date.value);
    formData.append("date2", to_date.value);
    formData.append("bank", banks.value);
    fetch('../includes/load_receipt_list.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        console.log('Success:', result);
        updateTable(result);
      })
      .catch(error => {
        console.error('Error:', error);
      });
    return false;
  }
</script>
<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
