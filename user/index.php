<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Buildings</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- modal hyst modal-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js"></script>

    <!-- input file -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <!-- fancybox -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="style_fancy.css">
    <link rel="stylesheet" href="../assets/css/style_fancy.css">


</head>

<body>
    <div class="header">
    </div>
    <div class="container">
        <div class="profile">
            <div class="d-flex justify-content-between p-2">
                <h3>ข้อมูลผู้ใช้</h3>
            </div>
            <div class="p-2 mt-2">
                <img id="pictureUrl">
            </div>
            <h2 id="displayName"></h2>
            <div class="list">
                <p id="userName"><b>User Name : </b> </p>
            </div>
            <div class="list">
                <p id="decodedIDToken"><b>Email : </b> </p>
            </div>
            <div class="list">
                <p id="statusMessage"><b>Status Message : </b> </p>
            </div>
            <div class="list">
                <label><b>User Id : </b></label>
                <p id="userId"></p>
            </div>
        </div>

        <input type="hidden" id="txt_userId" value="97">
        <input type="hidden" id="txt_userName" value="staff">

        <div class="fast_repair" hidden>
            <div class="d-flex justify-content-between p-2">
                <h3>
                    แจ้งปัญหาด่วน
                </h3>
                <i class="bi bi-plus-circle-fill" data-bs-toggle="modal" data-bs-target="#fast_repair_modal" style="font-size: 2.2rem;"></i>
                <!-- <a href="./fast_repair/"><i class="bi bi-plus-circle-fill add_repair" style="font-size: 2.2rem;"></i></a> -->
            </div>


            <div class="list_data">

                <!-- <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
            <!-- Modal -->
            <div class="modal fade" id="fast_repair_modal" tabindex="-1" aria-labelledby="repairLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">
                            <form>
                                <h4>แจ้งปัญหาด่วน</h4>
                                <div class="mb-3">
                                    <label for="txt_room" class="form-label">หมายเลขห้อง <span class="d-inline text-danger h5 m-0">*</span></label>
                                    <select class="re_room form-select" id="txt_room" name="txt_room" aria-label="Default select example">
                                        <!-- ชั้น 1 -->

                                        <option value="19101">19101</option>
                                        <option value="19102">19102</option>
                                        <option value="19103">19103</option>
                                        <option value="19104">19104</option>
                                        <option value="19106">19106</option>
                                        <option value="19107">19107</option>
                                        <option value="19108">19108</option>
                                        <option value="19110">19110</option>
                                        <option value="19111">19111</option>
                                        <!-- ชั้น 2 -->

                                        <option value="19201">19201</option>
                                        <option value="19202">19202</option>
                                        <option value="19205">19205</option>
                                        <option value="19206">19206</option>
                                        <option value="19207">19207</option>
                                        <option value="19208">19208</option>
                                        <option value="19209">19209</option>
                                        <option value="19210">19210</option>
                                        <option value="19211">19211</option>
                                        <option value="19212">19212</option>
                                        <option value="19213">19213</option>
                                        <option value="19214">19214</option>
                                        <option value="19216">19216</option>
                                        <!-- ชั้น 3 -->
                                        <option value="19301">19301</option>
                                        <option value="19302">19302</option>
                                        <option value="19305">19305</option>
                                        <option value="19306">19306</option>
                                        <option value="19307">19307</option>
                                        <option value="19308">19308</option>
                                        <option value="19309">19309</option>
                                        <option value="19310">19310</option>
                                        <option value="19311">19311</option>
                                        <option value="19312">19312</option>
                                        <option value="19313">19313</option>
                                        <option value="19314">19314</option>
                                        <option value="19316">19316</option>
                                        <!-- ชั้น 4 -->
                                        <option value="19401">19401</option>
                                        <option value="19402">19402</option>
                                        <option value="19403">19403</option>
                                        <option value="19404">19404</option>
                                        <option value="19408">19408</option>
                                        <option value="19409">19409</option>
                                        <option value="19410">19410</option>
                                        <option value="19411">19411</option>
                                        <option value="19412">19412</option>
                                        <option value="19413">19413</option>
                                        <option value="19414">19414</option>
                                        <option value="19416">19416</option>


                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="txt_detail" class="form-label">รายละเอียด <span class="d-inline text-danger h5 m-0">*</span></label>
                                    <textarea class="form-control" id="txt_detail" rows="4"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="insert_fast_modal">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="repair" hidden>
            <div class="d-flex justify-content-between p-2">
                <h3>แจ้งซ่อม</h3>
                <i class="bi bi-plus-circle-fill" data-bs-toggle="modal" data-bs-target="#nomal_repair" style="font-size: 2.2rem;"></i>
            </div>

            <div class="list_data_nomal_repair"></div>

            <!-- Modal -->
            <div class="modal fade" id="nomal_repair" tabindex="-1" aria-labelledby="nomalRepairLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="form_insert_repair" enctype="multipart/form-data">
                            <div class="modal-body">
                                <h4>เเจ้งซ่อม</h4>
                                <div class="mb-3">
                                    <label for="txt_type_repair" class="form-label">ประเภทการเเจ้งซ่อม </label>
                                    <select class="form-select" aria-label="Default select example" name="txt_type_repair">
                                        <option value="ครุภัณฑ์">ครุภัณฑ์</option>
                                        <option value="ไฟฟ้าภายในอาคาร">ไฟฟ้าภายในอาคาร</option>
                                        <option value="ระบบประปา">ระบบประปา</option>
                                        <option value="อื่นๆ">อื่นๆ</option>
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="txt_detail_repair" class="form-label">รายละเอียดการเเจ้งซ่อม</label>
                                    <textarea class="form-control" id="txt_detail_repair" name="txt_detail_repair" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="txt_location_repair" class="form-label">สถานที่ (ถ้ามี)</label>
                                    <input type="text" class="form-control" id="txt_location_repair" name="txt_location_repair">
                                </div>
                                <div class="mb-3">
                                    <label for="img_repair" class="form-label">แนบรูปภาพ (ถ้ามี)</label>
                                    <input id="img_repair" name="img_repair[]" type="file" class="file" accept="image/*" multiple data-browse-on-zone-click="true">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="insert_repair">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="appeal" hidden>
            <div class="d-flex justify-content-between p-2">
                <h3>เสนอเเนะ</h3>
                <!-- Button trigger modal -->
                <i class="bi bi-plus-circle-fill" data-bs-toggle="modal" data-bs-target="#feedback" style="font-size: 2.2rem;"></i>
            </div>

            <div class="list_data_feedback"></div>


            <!-- Modal -->
            <div class="modal fade" id="feedback" tabindex="-1" aria-labelledby="feedbackLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">
                            <form>
                                <h4>ร้องเรียน/เสนอเเนะ</h4>
                                <div class="mb-3">
                                    <label for="feedback_detail" class="form-label">รายละเอียดข้อเสนอแนะ <span class="d-inline text-danger h5 m-0">*</span></label>
                                    <textarea class="form-control" id="feedback_detail" name="feedback_detail" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="feedback_location" class="form-label">สถานที่ (ถ้ามี)</label>
                                    <input type="text" class="form-control" id="feedback_location" name="feedback_location" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="insert_feedback">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="room" hidden>
            <div class="d-flex justify-content-between p-2">
                <h3>จองห้อง</h3>
            </div>
        </div>
    </div>

    <div class="footers">
        <div class="row">
            <div class="col list_manu">
                <i class="bi bi-person-fill" style="font-size: 2rem; "></i><span class="active">โปรไฟล์</span>
            </div>
            <div class="col list_manu">
                <i class="bi bi-house-gear-fill" style="font-size: 2rem; "></i><span>แจ้งด่วน</span>
            </div>
            <div class="col list_manu">
                <i class="bi bi-wrench" style="font-size: 2rem; "></i><span>แจ้งซ่อม</span>
            </div>
            <div class="col list_manu">
                <i class="bi bi-bookmark-check-fill" style="font-size: 2rem; "></i><span>เสนอเเนะ</span>
            </div>
            <!-- <div class="col list_manu">
                <i class="bi bi-door-open" style="font-size: 2rem; "></i><span>จองห้อง</span>
            </div> -->
        </div>

    </div>

</body>
<!-- CDN LINE -->
<script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
<script src="./function_line.js"></script>
<script src="./function.js"></script>

<!-- select option -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- input file -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>


<script>
    $("#img").fileinput({
        previewFileType: "image",
        browseClass: "btn btn-success",
        browseLabel: "อัพโหลดรูป",
        showCaption: false,
        showRemove: false,
        showUpload: false

    });
</script>

</html>