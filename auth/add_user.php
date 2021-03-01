<?php
include "../includes/base_page/shared_top_tags.php"
?>

<div class="container" style="max-height: 80vh;">
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
          <input class="input" type="email" id="email" required placeholder="Email">
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
</div>

<?php
include "../includes/base_page/shared_bottom_tags.php"
?>
