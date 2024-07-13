<?php
if (!isset($_SESSION['auth'])) {
    header('Location: /login');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" href="/favicon.png">
        <link rel="stylesheet" type="text/css" href="/css/styles.css">
        <title>COSC 4806</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
    </head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <body>
      <div id="page-container">
        <div id="content-wrap">  
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">COSC 4806</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/reminders">Reminders</a>
            </li>
            <?php if ($_SESSION["username"] == "admin"):?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Reports
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/reports">Reminders Report</a></li>
                  <li><a class="dropdown-item" href="/reports/login_attempts_reports">Login Attempts Report</a></li>
                </ul>
              </li>
            <?php endif; ?>
          </ul>
          <div class="d-flex justify-content-end pe-4 align-items-center">
            <div><?php echo $_SESSION['username']; ?></div>
            <a class="nav-link" href="/logout">Logout</a>
          </div>
        </div>
      </div>
    </nav>