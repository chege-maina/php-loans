<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Qubes</title>
  <!--
  <link href="external/bootstrap/bootstrap.min.css" rel="stylesheet">
  <script src="external/bootstrap/bootstrap.bundle.min.js"></script>
  -->
  <script src="external/autoNumeric/autoNumeric.min.js"></script>
  <link rel="stylesheet" href="external/bulma/bulma.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

  <script src="external/datatable/jquery-3.5.1.js"></script>
  <link rel="stylesheet" href="external/datatable/dataTables.bulma.min.css">
  <script src="external/datatable/jquery.dataTables.min.js"></script>
  <script src="external/datatable/dataTables.bulma.min.js"></script>
  <style>
    .hide-this {
      display: none;
    }
  </style>
</head>

<body class="has-navbar-fixed-top">

  <nav class="navbar is-fixed-top has-background-info-light " role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item is-size-3" href="https://bulma.io">
        <h1 clas="">Qubes</h1>
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu has-background-info-light">
      <div class="navbar-start">
        <a class="navbar-item">
          Home
        </a>

        <!-- ============================================================================= -->
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Banks
          </a>

          <div class="navbar-dropdown has-background-link-light">
            <a class="navbar-item" href="banks/add_bank.php">
              Add Bank
            </a>
            <a class="navbar-item" href="banks/list_banks.php">
              Manage Banks
            </a>
          </div>
        </div>
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Suppliers
          </a>

          <div class="navbar-dropdown has-background-link-light">
            <a class="navbar-item" href="supplier/add_supplier_ui.php">
              Add Supplier
            </a>
            <a class="navbar-item" href="banks/list_banks.php">
              Manage Suppliers
            </a>
          </div>
        </div>
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Customers
          </a>

          <div class="navbar-dropdown has-background-link-light">
            <a class="navbar-item" href="customer/add_customer_ui.php">
              Add Customer
            </a>
            <a class="navbar-item" href="banks/list_banks.php">
              Manage Customers
            </a>
          </div>
        </div>
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Transactions
          </a>

          <div class="navbar-dropdown has-background-link-light">
            <a class="navbar-item" href="payments/make_payment.php">
              Payments
            </a>
            <a class="navbar-item" href="receipts/receive_payment.php">
              Receipts
            </a>
          </div>
        </div>

        <!-- ============================================================================= -->
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Bank Book
          </a>
          <div class="navbar-dropdown has-background-link-light">

            <a class="navbar-item" href="payments/overdraft_mngt1.php">
              Post Daily Transactions
            </a>
            <a class="navbar-item" href="payments/overdraft_mngt.php">
              Overdraft Management
            </a>
            <a class="navbar-item" href="payments/payment_schedule.php">
              Cheques Banked
            </a>
          </div>
        </div>

        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Loans
          </a>

          <div class="navbar-dropdown has-background-link-light">
            <a class="navbar-item" href="loans/create_loan.php">
              Create New Loan
            </a>
            <a class="navbar-item" href="loans/create_loan.php">
              Pay Loan
            </a>
            <a class="navbar-item" href="payments/payment_schedule.php">
              Loan Payment Schedule
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <form class="box" action="">
      <label for="email">Email</label>
      <div class="control">
        <input type="email" name="email" id="email" class="input">
      </div>
      <label for="password">Password</label>
      <div class="control">
        <input type="password" name="password" id="password" class="input">
      </div>
      <div class="field">
        <div class="control">
          <button id="submit" class="button is-link" type="submit">Log In</button>
        </div>
      </div>
    </form>
    <div id="alert-div"></div>
  </div>

  <script>
    $(document).ready(function() {
      $('#btn_submit').click(function(e) {
        e.preventDefault();
        var name = $('#email').val();
        var passw = $('#password').val();
        var data1 = {
          email: name,
          password: passw
        }

        if (name == '' || passw == '') {
          alert("Please complete the login form!")
        } else {
          var conf = confirm("Do You Want to Log into Dashboard?")
          if (conf) {
            $.ajax({
              url: "includes/authenticate.php",
              method: "POST",
              data: data1,
              success: function(data) {
                $('#loginfrm')[0].reset();
                if (data == 'Dashboard1') {
                  window.location.replace("products/add-product-ui.php");
                } else if (data == 'Dashboard2') {
                  window.location.replace("purchase_requisitions/warehouse_add_pr.php");
                } else {
                  alert(data)
                }

                //console.log('response:' + data);
              }
            })

          }
        }
      })


    })

    window.addEventListener('DOMContentLoaded', (event) => {

      const formData = new FormData();
      fetch('includes/authenticate.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(result => {
          console.log('Success:', result);
        })
        .catch(error => {
          console.error('Error:', error);
        });

    });
  </script>
</body>

</html>
