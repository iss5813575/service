<html lang="en">

<head>



  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>SERVICE 19</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">



  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
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
      <a href="index.html" class="logo d-flex align-items-center">
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
        <h1>แดชบอร์ด</h1>
      </div>

      <!-- dashboard -->
      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-8">
            <div class="row">

              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h3 class="card-title">แจ้งปัญหาด่วน</h3>
                    <div class="d-flex align-items-center justify-content-center font-weight-bold">
                      <h3 id="fast_all"></h3>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <span class="card-title">รอดำเนินการ</span>
                        <p id="fast_pending"></p>
                      </div>
                      <div class="col-6">
                        <span class="card-title">ดำเนินการเรียบร้อย</span>
                        <p id="fast_complete"></p>
                      </div>
                    </div>
                  </div>

                </div>
              </div><!-- End Sales Card -->

              <!-- Revenue Card -->
              <!-- <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>

                  <div class="card-body">
                    <h5 class="card-title">Revenue <span>| This Month</span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                      </div>
                      <div class="ps-3">
                        <h6>$3,264</h6>
                        <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                      </div>
                    </div>
                  </div>

                </div>
              </div> -->
              <!-- End Revenue Card -->

              <!-- Customers Card -->
              <!-- <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>

                  <div class="card-body">
                    <h5 class="card-title">Customers <span>| This Year</span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6>1244</h6>
                        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                      </div>
                    </div>

                  </div>
                </div>

              </div> -->
              <!-- End Customers Card -->


            </div>
          </div><!-- End Left side columns -->
        </div>
      </section>
      <!-- end dashboard -->
    </div>


    <div class="fast_repair" hidden>
      <div class="pagetitle">
        <h1>แจ้งปัญหาด่วน</h1>
      </div>

      <div class="list_data">

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

      <!-- <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        หมายเลขแจ้งซ่อม #1
      </button>
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
          <p>หมายเลขห้อง: 192562</p>
          <p>รายละเอียด: จอไม่แสดง</p>
          <p>วันที่: 2022-05-22</p>
          <p>สถานะ: รอดำเนินการ</p>
        </div>
      </div>
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
        หมายเลขแจ้งซ่อม #2
      </button>
      <div class="collapse" id="collapseExample2">
        <div class="card card-body">
          <p>หมายเลขห้อง: 192562</p>
          <p>รายละเอียด: จอไม่แสดง</p>
          <p>วันที่: 2022-05-22</p>
          <p>สถานะ: รอดำเนินการ</p>
        </div>
      </div> -->




      <!-- <i class="bi bi-plus-circle-fill" data-bs-toggle="modal" data-bs-target="#feedback" style="font-size: 2.2rem;"></i> -->


      <!-- modal -->
      <!-- <div class="modal fade" id="feedback" tabindex="-1" aria-labelledby="feedbackLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-body">
              <form>
                <h4>ร้องเรียน/เสนอเเนะ</h4>
                <div class="mb-3">
                  <label for="detail" class="form-label">รายละเอียด <span class="d-inline text-danger h5 m-0">*</span></label>
                  <textarea class="form-control" id="detail" name="detail" rows="3" placeholder="*เช่น ห้องน้ำหญิงสกปรกมาก" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="location" class="form-label">สถานที่ <span class="d-inline text-danger h5 m-0">*</span></label>
                  <input type="text" class="form-control" id="location" name="location" placeholder="อาคารเรียนรวม 19" required>
                </div>
                <input type="hidden" id="userId" value="">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Save</button>
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