<!doctype html>
<?php
require_once 'core/config.php';

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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

                    <form action="" method="POST" id='frm_login'>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required placeholder="Your username" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" required placeholder="Your password" autocomplete="off">
                                <span class="input-group-text eye-icon" id="togglePassword">
                                    <i class="fa fa-eye-slash" id="eyeIcon"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                            <label class="form-check-label" for="remember_me">Remember Me</label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-success w-100">Log in</button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="forgot_password.php" class="text-muted">Forgot Password?</a>

                            <p> or</p>
                            <a href="#" onclick="modalSignUp()" class="text-muted">Sign-up for Complainant</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form action="" method='POST' id='frm_signup'>
        <div class="modal modal-blur fade" id="modal_entry" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" value="add" class="form-control modal_type" name="type">
                            <input type="hidden" class="form-control" id="user_id" name="user_id">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="user_fname" name="user_fname" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="user_mname" name="user_mname" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Last Name <strong style="color:red;">*</strong></label>
                                    <input type="text" class="form-control" id="user_lname" name="user_lname" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Email <strong style="color:red;">*</strong></label>
                                    <input type="email" class="form-control" id="user_email" name="user_email" autocomplete="off" required>
                                </div>
                            </div>

                            <input type="hidden" class="form-control" value="C" id="user_category" name="user_category" autocomplete="off">

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Username <strong style="color:red;">*</strong></label>
                                    <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-sm-6 div_password" id="div_password">
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="create_password" required placeholder="Your password" autocomplete="off">
                                        <span class="input-group-text eye-icon" id="togglePassword">
                                            <i class="fa fa-eye-slash" id="eyeIcon"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 div_password" id="div_password">
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="confirm_password" required placeholder="Your password" autocomplete="off">
                                        <span class="input-group-text eye-icon" id="togglePassword">
                                            <i class="fa fa-eye-slash" id="eyeIcon"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btn_submit_entry" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="dist/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="dist/sweetalert/sweetalert2.js"></script>
    <script src="dist/sweetalert/sweetalert.js"></script>
    <script src="dist/js/tabler.min.js?1684106062" defer></script>
    <script src="dist/js/demo.min.js?1684106062" defer></script>
    <script type="text/javascript">
        // Check if 'remember_me' cookie exists and autofill the username field
        $(document).ready(function() {
            var username = getCookie("remember_me");
            if (username != "") {
                $("input[name='username']").val(username);
                $("#remember_me").prop("checked", true);
            }
        });

        function modalSignUp() {
            $("#modal_entry").modal("show");
        }

        $("#frm_signup").submit(function(e) {
            e.preventDefault();
            $("#btn_submit_entry").prop("disabled", true);
            var type = $(".modal_type").val();
            var create_password = $("#create_password").val();
            var confirm_password = $("#confirm_password").val();

            if (confirm_password != create_password) {
                alert("Passwords do not match. Please try again.");
            } else {
                $.ajax({
                    type: "POST",
                    url: "ajax/manageUser.php",
                    data: $("#frm_signup").serialize(),
                    success: function(data) {
                        if (data == 1) {
                            alert("Signup Successful! You can now login.");

                            $('#frm_signup').each(function() {
                                this.reset();
                            });
                            $("#modal_entry").modal("hide");
                        } else if (data == 2) {
                            alert("Account already exist.");
                        } else {
                            alert(data);
                        }
                        $("#btn_submit_entry").prop("disabled", false);
                    }

                });
            }

        });

        // Function to get cookie by name
        function getCookie(name) {
            var cname = name + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(cname) == 0) {
                    return c.substring(cname.length, c.length);
                }
            }
            return "";
        }

        // Handle form submission
        $("#frm_login").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "core/login.php",
                data: $("#frm_login").serialize(),
                success: function(data) {
                    if (data == 1) {
                        // If login is successful, check if "Remember Me" is checked and set the cookie
                        if ($("#remember_me").is(":checked")) {
                            document.cookie = "remember_me=" + $("input[name='username']").val() + "; path=/; max-age=" + (30 * 24 * 60 * 60);
                        }
                        window.location = 'index.php';
                    } else {
                        alert(data);
                    }
                }
            });
        });

        $(document).on('click', '.eye-icon', function() {
            const input = $(this).siblings('input');
            const icon = $(this).find('i');

            // Toggle the input type between password and text
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                input.attr('type', 'password');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });
    </script>
</body>

</html>