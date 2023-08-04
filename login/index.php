<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OAR Service</title>
    <link rel="shortcut icon" href="../assets//img/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="./style_login.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>

    <div class="login-form">
        <form id="form_login">
            <h1>SERVICE 19</h1>
            <p class="login-motd">We always right behind you</p>
            <div class="form-group">
                <input id="txt_username" class="login-username" type="text" placeholder="Username" />
                <label for="username">
                    <svg>
                        <use xlink:href="#user" />
                    </svg>
                </label>
            </div>
            <div class="form-group">
                <input id="txt_password" class="login-password" type="password" placeholder="Password" />
                <label for="password">
                    <svg>
                        <use xlink:href="#padlock" />
                    </svg>
                </label>
            </div>
            <div class="form-group">
                <input class="login-submit" type="submit" value="Log in" />
            </div>
        </form>


    </div>
    <svg>
        <symbol id="user" viewBox="0 0 1792 1792">
            <path
                d="M1329 784q47 14 89.5 38t89 73 79.5 115.5 55 172 22 236.5q0 154-100 263.5t-241 109.5h-854q-141 0-241-109.5t-100-263.5q0-131 22-236.5t55-172 79.5-115.5 89-73 89.5-38q-79-125-79-272 0-104 40.5-198.5t109.5-163.5 163.5-109.5 198.5-40.5 198.5 40.5 163.5 109.5 109.5 163.5 40.5 198.5q0 147-79 272zm-433-656q-159 0-271.5 112.5t-112.5 271.5 112.5 271.5 271.5 112.5 271.5-112.5 112.5-271.5-112.5-271.5-271.5-112.5zm427 1536q88 0 150.5-71.5t62.5-173.5q0-239-78.5-377t-225.5-145q-145 127-336 127t-336-127q-147 7-225.5 145t-78.5 377q0 102 62.5 173.5t150.5 71.5h854z" />
        </symbol>
        <symbol id="padlock" viewBox="0 0 1792 1792">
            <path
                d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
        </symbol>
    </svg>



</body>

<!-- PACE -->
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="../assets/center-radar.css">


<script>
$("#form_login").submit(function(event) {
    event.preventDefault();

    if ($("#txt_password").val() != "" && $("#txt_username").val() != "") {
        console.log('user pass')
        let formData = {
            username: $("#txt_username").val(),
            password: $("#txt_password").val(),
        };
        $.ajax({
            type: "POST",
            url: "./auth.php",
            dataType: "json",
            data: formData,
            success: function(returnData) {
                if (returnData.response == 1) {
                    location.replace("../index.php");
                } else if (returnData.response == "false") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'User/Password ไม่ถูกต้อง!',
                    })

                } else if (returnData.response == 202) {
                    Swal.fire(
                        'ขออภัยคุณไม่ได้รับสิทธิการเข้าใช้งาน',
                        'กรุณาติดต่อเจ้าหน้า โทร 1438',
                        'question'
                    )
                }
            },
        });
    } else {
        alert("กรุณากรอก User/Password");
    }
});
</script>

</html>