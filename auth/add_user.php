<?php
include "../includes/base_page/shared_top_tags.php"
?>

<h3 class="subtitle is-3">
  Add User
</h3>
<div class="box">
  <form onsubmit="return submitForm();" id="user_form">
    <div class="columns">
      <div class="column">
        <div class="field">
          <label class="label">First Name</label>
          <div class="control">
            <input class="input" type="text" id="first_name" required placeholder="First Name">
          </div>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label class="label">Last Name</label>
          <div class="control">
            <input class="input" type="text" id="last_name" required placeholder="Last Name">
          </div>
        </div>
      </div>
    </div>

    <div class="columns">
      <div class="column">
        <div class="field">
          <label class="label">Email</label>
          <div class="control">
            <input class="input" type="email" id="email" required placeholder="email@provider.com">
          </div>
        </div>
      </div>
    </div>

    <div class="columns">
      <div class="column">
        <div class="field">
          <label class="label">Password</label>
          <div class="control">
            <input class="input" type="text" id="password" required placeholder="Password">
          </div>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label class="label">Repeat Password</label>
          <div class="control">
            <input class="input" type="text" id="repeat_password" required placeholder="Repeat Password">
          </div>
        </div>
      </div>
    </div>

    <div class="columns">
      <div class="column">
        <div class="field">
          <label class="label">Designation</label>
          <div class="control">
            <input class="input" type="text" id="designation" required placeholder="Designation">
          </div>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label class="label">Branch</label>
          <div class="control">
            <input class="input" type="text" id="branch" required placeholder="Branch">
          </div>
        </div>
      </div>
    </div>

    <div class="columns">
      <div class="column">
        <div class="field is-grouped">
          <div class="control">
            <button class="button is-info">Submit</button>
          </div>
          <div class="control">
            <button type="button" class="button is-info is-light" onclick="clearForm();">Cancel</button>
          </div>
        </div>
      </div>
    </div>

  </form>
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
    return false;
  }

  function clearForm() {
    user_form.reset();
  }
</script>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
