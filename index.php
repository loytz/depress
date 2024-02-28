<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>AMHC || Assessment Form</title>

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

    .hidden {
        opacity: 0;
    }

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
    <a class="navbar-brand d-none" href="#">Advance Mental Health Care</a></div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="login-form/login.php" class="btn btn-outline-success" type="submit">Login as Admin</a>
    </div>
  </div>
</nav>
<!--- Header --->

<!--- Assessment Form --->
  <div class="main-banner">
      <div class="item item-1">

       <video autoplay muted loop id="video-background">
            <source src="assets/vids/nature.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="header-text">
         <section class="radio-section">
            <div class="radio-list">

              <h3 class="text-white">Depression Assessment Questionnaire</h3>
              

              <div class="row">
                <div class=" col-lg-6 col-sm-12">
                  <div class="input-group mt-3">
                  <label class="input-group-text" for="inputGroupSelect01">Strand: </label>
                  <input type="text" class="form-control" placeholder="Student Strand" id="strand_input" oninput="validateInput()" maxlength="50">
                  </div>
                  <h5 class="fw-bold mt-2 d-none" style = "color: #fe2525;" id="invalid_strand_msg">Please enter a valid input.</h5>
                </div>

                <div class=" col-lg-6 col-sm-12">
                  <div class="input-group mt-3">
                  <label class="input-group-text" for="inputGroupSelect01">Year/Level: </label>
                  <input type="text" class="form-control" placeholder="Student Year/Level" id="year_level_input" oninput="validateInput()" maxlength="4">
                  </div>
                  <h5 class="fw-bold mt-2 d-none" style = "color: #fe2525;" id="invalid_year_level_msg">Please enter a valid input.</h5>
                </div>
              </div>

              
              <div class="input-group mt-3">
              <label class="input-group-text" for="inputGroupSelect01">LRN: </label>
              <input type="text" class="form-control" placeholder="Learner Reference Number" id="lrn_input" oninput="validateInput()" maxlength="12">
              </div>
              <h5 class="fw-bold mt-2 d-none" style = "color: #fe2525;" id="invalid_lrn_msg">Please enter a valid Learner Reference Number that consists of 12 digits.</h5>

              <h4 class="text-white mt-4">For each statement, click the number that best represents your feelings or experiences.
                Use the following scale:
              </h4>

              <br>

              <h4 class="text-white">1 = Strongly Disagree</h4>
              <h4 class="text-white">2 = Disagree</h4>
              <h4 class="text-white">3 = Neutral</h4>
              <h4 class="text-white">4 = Agree</h4>
              <h4 class="text-white">5 = Strongly Agree</h4>
            
              <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
                <button class="cutom-btn " onclick="nextPage()"><span> Proceed</span></button>
              </div>

            </div>
          </section>
        </div>
      </div>
      
      <div class="item item-2 hidden">
      <div class="header-text">
         <!-- ***** Question 1 ***** -->
        <section class="radio-section">
            <div class="radio-list">
              <h3 class="text-white" id="t-1">1. I am felt sad, lonely, or down most of the time.</h3>
              <h3 class="text-white" id="t-1">(Gibati nako ang kamingaw, o kaguol sa kadaghanan sa mga panahon.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio1" value="1" id="q1_radio1" type="radio"><label for="q1_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio1" value="2" id="q1_radio2" type="radio"><label for="q1_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio1" value="3" id="q1_radio3" type="radio"><label for="q1_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio1" value="4" id="q1_radio4" type="radio"><label for="q1_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio1" value="5" id="q1_radio5" type="radio"><label for="q1_radio5">5 Strongly Agree</label></div>
            
              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn" onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn" onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
          <!-- ***** Question 1 ***** -->
        </div>
      </div>
      <div class="item item-3 hidden">
        <div class="header-text">
          <!-- ***** Question 2 ***** -->
        <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-2">2. I have lost interest in activities that I used to enjoy.</h3>
              <h3 class="text-white" id="t-2">(Nawad-an kog interes sa mga kalihokan nga nalingaw ko kaniadto.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio2" value="1" id="q2_radio1" type="radio"><label for="q2_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio2" value="2" id="q2_radio2" type="radio"><label for="q2_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio2" value="3" id="q2_radio3" type="radio"><label for="q2_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio2" value="4" id="q2_radio4" type="radio"><label for="q2_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio2" value="5" id="q2_radio5" type="radio"><label for="q2_radio5">5 Strongly Agree</label></div>
              
              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
          <!-- ***** Question 2 ***** -->
        </div>
      </div>
      <div class="item item-4 hidden">
        <div class="header-text">
          <!-- ***** Question 3 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-3">3. I feel tired or lacks energy in most days.</h3>
              <h3 class="text-white" id="t-3">( Gikapoy ko o kulang sa kusog sa kadaghanan nga mga adlaw.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio3" value="1" id="q3_radio1" type="radio"><label for="q3_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio3" value="2" id="q3_radio2" type="radio"><label for="q3_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio3" value="3" id="q3_radio3" type="radio"><label for="q3_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio3" value="4" id="q3_radio4" type="radio"><label for="q3_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio3" value="5" id="q3_radio5" type="radio"><label for="q3_radio5">5 Strongly Agree</label></div>
            
              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 3 ***** -->
        </div>
      </div>

      <div class="item item-5 hidden">
        <div class="header-text">
          <!-- ***** Question 4 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-4">4. I have noticed changes in my appetite or weight.</h3>
              <h3 class="text-white" id="t-4">(Namatikdan nako ang mga pagbag-o sa akong gana o gibug-aton.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio4" value="1" id="q4_radio1" type="radio"><label for="q4_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio4" value="2" id="q4_radio2" type="radio"><label for="q4_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio4" value="3" id="q4_radio3" type="radio"><label for="q4_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio4" value="4" id="q4_radio4" type="radio"><label for="q4_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio4" value="5" id="q4_radio5" type="radio"><label for="q4_radio5">5 Strongly Agree</label></div>
            
              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 4 ***** -->
        </div>
      </div>

      <div class="item item-6 hidden">
        <div class="header-text">
          <!-- ***** Question 5 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-5">5. I have trouble enjoying the company of others.</h3>
              <h3 class="text-white" id="t-5">(Naglisud ko na makig uban sa uban)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio5" value="1" id="q5_radio1" type="radio"><label for="q5_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio5" value="2" id="q5_radio2" type="radio"><label for="q5_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio5" value="3" id="q5_radio3" type="radio"><label for="q5_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio5" value="4" id="q5_radio4" type="radio"><label for="q5_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio5" value="5" id="q5_radio5" type="radio"><label for="q5_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 5 ***** -->
        </div>
      </div>

      <div class="item item-7 hidden">
        <div class="header-text">
          <!-- ***** Question 6 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-6">6. I find it hard to get out of bed or start my day.</h3>
              <h3 class="text-white" id="t-6">(Naglisud kog bangon sa higdaanan kada-adlaw.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio6" value="1" id="q6_radio1" type="radio"><label for="q6_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio6" value="2" id="q6_radio2" type="radio"><label for="q6_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio6" value="3" id="q6_radio3" type="radio"><label for="q6_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio6" value="4" id="q6_radio4" type="radio"><label for="q6_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio6" value="5" id="q6_radio5" type="radio"><label for="q6_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 6 ***** -->
        </div>
      </div>

      <div class="item item-8 hidden">
        <div class="header-text">
          <!-- ***** Question 7 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-7">7. I have trouble sleeping (either too much or too little).</h3>
              <h3 class="text-white" id="t-7">(Naglisod ko sa pagkatulog (sobra o gamay).)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio7" value="1" id="q7_radio1" type="radio"><label for="q7_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio7" value="2" id="q7_radio2" type="radio"><label for="q7_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio7" value="3" id="q7_radio3" type="radio"><label for="q7_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio7" value="4" id="q7_radio4" type="radio"><label for="q7_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio7" value="5" id="q7_radio5" type="radio"><label for="q7_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 7 ***** -->
        </div>
      </div>

      <div class="item item-9 hidden">
        <div class="header-text">
          <!-- ***** Question 8 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-8">8. I have lost interest in my personal appearance or hygiene.</h3>
              <h3 class="text-white" id="t-8">(Nawad-an kog interes sa pag atiman sa akong kaugalingon.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio8" value="1" id="q8_radio1" type="radio"><label for="q8_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio8" value="2" id="q8_radio2" type="radio"><label for="q8_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio8" value="3" id="q8_radio3" type="radio"><label for="q8_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio8" value="4" id="q8_radio4" type="radio"><label for="q8_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio8" value="5" id="q8_radio5" type="radio"><label for="q8_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 8 ***** -->
        </div>
      </div>

      <div class="item item-10 hidden">
        <div class="header-text">
          <!-- ***** Question 9 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-9">9. I feel worthless or guilty for no apparent reason.</h3>
              <h3 class="text-white" id="t-9">(Gibati nako nga walay bili o sad-an sa walay dayag nga rason.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio9" value="1" id="q9_radio1" type="radio"><label for="q9_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio9" value="2" id="q9_radio2" type="radio"><label for="q9_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio9" value="3" id="q9_radio3" type="radio"><label for="q9_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio9" value="4" id="q9_radio4" type="radio"><label for="q9_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio9" value="5" id="q9_radio5" type="radio"><label for="q9_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 9 ***** -->
        </div>
      </div>

      <div class="item item-11 hidden">
        <div class="header-text">
          <!-- ***** Question 10 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-10">10. I often feel anxious or on edge.</h3>
              <h3 class="text-white" id="t-10">(Kanunay kong gebati og kabalaka og kaguol.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio10" value="1" id="q10_radio1" type="radio"><label for="q10_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio10" value="2" id="q10_radio2" type="radio"><label for="q10_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio10" value="3" id="q10_radio3" type="radio"><label for="q10_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio10" value="4" id="q10_radio4" type="radio"><label for="q10_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio10" value="5" id="q10_radio5" type="radio"><label for="q10_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 10 ***** -->
        </div>
      </div>

      <div class="item item-12 hidden">
        <div class="header-text">
          <!-- ***** Question 11 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-11">11. I have angry outburst, irritability and frustration even on small matters.</h3>
              <h3 class="text-white" id="t-11">(Dali ko masuko, init akong ulo og dali ko maglagot bisan sa gamay nga mga butang.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio11" value="1" id="q11_radio1" type="radio"><label for="q11_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio11" value="2" id="q11_radio2" type="radio"><label for="q11_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio11" value="3" id="q11_radio3" type="radio"><label for="q11_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio11" value="4" id="q11_radio4" type="radio"><label for="q11_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio11" value="5" id="q11_radio5" type="radio"><label for="q11_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 11 ***** -->
        </div>
      </div>

      <div class="item item-13 hidden">
        <div class="header-text">
          <!-- ***** Question 12 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-12">12. Over the past two weeks, I am anxious and agitated or restless.</h3>
              <h3 class="text-white" id="t-12">(Sulod sa milabay nga duha ka semana, dili ko mahimutang og grabe akong kabalaka)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio12" value="1" id="q12_radio1" type="radio"><label for="q12_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio12" value="2" id="q12_radio2" type="radio"><label for="q12_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio12" value="3" id="q12_radio3" type="radio"><label for="q12_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio12" value="4" id="q12_radio4" type="radio"><label for="q12_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio12" value="5" id="q12_radio5" type="radio"><label for="q12_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 12 ***** -->
        </div>
      </div>

      <div class="item item-14 hidden">
        <div class="header-text">
          <!-- ***** Question 13 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-13">13. Recently, I have problems with my memory, concentration and focus.</h3>
              <h3 class="text-white" id="t-13">(Bag-ohay lang, naa koy mga problema sa akong memorya, konsentrasyon ug focus.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio13" value="1" id="q13_radio1" type="radio"><label for="q13_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio13" value="2" id="q13_radio2" type="radio"><label for="q13_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio13" value="3" id="q13_radio3" type="radio"><label for="q13_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio13" value="4" id="q13_radio4" type="radio"><label for="q13_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio13" value="5" id="q13_radio5" type="radio"><label for="q13_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 13 ***** -->
        </div>
      </div>

      <div class="item item-15 hidden">
        <div class="header-text">
          <!-- ***** Question 14 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-14">14. I have difficulty making decisions.</h3>
              <h3 class="text-white" id="t-14">(Naglisod ko paghimog mga desisyon.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio14" value="1" id="q14_radio1" type="radio"><label for="q14_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio14" value="2" id="q14_radio2" type="radio"><label for="q14_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio14" value="3" id="q14_radio3" type="radio"><label for="q14_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio14" value="4" id="q14_radio4" type="radio"><label for="q14_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio14" value="5" id="q14_radio5" type="radio"><label for="q14_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 14 ***** -->
        </div>
      </div>

      <div class="item item-16 hidden">
        <div class="header-text">
          <!-- ***** Question 15 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-15">15. This past few weeks, I am hearing voices or seeing stuffs.</h3>
              <h3 class="text-white" id="t-15">(Niining milabay nga mga semana, aduna koy nadungog nga mga tingog og nakita nga mga butang.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio15" value="1" id="q15_radio1" type="radio"><label for="q15_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio15" value="2" id="q15_radio2" type="radio"><label for="q15_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio15" value="3" id="q15_radio3" type="radio"><label for="q15_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio15" value="4" id="q15_radio4" type="radio"><label for="q15_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio15" value="5" id="q15_radio5" type="radio"><label for="q15_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 15 ***** -->
        </div>
      </div>

      <div class="item item-17 hidden">
        <div class="header-text">
          <!-- ***** Question 16 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-16">16. Lately, I feel nobody understands me all the time.</h3>
              <h3 class="text-white" id="t-16">(Karong bag-o, gibati nako nga walay nakasabut kanako kanunay.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio16" value="1" id="q16_radio1" type="radio"><label for="q16_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio16" value="2" id="q16_radio2" type="radio"><label for="q16_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio16" value="3" id="q16_radio3" type="radio"><label for="q16_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio16" value="4" id="q16_radio4" type="radio"><label for="q16_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio16" value="5" id="q16_radio5" type="radio"><label for="q16_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 16 ***** -->
        </div>
      </div>

      <div class="item item-18 hidden">
        <div class="header-text">
          <!-- ***** Question 17 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-17">17. I have experienced physical symptoms such as aches, heart burn, hyper ventilation and/ or digestive issues without apparent reasons.</h3>
              <h3 class="text-white" id="t-17">(Nakasinati kog pisikal nga mga simtomas sama sa pagpanakit sa nagkalainlaing parte sa lawas,paglisud sa ginhawa,sakit sa tiyan nga walay klarong rason.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio17" value="1" id="q17_radio1" type="radio"><label for="q17_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio17" value="2" id="q17_radio2" type="radio"><label for="q17_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio17" value="3" id="q17_radio3" type="radio"><label for="q17_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio17" value="4" id="q17_radio4" type="radio"><label for="q17_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio17" value="5" id="q17_radio5" type="radio"><label for="q17_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 17 ***** -->
        </div>
      </div>

      <div class="item item-19 hidden">
        <div class="header-text">
          <!-- ***** Question 18 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-18">18. Lately, I wanted to be alone inside a dark room.</h3>
              <h3 class="text-white" id="t-18">(Karong bag-o, gusto kong mag-inusara sulod sa ngitngit nga lawak.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio18" value="1" id="q18_radio1" type="radio"><label for="q18_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio18" value="2" id="q18_radio2" type="radio"><label for="q18_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio18" value="3" id="q18_radio3" type="radio"><label for="q18_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio18" value="4" id="q18_radio4" type="radio"><label for="q18_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio18" value="5" id="q18_radio5" type="radio"><label for="q18_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 18 ***** -->
        </div>
      </div>

      <div class="item item-20 hidden">
        <div class="header-text">
          <!-- ***** Question 19 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-19">19. This past two weeks, I am self-blaming.</h3>
              <h3 class="text-white" id="t-19">(Niining milabay nga duha ka semana, gibasol nako ang akong kaugalingon.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio19" value="1" id="q19_radio1" type="radio"><label for="q19_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio19" value="2" id="q19_radio2" type="radio"><label for="q19_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio19" value="3" id="q19_radio3" type="radio"><label for="q19_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio19" value="4" id="q19_radio4" type="radio"><label for="q19_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio19" value="5" id="q19_radio5" type="radio"><label for="q19_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " onclick="nextPage()"><span> Next</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 19 ***** -->
        </div>
      </div>

      <div class="item item-21 hidden">
        <div class="header-text">
          <!-- ***** Question 20 ***** -->
          <section class="radio-section">
            <div class="radio-list ">
              <h3 class="text-white" id="t-20">20. I have had thoughts of harming myself or ending my life.</h3>
              <h3 class="text-white" id="t-20">(Duna koy mga hunahuna sa pagdaot sa akong kaugalingon o pagtapos sa akong kinabuhi.)</h3>
              <h4 class="fw-bold mb-2 radio-error-msg d-none" style = "color: #fe2525;">Kindly select a response from the provided options.</h4>
              <div class="radio-item"><input name="radio20" value="1" id="q20_radio1" type="radio"><label for="q20_radio1">1 Strongly Disagree</label></div>
              <div class="radio-item"><input name="radio20" value="2" id="q20_radio2" type="radio"><label for="q20_radio2">2 Disagree</label></div>
              <div class="radio-item"><input name="radio20" value="3" id="q20_radio3" type="radio"><label for="q20_radio3">3 Neutral</label></div>
              <div class="radio-item"><input name="radio20" value="4" id="q20_radio4" type="radio"><label for="q20_radio4">4 Agree</label></div>
              <div class="radio-item"><input name="radio20" value="5" id="q20_radio5" type="radio"><label for="q20_radio5">5 Strongly Agree</label></div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="cutom-btn " onclick="previousPage()"><span> Previous</span></button>
                <button class="cutom-btn " id="newSub" onclick="newSubmit()" ><span> Submit</span></button>
                <button class="cutom-btn d-none" id="reSub" onclick="reSubmit()" ><span> Resubmit</span></button>
              </div>
            </div>
          </section>
         <!-- ***** Question 20 ***** -->
        </div>
      </div>

      <!-- chart -->
      <?php include ('chartArea.php'); ?>
      <!-- chart -->

  </div>
<!--- Assessment Form --->

<!--- Results --->
<?php 
include('./results.php');
?>
<!--- Results --->

  <footer>
      <div class="col-sm-12">
        <p>Copyright © <span id="footer-year"></span></p>
        <p>Advance Mental Health Care</p>
      </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>
  <script src="assets/js/depression-Assessment.js"></script>
  </body>
</html>