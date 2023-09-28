$(function ()
{
  getFastRepair()
  getAp()
  getRepair()
})


// $(".toggle-sidebar-btn").on("click", function ()
// {
//   alert('toggle')

// })



$(".list_item").on("click", function ()
{

  let txt = $(this).find('span').text()


  $(this).parents('.sidebar').find('.list_item').removeClass("active")
  $(this).addClass("active")

  // $(".list_manu").find("span").removeClass("active")
  // $(this).find("span").addClass("active")

  switch (txt) {
    case 'แดชบอร์ด':
      $(".dashboard").removeAttr("hidden");
      $(".fast_repair").attr("hidden", true);
      $(".repair").attr("hidden", true);
      $(".appeal").attr("hidden", true);
      $(".master_room").attr("hidden", true);
      // $('body').toggleClass('toggle-sidebar')
      break;
    case 'แจ้งด่วน':
      $(".fast_repair").removeAttr("hidden");
      $(".dashboard").attr("hidden", true);
      $(".repair").attr("hidden", true);
      $(".appeal").attr("hidden", true);
      $(".master_room").attr("hidden", true);
      // $('body').toggleClass('toggle-sidebar')
      break;
    case 'แจ้งซ่อม':
      $(".repair").removeAttr("hidden");
      $(".dashboard").attr("hidden", true);
      $(".fast_repair").attr("hidden", true);
      $(".appeal").attr("hidden", true);
      $(".master_room").attr("hidden", true);
      // $('body').toggleClass('toggle-sidebar')
      break;
    case 'เสนอเเนะ':
      $(".appeal").removeAttr("hidden");
      $(".dashboard").attr("hidden", true);
      $(".fast_repair").attr("hidden", true);
      $(".repair").attr("hidden", true);
      $(".master_room").attr("hidden", true);
      // $('body').toggleClass('toggle-sidebar')
      break;
    case 'หมายเลขห้อง':
      
      $(".master_room").removeAttr("hidden");
      $(".appeal").attr("hidden", true);
      $(".dashboard").attr("hidden", true);
      $(".fast_repair").attr("hidden", true);
      $(".repair").attr("hidden", true);
      // $('body').toggleClass('toggle-sidebar')
      break;
  }
});



// GET DATA
function getFastRepair()
{
  $.ajax({
    type: "get",
    url: "./get_data.php",
    dataType: "JSON",
    data: {
      'get_fast_repair': 'get_fast_repair',
    },

    success: function (returnData)
    {
      let data = returnData;
      var html_pending = "";
      var html_complete = "";

      if (data.length > 0) {
        let job_all = 0
        let job_pending = 0
        let job_complate = 0
        for (i = 0; i < data.length; i++) {
          job_all += 1
          if (data[i]["status"] == "รอดำเนินการ") {
            job_pending += 1

            html_pending += `<button class="accordion-button collapsed h-item" type="button" data-bs-toggle="collapse" data-bs-target="#collapseList${i}" aria-expanded="false" aria-controls="collapseList">
            หมายเลขแจ้งซ่อม ${data[i]["id_repair"]}
          </button>
          <div class="collapse" id="collapseList${i}">
            <div class="card card-body">
              <div class="list-item">
              <p>หมายเลขห้อง: ${data[i]["repair_room"]}</p>
              <p>รายละเอียด: ${data[i]["repair_detail"]}</p>
              <p>วันที่: ${data[i]["date"]}</p>
              <p>สถานะ: ${data[i]["status"]}</p>
              </div>
              `
            html_pending += `<button type="button" href="Javascript:;" class="btn btn-success btn-complete"  href-val=${data[i]["id_repair"]}>ดำเนินการ</button> `

            html_pending += `</div></div>`

          } else {
            job_complate += 1
            html_complete += `<button class="accordion-button collapsed h-item" type="button" data-bs-toggle="collapse" data-bs-target="#collapseList${i}" aria-expanded="false" aria-controls="collapseList">
            หมายเลขแจ้งซ่อม ${data[i]["id_repair"]}
          </button>
          <div class="collapse" id="collapseList${i}">
            <div class="card card-body">
              <div class="list-item">
              <p>หมายเลขห้อง: ${data[i]["repair_room"]}</p>
              <p>รายละเอียด: ${data[i]["repair_detail"]}</p>
              <p>วันที่: ${data[i]["date"]}</p>
              <p>สถานะ: ${data[i]["status"]}</p>
              <p>รายละเอียดการดำเนินการ: ${data[i]["detail_worker"]}</p>
              </div>
              `
            html_complete += `</div></div>`
          }
        }
        $(".list_data_pending").append(html_pending);
        $(".list_data_complete").append(html_complete);
        $("#fast_all").text(job_all)
        $("#fast_pending").text(job_pending)
        $("#fast_complete").text(job_complate)


        $(".btn-complete").on("click", function ()
        {
          check_close = 0

          var id = $(this).attr("href-val");
          $.fancybox.open({
            src: 'form_complete.php?job=' + id,
            type: 'iframe',
            opts: {
              afterClose: function (instance, current)
              {
                location.reload();
                if (check_close == 1) {
                  // window.location = "./list_req_published.php";

                }
              },
              iframe: {
                css: {
                  width: '450px',
                  height: '60%'
                }
              }
            }
          });
        });


      }

    },
  });
}


