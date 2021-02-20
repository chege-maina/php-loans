<?php
include "../includes/base_page/shared_top_tags.php"
?>


<div class="block title">
  Overdraft Management
</div>
<div class="card">
  <div class="card-content">
    <!-- Content is to start here -->
    <div class="columns">
      <div class="column">
        <label for="date" class="label">To</label>
        <!-- autofill current date  -->
        <div class="control">
          <input type="date" value="<?php echo date("Y-m-d"); ?>" id="date" class="input is-link">
        </div>
      </div>
      <div class="column">
        <label for="date" class="label">From</label>
        <!-- autofill current date  -->
        <div class="control">
          <input type="date" value="<?php echo date("Y-m-d"); ?>" id="date" class="input is-link">
        </div>
      </div>
      <div class="column">
        <label for="branch" class="label">Select Branch</label>
        <div class="select is-fullwidth">
          <div class="control">
            <select>
              <option value="#">-- Select Branch --</option>
            </select>
          </div>
        </div>
      </div>
      <div class="column-auto d-flex align-items-end">
        <div class="column">
          <label for="branch" class="label"> </label>
          <div class="control">
            <button class="button is-info">Filter</button>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="table-container">
      <table class="table is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>Date Banked</th>
            <th>Value Date</th>
            <th>Details</th>
            <th>Cheque Number</th>
            <th>DR</th>
            <th>CR</th>
          </tr>
        </thead>
        <tbody id="table_body">
        </tbody>
      </table>
    </div>
    <!-- Content ends here -->
  </div>

  <?php
  include "../includes/base_page/shared_bottom_tags.php"
  ?>