<!doctype html>
<?php
require_once 'core/config.php';
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Forgot Password - CHMSU</title>
    <!-- CSS files -->
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

        .otp-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 15px;
        }

        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 24px;
            border: 2px solid #ccc;
            border-radius: 8px;
            outline: none;
        }

        .otp-input:focus {
            border-color: #4CAF50;
        }

        .otp-input:disabled {
            background-color: #f0f0f0;
            border-color: #ddd;
        }
    </style>
</head>

<body class="d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">

            <div class="card card-md" style='border:solid 1px #04a41e; border-radius: 50px 50px 50px 50px;'>
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
                                    <span>OSAS Student Violations</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <form action="" method="POST" id='frm_forgot_password'>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required placeholder="Your registered username" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Your registered email" autocomplete="off">
                        </div>
                        <div class="form-footer">
                            <button type="submit" id="btn_submit" class="btn btn-success w-100">Submit</button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="index.php" class="text-muted">Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- OTP Modal -->
        <div class="modal" id="otpModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Enter OTP</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="frm_otp">
                            <div class="otp-container">
                                <!-- 6 separate input boxes for OTP -->
                                <input type="text" class="otp-input" maxlength="1" id="otp1" name="otp1" required>
                                <input type="text" class="otp-input" maxlength="1" id="otp2" name="otp2" required>
                                <input type="text" class="otp-input" maxlength="1" id="otp3" name="otp3" required>
                                <input type="text" class="otp-input" maxlength="1" id="otp4" name="otp4" required>
                                <input type="text" class="otp-input" maxlength="1" id="otp5" name="otp5" required>
                                <input type="text" class="otp-input" maxlength="1" id="otp6" name="otp6" required>
                            </div>
                            <button type="submit" id="btn_otp" class="btn btn-primary w-100 mt-3">Submit OTP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Password Modal -->
        <div class="modal" id="newPasswordModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Set New Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form id="newPasswordForm">
                            <input type="hidden" class="form-control" id="user_id" name="user_id">
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" required placeholder="Enter new password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required placeholder="Confirm new password">
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                        </form>
                    </div>
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
        $("#frm_forgot_password").submit(function(e) {
            e.preventDefault();
            $("#btn_submit").prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "ajax/forgetpassword.php",
                data: $("#frm_forgot_password").serialize(),
                success: function(data) {
                console.log(data)
                    if (data == -1) {
                        alert("We couldn't find an account with this email.");
                    } else if (data == -2) {
                        alert("There was an issue. Please try again later.");
                    } else if (data == -3) {
                        alert("Failed to send message. Please try again.");
                    } else {
                        //success open modal enter 6 digits otp
                        $("#otpModal").modal("show");
                    }

                    $("#btn_submit").prop("disabled", false);
                }
            });
        });

        $('.otp-input').on('input', function() {
            var index = $('.otp-input').index(this);
            if ($(this).val().length === 1 && index < 5 && !$('.otp-input').eq(index + 1).is(':focus')) {
                $('.otp-input').eq(index + 1).focus();
            }
        });


        $("#frm_otp").submit(function(e) {
            e.preventDefault();

            $("#btn_submit_otp").prop("disabled", true);
            var otp = $("#otp1").val() + $("#otp2").val() + $("#otp3").val() + $("#otp4").val() + $("#otp5").val() + $("#otp6").val();

            var email = $("#email").val();
            var username = $("#username").val();
            $.ajax({
                type: "POST",
                url: "ajax/checkOTP.php",
                data: {
                    otp: otp,
                    username: username,
                    email: email
                },
                success: function(data) {
                    console.log("OTP verification response:", data);
                    if (data == 0) {
                        alert("Invalid OTP. Please try again.");
                    } else {
                        // alert("An error occurred. Please try again later.");
                        $("#otpModal").modal("hide");
                        $("#newPasswordModal").modal("show");
                        $("#user_id").val(data);
                    }

                    // Re-enable the submit button
                    $("#btn_submit_otp").prop("disabled", false);
                },
                error: function(xhr, status, error) {
                    // Handle error scenario
                    alert("An error occurred. Please try again later.");
                    console.log("Error:", error);
                    $("#btn_submit_otp").prop("disabled", false);
                }
            });
        });


        $("#newPasswordForm").submit(function(e) {
            e.preventDefault();
            var newPassword = $("#newPassword").val();
            var confirmPassword = $("#confirmPassword").val();
            var user_id = $("#user_id").val();

            if (newPassword !== confirmPassword) {
                alert("Passwords do not match.");
            } else {
                $.ajax({
                    type: "POST",
                    url: "ajax/updatePassword2.php",
                    data: {
                        password: confirmPassword,
                        user_id: user_id
                    },
                    success: function(data) {
                        if (data == 1) {
                            alert("Password updated successfully.");
                            window.location.href = "login.php";
                        } else {
                            alert("Password update failed. Please try again.");
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>