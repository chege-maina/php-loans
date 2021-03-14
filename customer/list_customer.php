<?php
include "../includes/base_page/shared_top_tags.php"
?>


<h4>
  View Customer
</h4>

<div class="card">
  <div class="card-body">
    <!-- Content is to start here -->
    <div class="row ">
      <div class="col col-md-3">
        <label for="customer_name" class="form-label">Select Customer Name</label>
        <div class="input-group">
          <select class="form-select" id="customer_name" required>
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
  const customer_name = document.querySelector('#customer_name');
  const table_body = document.querySelector('#table_body');
  const table_foot = document.querySelector('#table_foot');
  let table_items = [];

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
    elem.setAttribute("redirect", getBaseUrl() + "/customer/edit_customer.php");
    elem.classList.add("is-fullwidth");
    datatable.appendChild(elem);
  }

  // function detailedView(i) {
  //  console.log(table_items[i]);
  //  sessionStorage.setItem('bank_row', JSON.stringify(table_items[i]));
  //  window.location.href = "overdaft_mngt2.php";
  // }

  //load the table
  window.addEventListener('DOMContentLoaded', (event) => {
    this.sessionStorage.clear();
    initSelectElement("#customer_name", "-- Select Customer --");
    populateSelectElement("#customer_name", "../includes/load_customers_list.php", "name");

    fetch('../includes/load_customers_list.php')
      .then(response => response.json())
      .then(data => {
        console.log(data);
        table_items = data
        updateTable(data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  });


  function filterRequisitions() {
    if (!customer_name.validity.valid) {
      customer_name.focus();
      return;
    }
    const formData = new FormData();
    formData.append("customer", customer_name.value);

    fetch('../dashboards/filter_custmers_list.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        table_items = data
        updateTable(data);
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
</script>

<script>
  window.addEventListener('DOMContentLoaded', (event) => {});
</script>
<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
