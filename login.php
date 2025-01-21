<!doctype html>
<?php
require_once 'core/config.php';

// Check for a remembered user
if (isset($_COOKIE['remember_me']) && !isset($_SESSION['dvsa_user_id'])) {
    $_SESSION['dvsa_user_id'] = $_COOKIE['remember_me'];
    header("Location: index.php");
    exit;
}

if (isset($_SESSION['dvsa_user_id'])) {
    header("Location: index.php");
    exit;
}

?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign in - CHMSU</title>
    <!-- CSS files -->
    <link rel="icon" type="image/x-icon" href="./static/chmsu.png">
    <link href="./dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="./dist/css/demo.min.css?1684106062" rel="stylesheet" />
    <link rel="stylesheet" href="dist/sweetalert/sweetalert.css">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        .row {
    margin: 0;
    padding: 0;
}
.align-items-center {
    display: flex;
    align-items: center;
}
.d-flex {
    display: flex;
}
.justify-content-start {
    justify-content: flex-start;
}
    </style>
</head>

<body class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center" style='background: #04a41e;'>
        <div class="container container-tight py-4">

            <div class="card card-md" style='border-radius: 50px 0px 50px 0px;'>
                <div class="card-body">

                    <div class="mb-5">
                        <div class='row align-items-center'>
                            <div class='col-sm-4 d-flex justify-content-start'>
                                <a href="." class="navbar-brand navbar-brand-autodark">
                                    <img src="./static/chmsu.png" height="100" alt="">
                                </a>
                            </div>
                            <div class='col-sm-8 d-flex justify-content-start'>
                                <span style='font-weight: 900;'>
                                    <span style='font-size: xx-large; font-weight: bold;'>CHMSU</span> <br>
                                    <span>Student Violations System</span> 
                                </span>
                            </div>
                        </div>
                    </div>

                    <form action="" method="POST" id='frm_login'>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required placeholder="Your username" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required placeholder="Your password" autocomplete="off">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                            <label class="form-check-label" for="remember_me">Remember Me</label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-success w-100">Log in</button>
                        </div>
                        <div class="text-center mt-3">
                            <!-- <a href="#" onclick="forgetPassword()" class="text-muted">Forgot Password?</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="dist/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="dist/sweetalert/sweetalert2.js"></script>
    <script src="dist/sweetalert/sweetalert.js"></script>
    <script src="dist/js/tabler.min.js?1684106062" defer></script>
    <script src="dist/js/demo.min.js?1684106062" defer></script>
    <script type="text/javascript">
        $("#frm_login").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "core/login.php",
                data: $("#frm_login").serialize(),
                success: function(data) {
                    if (data == 1) {
                        if ($("#remember_me").is(":checked")) {
                            // Set cookie to remember user
                            document.cookie = "remember_me=" + $("input[name='username']").val() + "; path=/; max-age=" + (30 * 24 * 60 * 60);
                        }
                        window.location = 'index.php';
                    } else {
                        alert(data);
                    }
                }
            });
        });

        function forgetPassword(){
            $.ajax({
                type: "POST",
                url: "ajax/forgetpassword.php",
                // data: $("#frm_login").serialize(),
                success: function(data) {
                    
                }
            });
        }
    </script>
</body>

</html>
