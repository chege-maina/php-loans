<nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
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

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">
        Home
      </a>

      <!-- ============================================================================= -->
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Banks
        </a>

        <div class="navbar-dropdown">
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
          Suppliers
        </a>

        <div class="navbar-dropdown">
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

        <div class="navbar-dropdown">
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

        <div class="navbar-dropdown">
          <a class="navbar-item" href="../payments/make_payment.php">
            Payments
          </a>
          <a class="navbar-item" href="../receipts/receive_payment.php">
            Receipts
          </a>
        </div>
      </div>

      <!-- ============================================================================= -->
      <a class="navbar-item" href="../payments/overdraft_mngt.php">
        Overdraft Management
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Loans
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="../customer/add_customer_ui.php">
            Create New Loan
          </a>
          <a class="navbar-item" href="../banks/list_banks.php">
            Loan Payment Schedule
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>