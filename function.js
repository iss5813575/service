$(function ()
{
  getFastRepair()

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
      $('body').toggleClass('toggle-sidebar')
      break;
    case 'แจ้งด่วน':
      $(".fast_repair").removeAttr("hidden");
      $(".dashboard").attr("hidden", true);
      $(".repair").attr("hidden", true);
      $(".appeal").attr("hidden", true);
      $('body').toggleClass('toggle-sidebar')
      break;
    case 'แจ้งซ่อม':
      $(".repair").removeAttr("hidden");
      $(".dashboard").attr("hidden", true);
      $(".fast_repair").attr("hidden", true);
      $(".appeal").attr("hidden", true);
      $('body').toggleClass('toggle-sidebar')
      break;
    case 'เสนอเเนะ':
      $(".appeal").removeAttr("hidden");
      $(".dashboard").attr("hidden", true);
      $(".fast_repair").attr("hidden", true);
      $(".repair").attr("hidden", true);
      $('body').toggleClass('toggle-sidebar')
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

            html_pending += `<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseList${i}" aria-expanded="false" aria-controls="collapseList">
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
            html_pending += `<button type="button" href="Javascript:;" class="btn btn-success btn-complete"  href-val=${data[i]["id_repair"]}>Success</button> `

            html_pending += `</div></div>`

          } else {
            job_complate += 1
            html_complete += `<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseList${i}" aria-expanded="false" aria-controls="collapseList">
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