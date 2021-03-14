<?php
include "../includes/base_page/shared_top_tags.php"
?>

<h4>
  Add User
</h4>
<div class="card">
  <div class="card-body">
    <form onsubmit="return submitForm();" id="user_form">
      <div class="row">
        <div class="col">
          <div class="field">
            <label class="form-label">First Name</label>
            <div class="control">
              <input class="form-control" type="text" id="first_name" required placeholder="First Name">
            </div>
          </div>
        </div>

        <div class="col">
          <div class="field">
            <label class="form-label">Last Name</label>
            <div class="control">
              <input class="form-control" type="text" id="last_name" required placeholder="Last Name">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="field">
            <label class="form-label">Email</label>
            <div class="control">
              <input class="form-control" type="email" id="email" required placeholder="email@provider.com">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="field">
            <label class="form-label">Password</label>
            <div class="control">
              <input class="form-control" type="password" id="password" required placeholder="Password">
            </div>
          </div>
        </div>

        <div class="col">
          <div class="field">
            <label class="form-label">Repeat Password</label>
            <div class="control">
              <input class="form-control" type="password" id="repeat_password" required placeholder="Repeat Password">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="field">
            <label class="form-label">Designation</label>
            <div class="control">
              <input class="form-control" type="text" id="designation" required placeholder="Designation">
            </div>
          </div>
        </div>

        <div class="col">
          <div class="field">
            <label class="form-label">Branch</label>
            <div class="control">
              <input class="form-control" type="text" id="branch" required placeholder="Branch">
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col col-auto">
          <button class="btn btn-falcon-primary">Submit</button>
          <button type="button" class="btn btn-falcon-default ml-2" onclick="clearForm();">Cancel</button>
        </div>
      </div>

    </form>
  </div>
</div>

<script>
  const user_form = document.querySelector("#user_form");
  const first_name = document.querySelector("#first_name");
  const last_name = document.querySelector("#last_name");
  const email = document.querySelector("#email");
  const password = document.querySelector("#password");
  const repeat_password = document.querySelector("#repeat_password");
  const designation = document.querySelector("#designation");
  const branch = document.querySelector("#branch");



  function submitForm() {
    if (password.value !== repeat_password.value) {
      showInfoAlert("Passwords do not match");
      removeAlert();
      repeat_password.focus();
      return false;
    }

    const formData = new FormData();
    formData.append("first_name", first_name.value);
    formData.append("last_name", last_name.value);
    formData.append("email", email.value);
    formData.append("password", password.value);
    formData.append("designation", designation.value);
    formData.append("branch", branch.value);

    fetch('../includes/add_user.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(result => {
        if (result["message"] === "success") {
          showSuccessAlert("User added successfuly");
          window.setTimeout(() => {
            location.reload();
          }, 2500);
        } else {
          showDangerAlert("User not added");
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });

    return false;
  }

  function clearForm() {
    user_form.reset();
  }
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
