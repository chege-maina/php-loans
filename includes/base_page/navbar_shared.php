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
          <a class="navbar-item" href="../banks/add_bank.php">
            Add Bank
          </a>
          <a class="navbar-item" href="../banks/list_banks.php">
            Manage Banks
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Company Profile
        </a>

        <div class="navbar-dropdown has-background-link-light">
          <a class="navbar-item" href="../company_profile/profile.php">
            Profile
          </a>
          <a class="navbar-item" href="../banks/list_banks.php">
            Manage Profile
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Suppliers
        </a>

        <div class="navbar-dropdown has-background-link-light">
          <a class="navbar-item" href="../supplier/add_supplier_ui.php">
            Add Supplier
          </a>
          <a class="navbar-item" href="../banks/list_banks.php">
            Manage Suppliers
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Customers
        </a>

        <div class="navbar-dropdown has-background-link-light">
          <a class="navbar-item" href="../customer/add_customer_ui.php">
            Add Customer
          </a>
          <a class="navbar-item" href="../banks/list_banks.php">
            Manage Customers
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Transactions
        </a>

        <div class="navbar-dropdown has-background-link-light">
          <a class="navbar-item" href="../payments/make_payment.php">
            Payments
          </a>
          <a class="navbar-item" href="../receipts/receive_payment.php">
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

          <a class="navbar-item" href="../payments/overdraft_mngt1.php">
            Post Daily Transactions
          </a>
          <a class="navbar-item" href="../payments/overdraft_mngt.php">
            Overdraft Management
          </a>
          <a class="navbar-item" href="../payments/payment_schedule.php">
            Cheques Banked
          </a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Loans
        </a>

        <div class="navbar-dropdown has-background-link-light">
          <a class="navbar-item" href="../loans/create_loan.php">
            Create New Loan
          </a>
          <a class="navbar-item" href="../loans/create_loan.php">
            Pay Loan
          </a>
          <a class="navbar-item" href="../payments/payment_schedule.php">
            Loan Payment Schedule
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>