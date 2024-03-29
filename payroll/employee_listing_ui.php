<?php
include "../includes/base_page/shared_top_tags.php"
?>
<script src="../assets/js/vue"></script>
<script src="../components/vue-components/fdatatable-list/dist/fdatatable-list.min.js"></script>

<h5 class="mb-0">List of Employees</h5>

<div class="card mt-1">
  <div class="card-header bg-light">
    <h6 class="mb-0">Employees</h6>
  </div>
  <div class="card-body fs--1 p-2">
    <!-- Content is to start here -->
    <div id="datatable">
    </div>
  </div>
</div>

<script>
  let updateTable = (data) => {
    const datatable = document.querySelector("#datatable");

    if (data.length <= 0) {
      return;
    }

    datatable.innerHTML = "";

    const elem = document.createElement("fdatatable-list");
    elem.setAttribute("json_header", JSON.stringify(getHeaders(data)));
    elem.setAttribute("json_items", JSON.stringify(getItems(data)));

    elem.setAttribute("manage_key", "Employee_No");
    elem.setAttribute("manage_key_2", "Last_Name");
    elem.setAttribute("redirect", getBaseUrl() + "/payroll/edit-employee-ui.php");
    // elem.classList.add("is-fullwidth");
    datatable.appendChild(elem);
  };

  window.addEventListener('DOMContentLoaded', (event) => {

    fetch('../payroll/employee_listing.php')
      .then(response => response.json())
      .then(data => {
        updateTable(data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  });
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>