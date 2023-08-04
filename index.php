<html lang="en">

<head>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SERVICE 19</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">



    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- modal hyst modal-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js">
    </script>

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

    <!-- fancyapps -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <span class="d-none d-lg-block">SERVICE 19 & 58</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

    </header><!-- End Header -->



    <?php
  include_once('./side_bar/sidebar.php');
  ?>



    <main id="main" class="main">

        <?php

    session_start();
    if (!isset($_SESSION['login'])) {
      header('location: http://localhost/service/login/');
      // header('location: https://sos.oas.psu.ac.th/login/');
    }
    ?>

        <div class="dashboard">
            <div class="pagetitle">
                <h1>แดชบอร์ด </h1>
            </div>
            <?php
            include("./dashboard.php");
            ?>
        </div>


        <div class="fast_repair" hidden>
            <div class="pagetitle">
                <h1>แจ้งปัญหาด่วน</h1>
            </div>

            <div class="btn-group" role="group" aria-label="Basic outlined ">
                <button type="button" class="btn btn-outline-primary btn-list btn-active">รอดำเนินการ</button>
                <button type="button" class="btn btn-outline-primary btn-list">ดำเนินการเรียบร้อย</button>
            </div>


            <div class="list_data_pending"></div>
            <div class="list_data_complete" hidden></div>
            <!-- <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                หมายเลขแจ้งซ่อม #1
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>หมายเลขห้อง: 192562</p>
                <p>รายละเอียด: จอไม่แสดง</p>
                <p>วันที่: 2022-05-22</p>
                <p>สถานะ: รอดำเนินการ</p>
              </div>
            </div>
          </div>
        </div> -->
        </div>


        <div class="repair" hidden>
            <div class="pagetitle">
                <h1>แจ้งซ่อม</h1>
            </div>
        </div>

        <div class="appeal" hidden>
            <div class="pagetitle">
                <h1>เสนอเเนะ</h1>
            </div>
        </div>




    </main>
    <!-- End #main -->



    <!-- PACE -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="./assets//center-radar.css">

    <script src="./function.js"></script>

    <script src="./assets/js/main.js"></script>

</body>

</html>