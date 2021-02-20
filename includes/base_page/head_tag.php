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
<article class="message is-success mb-3">
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
<article class="message is-danger mb-3">
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
  </script>
