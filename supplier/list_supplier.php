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
  const supplier_name = document.querySelector('#supplier_name');
  const table_body = document.querySelector('#table_body');
  const table_foot = document.querySelector('#table_foot');
  let table_items = [];
  let table_headers = [];
  let table_items_c = [];

  let updateTable = (data) => {
    console.log(data);
  }

  // function detailedView(i) {
  //  console.log(table_items[i]);
  //  sessionStorage.setItem('bank_row', JSON.stringify(table_items[i]));
  //  window.location.href = "overdaft_mngt2.php";
  // }

  //load the table

  function createItems(data) {
    let i = 0;
    data.forEach(row => {
      let tmp_row = {};
      tmp_row["key"] = i++;
      for (key in row) {
        tmp_row[key] = row[key];
      }
      table_items_c.push(tmp_row);
    });
    console.log("Creating items for data", table_items_c);
  }

  function createHeaders(data) {
    if (data.length <= 0) {
      return;
    }

    for (key in data[0]) {
      let name = "";
      key.split("_").forEach(value => {
        name += " " + value;
      });

      table_headers.push({
        name: name.trim(),
        editable: false,
        key: key,
        computed: false
      });
    }
    console.log("Creating headers for data", table_headers);
  }

  window.addEventListener('DOMContentLoaded', (event) => {
    initSelectElement("#supplier_name", "-- Select Supplier --");
    populateSelectElement("#supplier_name", "../includes/load_supplier_list.php", "name");

    fetch('../includes/load_supplier_list.php')
      .then(response => response.json())
      .then(data => {
        console.log(data);
        table_items = data
        createHeaders(data);
        createItems(data);
        updateTable(data);
        const datatable = document.querySelector("#datatable");
        const elem = document.createElement("datatable-list");
        elem.setAttribute("json_header", JSON.stringify(table_headers));
        elem.setAttribute("json_items", JSON.stringify(table_items_c));
        elem.setAttribute("manage_key", "name");
        elem.setAttribute("manage_key_2", "email");
        elem.setAttribute("redirect", getBaseUrl() + "/supplier/edit_supplier.php");
        elem.classList.add("is-fullwidth");
        datatable.appendChild(elem);

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