// Get appeal
function getAp()
{
  $.ajax({
    type: "get",
    url: "./get_data.php",
    dataType: "JSON",
    data: {
      'get_ap': 'get_ap',
    },

    success: function (returnData)
    {
      let data = returnData;
      var html_pending = "";
      var html_complete = "";

      if (data.length > 0) {
        let job_all = 0
        let job_pending = 0
        let job_complate = 0
        for (i = 0; i < data.length; i++) {
          job_all += 1
          if (data[i]["status"] == "รอดำเนินการ") {
            job_pending += 1

            html_pending += `<button class="accordion-button collapsed h-item" type="button" data-bs-toggle="collapse" data-bs-target="#apList${i}" aria-expanded="false" aria-controls="apList">
            หมายเลขงาน ${data[i]["id_suggest"]}
          </button>
          <div class="collapse" id="apList${i}">
            <div class="card card-body">
              <div class="list-item">
              <p>สถานที่: ${data[i]["location"]}</p>
              <p>รายละเอียด: ${data[i]["detail"]}</p>
              <p>วันที่: ${data[i]["date"]}</p>
              <p>สถานะ: ${data[i]["status"]}</p>
              </div>
              `
            html_pending += `<button type="button" href="Javascript:;" class="btn btn-success btn-complete"  href-val=${data[i]["id_suggest"]}>ดำเนินการ</button> `

            html_pending += `</div></div>`

          } else {
            job_complate += 1
            html_complete += `<button class="accordion-button collapsed h-item" type="button" data-bs-toggle="collapse" data-bs-target="#apList${i}" aria-expanded="false" aria-controls="apList">
            หมายเลขงาน ${data[i]["id_suggest"]}
          </button>
          <div class="collapse" id="apList${i}">
            <div class="card card-body">
              <div class="list-item">
              <p>สถานที่: ${data[i]["location"]}</p>
              <p>รายละเอียด: ${data[i]["detail"]}</p>
              <p>วันที่: ${data[i]["date"]}</p>
              <p>สถานะ: ${data[i]["status"]}</p>
              <p>รายละเอียดการดำเนินการ: ${data[i]["detail_worker"]}</p>
              </div>
              `
            html_complete += `</div></div>`
          }
        }
        $(".list_data_ap_pending").append(html_pending);
        $(".list_data_ap_complete").append(html_complete);
        $("#ap_all").text(job_all)
        $("#ap_pending").text(job_pending)
        $("#ap_complete").text(job_complate)


        $(".btn-complete").on("click", function ()
        {
          check_close = 0

          var id = $(this).attr("href-val");
          $.fancybox.open({
            src: 'form_complete.php?job=' + id,
            type: 'iframe',
            opts: {
              afterClose: function (instance, current)
              {
                location.reload();
                if (check_close == 1) {
                  // window.location = "./list_req_published.php";

                }
              },
              iframe: {
                css: {
                  width: '450px',
                  height: '60%'
                }
              }
            }
          });
        });

      }

    },
  });

}

