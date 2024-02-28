<?php session_start(); 

  // Check if the session is not set, redirect to login page
  if (!isset($_SESSION['user_email'])) {
    header("Location: login-form/login.php");
    exit();
  }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>AMHC || Admin Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo.png">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="assets/css/form-question.css">

    <style>
    /* Add your existing styles here */

    #video-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    }

    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 500px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

    /* Add your other styles here */
   </style>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
  </head>

<body>

  <!-- chart-modal -->
  <?php include ("admin-summary-modal.php"); ?>
  <!-- chart-modal -->
  <!-- filter modal -->
  <?php include ("filter-date.php") ?>
  <!-- filter modal -->
  <!-- change-profile-modal -->
  <?php include ("change-profile-modal.php") ?>
  <!-- change-profile-modal -->

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
<!-- ***** Preloader End ***** -->

<!--- Header --->
<nav class="navbar navbar-expand-lg bg-light">

  <div class="container-fluid">
    <div><img src="./assets/images/logo.png" class="img-thumbnail border-0" alt="..." style="width:50px; height:50px;">
    <a class="navbar-brand" href="admin.php">Advance Mental Health Care</a></div>

    <div class="d-grid gap-2 d-inline-flex">
    
    <div class="dropdown">
      <a  class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" >Settings</a>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <li><button class="dropdown-item" onclick="change_password();" type="button">Change Password</button></li>
        <li><button class="dropdown-item" onclick="change_email();" type="button">Change Email</button></li>
        <li><button class="dropdown-item" onclick="change_adminDetails();" type="button">Change Admin Details</button></li>
      </ul>
    </div>

    <a  class="btn btn-outline-dark" href = "index.php" >Student View</a>
    <a  class="btn btn-outline-danger" onclick="logout()" >Logout</a>
    </div>
  </div>
</nav>
<!--- Header --->

<!--- Header 2 --->
<nav class="navbar navbar-expand-lg text-center" style="background-color: #9d9d9d">
  <div class="container-fluid">

    <div class="user-indicator col-12">
      <div class=" bg-white py-2 px-3 rounded-3 shadow-sm" id="name_title">
        Admin : <?php echo ucwords($_SESSION['first_name']) . ", " . ucwords($_SESSION['middle_name']) . ", " .  ucwords($_SESSION['last_name']) . " : " . ucwords($_SESSION['occupation']); ?>
      </div>
    </div>

  </div>
</nav>
<!--- Header 2 --->

<!--- Results --->
<div class="featured section" id = "SummaryContent">
    <div class="container" >
      <div class="row" style="padding-bottom: 32vh;">
        
        <div class="col-12 bg-dark-subtle rounded-2">
        
          <div class="h1 mt-4 mb-3 text-center">
            <h4>Learner Assessment Table</h4>
          </div>
          

          <div class="bg-white card mb-3">

            <div class=" card-body">
            <table id="assessment_table"  class="display nowrap" width="100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">LRN</th>
                  <th scope="col">Strand</th>
                  <th scope="col">Year/Level</th>
                  <th scope="col">Depression Score</th>
                  <th scope="col">Assessment Date</th>
                  <th scope="col">Option</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            </div>
            
          </div>
           <!-- Button for Graph -->
   

   <!-- Container for Graph (Initially hidden) -->
   <div id="graphContainer" class="mt-4" style="display: none;">
      <!-- Highcharts graph will be rendered here -->
   </div>
</div>
        </div>

      </div>
    </div>
</div>
<!--- Results --->

  <footer  style="bottom:0;">
      <div class="col-sm-12">
        <p>Copyright © <span id="footer-year"></span></p>
        <p>Advance Mental Health Care</p>
      </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.8/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.11.0/r-2.5.0/rg-1.4.1/rr-1.4.1/sc-2.3.0/sb-1.6.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.8/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.11.0/r-2.5.0/rg-1.4.1/rr-1.4.1/sc-2.3.0/sb-1.6.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>
  <script src="assets/js/admin.js"></script>
  </body>

</html>