@extends('layouts.app')
@section('content')
    <style>
        td.cuspad0 {
            padding-top: 1px;
            padding-bottom: 1px;
            padding-right: 13px;
            padding-left: 13px;
        }

        td.cuspad1 {
            text-transform: uppercase;
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
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                    class="icon icon-tabler icon-tabler-book-upload" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 20h-8a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12v5" />
                                    <path d="M11 16h-5a2 2 0 0 0 -2 2" />
                                    <path d="M15 16l3 -3l3 3" />
                                    <path d="M18 13v9" />
                                </svg>
                                Pengambilan
                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="https://pintex.co.id/apps/HR/Recruitment"><i
                                                class="fa-solid fa-basket-shopping"></i> Teknik</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#"><i
                                                class="fa-regular fa-paste"></i> Pengambilan</a></li>
                                </ol>
                            </div>
                        </div>

                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <ul class="nav">
                                    <a href="#tabs-profile-8"
                                        class="active btn btn-white d-none d-sm-inline-block border border-primary"
                                        data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"
                                        style="margin-right: 10px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-rotate-3d">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 3a7 7 0 0 1 7 7v4l-3 -3" />
                                            <path d="M22 11l-3 3" />
                                            <path d="M8 15.5l-5 -3l5 -3l5 3v5.5l-5 3z" />
                                            <path d="M3 12.5v5.5l5 3" />
                                            <path d="M8 15.545l5 -3.03" />
                                        </svg>
                                        Pengambilan Barang
                                    </a>
                                    <a href="#tabs-home-8"
                                        class="btn btn-white d-none d-sm-inline-block border border-primary"
                                        data-bs-toggle="tab" aria-selected="true" role="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-checkup-list">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                            <path
                                                d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                            <path d="M9 14h.01" />
                                            <path d="M9 17h.01" />
                                            <path d="M12 16l1 1l3 -3" />
                                        </svg>
                                        List Item Pengambilan
                                    </a>
                                </ul>
                                <ul class="nav">
                                    <a href="#tabs-profile-8"
                                        class="nav-link btn btn-primary d-sm-none btn-icon border border-primary"
                                        data-bs-toggle="tab" aria-selected="true" role="tab"
                                        aria-label="List Item Permintaan" style="margin-right: 10px">
                                        <i class="fa-solid fa-truck"></i>
                                    </a>
                                    <a href="#tabs-home-8"
                                        class="nav-link btn btn-warning d-sm-none btn-icon border border-warning"
                                        data-bs-toggle="tab" aria-selected="true" role="tab"
                                        aria-label="Tambah Permintaan">
                                        <i class="fa-solid fa-list"></i>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tabs-profile-8" role="tabpanel">
                                <div class="card shadow card-active">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="control-group col-lg-2">
                                                <div class="mb-1">
                                                    <label class="form-label">Kodeseri</label>
                                                    <input name="text" class="form-control border border-dark"
                                                        placeholder="Kodeseri 12*****" value="" id="kodeseri"
                                                        autofocus />
                                                    <small class="text-dark" style="font-size: 9px">Masukkan Kodeseri
                                                        dan tekan Enter</small>
                                                </div>
                                            </div>
                                            <div class="control-group col-lg-10">
                                                <div class="card border border-dark">
                                                    <div class="card-stamp card-stamp-lg">
                                                        <div class="card-stamp-icon bg-primary text-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-zoom-replace"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="1.5" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M21 21l-6 -6" />
                                                                <path
                                                                    d="M3.291 8a7 7 0 0 1 5.077 -4.806a7.021 7.021 0 0 1 8.242 4.403" />
                                                                <path d="M17 4v4h-4" />
                                                                <path
                                                                    d="M16.705 12a7 7 0 0 1 -5.074 4.798a7.021 7.021 0 0 1 -8.241 -4.403" />
                                                                <path d="M3 16v-4h4" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div class="card-body shadow">
                                                        <div id="tunggu"></div>
                                                        <div class="col">
                                                            <div id="hasil_cari" class="fw-bold">
                                                                <p class="text-center">
                                                                    Masukkan Kodeseri untuk menambahkan barang
                                                                </p>
                                                            </div>
                                                            <span id="success-msg"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hr-text text-blue mb-3 mt-3">Formulir Pengambilan Barang</div>
                                        <form method="POST" name="formPengambilan" id="formPengambilan" class="form"
                                            enctype="multipart/form-data" accept-charset="utf-8"
                                            onkeydown="return event.key != 'Enter';" data-select2-id="add-form">
                                            @csrf
                                            <div class="row" style="max-width: 900px;">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal Formulir</label>
                                                        <input name="tgl" type="date"
                                                            class="form-control border border-dark" id="tanggal"
                                                            value="{{ date('Y-m-d') }}" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">Diambil Oleh</label>
                                                        <input name="diambil" type="text"
                                                            class="form-control border border-dark"
                                                            placeholder="Diambil Oleh" id="diambil_oleh"
                                                            value="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <input id="idf" value="1" type="hidden" />
                                            <div class="" style="overflow-x:auto;overflow-x: scroll;">
                                                <table id="detail_transaksi" class="table table-sm text-nowrap"
                                                    style="width: 100%;text-align:center;font-weight: bold;">
                                                    <thead>
                                                        <td width="2%"></td>
                                                        <td width="5%">Kodeseri</td>
                                                        <td width="20%">Barang</td>
                                                        <td width="5%">Stok</td>
                                                        <td width="10%">Qty</td>
                                                        <td width="30%">Untuk Mesin</td>
                                                        <td width="10%">Unit</td>
                                                        <td width="30%">Keterangan</td>
                                                    </thead>
                                                </table>
                                            </div>
                                            <div class="float-xl-right mt-2">
                                                <button type="submit" id="submitPengambilan" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-device-floppy" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                        <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                        <path d="M14 4l0 4l-6 0l0 -4" />
                                                    </svg>
                                                    Proses
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-home-8" role="tabpanel">
                                <div class="card card-xl shadow rounded border border-blue">
                                    <div class="table-responsive">
                                        <form action="#" id="form-filter-items" method="get" autocomplete="off">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Tgl Awal</th>
                                                        <th class="text-center">Tgl Akhir</th>
                                                        <th class="text-center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="date" id="idfilter_dari" class="form-control"
                                                                value="{{ date('Y-m-01') }}">
                                                        </td>
                                                        <td>
                                                            <input type="date" id="idfilter_sampai"
                                                                class="form-control" value="{{ date('Y-m-d') }}">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary btn-icon"
                                                                onclick="syn()">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                    <path d="M21 21l-6 -6" />
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table style="width:100%; height: 100%;font-size:13px;"
                                            class="table table-bordered table-striped table-vcenter card-table table-hover text-nowrap datatable datatable-pengambilan">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('shared.footer')
        </div>
    </div>
    <style>
        .overlay {
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }

        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader {
            width: 48px;
            height: 48px;
            display: block;
            margin: 15px auto;
            position: relative;
            color: #ff0000c3;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }

        .loader::after,
        .loader::before {
            content: '';
            box-sizing: border-box;
            position: absolute;
            width: 24px;
            height: 24px;
            top: 50%;
            left: 50%;
            transform: scale(0.5) translate(0, 0);
            background-color: #ff0000c3;
            border-radius: 50%;
            animation: animloader 1s infinite ease-in-out;
        }

        .loader::before {
            background-color: #ffffffba;
            transform: scale(0.5) translate(-48px, -48px);
        }

        @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes animloader {
            50% {
                transform: scale(1) translate(-50%, -50%);
            }
        }
    </style>
    <div class="modal modal-blur fade" id="modaleditPengambilan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen-lg-down" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Edit Pengambilan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="card-stamp card-stamp-lg">
                            <div class="card-stamp-icon bg-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-bag"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                    <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                </svg>
                            </div>
                        </div>
                        <div class="fetched-edit-pengambilan">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="card bg-pink-lt shadow rounded border border-blue">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-2">
                                                        <label class="form-label">Kodeseri</label>
                                                        <input type="text" class="form-control border border-blue"
                                                            disabled name="kodeseri">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-2">
                                                        <label class="form-label">Tanggal</label>
                                                        <input type="date" class="form-control border border-blue"
                                                            name="tanggal">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Nama Barang</label>
                                                <input type="text" class="form-control" name="namaBarang">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Mesin</label>
                                                <input type="text" class="form-control" name="mesin">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Jumlah</label>
                                                <input type="number" class="form-control" name="jumlah">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Diambil</label>
                                                <input type="text" class="form-control" name="diambil">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Keterangan</label>
                                                <input type="text" class="form-control" name="keterangan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/tinymce/tinymce.min.js" defer></script>
    <script type="text/javascript">
        var tablePengambilan;

        function syn() {
            tablePengambilan.ajax.reload();
        }
        $(document).ready(function() {
            $("#kodeseri").keyup(function(event) {
                if (event.keyCode === 13) {
                    var id = document.getElementById("kodeseri").value;
                    $.ajax({
                        type: "POST",
                        url: "{{ route('teknik/pengambilan/cariBarang') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            keyword: id,
                        },
                        beforeSend: function() {
                            $("#hasil_cari").hide();
                            $("#tunggu").html(
                                '<center><p style="color:black"><strong><span class="spinner-border spinner-border-sm me-2" role="status"></span> Mohon Menunggu, Sedang mencari Barang dengan kata kunci: ' +
                                id +
                                ' <span class="animated-dots"></span></strong></p></center>'
                            );
                        },
                        success: function(html) {
                            $("#tunggu").html('');
                            $("#hasil_cari").show();
                            $("#hasil_cari").html(html);
                            document.getElementById("kodeseri").value = "";
                            document.getElementById("kodeseri").focus();
                        }
                    });
                }
            });

            tablePengambilan = $('.datatable-pengambilan').DataTable({
                "processing": true,
                "serverSide": false,
                "scrollX": false,
                "scrollCollapse": false,
                "pagingType": 'full_numbers',
                "dom": "<'card-header h3' B>" +
                    "<'card-body border-bottom py-3' <'row'<'col-sm-6'l><'col-sm-6'f>> >" +
                    "<'table-responsive' <'col-sm-12'tr> >" +
                    "<'card-footer' <'row'<'col-sm-5'i><'col-sm-7'p> >>",
                "lengthMenu": [
                    [10, 10, 25, 50, -1],
                    ['Default', '10', '25', '50', 'Semua']
                ],
                "buttons": [{
                        extend: 'copyHtml5',
                        className: 'btn btn-teal',
                        text: '<i class="fa fa-copy text-white"></i> Copy',
                        action: newexportaction,
                    },
                    {
                        extend: 'excelHtml5',
                        autoFilter: true,
                        className: 'btn btn-success',
                        text: '<i class="fa fa-file-excel text-white"></i> Excel',
                        action: newexportaction,
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-danger',
                        text: '<i class="fa fa-file-pdf text-white"></i> Pdf',
                    },
                ],
                "language": {
                    "lengthMenu": "Menampilkan _MENU_",
                    "zeroRecords": "Data Tidak Ditemukan",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ total data",
                    "infoEmpty": "Data Tidak Ditemukan",
                    "infoFiltered": "(Difilter dari _MAX_ total records)",
                    "processing": '<div class="container container-slim py-4"><div class="text-center"><div class="mb-3"></div><div class="text-secondary mb-3">Loading Data...</div><div class="progress progress-sm"><div class="progress-bar progress-bar-indeterminate"></div></div></div>',
                    "search": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>',
                    "paginate": {
                        "first": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 6v12"></path><path d="M18 6l-6 6l6 6"></svg>',
                        "last": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 6l6 6l-6 6"></path><path d="M17 5v13"></path></svg>',
                        "next": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24h24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg>',
                        "previous": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24h24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg>',
                    },
                },
                "ajax": {
                    "url": "{{ route('getPengambilan.index') }}",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.dari = $('#idfilter_dari').val();
                        data.sampai = $('#idfilter_sampai').val();
                    }
                },
                "columns": [{
                        title: '',
                        data: 'action',
                        name: 'action',
                        className: "cuspad0 cuspad1",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        title: 'Tanggal',
                        data: 'tanggal',
                        name: 'tanggal',
                        className: "cuspad0 cuspad1 clickable text-center"
                    },
                    {
                        title: 'KODESERI',
                        data: 'kodeseri',
                        name: 'kodeseri',
                        className: "cuspad0 cuspad1 clickable text-center"
                    },
                    {
                        title: 'BARANG',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 clickable"
                    },
                    {
                        title: 'QTY',
                        data: 'jumlah',
                        name: 'jumlah',
                        className: "cuspad0 cuspad1 clickable text-center"
                    },
                    {
                        title: 'MESIN',
                        data: 'mesin',
                        name: 'mesin',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'DIAMBIL',
                        data: 'diambil',
                        name: 'diambil',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'KETERANGAN',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 cuspad1 clickable"
                    },
                ],

            });

            /*-----------------------------------------EDIT PENGAMBILAN-----------------------------------------------*/
            $(document).ready(function() {
                function showOverlay() {
                    $('body').append(
                        '<div class="overlay"><div class="cv-spinner"><span class="loader"></span></div></div>'
                    );
                }

                function hideOverlay() {
                    $('.overlay').remove();
                }

                $(document).on('click', '.edit-btn', function() {
                    var id = $(this).data('id');

                    showOverlay();

                    $.ajax({
                        url: '/pengambilan/' + id + '/edit',
                        type: 'GET',
                        success: function(data) {
                            $('#modaleditPengambilan input[name="tanggal"]').val(data
                                .tanggal);
                            $('#modaleditPengambilan input[name="kodeseri"]').val(data
                                .kodeseri);
                            $('#modaleditPengambilan input[name="namaBarang"]').val(data
                                .namaBarang);
                            $('#modaleditPengambilan input[name="mesin"]').val(data
                                .mesin);
                            $('#modaleditPengambilan input[name="jumlah"]').val(data
                                .jumlah);
                            $('#modaleditPengambilan input[name="diambil"]').val(data
                                .diambil);
                            $('#modaleditPengambilan input[name="keterangan"]').val(data
                                .keterangan);

                            $('#editForm').attr('action', '/pengambilan/' + id);

                            var modal = new bootstrap.Modal(document.getElementById(
                                'modaleditPengambilan'));
                            modal.show();

                            hideOverlay();
                        },
                        error: function() {
                            hideOverlay();
                            alert('Failed to fetch data.');
                        }
                    });
                });

                $('#editForm').on('submit', function(e) {
                    e.preventDefault();

                    var formAction = $(this).attr('action');
                    var formData = $(this).serialize();

                    showOverlay();

                    $.ajax({
                        url: formAction,
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Data pengambilan updated successfully.',
                                position: 'top-end',
                                toast: true,
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal.stopTimer)
                                    toast.addEventListener('mouseleave',
                                        Swal
                                        .resumeTimer)
                                }
                            }).then(() => {
                                location.reload();
                            });
                            $('#modaleditPengambilan').modal('hide');
                            $('#datatable-pengambilan').DataTable().ajax.reload();
                            hideOverlay();
                        },
                        error: function() {
                            hideOverlay();
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to update data.',
                                icon: 'error',
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true
                            });
                        }
                    });
                });
            });

            /*------------------------------------------DESTROY PENGAMBILAN-------------------------------------------*/
            $('.datatable-pengambilan').on('click', '.remove', function() {
                var kodeseri = $(this).data('id');
                var nama = $(this).data('nama');
                var desc = $(this).data('desc');
                var token = $("meta[name='csrf-token']").attr("content");
                let r = (Math.random() + 1).toString(36).substring(2);

                swal.fire({
                    title: 'Hapus Data Permintaan',
                    text: 'Apakah anda yakin ingin menghapus ' + kodeseri + ', Ket : ' + nama +
                        " " + desc,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: '<i class="fa-regular fa-trash-can"></i> Hapus',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        (async () => {
                            const {
                                value: password
                            } = await Swal.fire({
                                title: "Ketik tulisan dibawah untuk menghapus " +
                                    kodeseri,
                                html: '<div class="unselectable">' + r +
                                    '</div>',
                                input: "text",
                                inputPlaceholder: "Enter your password to Delete " +
                                    nama,
                                showCancelButton: true,
                                cancelButtonColor: '#3085d6',
                                cancelButtonText: 'Batal',
                                confirmButtonText: 'Ok',
                                inputAttributes: {
                                    autocapitalize: "off",
                                    autocorrect: "off"
                                },
                            });
                            if (password == r) {
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('getPengambilan.store') }}" +
                                        '/' + kodeseri,
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                    },
                                    beforeSend: function() {
                                        Swal.fire({
                                            title: 'Mohon Menunggu',
                                            html: '<center><lottie-player src="https://lottie.host/54b33864-47d1-4f30-b38c-bc2b9bdc3892/1xkjwmUkku.json"  background="transparent"  speed="1"  style="width: 400px; height: 400px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Sedang menghapus data, Proses mungkin membutuhkan beberapa menit. <br><br><b class="text-danger">(Jangan menutup jendela ini, bisa mengakibatkan error)</b></h1>',
                                            timerProgressBar: true,
                                            showConfirmButton: false,
                                            allowOutsideClick: false,
                                            allowEscapeKey: false,
                                        })
                                    },
                                    success: function(data) {
                                        tablePengambilan.ajax.reload();
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: "top-end",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                            didOpen: (toast) => {
                                                toast.onmouseenter =
                                                    Swal.stopTimer;
                                                toast.onmouseleave =
                                                    Swal
                                                    .resumeTimer;
                                            }
                                        });
                                        Toast.fire({
                                            icon: "success",
                                            title: "Data Permintaan : " +
                                                nama + " (" + kodeseri +
                                                ") Terhapus"
                                        });
                                    },
                                    error: function(data) {
                                        tablePengambilan.ajax.reload();
                                        console.log('Error:', data
                                            .responseText);
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal!',
                                            text: 'Error: ' + data
                                                .responseText,
                                            showConfirmButton: true,
                                        });
                                    }
                                });
                            } else {
                                tablePengambilan.ajax.reload();
                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal",
                                    text: "Teks yang diketik tidak sama",
                                });
                            }
                        })()
                    }
                })
            });
        });
        $(document).on('click', '.tambahkebawah', function() {
            document.getElementById("kodeseri").value = "";
            document.getElementById("kodeseri").focus();
            $("#hasil_cari").hide();
            var kodeseri = $(this).data('kodeseri');
            var namabarang = $(this).data('namabarang');
            var qty = $(this).data('qty');
            var sisa = $(this).data('sisa');

            var idf = document.getElementById("idf").value;
            var detail_transaksi = document.getElementById("detail_transaksi");
            var tr = document.createElement("tr");
            tr.setAttribute("id", "btn-remove" + idf);

            // Kolom 0 Hapus
            var td = document.createElement("td");
            td.setAttribute("align", "center");
            td.innerHTML +=
                '<button class="btn btn-icon btn-outline-danger" type="button" onclick="hapusElemen(' + idf +
                ');"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg> </button>';
            tr.appendChild(td);

            // Kolom 1 Kodeseri
            var td = document.createElement("td");
            td.innerHTML += "<input type='hidden' name='kodeseri[]' value='" + kodeseri + "' id='qty_" + idf +
                "' style='text-transform: uppercase;'>" + kodeseri + "";
            tr.appendChild(td);

            // Kolom 2 Nama Barang
            var td = document.createElement("td");
            td.innerHTML += "<input type='hidden' name='namabarang[]' value='" + namabarang + "' id='qty_" + idf +
                "' style='text-transform: uppercase;'>" + namabarang + "";
            tr.appendChild(td);

            // Kolom 3 Stock
            var td = document.createElement("td");
            td.innerHTML += "<input type='hidden' name='stock[]' value='" + sisa + "' id='qty_" + idf +
                "' style='text-transform: uppercase;'>" + sisa + "";
            tr.appendChild(td);

            // Kolom 4 Qty
            var td = document.createElement("td");
            td.innerHTML += "<input type='number' name='qty[]' value='' max='" + sisa + "' min='0' id='harga_" +
                idf + "' class='form-control border-dark bg-light' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 5 Mesin
            var td = document.createElement("td");
            td.innerHTML +=
                '<select name="mesin[]" class="form-control  elementmsn border-dark bg-light" style="color:black;text-transform: uppercase;width:100%"><option></option></select>';
            tr.appendChild(td);

            // Kolom 6 Unit
            var td = document.createElement("td");
            td.innerHTML += "<input type='text' name='unit[]' value='' id='kurs_" + idf +
                "' class='form-control  border-dark bg-light' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 7 Keterangan
            var td = document.createElement("td");
            td.innerHTML += "<input type='text' name='keterangan[]' value='' id='trucking_" + idf +
                "' class='form-control  border-dark bg-light' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            detail_transaksi.appendChild(tr);

            idf = (idf - 1) + 2;
            document.getElementById("idf").value = idf;

            $(".elementmsn").select2({
                language: "id",
                width: '250px',
                placeholder: "Pilih Mesin",
                ajax: {
                    url: "/getDataMesinPengambilan",
                    dataType: 'json',
                    delay: 200,
                    processResults: function(response) {
                        console.log(response);
                        return {
                            results: $.map(response, function(item) {
                                return {
                                    id: item.id,
                                    text: item.mesin.toUpperCase() + " " + item.merk
                                        .toUpperCase() + " " + item.kode_nomor
                                        .toUpperCase() + (item.unit == '88' ? ' (UMUM)' :
                                            " (UNIT " + item.unit + ")"),
                                }
                            })
                        };
                    },
                    cache: true
                },
            });
        });

        function hapusElemen(idf) {
            $("#btn-remove" + idf).remove();
        }
        $(function() {
            if ($("#formPengambilan").length > 0) {
                $("#formPengambilan").validate({
                    rules: {
                        tgl: {
                            required: true,
                        },
                        diambil: {
                            required: true,
                        },
                    },
                    messages: {
                        tgl: {
                            required: "Masukkan Tanggal",
                        },
                        diambil: {
                            required: "Masukkan Diambil Oleh",
                        },
                    },

                    submitHandler: function(form) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $('#submitPengambilan').html(
                            '<i class="fa-solid fa-fw fa-spinner fa-spin"></i> Mohon Menunggu...');
                        $("#submitPengambilan").attr("disabled", true);
                        $.ajax({
                            url: "{{ url('storedataPengambilan') }}",
                            type: "POST",
                            data: $('#formPengambilan').serialize(),
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Menyimpan Data',
                                    html: '<center><lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_al2qt2jz.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Sedang memproses data, Proses mungkin membutuhkan beberapa menit.</h1>',
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                })
                            },
                            success: function(response) {
                                console.log('Result:', response);
                                $('#submitPengambilan').html(
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg> Proses'
                                );
                                $("#submitPengambilan").attr("disabled", false);
                                tablePengambilan.ajax.reload();
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 4000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.onmouseenter = Swal.stopTimer;
                                        toast.onmouseleave = Swal.resumeTimer;
                                    }
                                });
                                Toast.fire({
                                    icon: "success",
                                    title: response.msg,
                                });
                                document.getElementById("formPengambilan").reset();
                                $('#tabs-profile-8').addClass('active show');
                                $('#tabs-home-8').removeClass('active show');
                                for (let i = 0; i <= (document.getElementById("idf")
                                        .value); i++) {
                                    $("#btn-remove" + i).remove();
                                }
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                // const obj = JSON.parse(data.responseJSON);
                                tablePengambilan.ajax.reload();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Input',
                                    html: data.responseJSON.message,
                                    showConfirmButton: true
                                });
                                $('#submitPengambilan').html(
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg> Simpan'
                                );
                                $("#submitPengambilan").attr("disabled", false);
                            }
                        });
                    }
                })
            }
        })

        function newexportaction(e, dt, button, config) {
            var self = this;
            var oldStart = dt.settings()[0]._iDisplayStart;
            dt.one('preXhr', function(e, s, data) {
                // Just this once, load all data from the server...
                data.start = 0;
                data.length = 2147483647;
                dt.one('preDraw', function(e, settings) {
                    // Call the original action function
                    if (button[0].className.indexOf('buttons-copy') >= 0) {
                        $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                        $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                        $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                        $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-print') >= 0) {
                        $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                    }
                    dt.one('preXhr', function(e, s, data) {
                        // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                        // Set the property to what it was before exporting.
                        settings._iDisplayStart = oldStart;
                        data.start = oldStart;
                    });
                    // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                    setTimeout(dt.ajax.reload, 0);
                    // Prevent rendering of the full data to the DOM
                    return false;
                });
            });
            // Requery the server with the new one-time export settings
            dt.ajax.reload();
        }
    </script>
@endsection
