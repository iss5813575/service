// ADD
$("#form_room").submit(function (event)
{
    event.preventDefault();
  
  $.ajax({
    type: "POST",
    url: "./master_room/insert.php",
    dataType: "json",
    data: {
        room: $("input[name=num_room]").val(),
    },
    success: function (returnData)
    {
      if (returnData.response == 1) {
        Swal.fire("", "บันทึกสำเร็จ!", "success").then(
          (result) =>
          {
            // getRoom();
            $("#form_room")[0].reset();
            $("#add_room").modal("hide");
          }
        );
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "ไม่สามารถบันทึกข้อมูล!",
        });
      }
    },
  });
});

$(function(){
    getRoom()
})

function getRoom(){
    $.ajax({
        type: "GET",
        url: "./master_room/insert.php",
        dataType: "json",
        data: {
          get_room: "get_room",
        },
        success: function (returnData)
        {
          data_print = returnData;
          $("#list_room").html("");
          var html = "";
          if (data_print.length > 0) {
            for (i = 0; i < data_print.length; i++) {
              let num = i + 1;
              html += `
              <tr id="${data_print[i].id}" >
              <td>${num}</td>
              <td>${data_print[i].room}</td>
              <td>${data_print[i].date}</td>
    
              `;
            }
            $("#list_room").html(html);
          } 
        },
      });
}