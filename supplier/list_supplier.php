<?php
include "../includes/base_page/shared_top_tags.php"
?>


<div class="block title">
  View Supplier
</div>

<div class="card">
  <div class="card-content">
    <!-- Content is to start here -->
    <div class="columns ">
      <div class="column is-4">
        <label for="supplier_name" class="label">Select Suppler Name</label>
        <div class="select is-fullwidth">
          <div class="control">
            <select id="supplier_name" required>
            </select>
          </div>
        </div>
      </div>
      <div class="column-auto pt-5">
        <div class="control">
          <div class="column">
            <label for="supplier" class="label"> </label>
            <button class="button is-info" onclick="filterRequisitions()">Filter</button>
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
  let updateTable = (data) => {
    const datatable = document.querySelector("#datatable");
    datatable.innerHTML = "";
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
    const formData = new FormData();

    formData.append("bank", bank_name.value);
    fetch('../includes/#.php', {
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
