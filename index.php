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
<article class="message is-success mt-3">
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
<article class="message is-danger mt-3">
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

<body>

  <div class="container mt-5" style="min-height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div style="min-height:10vh; min-width: 30vw;">
      <div class="box">
        <h1 class="subtitle is-1 has-text-centered px-1">Qubes</h1>
        <form onsubmit="return submitForm();">
          <label for="email">Email</label>
          <div class="control">
            <input type="email" name="email" id="email" class="input">
          </div>
          <div class="field mt-3">
            <label for="password">Password</label>
            <div class="control">
              <input type="password" name="password" id="password" class="input">
            </div>
          </div>
          <div class="field mt-2">
            <div class="control">
              <button id="submit" class="button is-link" type="submit">Log In</button>
            </div>
          </div>
        </form>
      </div>
      <div id="alert-div"></div>
    </div>
  </div>

  <script>
    const email = document.querySelector("#email");
    const password = document.querySelector("#password");


    function submitForm() {
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
              window.location.replace("base_page/base_page.php");
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
