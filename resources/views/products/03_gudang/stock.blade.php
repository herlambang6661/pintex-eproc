@extends('layouts.app')
@section('content')
    <style>
        td.cuspad0 {
            padding-top: 3px;
            padding-bottom: 3px;
            padding-right: 13px;
            padding-left: 13px;
        }

        td.cuspad1 {
            text-transform: uppercase;
        }

        td.cuspad2 {
            /* padding-top: 0.5px;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  margin-left: 5px; */
        }

        .unselectable {
            -webkit-user-select: none;
            -webkit-touch-callout: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            color: #cc0000;
            font-weight: bolder;
        }

        .overlay {
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height: 100%;
            display: none;
            background: rgba(0, 0, 0, 0.6);
        }

        /* .cv-spinner {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        height: 100%;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        display: flex;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        justify-content: center;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        align-items: center;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    .spinner {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        width: 40px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        height: 40px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        border: 4px #ddd solid;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        border-top: 4px #2e93e6 solid;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        border-radius: 50%;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        animation: sp-anime 0.8s infinite linear;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @keyframes sp-anime {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        100% {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            transform: rotate(360deg);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    .is-hide {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        display: none;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } */
        .loader {
            position: fixed;
            z-index: 301;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 200px;
            width: 200px;
            overflow: hidden;
            text-align: center;
        }

        .spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 303;
            border-radius: 100%;
            border-left-color: transparent !important;
            border-right-color: transparent !important;
        }

        .spinner1 {
            width: 100px;
            height: 100px;
            border: 10px solid #fff;
            animation: spin 1s linear infinite;
        }

        .spinner2 {
            width: 70px;
            height: 70px;
            border: 10px solid #fff;
            animation: negative-spin 2s linear infinite;
        }

        .spinner3 {
            width: 40px;
            height: 40px;
            border: 10px solid #fff;
            animation: spin 4s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @keyframes negative-spin {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(-360deg);
            }
        }

        .loader-text {
            position: relative;
            top: 75%;
            color: #fff;
            font-weight: bold;
        }
    </style>
    <div class="page">
        <!-- Sidebar -->
        @include('shared.sidebar')
        <!-- Navbar -->
        @include('shared.navbar')

        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <h2 class="page-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-box">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                    <path d="M12 12l8 -4.5" />
                                    <path d="M12 12l0 9" />
                                    <path d="M12 12l-8 -4.5" />
                                </svg>
                                Stok Barang
                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="https://pintex.co.id/apps/HR/Recruitment"><i
                                                class="fa-solid fa-basket-shopping"></i> Gudang</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">
                                            <i class="fa-solid fa-boxes-stacked"></i> Stok Barang</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        <div class="card card-xl shadow rounded">
                            <div class="card-stamp card-stamp-lg">
                                <div class="card-stamp-icon bg-primary">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row row-cards">
                                    <div class="mb-3">
                                        <label class="form-label">Cari Barang</label>
                                        <div class="row g-2">
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control border border-azure"
                                                    autofocus="true" id="idcari"
                                                    placeholder="Masukkan Kodeseri / Nama Barang untuk melihat Stok">
                                            </div>
                                            <div class="col-auto">
                                                <button tupe="button" class="btn btn-icon bg-azure-lt border border-azure"
                                                    aria-label="Button" onclick="get_stock();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                                        <path d="M21 21l-6 -6"></path>
                                                    </svg>
                                                </button>
                                                <i class="text-muted" id="textLoading"
                                                    style="margin-left: 20px;display:none"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="loading" style="display:none">
                                    <div class="col-4 col-sm-3">
                                        <div class="ph-item">
                                            <div class="ph-col-12">
                                                <div class="ph-picture"></div>
                                                <div class="ph-row">
                                                    <div class="ph-col-4"></div>
                                                    <div class="ph-col-12"></div>
                                                </div>
                                            </div>
                                            <div class="ph-col-2">
                                                <div class="ph-avatar"></div>
                                            </div>
                                            <div>
                                                <div class="ph-row">
                                                    <div class="ph-col-12"></div>
                                                    <div class="ph-col-2"></div>
                                                    <div class="ph-col-8 big"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-sm-3">
                                        <div class="ph-item">
                                            <div class="ph-col-12">
                                                <div class="ph-picture"></div>
                                                <div class="ph-row">
                                                    <div class="ph-col-4"></div>
                                                    <div class="ph-col-12"></div>
                                                </div>
                                            </div>
                                            <div class="ph-col-2">
                                                <div class="ph-avatar"></div>
                                            </div>
                                            <div>
                                                <div class="ph-row">
                                                    <div class="ph-col-12"></div>
                                                    <div class="ph-col-2"></div>
                                                    <div class="ph-col-8 big"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-sm-3">
                                        <div class="ph-item">
                                            <div class="ph-col-12">
                                                <div class="ph-picture"></div>
                                                <div class="ph-row">
                                                    <div class="ph-col-4"></div>
                                                    <div class="ph-col-12"></div>
                                                </div>
                                            </div>
                                            <div class="ph-col-2">
                                                <div class="ph-avatar"></div>
                                            </div>
                                            <div>
                                                <div class="ph-row">
                                                    <div class="ph-col-12"></div>
                                                    <div class="ph-col-2"></div>
                                                    <div class="ph-col-8 big"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-sm-3">
                                        <div class="ph-item">
                                            <div class="ph-col-12">
                                                <div class="ph-picture"></div>
                                                <div class="ph-row">
                                                    <div class="ph-col-4"></div>
                                                    <div class="ph-col-12"></div>
                                                </div>
                                            </div>
                                            <div class="ph-col-2">
                                                <div class="ph-avatar"></div>
                                            </div>
                                            <div>
                                                <div class="ph-row">
                                                    <div class="ph-col-12"></div>
                                                    <div class="ph-col-2"></div>
                                                    <div class="ph-col-8 big"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fetched-data-stock"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('shared.footer')
            </div>
        </div>

        <script>
            function get_stock() {
                var idcari = $('#idcari').val();
                console.log("Searching for " + idcari);
                $("#loading").fadeIn(200);
                $("#textLoading").fadeIn(200);
                $('.fetched-data-stock').html('');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'POST',
                    url: "{{ url('getstock') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'idcari': idcari,
                    },
                    beforeSend: function() {
                        $('#textLoading').text('Mencari Data Barang...');
                    },
                    success: function(data) {
                        $('.fetched-data-stock').html(data);
                    },
                    error: function(data) {
                        console.log('Error:', data.responseText);
                        $('#textLoading').text('Kodeseri / Nama tidak ditemukan');
                        $("#loading").fadeOut(200);
                        setTimeout(function() {
                            $("#textLoading").fadeOut(200);
                        }, 4000);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $("#textLoading").fadeOut(200);
                        $("#loading").fadeOut(200);
                    }, 300);
                });
            }
        </script>
    @endsection
