<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Qubes</title>

  <script src="external/autoNumeric/autoNumeric.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

  <script src="external/datatable/jquery-3.5.1.js"></script>

  <script src="external/datatable/jquery.dataTables.min.js"></script>


  <script src="assets/js/config.js"></script>
  <link href="assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl" />
  <link href="assets/css/theme.min.css" rel="stylesheet" id="style-default" />
  <style>
    .hide-this {
      display: none;
    }
  </style>

  <script>
    let commifyAll = () => {
      const numbers = document.querySelectorAll(".commify");
      numbers.forEach((element) => {

        const h_e = new AutoNumeric(element.childNodes[1], {
          currencySymbol: '',
          // minimumValue: 0
        });

        const real_input = document.createElement("input");
        real_input.setAttribute("type", "number");
        real_input.setAttribute("id", element.childNodes[1].dataset.commify);
        real_input.setAttribute("type", "number");
        real_input.classList.add("hide-this");
        element.appendChild(real_input);

        element.childNodes[1].addEventListener("keyup", () => {
          real_input.value = h_e.getNumericString();
        });

        // Sample expected element layout
        // <div class="column">
        // <label for="account_number" class="label">Account Number</label>
        // <div class="control commify">
        // <input type="text" class="input" required placeholder="Account number" data-commify="account_number">
        // </div>

        console.log(element.childNodes[1].dataset);
      });
    }

    function showSuccessAlert(message) {
      const alert_div = document.querySelector("#alert-div");
      let text = `
<article class="alert alert-success mt-3">
  <div class="message-body">
  <strong>Success: </strong> ${message}
  </div>
</article>
`
      alert_div.innerHTML = text
    }


    let alert_div;
    window.addEventListener('DOMContentLoaded', (event) => {
      alert_div = document.querySelector("#alert-div");
    });

    function showDangerAlert(message) {
      let text = `
<article class="alert alert-danger mt-3">
  <div class="message-body">
  <strong>Error: </strong> ${message}
  </div>
</article>
`
      alert_div.innerHTML = text
    }

    function removeAlert(wait_time = 2500) {
      window.setTimeout(() => {
        alert_div.innerHTML = "";
      }, wait_time);
    }

    function reloadPage(wait_time = 2500) {
      window.setTimeout(() => {
        location.reload()
      }, wait_time);
    }


    function initSelectElement(elem, init_text = "-- Select --") {
      elem = document.querySelector(elem);
      let opt = document.createElement("option");
      opt.appendChild(document.createTextNode(init_text));
      opt.setAttribute("value", "");
      opt.setAttribute("disabled", "");
      opt.setAttribute("selected", "");
      elem.appendChild(opt);
    }

    function populateSelectElement(elem, url_path, key_name, testing = false) {
      elem = document.querySelector(elem);

      fetch(url_path)
        .then(response => response.json())
        .then(data => {
          if (testing) {
            console.log(url_path, data);
            return;
          }
          data.forEach((value) => {
            let opt = document.createElement("option");
            opt.appendChild(document.createTextNode(value[key_name]));
            opt.value = value[key_name];
            elem.appendChild(opt);
          });
        })
        .catch((error) => {
          console.error('Error:', error);
        });

    }
  </script>

</head>

<body class="has-background-link-light mt-0 pt-0">


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

                    <form onsubmit="return submitForm();">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control" required>
                      <div class="field mt-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                      </div>
                      <div class="field mt-3">
                        <button id="submit" class="btn btn-falcon-primary" type="submit">Log In</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="alert-div"></div>
        </div>
      </div>
    </div>
  </main>


  <script>
    const email = document.querySelector("#email");
    const password = document.querySelector("#password");


    function submitForm() {
      if (!email.validity.valid) {
        email.focus();
        return false;
      } else if (!password.validity.valid) {
        password.focus();
        return false;
      }
      const formData = new FormData();
      formData.append("email", email.value);
      formData.append("password", password.value);
      fetch('includes/authenticate.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.text())
        .then(result => {
          if (result === 'Incorrect password!' ||
            result === 'Incorrect Email Address!') {
            showDangerAlert(result);
          } else {
            showSuccessAlert("Logged in successfuly");
            window.setTimeout(() => {
              window.location.replace("dashboards/main.php");
            }, 1500);
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
      return false;
    }

    window.addEventListener('DOMContentLoaded', (event) => {});
  </script>
</body>

</html>
