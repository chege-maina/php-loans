<?php
include "../includes/base_page/shared_top_tags.php"
?>


<div class="block title">
  View Customer
</div>

<div class="card">
  <div class="card-content">
    <!-- Content is to start here -->
    <div class="columns ">
      <div class="column is-4">
        <label for="customer_name" class="label">Select Customer Name</label>
        <div class="select is-fullwidth">
          <div class="control">
            <select id="customer_name" required>
            </select>
          </div>
        </div>
      </div>
      <div class="column-auto pt-5">
        <div class="control">
          <div class="column">
            <label for="customer" class="label"> </label>
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

<div class="card mt-1">
  <script src="https://unpkg.com/vue"></script>
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
  let table_headers = [];
  let table_items_c = [];

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

  window.addEventListener('DOMContentLoaded', (event) => {
    initSelectElement("#customer_name", "-- Select Customer --");
    populateSelectElement("#customer_name", "../includes/load_customers_list.php", "name");

    fetch('../includes/load_customers_list.php')
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

<script>
  window.addEventListener('DOMContentLoaded', (event) => {});
</script>
<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
