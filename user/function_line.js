
$(function ()
{
  main()

})

async function main()
{
  await liff.init({ liffId: "1657556767-9NLZL7y3" })
  if (liff.isLoggedIn()) {
    getUserProfile()
  } else {
    liff.login({ redirectUri: "YOUR-GITHUB-PAGES-DOMAIN/liff/path/" })
  }
}

async function getUserProfile()
{
  const profile = await liff.getProfile()
  document.getElementById("pictureUrl").src = profile.pictureUrl
  document.getElementById("userName").append(profile.displayName)
  document.getElementById("displayName").append(profile.displayName)
  document.getElementById("userId").append(profile.userId)
  document.getElementById("statusMessage").append(profile.statusMessage)
  document.getElementById("decodedIDToken").append(liff.getDecodedIDToken().email)

  $("#txt_userId").val(profile.userId);
  $("#txt_userName").val(profile.displayName);
  
  // document.getElementById("userId").append(profile.userId)
}



// GET DATA
function getFastRepair()
{
  $.ajax({
    type: "get",
    url: "./get_data.php",
    dataType: "JSON",
    data: {
      'userid': $("#userId").text(),
    },
    success: function (returnData)
    {
      let data = returnData;
      var html = "";
      if (data.length > 0) {
        $(".list_data").empty();
        for (i = 0; i < data.length; i++) {
          html += `<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample${i}" aria-expanded="false" aria-controls="collapseExample">
          หมายเลขแจ้งซ่อม ${data[i]["id_repair"]}
        </button>
        <div class="collapse" id="collapseExample${i}">
          <div class="card card-body">
            <p>หมายเลขห้อง: ${data[i]["repair_room"]}</p>
            <p>รายละเอียด: ${data[i]["repair_detail"]}</p>
            <p>วันที่: ${data[i]["date"]}</p>
            <p>สถานะ: ${data[i]["status"]}</p>
            </div>
        </div>`
        }
        $(".list_data").append(html);

      }

    },
  });
}


function getDataFeedback(){
  $.ajax({
    type: "get",
    url: "./get_data.php",
    dataType: "JSON",
    data: {
      'feedback': $("#txt_userId").val(),
    },
    success: function (returnData)
    {
      let data = returnData;
      var html = "";
      if (data.length > 0) {
        
        $(".list_data_feedback").empty();
        for (i = 0; i < data.length; i++) {
          html += `<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFeedback${i}" aria-expanded="false" aria-controls="collapseFeedback">
          หมายเลขเสนอเเนะ ${data[i]["id_suggest"]}
        </button>
        <div class="collapse" id="collapseFeedback${i}">
          <div class="card card-body">
            <p>รายละเอียด: ${data[i]["detail"]}</p>
            <p>สถานที่: ${data[i]["location"]}</p>
            <p>วันที่: ${data[i]["date"]}</p>
            <p>สถานะ: ${data[i]["status"]}</p>
            </div>
        </div>`
        }
        $(".list_data_feedback").append(html);

      }

    },
  });
}

// Get repair
function getRepair(){
  $.ajax({
    type: "get",
    url: "./get_data.php",
    dataType: "JSON",
    data: {
      'repair': $("#txt_userId").val(),
    },
    success: function (returnData)
    {
      let data = returnData;
 
      var html = "";
      if (data.length > 0) {
        
        $(".list_data_nomal_repair").empty();
        for (i = 0; i < data.length; i++) {
          html += `<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#repair_${i}" aria-expanded="false" aria-controls="repair_">
          หมายเลขแจ้งซ่อม ${data[i]["id_repair"]}
        </button>
        <div class="collapse" id="repair_${i}">
          <div class="card card-body">
            <p>ประเภทการเเจ้งซ่อม: ${data[i]["type_repair"]}</p>
            <p>รายละเอียด: ${data[i]["detail_repair"]}</p>
            <p>สถานที่: ${data[i]["location_repair"]}</p>
            <p>วันที่: ${data[i]["date"]}</p>
            <p>สถานะ: ${data[i]["status"]}</p>
            <p>รูปภาพ:</p>
            <div class="grid grid-cols-3 gap-4 max-w-xl mx-auto p-10">
          `
          $.each(data[i]["imgs"], function(index, value){
            html += `
          
            <a data-fancybox="gallery" href="../assets/img_repair/${value}">
            <img class="rounded" width="200" height="150" src="../assets/img_repair/${value}" />
          </a>
        
            `
          });
       html +=`
       </div>
            </div>
        </div>`
        }
        $(".list_data_nomal_repair").append(html);

      }

    },
  });
}


// Fanctbox 
Fancybox.bind('[data-fancybox="gallery"]', {
  compact: false,
  idle: false,

  animated: false,
  showClass: false,
  hideClass: false,

  dragToClose: false,

  Images: {
    // Disable animation from/to thumbnail on start/close
    zoom: false,
  },

  Toolbar: {
    display: {
      left: [],
      middle: [],
      right: ['close'],
    },
  },

  Thumbs: {
    type: 'classic',
    Carousel: {
      center: function () {
        return this.contentDim > this.viewportDim;
      },
    },
  },

  Carousel: {
    // Remove the navigation arrows
    Navigation: false,
  },
});