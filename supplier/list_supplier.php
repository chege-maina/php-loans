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
  <div class="card-content">
    <hr>
    <div class="table-container">
      <table class="table is-hoverable is-fullwidth is-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Physical Address</th>
            <th>Postal Address</th>
            <th>Telephone Number</th>
          </tr>
        </thead>
        <tbody id="table_body">
        </tbody>
        <tfoot id="table_foot">
        </tfoot>
      </table>
      <!-- Content ends here -->
    </div>
  </div>
</div>

<script>
  const supplier_name = document.querySelector('#supplier_name');
  const table_body = document.querySelector('#table_body');
  const table_foot = document.querySelector('#table_foot');
  let table_items = [];


  let updateTable = (data) => {
    table_body.innerHTML = "";
    let i = 0;
    data.forEach(value => {
      const this_row = document.createElement("tr");

      const name = document.createElement("td");
      name.appendChild(document.createTextNode(value["name"]));
      name.classList.add("align-middle");

      const email = document.createElement("td");
      email.appendChild(document.createTextNode(value["email"]));
      email.classList.add("align-middle");

      const physical_address = document.createElement("td");
      physical_address.appendChild(document.createTextNode(value["physical_address"]));
      physical_address.classList.add("align-middle");

      const postal_address = document.createElement("td");
      postal_address.appendChild(document.createTextNode(value["postal_address"]));
      postal_address.classList.add("align-middle");

      const tel_no = document.createElement("td");
      tel_no.appendChild(document.createTextNode(value["tel_no"]));
      tel_no.classList.add("align-middle");

      //  const req_actions = document.createElement("td");
      //const btn = document.createElement("button");

      // btn.setAttribute("onclick", "detailedView(" + i + ")");
      // if (i > 0) {
      // btn.setAttribute("disabled", "");
      //  }
      //  i++;
      //  btn.appendChild(document.createTextNode("Manage"));
      //   btn.classList.add("button", "is-small", "is-info");
      //    req_actions.appendChild(btn);

      this_row.append(name, email, physical_address, postal_address, tel_no);
      table_body.appendChild(this_row);
    });

  }

  // function detailedView(i) {
  //  console.log(table_items[i]);
  //  sessionStorage.setItem('bank_row', JSON.stringify(table_items[i]));
  //  window.location.href = "overdaft_mngt2.php";
  // }

  //load the table

  window.addEventListener('DOMContentLoaded', (event) => {
    initSelectElement("#supplier_name", "-- Select Supplier --");
    populateSelectElement("#supplier_name", "../includes/load_supplier_list.php", "name");

    fetch('../includes/load_supplier_list.php')
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