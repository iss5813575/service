
$(".list_manu").on("click", function ()
{
    $(".list_manu").find("span").removeClass("active")
    $(this).find("span").addClass("active")

    let txt = $(this).find("span").text()
    switch (txt) {
        case 'โปรไฟล์':
            $(".profile").removeAttr("hidden");
            $(".repair").attr("hidden", true);
            $(".appeal").attr("hidden", true);
            $(".room").attr("hidden", true);
            $(".fast_repair").attr("hidden", true);
            break;
        case 'แจ้งซ่อม':
            getRepair()
 
            $(".repair").removeAttr("hidden");
            $(".appeal").attr("hidden", true);
            $(".room").attr("hidden", true);
            $(".profile").attr("hidden", true);
            $(".fast_repair").attr("hidden", true);
            break;
        case 'เสนอเเนะ':
            getDataFeedback()
            $(".appeal").removeAttr("hidden");
            $(".repair").attr("hidden", true);
            $(".room").attr("hidden", true);
            $(".profile").attr("hidden", true);
            $(".fast_repair").attr("hidden", true);
            break;
        case 'จองห้อง':
            $(".room").removeAttr("hidden");
            $(".repair").attr("hidden", true);
            $(".profile").attr("hidden", true);
            $(".appeal").attr("hidden", true);
            $(".fast_repair").attr("hidden", true);
            break;
        case 'แจ้งด่วน':
            getFastRepair()
            $(".fast_repair").removeAttr("hidden");
            $(".repair").attr("hidden", true);
            $(".profile").attr("hidden", true);
            $(".appeal").attr("hidden", true);
            $(".room").attr("hidden", true);
            break;
    }
});


// Insert fast repair
$("#insert_fast_modal").on("click", function ()
{
    let txt_room = $('select[name=txt_room]').find(":selected").val();
    let txt_detail = $("#txt_detail").val()
    let txt_user_id = $("#txt_userId").val()
    let txt_user_name = $("#txt_userName").val()


    if ($("#txt_detail").val() != "") {
        $.ajax({
            type: "POST",
            url: "./fast_repair/insert_fast_repair.php",
            dataType: "json",
            data: {
                txt_room: txt_room, txt_detail: txt_detail, txt_user_id: txt_user_id,txt_user_name:txt_user_name
            },
            success: function (returnData)
            {
                let job = returnData.job;
                if (returnData.response == 1) {
                    Swal.fire("", "แจ้งปัญหาเรียบร้อย", "success").then(
                        (result) =>
                        {
                            $('#fast_repair_modal').modal('toggle');
                            location.reload();
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
    } else {
        alert("กรุณากรอกข้อมูลให้ครบถ้วน")
    }

});


// Insert Feedback
$("#insert_feedback").on("click", function ()
{

    let txt_detail = $("#feedback_detail").val()
    let txt_location = $("#feedback_location").val()
    let txt_user_id = $("#txt_userId").val()
    let txt_user_name = $("#txt_userName").val()

    if (txt_detail != "") {
        $.ajax({
            type: "POST",
            url: "./feedback/insert_feedback.php",
            dataType: "json",
            data: {
                txt_location: txt_location, txt_detail: txt_detail, txt_user_id: txt_user_id,txt_user_name:txt_user_name
            },
            success: function (returnData)
            {
                let job = returnData.job;
                if (returnData.response == 1) {
                    Swal.fire("", "แจ้งปัญหาเรียบร้อย", "success").then(
                        (result) =>
                        {
                            $('#feedback').modal('toggle');
                            location.reload();
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
    } else {
        alert("กรุณากรอกข้อมูลให้ครบถ้วน")
    }

});





// insert_repair
$("#form_insert_repair").submit(function (event)
{
    event.preventDefault();
    
    var form_data = new FormData(this);
    form_data.append("txt_userId", $("#txt_userId").val());
    form_data.append("txt_userName", $("#txt_userName").val());
    let txt_detail_repair = $("#txt_detail_repair").val()
    if(txt_detail_repair != ''){
        $.ajax({
        type: "POST",
        url: "./repair/insert_repair.php",
        dataType: "json",
        processData: false,
        contentType: false,
        data: form_data,
        success: function (returnData)
        {
            if (returnData.response == 1) {
                Swal.fire("บันทึกสำเร็จ!", "", "success").then(
                    (result) =>
                    {
                        $('#nomal_repair').modal('toggle');
                        location.reload();
         
                    }
                );
            } else {
                $(".footers").removeAttr("hidden");
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "ไม่สามารถบันทึกข้อมูล!",
                });
            }
        },
    });

    }else{
        alert("กรุณากรอกข้อมูลให้ครบถ้วน")
    }

});