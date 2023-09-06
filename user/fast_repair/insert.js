$(function ()
{
    main();

})

$("#insert_fast").on("click", function ()
{

    let txt_room = $('select[name=txt_room]').find(":selected").val();
    let txt_detail = $("#txt_detail").val()
    let txt_user_id = $("#userId").val()
    let txt_user_name = $("#userName").val()

    if ($("#txt_detail").val() != "") {
        $.ajax({
            type: "POST",
            url: "./insert_fast_repair.php",
            dataType: "json",
            data: {
                txt_room: txt_room, txt_detail: txt_detail, txt_user_id: txt_user_id,txt_user_name: txt_user_name
            },
            success: function (returnData)
            {
                let job = returnData.job;
                if (returnData.response == 1) {
                    Swal.fire("", "แจ้งปัญหาเรียบร้อย", "success").then(
                        (result) =>
                        {
                            liff.closeWindow();
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

async function main()
{
    await liff.init({ liffId: "1657556767-8ojAjBnJ" })
    if (liff.isLoggedIn()) {
        getUserProfile()
    } else {
        liff.login({ redirectUri: "YOUR-GITHUB-PAGES-DOMAIN/liff/path/" })
    }

    
}

async function getUserProfile()
{
    const profile = await liff.getProfile()
    $("#userId").val(profile.userId);
    $("#userName").val(profile.displayName);
    
}



async function shareMsg()
{
    if (liff.getContext().type !== "none") {
        await liff.sendMessages([
            {
                type: "text",
                text: "#แจ้งปัญหาด่วน",
            },
        ]);
    }
    
}

