<?php
include "../includes/base_page/shared_top_tags.php"
?>

<div id="alert-div"></div>
<h5 class="p-2" id="title-header">
  Employee Settings
</h5>

<div class="card mb-1">
  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/img/illustrations/corner-4.png);">
  </div>
  <!--/.bg-holder-->
  <div class="card-body position-relative">
    <?php
    include './new-button.php';
    ?>
  </div>
</div>

<div class="card">
  <div class="card-body fs--1 p-4">
    <div id="create_employee">
      <?php
      include "./employee_bio.php";
      ?>
    </div>
    <div id="salary_details" class="hide-this">
      <?php
      include "./salary_details.php";
      ?>
    </div>
    <div id="hr_details" class="hide-this">
      <?php
      include "./hr_details.php";
      ?>
    </div>
    <div id="contact_details" class="hide-this">
      <?php
      include "./contact_details.php";
      ?>
    </div>
    <!-- Content ends here -->

  </div>
</div>

<div class="card mt-1 p-1">
  <div class="row">
    <div class="col">
      <button class="btn btn-falcon-primary btn-sm m-2" id="submit" onclick="submitForm();">
        Save
      </button>
    </div>
  </div>
</div>

<script>
  const first_name = document.querySelector("#first_name");
  const middle_name = document.querySelector("#middle_name");
  const last_name = document.querySelector("#last_name");
  const gender = document.querySelector("#gender");
  const dob = document.querySelector("#dob");
  const residential_status = document.querySelector("#residential_status");
  const national_id = document.querySelector("#national_id");
  const pin_no = document.querySelector("#pin_no");
  const nssf_no = document.querySelector("#nssf_no");
  const nhif_no = document.querySelector("#nhif_no");
  const photo = document.querySelector("#photo");

  function submitForm() {

    const formData = new FormData();

    console.log("=======================================");
    console.log("Submitting");
    console.log("=======================================");

    let employee_bio_data = getEmployeeBio();
    for (key in employee_bio_data) {
      formData.append(key, employee_bio_data[key]);
      console.log(key, employee_bio_data[key]);
    }

    console.log("=======================================");

    let employee_salary_data = getSalaryDetails();
    for (key in employee_salary_data) {
      formData.append(key, employee_salary_data[key]);
      console.log(key, employee_salary_data[key]);
    }

    console.log("=======================================");

    let employee_contact_details = getContactDetails();
    for (key in employee_contact_details) {
      formData.append(key, employee_contact_details[key]);
      console.log(key, employee_contact_details[key]);
    }


    console.log("=======================================");

    let employee_hr_details = getHrDetails();
    for (key in employee_hr_details) {
      formData.append(key, employee_hr_details[key]);
      console.log(key, employee_hr_details[key]);
    }
    console.log("=======================================");

    fetch('insert_employee.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(result => {
        console.log("hey", result);
        return;
        console.log('Success:', result);
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>