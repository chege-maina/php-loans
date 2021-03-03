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
  <div id="datatable">
  </div>
  <script>
    const headers = [{
        name: "key",
        editable: false,
        key: "key",
        computed: false
      },
      {
        name: "Name",
        editable: false,
        key: "name",
        computed: false
      },
      {
        name: "Code",
        editable: false,
        key: "code",
        computed: false
      },
      {
        name: "Stock",
        editable: false,
        key: "stock",
        computed: false
      },
      {
        name: "Quantity",
        editable: true,
        key: "quantity",
        computed: false
      },
      {
        name: "Price",
        editable: false,
        key: "price",
        computed: false
      },
      {
        name: "Discount",
        editable: true,
        key: "discount",
        computed: false
      },
      {
        name: "Tax %",
        editable: false,
        key: "tax_pc",
        computed: false
      },
      {
        name: "Tax",
        editable: false,
        key: "tax",
        computed: true,
        operation: "tax_pc / 100 * quantity * price",
      },
      {
        name: "Subtotal",
        editable: false,
        key: "subtotal",
        computed: true,
        operation: "tax_pc / 100 + 1 * quantity * price",
      },
    ];
    const items = [{
        key: 1,
        name: "Wiberg Super Cure",
        code: "LT38 2725 3405 4331 5052",
        stock: 59,
        quantity: 85,
        price: 13,
        discount: 40,
        tax_pc: 17,
        tax: -1,
        subtotal: 60054,
      },
      {
        key: 2,
        name: "Bacardi Breezer - Strawberry",
        code: "PS97 QVMV EN6O KQNI FXSD SPHX ICTY H",
        stock: 23,
        quantity: 59,
        price: 68,
        discount: 84,
        tax_pc: 3,
        tax: -1,
        subtotal: 784,
      },
      {
        key: 3,
        name: "Avocado",
        code: "LT21 2680 9565 6475 1512",
        stock: 26,
        quantity: 90,
        price: 84,
        discount: 2,
        tax_pc: 3,
        tax: -1,
        subtotal: 57305,
      },
      {
        key: 4,
        name: "Soup - Knorr, Country Bean",
        code: "MR92 5543 6765 4828 5308 1513 081",
        stock: 72,
        quantity: 73,
        price: 13,
        discount: 61,
        tax_pc: 15,
        tax: -1,
        subtotal: 15940,
      },
      {
        key: 5,
        name: "Kiwi",
        code: "CY32 4469 2631 OPJT FDCH I1HF 9WEQ",
        stock: 33,
        quantity: 73,
        price: 69,
        discount: 31,
        tax_pc: 15,
        tax: -1,
        subtotal: 15544,
      },
      {
        key: 6,
        name: "Banana - Green",
        code: "PT08 0202 1850 4474 9222 7254 5",
        stock: 99,
        quantity: 87,
        price: 54,
        discount: 100,
        tax_pc: 7,
        tax: -1,
        subtotal: 77459,
      },
      {
        key: 7,
        name: "Bread - Burger",
        code: "CR19 0596 3701 4238 7857 0",
        stock: 85,
        quantity: 69,
        price: 74,
        discount: 79,
        tax_pc: 11,
        tax: -1,
        subtotal: 91874,
      },
      {
        key: 8,
        name: "Bouq All Italian - Primerba",
        code: "FI31 5087 0293 5633 84",
        stock: 53,
        quantity: 85,
        price: 58,
        discount: 31,
        tax_pc: 1,
        tax: -1,
        subtotal: 78031,
      },
      {
        key: 9,
        name: "Beef - Tender Tips",
        code: "GT18 SXNS QA5F D7D9 B8P7 TYNO 83BV",
        stock: 72,
        quantity: 100,
        price: 20,
        discount: 88,
        tax_pc: 1,
        tax: -1,
        subtotal: 14014,
      },
      {
        key: 10,
        name: "Sachet",
        code: "MD71 SAAH ZICA HQPH 1JQP 3DEB",
        stock: 76,
        quantity: 53,
        price: 55,
        discount: 54,
        tax_pc: 10,
        tax: -1,
        subtotal: 10191,
      },
    ];
    window.addEventListener('DOMContentLoaded', (event) => {
      const datatable = document.querySelector("#datatable");
      const elem = document.createElement("datatable-list");
      elem.setAttribute("json_header", JSON.stringify(headers));
      elem.setAttribute("json_items", JSON.stringify(items));
      datatable.appendChild(elem);
    });
  </script>
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

  window.addEventListener('DOMContentLoaded', (event) => {
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
