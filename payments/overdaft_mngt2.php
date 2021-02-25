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
      <!-- Content ends here -->
    </div>
    <div class="columns">
      <div class="column ">
        <button class="button is-link" onclick="submitForm();">Submit</button>
      </div>
    </div>
  </div>
</div>

<script>
  const r_date = document.querySelector('#r_date');
  const bank_name = document.querySelector('#bank_name');
  const table_body = document.querySelector('#table_body');
  const table_foot = document.querySelector('#table_foot');
  const opening_balance = document.querySelector("#opening_balance");
  let table_items = [];

  let opening_bals = [];
  let closing_bal = 0;

  const submitForm = () => {
    console.log("Submitting");

    const sendable_table_items = [];
    table_items.forEach(item => {
      sendable_table_items.push({
        p_details: item.details,
        p_cheque_no: item.cheque_no,
        p_value_date: item.value_date,
        p_dr: item.money_in,
        p_cr: item.money_out,
        p_balance: item.balance,
      })
    });

    const formData = new FormData();
    formData.append("banking_date", r_date.value);
    formData.append("bank_name", bank_name.value);
    formData.append("opening_bal", opening_balance.value);
    formData.append("closing_bal", closing_bal);
    formData.append("table_items", JSON.stringify(sendable_table_items));

    fetch('../includes/add_transactions.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        console.log('Success:', result);
        if (result["message"] === "success") {
          showSuccessAlert("Record stored successfuly");
          reloadPage();
        } else {
          let msg = !("desc" in result) || result["desc"].trim() === "" ?
            "Record not stored" : result["desc"];
          showDangerAlert(msg);
          removeAlert();
        }
      })
      .catch(error => {
        console.error('Error:', error);
        showDangerAlert("Could not send data to server");
        removeAlert();
      });


  }


  window.addEventListener('DOMContentLoaded', (event) => {

    if (sessionStorage.length <= 0) {
      location.href = "overdraft_mngt1.php"
    }

    bank_row = JSON.parse(sessionStorage.getItem('bank_row'));
    // Clear data
    sessionStorage.clear();

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
        table_items = result.table_items;
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
        table_items[i]["balance"] = bl;
        i++;
        opening_bals[i] = bl;
        closing_bal = bl;
        let balance = document.createElement("td");
        balance.appendChild(document.createTextNode(bl));
        balance.classList.add("align-middle", "has-text-right");

        let t_row = document.createElement("tr");
        t_row.append(banking_date, cheque_no, amount, details, value_date, money_in, money_out, balance);

        table_body.appendChild(t_row);
      });

      let closing_label = document.createElement("th");
      closing_label.setAttribute("colspan", 7);
      closing_label.classList.add("has-text-right");
      closing_label.appendChild(document.createTextNode("Closing Balance"));

      let closing_amt = document.createElement("th");
      closing_amt.classList.add("has-text-right");
      closing_amt.appendChild(document.createTextNode(closing_bal));
      table_foot.append(closing_label, closing_amt);
    }
  });
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
