<?php
include "../includes/base_page/shared_top_tags.php"
?>


<h4>
  View Supplier
</h4>

<div class="card">
  <div class="card-body">
    <!-- Content is to start here -->
    <div class="row ">
      <div class="col col-md-3">
        <label for="supplier_name" class="form-label">Select Suppler Name</label>
        <div class="input-group">
          <select class="form-select" id="supplier_name" required>
          </select>
          <button class="btn btn-primary" onclick="filterRequisitions()">Filter</button>
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
  const supplier_name = document.querySelector("#supplier_name");

  let updateTable = (data) => {
    const datatable = document.querySelector("#datatable");

    datatable.innerHTML = "";
    if (data.length <= 0) {
      return;
    }
    const elem = document.createElement("datatable-list");
    elem.setAttribute("json_header", JSON.stringify(getHeaders(data)));
    elem.setAttribute("json_items", JSON.stringify(getItems(data)));
    elem.setAttribute("manage_key", "name");
    elem.setAttribute("manage_key_2", "email");
    elem.setAttribute("redirect", getBaseUrl() + "/supplier/edit_supplier.php");
    elem.classList.add("is-fullwidth");
    datatable.appendChild(elem);
  }


  window.addEventListener('DOMContentLoaded', (event) => {
    sessionStorage.clear();
    initSelectElement("#supplier_name", "-- Select Supplier --");
    populateSelectElement("#supplier_name", "../includes/load_supplier_list.php", "name");

    fetch('../includes/load_supplier_list.php')
      .then(response => response.json())
      .then(data => {
        table_items = data
        updateTable(data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  });


  function filterRequisitions() {
    if (!supplier_name.validity.valid) {
      supplier_name.focus();
      return;
    }
    const formData = new FormData();
    formData.append("supplier", supplier_name.value);

    fetch('../dashboards/filter_suppliers_list.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        table_items = result;
        updateTable(result);
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
