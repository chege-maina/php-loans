<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>Falcon | Dashboard &amp; Web App Templat</title>

  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png" />
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico" />
  <link rel="manifest" href="../assets/img/favicons/manifest.json" />
  <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png" />
  <meta name="theme-color" content="#ffffff" />
  <script src="../assets/js/config.js"></script>

  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link href="../assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl" />
  <link href="../assets/css/theme.min.css" rel="stylesheet" id="style-default" />
  <script>
    var isRTL = JSON.parse(localStorage.getItem('isRTL'));
    if (isRTL) {
      var linkDefault = document.getElementById('style-default');
      linkDefault.setAttribute('disabled', true);
      document.querySelector('html').setAttribute('dir', 'rtl');
    } else {
      var linkRTL = document.getElementById('style-rtl');
      linkRTL.setAttribute('disabled', true);
    }
  </script>
</head>

<body>
  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <div class="container-fluid">
      <div class="row min-vh-100 flex-center g-0">
        <div class="col-lg-8 col-xxl-5 py-3 position-relative">
          <img class="bg-auth-circle-shape" src="../assets/img/illustrations/bg-shape.png" alt="" width="250" /><img class="bg-auth-circle-shape-2" src="../assets/img/illustrations/shape-1.png" alt="" width="150" />
          <div class="card overflow-hidden z-index-1">
            <div class="card-body p-0">
              <div class="row g-0 h-100">
                <div class="col-md-5 text-center bg-card-gradient">
                  <div class="position-relative p-4 pt-md-5 pb-md-7 light">
                    <div class="bg-holder bg-auth-card-shape" style="
                          background-image: url(../assets/img/illustrations/half-circle.png);
                        "></div>
                    <!--/.bg-holder-->

                    <div class="z-index-1 position-relative">
                      <a class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder" href="../index.php">Qubes</a>
                      <p class="opacity-75 text-white">
                        Simply delivered. Get more done in less time
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-7 d-flex flex-center">
                  <div class="p-4 p-md-5 flex-grow-1">
                    <div class="row flex-between-center">
                      <div class="col-auto">
                        <h3>Account Login</h3>
                      </div>
                    </div>
                    <form>
                      <div class="mb-3">
                        <label class="form-label" for="card-email">Email address</label>
                        <input class="form-control" id="card-email" type="email" />
                      </div>
                      <div class="mb-3">
                        <div class="d-flex justify-content-between">
                          <label class="form-label" for="card-password">Password</label>
                        </div>
                        <input class="form-control" id="card-password" type="password" />
                      </div>
                      <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" id="card-checkbox" checked="checked" />
                        <label class="form-check-label" for="card-checkbox">Remember me</label>
                      </div>
                      <div class="mb-3">
                        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">
                          Log in
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->

  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script src="../vendors/popper/popper.min.js"></script>
  <script src="../vendors/bootstrap/bootstrap.min.js"></script>
  <script src="../vendors/anchorjs/anchor.min.js"></script>
  <script src="../vendors/is/is.min.js"></script>
  <script src="../vendors/fontawesome/all.min.js"></script>
  <script src="../vendors/lodash/lodash.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="../vendors/list.js/list.min.js"></script>
  <script src="../assets/js/theme.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet" />
</body>

</html>