// Get Repair
function getRepair()
{
  $.ajax({
    type: "get",
    url: "./get_data.php",
    dataType: "JSON",
    data: {
      'get_repair': 'get_repair',
    },

    success: function (returnData)
    {
      let data = returnData;
      var html_pending = "";
      var html_complete = "";

      if (data.length > 0) {
        let job_all = 0
        let job_pending = 0
        let job_complate = 0
        for (i = 0; i < data.length; i++) {
          job_all += 1
          if (data[i]["status"] == "รอดำเนินการ") {
            job_pending += 1

            html_pending += `<button class="accordion-button collapsed h-item" type="button" data-bs-toggle="collapse" data-bs-target="#repairList${i}" aria-expanded="false" aria-controls="repairList">
            หมายเลขงาน ${data[i]["id_repair"]}
          </button>
          <div class="collapse" id="repairList${i}">
            <div class="card card-body">
              <div class="list-item">
              <p>สถานที่: ${data[i]["location_repair"]}</p>
              <p>รายละเอียด: ${data[i]["detail_repair"]}</p>
              <p>วันที่: ${data[i]["date"]}</p>
              <p>สถานะ: ${data[i]["status"]}</p>
              <p>รูปภาพ:</p>
              <div class="grid grid-cols-3 gap-4 max-w-xl mx-auto p-10">
              `
              $.each(data[i]["imgs"], function(index, value){
                html_pending += `
                <a data-fancybox="gallery" href="./assets/img_repair/${value}">
                <img class="rounded" width="200" height="150" src="./assets/img_repair/${value}" />
              </a>`
              });
            html_pending += `</div></div>`
            html_pending += `<button type="button" href="Javascript:;" class="btn btn-success btn-complete"  href-val=${data[i]["id_repair"]}>ดำเนินการ</button> `

            html_pending += `</div></div>`

          } else {
            job_complate += 1
            html_complete += `<button class="accordion-button collapsed h-item" type="button" data-bs-toggle="collapse" data-bs-target="#repairList${i}" aria-expanded="false" aria-controls="repairList">
            หมายเลขงาน ${data[i]["id_repair"]}
          </button>
          <div class="collapse" id="repairList${i}">
            <div class="card card-body">
              <div class="list-item">
              <p>สถานที่: ${data[i]["location_repair"]}</p>
              <p>รายละเอียด: ${data[i]["detail_repair"]}</p>
              <p>วันที่: ${data[i]["date"]}</p>
              <p>สถานะ: ${data[i]["status"]}</p>
              <p>รายละเอียดการดำเนินการ: ${data[i]["detail_worker"]}</p>
              </div>
              <p>รูปภาพ:</p>
              <div class="grid grid-cols-3 gap-4 max-w-xl mx-auto p-10">
              `
              $.each(data[i]["imgs"], function(index, value){
                html_complete += `
                <a data-fancybox="gallery" href="./assets/img_repair/${value}">
                <img class="rounded" width="200" height="150" src="./assets/img_repair/${value}" />
              </a>
            
                `
              });
            html_complete += `</div></div></div>`
          }
        }
        if(job_pending > 0){
          $(".list_data_repair_pending").append(html_pending);
        }
        $(".list_data_repair_complete").append(html_complete);
        $("#repair_all").text(job_all)
        
        $("#repair_pending").text(job_pending)
        $("#repair_complete").text(job_complate)


        $(".btn-complete").on("click", function ()
        {
          check_close = 0

          var id = $(this).attr("href-val");
          $.fancybox.open({
            src: 'form_complete.php?job=' + id,
            type: 'iframe',
            opts: {
              afterClose: function (instance, current)
              {
                location.reload();
                if (check_close == 1) {
                  // window.location = "./list_req_published.php";

                }
              },
              iframe: {
                css: {
                  width: '450px',
                  height: '60%'
                }
              }
            }
          });
        });

      }

    },
  });

}


// fast repair
$(".btn-list").on("click", function ()
{
  $(this).siblings().removeClass('btn-active')
  $(this).addClass('btn-active')
  let txt = $(this).text()
  if (txt == "รอดำเนินการ") {
    $(".list_data_pending").removeAttr("hidden");
    $(".list_data_complete").attr("hidden", true);
  } else {
    $(".list_data_complete").removeAttr("hidden");
    $(".list_data_pending").attr("hidden", true);
  }
});

// repair
$(".btn-list-repair").on("click", function ()
{
  $(this).siblings().removeClass('btn-active')
  $(this).addClass('btn-active')
  let txt = $(this).text()
  if (txt == "รอดำเนินการ") {
    $(".list_data_repair_pending").removeAttr("hidden");
    $(".list_data_repair_complete").attr("hidden", true);
  } else {
    $(".list_data_repair_complete").removeAttr("hidden");
    $(".list_data_repair_pending").attr("hidden", true);
  }
});

// appeal
$(".btn-list-ap").on("click", function ()
{
  $(this).siblings().removeClass('btn-active')
  $(this).addClass('btn-active')
  let txt = $(this).text()
  if (txt == "รอดำเนินการ") {
    $(".list_data_ap_pending").removeAttr("hidden");
    $(".list_data_ap_complete").attr("hidden", true);
  } else {
    $(".list_data_ap_complete").removeAttr("hidden");
    $(".list_data_ap_pending").attr("hidden", true);
  }
});

$("#logout").on("click", function ()
{
  $.ajax({
    type: "POST",
    url: "./login/logout.php",
    dataType: "json",
    data: {
      logout: "logout",
    },
    success: function (returnData)
    {
      localStorage.clear();
      location.replace("./login/");
    },
  });
});