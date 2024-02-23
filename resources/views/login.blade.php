
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
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>Login - EPROC</title>
        <!-- CSS files -->
        <link href="{{ url('assets/dist/css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
        <link href="{{ url('assets/dist/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
        <link href="{{ url('assets/dist/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
        <link href="{{ url('assets/dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
        <link href="{{ url('assets/dist/css/demo.min.css?1684106062') }}" rel="stylesheet"/>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <link href="{{ asset('assets/extentions/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
        <script src="{{ asset('assets/extentions/sweetalert2/sweetalert2.min.js') }}" defer></script>
        <style>
            @import url('https://rsms.me/inter/inter.css');
            :root {
                --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            }
            body {
                font-feature-settings: "cv03", "cv04", "cv11";
            }
            .error{
                color: #FF0000;
                font-style: italic;
            }
        </style>
    </head>
    <body  class=" d-flex flex-column bg-azure-lt">
        <script src="{{ url('assets/dist/js/demo-theme.min.js?1684106062') }}"></script>
        <div class="page page-center">
            <div class="container container-normal py-4">
                <div class="row align-items-center g-4">
                    <div class="col-lg">
                        <div class="container-tight">
                            <div class="text-center mb-4 h2">
                                E-PROCUREMENT <br>
                                PT PINTEX
                            </div>
                            <div class="card card-md">
                                <div class="card-body">
                                    <h3 class="h3 text-center mb-4">Selamat Datang, Silahkan Login untuk menggunakan aplikasi</h3>
                                    <form action="javascript:void(0)" method="post" name="formLogin" id="formLogin">
                                        {{ csrf_field() }}
                                        {{-- Error Alert --}}
                                        @if(session('error'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{session('error')}}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" autofocus="true">
                                            @if($errors->has('username'))
                                                <span class="error">{{ $errors->first('username') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password">
                                            @if($errors->has('password'))
                                                <span class="error">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-footer">
                                            <button type="submit" id="submitLogin" class="btn btn-primary w-100">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg d-none d-lg-block text-center">
                        <iframe src="https://lottie.host/embed/1523dad4-cfef-40cf-8540-e7f823aa09b8/6BPh2N8U6X.lottie" width="600px" height="600px"></iframe>

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
            
            $(function () {
                /*------------------------------------------==============================================================================================================================================================
                --------------------------------------------==============================================================================================================================================================
                Create Data
                --------------------------------------------==============================================================================================================================================================
                --------------------------------------------==============================================================================================================================================================*/
                    if ($("#formLogin").length > 0) {
                        $("#formLogin").validate({
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
                                $.ajaxSetup({
                                    headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $('#submitLogin').html('<i class="fa-solid fa-fw fa-spinner fa-spin"></i> Please Wait...');
                                $("#submitLogin"). attr("disabled", true);

                                $.ajax({
                                    url: "{{url('proses_login')}}",
                                    type: "POST",
                                    data: $('#formLogin').serialize(),
                                    
                                    beforeSend: function() {
                                        Swal.fire({
                                            title: 'Mohon Menunggu',
                                            html: '<center><lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_al2qt2jz.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Sedang mencari username / password</h1>',
                                            showConfirmButton: false,
                                            timerProgressBar: true,
                                            allowOutsideClick: false,
                                            allowEscapeKey: false,
                                        })
                                    },
                                    
                                    success: function( response ) {
                                        console.log( 'Completed.' );
                                        $('#submitLogin').html('Login');
                                        $("#submitLogin"). attr("disabled", false);
                                        
                                        // console.log('Result:', response);
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: "top-end",
                                            showConfirmButton: false,
                                            timer: 7000,
                                            timerProgressBar: true,
                                            didOpen: (toast) => {
                                                toast.onmouseenter = Swal.stopTimer;
                                                toast.onmouseleave = Swal.resumeTimer;
                                            }
                                        });
                                            Toast.fire({
                                            icon: response.type,
                                            title: response.msg,
                                        });
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                        // const obj = JSON.parse(data.responseJSON);

                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal Login. Status: '+data.status,
                                            html: data.responseJSON.message,
                                            showConfirmButton: true
                                        });

                                        $('#submitLogin').html('Login');
                                        $("#submitLogin"). attr("disabled", false);
                                    }
                                });
                            }
                        })
                    }
                    
                /*------------------------------------------==============================================================================================================================================================
                --------------------------------------------==============================================================================================================================================================
                End Cotton Zone
                --------------------------------------------==============================================================================================================================================================
                --------------------------------------------==============================================================================================================================================================*/
            });
        </script>
    </body>
</html>