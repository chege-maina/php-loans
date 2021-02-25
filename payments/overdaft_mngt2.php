<?php
include "../includes/base_page/shared_top_tags.php"
?>


<div class="block title">
  Overdraft Management
</div>

<div class="card">
  <div class="card-content">
    <div class="columns">
      <div class="column">
        <label for="r_date" class="label">Date</label>
        <input type="date" id="r_date" class="input has-background-info-light" readonly>
      </div>
      <div class="column">
        <label for="bank_name" class="label">Bank</label>
        <input name="bank_name" id="bank_name" class="input has-background-info-light" type="text" placeholder="Bank Name" required readonly>
      </div>
      <div class="column">
        <label for="opening_balance" class="label">Opening Balance</label>
        <input name="opening_balance" id="opening_balance" class="input has-background-info-light" type="text" placeholder="Opening Balance" required readonly>
      </div>
    </div>
    <hr>
    <div class="table-container">
      <table class="table is-hoverable is-fullwidth is-striped">
        <thead>
          <tr>
            <th>Banking Date</th>
            <th>CHR No#</th>
            <th>CHR Amt</th>
            <th>Supplier/Customer</th>
            <th>Value Date</th>
            <th>Money In</th>
            <th>Money Out</th>
            <th>Balance</th>
          </tr>
        </thead>
        <tbody id="table_body">
        </tbody>
        <tfoot id="table_foot">
        </tfoot>
      </table>
      <div class="column">
        <div class="field has-addons has-addons-centered is-grouped is-grouped-right">

          <p class="control">
            <input type="number" class="input" name="total" id="total" required>
          </p>
          <p class="control">
            <a class="button is-info">
              Total
            </a>
          </p>
        </div>
      </div>
      <!-- Content ends here -->
    </div>
    <div class="columns">
      <div class="column ">
        <button class="button is-link">Submit</button>
      </div>
    </div>
  </div>
</div>

<script>
  const date = document.querySelector('#date');
  const bank_name = document.querySelector('#bank_name');
  const table_body = document.querySelector('#table_body');
  const table_foot = document.querySelector('#table_foot');
  const opening_balance = document.querySelector("#opening_balance");
  let opening_bals = [];
  let closing_bal = 0;

  window.addEventListener('DOMContentLoaded', (event) => {

    if (sessionStorage.length <= 0) {
      window.history.back();
    }

    bank_row = JSON.parse(sessionStorage.getItem('bank_row'));
    // Clear data
    // sessionStorage.clear();

    //stored data in the defined constant variables
    r_date.value = bank_row["date"];
    bank_name.value = bank_row["bank"];

    const formData = new FormData();
    formData.append("date", bank_row["date"]);
    formData.append("bank", bank_row["bank"]);

    fetch('../includes/load_banking_dates.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        result = result[0];
        console.log('Success:', result);
        opening_balance.value = result.opening_bal;
        opening_bals[0] = Number(result.opening_bal);
        updateTable(result.table_items);
      })
      .catch(error => {
        console.error('Error:', error);
      });

    function updateTable(data) {

      let i = 0;
      data.forEach(row => {
        console.log("row", row)

        let banking_date = document.createElement("td");
        banking_date.appendChild(document.createTextNode(row["banking_date"]));
        banking_date.classList.add("align-middle");

        let cheque_no = document.createElement("td");
        cheque_no.appendChild(document.createTextNode(row["cheque_no"]));
        cheque_no.classList.add("align-middle");

        let money_in = document.createElement("td");
        money_in.appendChild(document.createTextNode(row["money_in"]));
        money_in.classList.add("align-middle");

        let money_out = document.createElement("td");
        money_out.appendChild(document.createTextNode(row["money_out"]));
        money_out.classList.add("align-middle");

        let value_date = document.createElement("td");
        value_date.appendChild(document.createTextNode(row["value_date"]));
        value_date.classList.add("align-middle");

        let amount = document.createElement("td");
        amount.appendChild(document.createTextNode(row["amount"]));
        amount.classList.add("align-middle");

        let details = document.createElement("td");
        details.appendChild(document.createTextNode(row["details"]));
        details.classList.add("align-middle");

        let bl = opening_bals[i] + Number(row.money_in) - Number(row.money_out);
        i++;
        opening_bals[i] = bl;
        closing_bal = bl;
        let balance = document.createElement("td");
        balance.appendChild(document.createTextNode(bl));
        balance.classList.add("align-middle");

        let t_row = document.createElement("tr");
        t_row.append(banking_date, cheque_no, amount, details, value_date, money_in, money_out, balance);

        table_body.appendChild(t_row);
      });
    }
  });
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
