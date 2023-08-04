<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERVICE 19</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .footer {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="modal-body">
        <form>
            <h4 class="fw-bold">ดำเนินการ</h4>
            <?php

            ?>
            <div class="mb-3">
                <label for="location" class="form-label">ผู้ปฏิบัติงานงาน <span class="d-inline text-danger h5 m-0">*</span></label>
                <select class="form-select" aria-label="Default select example" name="worker">
                    <?php
                    $list_name = array("วิษณุ เพชรประวัติ", "อนุสรณ์ บัวสุวรรณ", "ภาดา สายอ่อนตา", "นครินทร์ ปานเกิด", "กรกต ขวัญทุม", "อิฮซัน สือแต");
                    foreach ($list_name as $name) {
                        if ($name !== $_SESSION['username']) {
                            echo '<option value="' . $name . '">' . $name . '</option>';
                        } else {
                            echo '<option selected value="' . $_SESSION['username'] . '">' . $_SESSION['username'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">รายละเอียดการดำเนินการ <span class="d-inline text-danger h5 m-0">*</span></label>
                <textarea class="form-control" id="detail" name="detail" rows="3" required></textarea>
            </div>

            <input type="hidden" id="job_id" value="<?= $_GET['job'] ?>">
            <div class="footer">
                <button type="button" class="btn btn-success" id="complete_job">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>

<script>
    $("#complete_job").on("click", function() {

        let txt_worker = $('select[name=worker]').find(":selected").val();
        let txt_detail = $("#detail").val()
        let txt_user_id = $("#job_id").val()


        if (txt_detail != "") {
            $.ajax({
                type: "POST",
                url: "./config/comple_job.php",
                dataType: "json",
                data: {
                    txt_worker: txt_worker,
                    txt_detail: txt_detail,
                    complete_job_fast_repair: txt_user_id,
                },
                success: function(returnData) {
                    let job = returnData.job;
                    if (returnData.response == 1) {
                        Swal.fire("", "ดำเนินการเรียบร้อย", "success").then(
                            (result) => {
                                parent.$.fancybox.close();
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
            alert("กรุณากรอกรายละเอียดการดำเนินงาน")
        }

    });
</script>