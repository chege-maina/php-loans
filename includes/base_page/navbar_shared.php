<nav class="navbar is-fixed-top has-background-info-light " role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item is-size-3" href="../dashboards/main.php">
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
      <a class="navbar-item" href="../dashboards/main.php">
        Dashboard Analytics
      </a>

      <!-- ============================================================================= -->
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Company Settings
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="../company_profile/profile.php">
            Create Company
          </a>
          <a class="navbar-item" href="../company_profile/list_profiles.php">
            View Company
          </a>
          <hr class="dropdown-divider">
          <a class="navbar-item" href="../banks/add_bank.php">
            Create Lenders
          </a>
          <a class="navbar-item" href="../banks/list_banks.php">
            Manage Lenders
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Business Patners
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="../supplier/add_supplier_ui.php">
            Add Supplier
          </a>
          <a class="navbar-item" href="../supplier/list_supplier.php">
            Manage Suppliers
          </a>
          <hr class="dropdown-divider">
          <a class="navbar-item" href="../customer/add_customer_ui.php">
            Add Customer
          </a>
          <a class="navbar-item" href="../customer/list_customer.php">
            Manage Customers
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Bank Transactions
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="../payments/make_payment.php">
            Add Payments
          </a>
          <a class="navbar-item" href="../payments/list_payments.php">
            Manage Payments
          </a>
          <hr class="dropdown-divider">
          <a class="navbar-item" href="../receipts/receive_payment.php">
            Add Receipts
          </a>
          <a class="navbar-item" href="../receipts/list_receipts.php">
            Manage Receipts
          </a>
          <hr class="dropdown-divider">
          <a class="navbar-item" href="../payments/overdraft_mngt1.php">
            Post Bank Positions
          </a>
          <a class="navbar-item" href="../payments/overdraft_mngt.php">
            Bank Overdraft Management
          </a>
          <hr class="dropdown-divider">
          <a class="navbar-item" href="../loans/create_loan.php">
            Create Loan
          </a>
          <a class="navbar-item" href="../payments/loan_repayment.php">
            Manage Loans
          </a>
          <a class="navbar-item" href="../payments/loan_repayment.php">
            Pay Loan
          </a>
          <a class="navbar-item" href="../payments/payment_schedule.php">
            View Loan Payment Schedule
          </a>

        </div>
      </div>

      <!-- ============================================================================= -->

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Users
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="../auth/add_user.php">
            Add User
          </a>
          <a class="navbar-item" href="../auth/list_users.php">
            List Users
          </a>
        </div>
      </div>

    </div>
  </div>
</nav>
