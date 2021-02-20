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
  <script src="../external/autoNumeric/autoNumeric.min.js"></script>
  <link rel="stylesheet" href="../external/bulma/bulma.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

  <script src="../external/datatable/jquery-3.5.1.js"></script>
  <link rel="stylesheet" href="../external/datatable/dataTables.bulma.min.css">
  <script src="../external/datatable/jquery.dataTables.min.js"></script>
  <script src="../external/datatable/dataTables.bulma.min.js"></script>
</head>

<body class="has-navbar-fixed-top">

  <script>
    // window.addEventListener('DOMContentLoaded', (event) => {
    // const numbers = document.querySelectorAll(".commify");
    // numbers.forEach((element) => {
    // console.log(element.childNodes);
    // });
    // });

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
            currency.appendChild(opt);
          });
        })
        .catch((error) => {
          console.error('Error:', error);
        });

    }
  </script>
