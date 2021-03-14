<?php
include "../includes/base_page/shared_top_tags.php"
?>

<h4>List Users</h4>
<div class="card mt-1">
  <script src="../external/vue"></script>
  <script src="../components/datatable-listing/dist/datatable-list.min.js"></script>
  <div id="datatable" class="p-4">
  </div>
</div>

<script>
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
    elem.setAttribute("redirect", getBaseUrl() + "/banks/edit_bank.php");
    elem.classList.add("is-fullwidth");
    datatable.appendChild(elem);
  }

  window.addEventListener('DOMContentLoaded', (event) => {
    fetch('../includes/load_users_list.php')
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
