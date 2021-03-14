<nav class="navbar navbar-expand-lg bg-light navbar-light " role="navigation" aria-label="main navigation">
  <div class="container-fluid">
    <div class="navbar-brand">
      <a class="nav-item is-size-3" href="../dashboards/main.php">
        <h1>Qubes</h1>
      </a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLightExample" aria-controls="navbar_content" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbar_content">
      <div class="nav-item" href="../dashboards/main.php">
        Dashboard Analytics
      </div>

      <!-- ============================================================================= -->
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarLightExampleDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu py-0" aria-labelledby="navbarLightExampleDropdown">
          <div class="bg-white dark__bg-1000 py-2 rounded-3">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <hr class="dropdown-divider" /><a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </div>
      <!-- ============================================================================= -->
      <div class="nav-item has-dropdown is-hoverable">
        <div class="navbar-link">
          Company Settings
        </div>

        <div class="navbar-dropdown">
          <div class="nav-item" href="../company_profile/profile.php">
            Create Company
          </div>
          <div class="nav-item" href="../company_profile/list_profiles.php">
            View Company
          </div>
          <hr class="dropdown-divider">
          <div class="nav-item" href="../banks/add_bank.php">
            Create Lenders
          </div>
          <div class="nav-item" href="../banks/list_banks.php">
            Manage Lenders
          </div>
        </div>
      </div>
      <div class="nav-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Business Patners
        </a>

        <div class="navbar-dropdown">
          <a class="nav-item" href="../supplier/add_supplier_ui.php">
            Add Supplier
          </a>
          <a class="nav-item" href="../supplier/list_supplier.php">
            Manage Suppliers
          </a>
          <hr class="dropdown-divider">
          <a class="nav-item" href="../customer/add_customer_ui.php">
            Add Customer
          </a>
          <a class="nav-item" href="../customer/list_customer.php">
            Manage Customers
          </a>
        </div>
      </div>
      <div class="nav-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Bank Transactions
        </a>

        <div class="navbar-dropdown">
          <a class="nav-item" href="../payments/make_payment.php">
            Add Payments
          </a>
          <a class="nav-item" href="../payments/list_payments.php">
            Manage Payments
          </a>
          <hr class="dropdown-divider">
          <a class="nav-item" href="../receipts/receive_payment.php">
            Add Receipts
          </a>
          <a class="nav-item" href="../receipts/list_receipts.php">
            Manage Receipts
          </a>
          <hr class="dropdown-divider">
          <a class="nav-item" href="../payments/overdraft_mngt1.php">
            Post Bank Positions
          </a>
          <a class="nav-item" href="../payments/overdraft_mngt.php">
            Bank Overdraft Management
          </a>
          <hr class="dropdown-divider">
          <a class="nav-item" href="../loans/create_loan.php">
            Create Loan
          </a>
          <a class="nav-item" href="../payments/loan_repayment.php">
            Manage Loans
          </a>
          <a class="nav-item" href="../payments/loan_repayment.php">
            Pay Loan
          </a>
          <a class="nav-item" href="../payments/payment_schedule.php">
            View Loan Payment Schedule
          </a>

        </div>
      </div>

      <!-- ============================================================================= -->

      <div class="nav-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Users
        </a>

        <div class="navbar-dropdown">
          <a class="nav-item" href="../auth/add_user.php">
            Add User
          </a>
          <a class="nav-item" href="../auth/list_users.php">
            List Users
          </a>
        </div>
      </div>

    </div>
  </div>
</nav>
