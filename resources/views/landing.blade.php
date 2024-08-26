<!doctype html>
<!--
* Developer : Herlambang Yudha Pahlawan (Fullstack + Mobile Native Android)
* This Website using Template :
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="{{ asset('assets/static/assets.png') }}">
    <title>Landing page - EPROC</title>
    <!-- CSS files -->
    <link href="{{ url('assets/dist/css/tabler.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ url('assets/dist/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ url('assets/dist/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ url('assets/dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ url('assets/dist/css/demo.min.css?1684106062') }}" rel="stylesheet" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link href="{{ asset('assets/extentions/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/extentions/sweetalert2/sweetalert2.min.js') }}" defer></script>
    <style>
        body {
            background: linear-gradient(-45deg, #ffd0d0, #1100ff, #802ece, #ef8120);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body class=" ">
    <div class="page page-center">
        <div class="d-flex flex-column justify-content-center w-100 h-100">
            <div class="page page-center">
                <div class="container container-tight py-4">
                    <div class="text-center mb-2">
                        <a href="." class="navbar-brand navbar-brand-autodark">
                            <h1 class="text-light">E-PROCUREMENT</h1>
                        </a>
                    </div>
                    <div class="card card-md border border-black">
                        <div class="card-body text-center">
                            <div class="mb-1">
                                <h1 class="card-title">Pilih Entitas</h1>
                                <p class="text-secondary">Silahkan Pilih entitas yang ada</p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-4">
                                        <form action="{{ url('Home') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="entitas" value="ALL">
                                            <button type="submit"
                                                class="avatar avatar-xl mb-3 bg-green-lt link-offset-2 link-underline link-underline-opacity-0 border border-green"
                                                style="background-image: url(./static/avatars/000m.jpg)">
                                                ALL
                                            </button>
                                            <h3>SEMUA</h3>
                                        </form>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4">
                                        <form action="{{ url('Home') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="entitas" value="PINTEX">
                                            <button type="submit"
                                                class="avatar avatar-xl mb-3 bg-blue-lt link-offset-2 link-underline link-underline-opacity-0 border border-blue"
                                                style="background-image: url(./static/avatars/000m.jpg)">
                                                PTX
                                            </button>
                                            <h3>PINTEX</h3>
                                        </form>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4">
                                        <form action="{{ url('Home') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="entitas" value="TFI">
                                            <button type="submit"
                                                class="avatar avatar-xl mb-3 bg-purple-lt link-offset-2 link-underline link-underline-opacity-0 border border-purple"
                                                style="background-image: url(./static/avatars/000m.jpg)">
                                                TFI
                                            </button>
                                            <h3>TFI</h3>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ url('assets/dist/js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ url('assets/dist/js/demo.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('assets/extentions/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/extentions/jquery.validate.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            /*------------------------------------------==============================================================================================================================================================
            --------------------------------------------==============================================================================================================================================================
            Ajax Login
            --------------------------------------------==============================================================================================================================================================
            --------------------------------------------==============================================================================================================================================================*/

            if ($("#handleAjax").length > 0) {
                $("#handleAjax").validate({
                    rules: {
                        username: {
                            required: true,
                        },
                        password: {
                            required: true,
                        },
                    },
                    messages: {
                        username: {
                            required: "Username tidak boleh kosong",
                        },
                        password: {
                            required: "Password tidak boleh kosong",
                        },
                    },

                    submitHandler: function(form) {

                        $('#submitLogin').html(
                            '<span class="spinner-border spinner-border-sm me-2" role="status"></span> Please Wait<span class="animated-dots"></span>'
                        );
                        $("#submitLogin").attr("disabled", true);


                        $.ajax({
                            url: $(form).attr('action'),
                            data: $(form).serialize(),
                            type: "POST",
                            dataType: 'json',

                            success: function(data) {

                                if (data.status) {
                                    $('#submitLogin').html(
                                        '<span class="spinner-border spinner-border-sm me-2" role="status"></span> Redirect to Dashboard<span class="animated-dots"></span>'
                                    );
                                    window.location = data.redirect;
                                } else {

                                    $('#submitLogin').html('Login');
                                    $("#submitLogin").attr("disabled", false);
                                    $('#username').focus();

                                    $(".alert").remove();
                                    $.each(data.errors, function(key, val) {
                                        $("#errors-list").append(
                                            "<div class='alert  alert-danger alert-dismissible' role='alert'><div class='d-flex'><div><svg xmlns='http://www.w3.org/2000/svg' class='icon alert-icon' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'></path><path d='M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0'></path><path d='M12 8v4'></path><path d='M12 16h.01'></path></svg></div><div><h4 class='alert-title'>" +
                                            data.header +
                                            "</h4><div class='text-secondary'>" +
                                            val +
                                            "</div></div></div><a class='btn-close' data-bs-dismiss='alert' aria-label='close'></a></div>"
                                        );
                                    });
                                }

                            },
                        });
                    }
                })
            }

            /*------------------------------------------==============================================================================================================================================================
            --------------------------------------------==============================================================================================================================================================
            End Ajax
            --------------------------------------------==============================================================================================================================================================
            --------------------------------------------==============================================================================================================================================================*/
        });
    </script>
</body>

</html>

























{{-- <div class="context">
    <div class="container card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="text-center">
                        </div>
                        <div class="login-title text-center">
                            <h2 class="text-primary">PT. PINTEX</h2>
                        </div>
                        <!-- <form> -->
                        <div class="input-group custom">
                            <input type="text" name="selUser" id="selUser2" style="border-color:#4e54c8"
                                class="form-control form-control-lg" placeholder="Username" autofocus />
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" name="pass" style="border-color:#4e54c8" id="pass"
                                class="form-control form-control-lg" placeholder="**********" />
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <button class="btn btn-lg btn-block btn-ambil"
                                        style="background-color:#4e54c8;color:white" id="login">Sign
                                        In</button>
                                </div>
                            </div>
                        </div>
                        <script>
                            var selUser2 = document.getElementById("selUser2");
                            var input = document.getElementById("pass");
                            selUser2.addEventListener("keypress", function(event) {
                                if (event.key === "Enter") {
                                    event.preventDefault();
                                    document.getElementById("login").click();
                                }
                            });
                            input.addEventListener("keypress", function(event) {
                                if (event.key === "Enter") {
                                    event.preventDefault();
                                    document.getElementById("login").click();
                                }
                            });
                        </script>
                        <!-- </form> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</html> --}}
