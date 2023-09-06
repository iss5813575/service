<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Buildings</title>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./fast_style.css">
</head>

<body>
    <div class="head">

    </div>
    <div class="container mt-2">
        <form>
            <h4>เเจ้งปัญหาด่วน</h4>
            <div class="mb-3">
                <label for="txt_room" class="form-label">หมายเลขห้อง <span class="d-inline text-danger h5 m-0">*</span></label>
                <select class="js-example-disabled-results form-select" id="txt_room" name="txt_room" aria-label="Default select example">
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
            <input type="hidden" id="userId" value="">
            <input type="hidden" id="userName" value="">
        </form>
    </div>

    <div class="footer">
        <button type="submit" class="btn btn_insert" id="insert_fast">บันทึก</button>
    </div>


</body>
<!-- CDN LINE -->
<script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
<script src="./insert.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    var $disabledResults = $(".js-example-disabled-results");
    $disabledResults.select2();
</script>

</html>