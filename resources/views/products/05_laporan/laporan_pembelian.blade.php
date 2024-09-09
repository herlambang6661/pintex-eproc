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

        .transparent-card {
            background-color: rgba(255, 255, 255, 0);
            /* Transparansi 100% */
            border: 1px solid rgba(0, 0, 0, 0);
            /* Border transparan 100% */
            box-shadow: none;
            /* Menghilangkan shadow */
            opacity: 20;
            /* Membuat card sepenuhnya transparan */
        }

        background-color: rgba(255, 255, 255, 0);
        /* Transparansi 100% pada latar belakang */
        border: 1px solid rgba(0, 0, 0, 0.1);
        /* Border hitam dengan 10% transparansi */
        box-shadow: none;
        /* Menghilangkan shadow */
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
                                    class="icon icon-tabler icon-tabler-clipboard-data" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                    <path
                                        d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path d="M9 17v-4" />
                                    <path d="M12 17v-1" />
                                    <path d="M15 17v-2" />
                                    <path d="M12 17v-1" />
                                </svg>
                                Laporan Pembelian
                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="https://pintex.co.id/apps/HR/Recruitment"><i
                                                class="fa-solid fa-basket-shopping"></i> Laporan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#"><i
                                                class="fa-regular fa-paste"></i> Laporan Pembelian</a></li>
                                </ol>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck">
                        <div class="col-md-12">
                            <div class="card transparent-card card-xl shadow rounded border border-blue">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                        <li class="nav-item">
                                            <a href="#tabs-mesin" class="nav-link active" data-bs-toggle="tab">
                                                <svg style="margin-right: 5px" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-robot">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M6 4m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" />
                                                    <path d="M12 2v2" />
                                                    <path d="M9 12v9" />
                                                    <path d="M15 12v9" />
                                                    <path d="M5 16l4 -2" />
                                                    <path d="M15 14l4 2" />
                                                    <path d="M9 18h6" />
                                                    <path d="M10 8v.01" />
                                                    <path d="M14 8v.01" />
                                                </svg>
                                                Mesin
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-supplier" class="nav-link" data-bs-toggle="tab">
                                                <svg style="margin-right: 5px" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-shopping-cart">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M6 2a1 1 0 0 1 .993 .883l.007 .117v1.068l13.071 .935a1 1 0 0 1 .929 1.024l-.01 .114l-1 7a1 1 0 0 1 -.877 .853l-.113 .006h-12v2h10a3 3 0 1 1 -2.995 3.176l-.005 -.176l.005 -.176c.017 -.288 .074 -.564 .166 -.824h-5.342a3 3 0 1 1 -5.824 1.176l-.005 -.176l.005 -.176a3.002 3.002 0 0 1 1.995 -2.654v-12.17h-1a1 1 0 0 1 -.993 -.883l-.007 -.117a1 1 0 0 1 .883 -.993l.117 -.007h2zm0 16a1 1 0 1 0 0 2a1 1 0 0 0 0 -2zm11 0a1 1 0 1 0 0 2a1 1 0 0 0 0 -2z" />
                                                </svg>
                                                Supplier
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-item" class="nav-link " data-bs-toggle="tab">
                                                <svg style="margin-right: 5px" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-sitemap">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M3 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                                    <path
                                                        d="M15 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                                    <path
                                                        d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                                    <path d="M6 15v-1a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v1" />
                                                    <path d="M12 9l0 3" />
                                                </svg>
                                                Item
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-servis" class="nav-link" data-bs-toggle="tab">
                                                <svg style="margin-right: 5px" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                </svg>
                                                Servis
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="tabs-supplier">
                                        <div class="card card-xl shadow rounded border border-green">
                                            <h4 class="card-header bg-green-lt pt-1 pb-1">Laporan Pemakaian by Supplier
                                            </h4>
                                            <div class="card-body pb-0">
                                                <form id="formReportMesin" class="form-horizontal mb-3">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="tanggalAwalSupplier">Tanggal Awal</label>
                                                                <input type="date"
                                                                    class="form-control border border-green"
                                                                    id="tanggalAwalSupplier" name="tanggalAwalSupplier"
                                                                    required value="{{ date('Y-m-01') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="tanggalAkhirSupplier">Tanggal Akhir</label>
                                                                <input type="date"
                                                                    class="form-control border border-green"
                                                                    id="tanggalAkhirSupplier" name="tanggalAkhirSupplier"
                                                                    required value="{{ date('Y-m-d') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 d-flex align-items-end">
                                                            <button type="button" id="btn-filter-supplier"
                                                                class="btn btn-green btn-block">
                                                                <i class="fa fa-search" style="margin-right: 5px"></i>
                                                                Lihat Data
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <table style="width:100%; height: 100%;font-size:13px;"
                                                class="table table-sm table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-supplier">
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane " id="tabs-item">
                                        <div class="card card-xl shadow rounded border border-yellow">
                                            <h4 class="card-header bg-yellow-lt pt-1 pb-1">Laporan Pemakaian by Item
                                            </h4>
                                            <div class="card-body pb-0">
                                                <form id="formReportItem" class="form-horizontal mb-3">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="tanggalAwalMesin">Tanggal Awal</label>
                                                                <input type="date"
                                                                    class="form-control border border-yellow"
                                                                    id="tanggalAwalMesin" name="tanggalAwalMesin" required
                                                                    value="{{ date('Y-m-01') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="tanggalAkhirMesin">Tanggal Akhir</label>
                                                                <input type="date"
                                                                    class="form-control border border-yellow"
                                                                    id="tanggalAkhirMesin" name="tanggalAkhirMesin"
                                                                    required value="{{ date('Y-m-d') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 d-flex align-items-end">
                                                            <button type="button" id="btn-filter-mesin"
                                                                class="btn btn-yellow btn-block">
                                                                <i class="fa fa-search" style="margin-right: 5px"></i>
                                                                Lihat Data
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <table style="width:100%; height: 100%;font-size:13px;"
                                                class="table table-sm table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-item">
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane active show" id="tabs-mesin">
                                        <div class="card card-xl shadow rounded border border-blue">
                                            <h4 class="card-header bg-azure-lt pt-1 pb-1">Laporan Pemakaian by Mesin</h4>
                                            <div class="card-body">
                                                <form id="formReportMesin" class="form-horizontal mb-3">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="tanggalAwalMesin">Tanggal Awal</label>
                                                                <input type="date"
                                                                    class="form-control border border-blue"
                                                                    id="tanggalAwalMesin" name="tanggalAwalMesin" required
                                                                    value="{{ date('Y-m-01') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="tanggalAkhirMesin">Tanggal Akhir</label>
                                                                <input type="date"
                                                                    class="form-control border border-blue"
                                                                    id="tanggalAkhirMesin" name="tanggalAkhirMesin"
                                                                    required value="{{ date('Y-m-d') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 d-flex align-items-end">
                                                            <button type="button" class="btn btn-primary btn-block"
                                                                onclick="cariReportMesin()">
                                                                <i class="fa fa-search" style="margin-right: 5px"></i>
                                                                Lihat
                                                                Data
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>

                                                <div id="hasil_cari"></div>
                                                <div id="tunggu"></div>
                                                <span id="success-msg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-servis">
                                        <div class="card card-xl shadow rounded border border-red">
                                            <h4 class="card-header bg-red-lt pt-1 pb-1">
                                                Laporan Pemakaian by Servis
                                            </h4>
                                            <div class="card-body pb-0">
                                                <form id="formReportServis" class="form-horizontal mb-3">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="tanggalAwalServis">Tanggal Awal</label>
                                                                <input type="date"
                                                                    class="form-control border border-red"
                                                                    id="tanggalAwalServis" name="tanggalAwalServis"
                                                                    required value="{{ date('Y-m-01') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="tanggalAkhirServis">Tanggal Akhir</label>
                                                                <input type="date"
                                                                    class="form-control border border-red"
                                                                    id="tanggalAkhirServis" name="tanggalAkhirServis"
                                                                    required value="{{ date('Y-m-d') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 d-flex align-items-end">
                                                            <button type="button" id="btn-filter-servis"
                                                                class="btn btn-red btn-block">
                                                                <i class="fa fa-search" style="margin-right: 5px"></i>
                                                                Lihat Data
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <table style="width:100%; height: 100%;font-size:13px;"
                                                class="table table-sm table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-servis">
                                            </table>

                                        </div>
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

    <script type="text/javascript">
        function newexportaction(e, dt, button, config) {
            var self = this;
            var oldStart = dt.settings()[0]._iDisplayStart;

            dt.one('preXhr', function(e, s, data) {
                data.start = 0;
                data.length = 2147483647;

                dt.one('preDraw', function(e, settings) {
                    if (button[0].className.indexOf('buttons-copy') >= 0) {
                        $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                        $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                        $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                            $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                    }
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
            });

            dt.ajax.reload();
        }

        function cariReportMesin() {
            let tgaw = $('#tanggalAwalMesin').val();
            let tgak = $('#tanggalAkhirMesin').val();
            // alert(str);
            $.ajax({
                // cache: false,
                type: "POST",
                url: "{{ url('laporan/detailMesin') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    startDate: tgaw,
                    endDate: tgak,
                },
                beforeSend: function() {
                    $("#hasil_cari").hide();
                    $("#tunggu").html(
                        '<center><lottie-player src="https://lottie.host/03a70b30-5cc2-4418-941e-09828e26b1d8/ypNkHv3IyB.json" background="#fff" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player><i class="fa-solid fa-spinner fa-spin"></i> Mohon Menunggu, Sedang Tarik Data<span class="animated-dots"></span></center>'
                    );
                },
                success: function(html) {
                    $("#tunggu").html('');
                    $("#hasil_cari").show();
                    $("#hasil_cari").html(html);
                }
            });
        }

        function getMesin(params) {
            let tgaw = $('#tanggalAwalMesin').val();
            let tgak = $('#tanggalAkhirMesin').val();
            $.ajax({
                type: "POST",
                url: "{{ url('laporan/mesinLihat') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    startDate: tgaw,
                    endDate: tgak,
                    unit: params,
                },
                beforeSend: function() {
                    $("#hasil_mesin_" + params).hide();
                    $("#tunggu_mesin_" + params).html(
                        '<center><span class="spinner-border spinner-border-sm me-2" role="status"></span> Mencari data mesin<span class="animated-dots"></span></center>'
                    );
                },
                success: function(html) {
                    $("#tunggu_mesin_" + params).html('');
                    $("#hasil_mesin_" + params).show();
                    $("#hasil_mesin_" + params).html(html);
                }
            });
        }

        function getSubMesin(params, id) {
            let tgaw = $('#tanggalAwalMesin').val();
            let tgak = $('#tanggalAkhirMesin').val();
            $.ajax({
                type: "POST",
                url: "{{ url('laporan/MesingetSub') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    startDate: tgaw,
                    endDate: tgak,
                    unit: params,
                    id: id,
                },
                beforeSend: function() {
                    $("#hasil_sub_mesin_" + id).hide();
                    $("#tunggu_sub_mesin_" + id).html(
                        '<center><span class="spinner-border spinner-border-sm me-2" role="status"></span> Mencari data sub mesin<span class="animated-dots"></span></center>'
                    );
                },
                success: function(html) {
                    $("#tunggu_sub_mesin_" + id).html('');
                    $("#hasil_sub_mesin_" + id).show();
                    $("#hasil_sub_mesin_" + id).html(html);
                }
            });
        }

        $(document).ready(function() {
            //---------------SUPPLIER----------------------------------//
            var tableSupplier = $('.datatable-supplier').DataTable({
                "processing": true,
                "serverSide": true,
                "scrollX": false,
                "scrollCollapse": false,
                "pagingType": 'full_numbers',
                "dom": "<'card-header h3' B>" +
                    "<'card-body border-bottom py-3' <'row'<'col-sm-6'l><'col-sm-6'f>> >" +
                    "<'table-responsive' <'col-sm-12'tr> >" +
                    "<'card-footer' <'row'<'col-sm-5'i><'col-sm-7'p> >>",
                "lengthMenu": [
                    [20, 10, 25, 50, -1],
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
                    "zeroRecords": "Tidak Ada Data yang Ditampilkan",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ total data",
                    "infoEmpty": "Data Tidak Ditemukan",
                    "infoFiltered": "(Difilter dari _MAX_ total records)",
                    "processing": '<div class="container container-slim py-4"><div class="text-center"><div class="mb-3"></div><div class="text-secondary mb-3">Loading Data<span class="animated-dots"></span></div><div class="progress progress-sm"><div class="progress-bar progress-bar-indeterminate"></div></div></div>',
                    "search": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>',
                    "paginate": {
                        "first": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 6v12"></path><path d="M18 6l-6 6l6 6"></svg>',
                        "last": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 6l6 6l-6 6"></path><path d="M17 5v13"></path></svg>',
                        "next": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24h24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg>',
                        "previous": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24h24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg>',
                    },
                },
                "ajax": {
                    "url": "{{ route('getLaporan.index') }}",
                    "type": "POST",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.dari = $('#tanggalAwalSupplier').val();
                        data.sampai = $('#tanggalAkhirSupplier').val();
                        data.type = 'supplier';
                    }
                },
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "columns": [{
                        title: 'TANGGAL',
                        data: 'tgl',
                        className: "text-center",
                    },
                    {
                        title: 'NO PO',
                        data: 'nofaktur',
                        className: "text-center"
                    },
                    {
                        title: '',
                        data: 'supplier',
                        className: "text-center"
                    },
                    {
                        title: 'KODESERI',
                        data: 'kode',
                        className: "text-center",
                    },
                    {
                        title: 'BARANG',
                        data: 'namabarang',
                        className: "font-weight-bold",
                    },
                    {
                        title: 'DESKRIPSI',
                        data: 'namabarang',
                        className: "font-weight-bold",
                    },
                    {
                        title: 'DIBELI',
                        data: 'pembeli',
                        className: "text-center",
                        "orderable": false
                    },
                    {
                        title: 'QTY',
                        data: 'kts',
                        className: "text-center",
                    },
                    {
                        title: '$/CHF',
                        data: 'harga_luar',
                        className: "text-right",
                        "orderable": false,
                        "render": $.fn.dataTable.render.number('.', ',', 0, '')
                    },
                    {
                        title: 'RP',
                        data: 'harga_dalam',
                        className: "text-right",
                        "orderable": false,
                        "render": $.fn.dataTable.render.number('.', ',', 0, '')
                    },
                ],
                // Grand Total Footer
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api(),
                        data;
                    // converting to interger to find total
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                    };
                    // computing column Total of the complete result 
                    var colSem = api
                        .column(8)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    var colSem2 = api
                        .column(9)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer by showing the total with the reference of the column index 
                    $(api.column(0).footer()).html('Grand Total');
                    $(api.column(8).footer()).html('Rp. ' + colSem);
                    $(api.column(9).footer()).html('Rp. ' + colSem2);
                },
                // "order": [[ 2, 'asc' ]],
                // "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'all'
                    }).nodes();
                    var last = null;

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i ===
                            'number' ? i : 0;
                    };
                    // const rupiah = (number)=>{
                    //     return new Intl.NumberFormat("id-ID", {
                    //     style: "currency",
                    //     currency: "IDR"
                    //     }).format(number);
                    // }
                    total = [];
                    total2 = [];
                    api.column(2, {
                        page: 'all'
                    }).data().each(function(group, i) {
                        // IDR
                        group_assoc = group.replace(/(\.|&|,| |#039;|\n|amp;)/g, "")
                            .replace(/"/g, "")
                            .replace(/'/g, "")
                            .replace(/\(|\)/g, "")
                            .replace(/\//g, "");
                        // console.log(group_assoc);
                        if (typeof total[group_assoc] != 'undefined') {
                            // untuk total hasil
                            total[group_assoc] = total[group_assoc] + intVal(api.column(8)
                                .data()[
                                    i]);
                            total2[group_assoc] = total2[group_assoc] + intVal(api.column(9)
                                .data()[
                                    i]);
                        } else {
                            total[group_assoc] = intVal(api.column(8).data()[i]);
                            total2[group_assoc] = intVal(api.column(9).data()[i]);
                        }
                        if (last !== group) {
                            $(rows).eq(i).before(
                                // untuk colspan
                                '<tr class="group font-weight-bold bg-azure-lt"><td colspan="7"><i class="fa-solid fa-angles-right"></i> ' +
                                group + '</td><td class="' + group_assoc +
                                ' text-right"></td><td class="' + group_assoc +
                                'USD text-right"></td></tr>'
                            );
                            last = group;
                        }
                    });
                    for (var key in total) {
                        let rupiahFormat = total[key].toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        $("." + key).html("<strong class='text-center'>" + rupiahFormat + "</strong>");
                    }
                    for (var key2 in total2) {
                        let rupiahFormat2 = total2[key2].toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                            '.');
                        $("." + key2 + "USD").html("<strong class='text-center'>" + rupiahFormat2 +
                            "</strong>");
                    }
                }
            });
            $('#btn-filter-supplier').click(function() { //button reset event click
                tableSupplier.ajax.reload(); //just reload table
            });

            //---------------ITEM----------------------------------//
            var tableItem = $('.datatable-item').DataTable({
                "processing": true,
                "serverSide": true,
                "scrollX": false,
                "scrollCollapse": false,
                "pagingType": 'full_numbers',
                "dom": "<'card-header h3' B>" +
                    "<'card-body border-bottom py-3' <'row'<'col-sm-6'l><'col-sm-6'f>> >" +
                    "<'table-responsive' <'col-sm-12'tr> >" +
                    "<'card-footer' <'row'<'col-sm-5'i><'col-sm-7'p> >>",
                "lengthMenu": [
                    [20, 10, 25, 50, -1],
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
                    "processing": '<div class="container container-slim py-4"><div class="text-center"><div class="mb-3"></div><div class="text-secondary mb-3">Loading Data<span class="animated-dots"></span></div><div class="progress progress-sm"><div class="progress-bar progress-bar-indeterminate"></div></div></div>',
                    "search": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>',
                    "paginate": {
                        "first": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 6v12"></path><path d="M18 6l-6 6l6 6"></svg>',
                        "last": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 6l6 6l-6 6"></path><path d="M17 5v13"></path></svg>',
                        "next": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24h24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg>',
                        "previous": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24h24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg>',
                    },
                },
                "ajax": {
                    "url": "{{ route('getLaporan.index') }}",
                    "type": "POST",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.dari = $('#tanggalAwalItem').val();
                        data.sampai = $('#tanggalAkhirItem').val();
                        data.type = 'item';
                    }
                },
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "columns": [{
                        title: 'TANGGAL',
                        data: 'tgl',
                        className: "text-center",
                    },
                    {
                        title: 'NO PO',
                        data: 'nofaktur',
                        className: "text-center"
                    },
                    {
                        title: '',
                        data: 'namabarang',
                        className: "text-center"
                    },
                    {
                        title: 'KODESERI',
                        data: 'kode',
                        className: "text-center",
                    },
                    {
                        title: 'SUPPLIER',
                        data: 'supplier',
                        className: "font-weight-bold",
                    },
                    {
                        title: 'DESKRIPSI',
                        data: 'namabarang',
                        className: "font-weight-bold",
                    },
                    {
                        title: 'DIBELI',
                        data: 'pembeli',
                        className: "text-center",
                        "orderable": false
                    },
                    {
                        title: 'QTY',
                        data: 'kts',
                        className: "text-center",
                    },
                    {
                        title: '$/CHF',
                        data: 'harga_luar',
                        className: "text-right",
                        "orderable": false,
                        "render": $.fn.dataTable.render.number('.', ',', 0, '')
                    },
                    {
                        title: 'RP',
                        data: 'harga_dalam',
                        className: "text-right",
                        "orderable": false,
                        "render": $.fn.dataTable.render.number('.', ',', 0, '')
                    },
                ],

                // Grand Total Footer
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api(),
                        data;
                    // converting to interger to find total
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                    };
                    // computing column Total of the complete result 
                    var colSem = api
                        .column(8)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    var colSem2 = api
                        .column(9)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer by showing the total with the reference of the column index 
                    $(api.column(0).footer()).html('Grand Total');
                    $(api.column(8).footer()).html('Rp. ' + colSem);
                    $(api.column(9).footer()).html('Rp. ' + colSem2);
                },
                // "order": [[ 2, 'asc' ]],
                // "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'all'
                    }).nodes();
                    var last = null;

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i ===
                            'number' ? i : 0;
                    };
                    // const rupiah = (number)=>{
                    //     return new Intl.NumberFormat("id-ID", {
                    //     style: "currency",
                    //     currency: "IDR"
                    //     }).format(number);
                    // }
                    total = [];
                    total2 = [];
                    api.column(2, {
                        page: 'all'
                    }).data().each(function(group, i) {
                        // IDR
                        group_assoc = group.replace(/(\.|&|,| |#039;|\n|amp;)/g, "")
                            .replace(/"/g, "")
                            .replace(/'/g, "")
                            .replace(/\(|\)/g, "")
                            .replace(/\//g, "");
                        // console.log(group_assoc);
                        if (typeof total[group_assoc] != 'undefined') {
                            // untuk total hasil
                            total[group_assoc] = total[group_assoc] + intVal(api.column(8)
                                .data()[
                                    i]);
                            total2[group_assoc] = total2[group_assoc] + intVal(api.column(9)
                                .data()[
                                    i]);
                        } else {
                            total[group_assoc] = intVal(api.column(8).data()[i]);
                            total2[group_assoc] = intVal(api.column(9).data()[i]);
                        }
                        if (last !== group) {
                            $(rows).eq(i).before(
                                // untuk colspan
                                '<tr class="group font-weight-bold bg-yellow-lt"><td colspan="7"><i class="fa-solid fa-angles-right"></i> ' +
                                group + '</td><td class="' + group_assoc +
                                ' text-right"></td><td class="' + group_assoc +
                                'USD text-right"></td></tr>'
                            );
                            last = group;
                        }
                    });
                    for (var key in total) {
                        let rupiahFormat = total[key].toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        $("." + key).html("<strong class='text-center'>" + rupiahFormat + "</strong>");
                    }
                    for (var key2 in total2) {
                        let rupiahFormat2 = total2[key2].toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                            '.');
                        $("." + key2 + "USD").html("<strong class='text-center'>" + rupiahFormat2 +
                            "</strong>");
                    }
                }
            });
            $('#btn-filter-mesin').click(function() {
                tableItem.ajax.reload(); //just reload table
            });

            //---------------SERVIS----------------------------------//
            var tableServis = $('.datatable-servis').DataTable({
                "processing": true,
                "serverSide": true,
                "scrollX": false,
                "scrollCollapse": false,
                "pagingType": 'full_numbers',
                "dom": "<'card-header h3' B>" +
                    "<'card-body border-bottom py-3' <'row'<'col-sm-6'l><'col-sm-6'f>> >" +
                    "<'table-responsive' <'col-sm-12'tr> >" +
                    "<'card-footer' <'row'<'col-sm-5'i><'col-sm-7'p> >>",
                "lengthMenu": [
                    [20, 10, 25, 50, -1],
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
                    "processing": '<div class="container container-slim py-4"><div class="text-center"><div class="mb-3"></div><div class="text-secondary mb-3">Loading Data<span class="animated-dots"></span></div><div class="progress progress-sm"><div class="progress-bar progress-bar-indeterminate"></div></div></div>',
                    "search": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>',
                    "paginate": {
                        "first": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 6v12"></path><path d="M18 6l-6 6l6 6"></svg>',
                        "last": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 6l6 6l-6 6"></path><path d="M17 5v13"></path></svg>',
                        "next": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24h24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg>',
                        "previous": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24h24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg>',
                    },
                },
                "ajax": {
                    "url": "{{ route('getServisLaporan.index') }}",
                    "type": "POST",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.dari = $('#tanggalAwalServis').val();
                        data.sampai = $('#tanggalAkhirServis').val();
                    }
                },
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "columns": [{
                        title: 'TANGGAL',
                        data: 'tgl',
                        className: "text-center",
                    },
                    {
                        title: 'NO PO',
                        data: 'nofaktur',
                        className: "text-center"
                    },
                    {
                        title: '',
                        data: 'namabarang',
                        className: "text-center"
                    },
                    {
                        title: 'KODESERI',
                        data: 'kode',
                        className: "text-center",
                    },
                    {
                        title: 'SUPPLIER',
                        data: 'supplier',
                        className: "font-weight-bold",
                    },
                    {
                        title: 'DESKRIPSI',
                        data: 'namabarang',
                        className: "font-weight-bold",
                    },
                    {
                        title: 'DIBELI',
                        data: 'pembeli',
                        className: "text-center",
                        "orderable": false
                    },
                    {
                        title: 'QTY',
                        data: 'kts',
                        className: "text-center",
                    },
                    {
                        title: '$/CHF',
                        data: 'harga_luar',
                        className: "text-right",
                        "orderable": false,
                        "render": $.fn.dataTable.render.number('.', ',', 0, '')
                    },
                    {
                        title: 'RP',
                        data: 'harga_dalam',
                        className: "text-right",
                        "orderable": false,
                        "render": $.fn.dataTable.render.number('.', ',', 0, '')
                    },
                ],

                // Grand Total Footer
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api(),
                        data;
                    // converting to interger to find total
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                    };
                    // computing column Total of the complete result 
                    var colSem = api
                        .column(8)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    var colSem2 = api
                        .column(9)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer by showing the total with the reference of the column index 
                    $(api.column(0).footer()).html('Grand Total');
                    $(api.column(8).footer()).html('Rp. ' + colSem);
                    $(api.column(9).footer()).html('Rp. ' + colSem2);
                },
                // "order": [[ 2, 'asc' ]],
                // "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'all'
                    }).nodes();
                    var last = null;

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i ===
                            'number' ? i : 0;
                    };
                    // const rupiah = (number)=>{
                    //     return new Intl.NumberFormat("id-ID", {
                    //     style: "currency",
                    //     currency: "IDR"
                    //     }).format(number);
                    // }
                    total = [];
                    total2 = [];
                    api.column(2, {
                        page: 'all'
                    }).data().each(function(group, i) {
                        // IDR
                        group_assoc = group.replace(/(\.|&|,| |#039;|\n|amp;)/g, "")
                            .replace(/"/g, "")
                            .replace(/'/g, "")
                            .replace(/\(|\)/g, "")
                            .replace(/\//g, "");
                        // console.log(group_assoc);
                        if (typeof total[group_assoc] != 'undefined') {
                            // untuk total hasil
                            total[group_assoc] = total[group_assoc] + intVal(api.column(8)
                                .data()[
                                    i]);
                            total2[group_assoc] = total2[group_assoc] + intVal(api.column(9)
                                .data()[
                                    i]);
                        } else {
                            total[group_assoc] = intVal(api.column(8).data()[i]);
                            total2[group_assoc] = intVal(api.column(9).data()[i]);
                        }
                        if (last !== group) {
                            $(rows).eq(i).before(
                                // untuk colspan
                                '<tr class="group font-weight-bold bg-red-lt"><td colspan="7"><i class="fa-solid fa-angles-right"></i> ' +
                                group + '</td><td class="' + group_assoc +
                                ' text-right"></td><td class="' + group_assoc +
                                'USD text-right"></td></tr>'
                            );
                            last = group;
                        }
                    });
                    for (var key in total) {
                        let rupiahFormat = total[key].toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        $("." + key).html("<strong class='text-center'>" + rupiahFormat + "</strong>");
                    }
                    for (var key2 in total2) {
                        let rupiahFormat2 = total2[key2].toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                            '.');
                        $("." + key2 + "USD").html("<strong class='text-center'>" + rupiahFormat2 +
                            "</strong>");
                    }
                }
            });
            $('#btn-filter-servis').click(function() {
                tableServis.ajax.reload();
            });
        });

        //----------------GRAFIK------------------------------//
        document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-uptime'), {
                chart: {
                    type: "area",
                    fontFamily: 'inherit',
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: .16,
                    type: 'solid'
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                    curve: "smooth",
                },
                series: [{
                    name: "Uptime",
                    data: [150, 160, 170, 161, 167, 162, 161, 152, 141, 144, 154, 166, 176, 187,
                        198, 210, 196, 207, 200, 187, 192, 204, 193, 204, 208, 196, 193,
                        178, 191, 204, 218, 211, 218, 216, 201, 197, 190, 179, 172, 158,
                        159, 147, 152, 152, 144, 137, 136, 123, 112, 99, 100, 95, 105, 116,
                        125, 124, 133, 129, 116, 119, 109, 114, 115, 111, 96, 104, 104, 102,
                        116, 126, 117, 130, 124, 126, 131, 143, 130, 116, 118, 122, 132,
                        126, 136, 123, 112, 116, 113, 113, 109, 99, 100, 95, 83, 79, 64, 79,
                        81, 94, 99, 97, 83, 71, 75, 69, 71, 75, 84, 90, 100, 96, 108, 102,
                        116, 112, 112, 102, 115, 120, 118, 118
                    ]
                }],
                tooltip: {
                    theme: 'dark'
                },
                grid: {
                    padding: {
                        top: -20,
                        right: 0,
                        left: -4,
                        bottom: -4
                    },
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false
                    },
                    axisBorder: {
                        show: false,
                    },
                    type: 'datetime',
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                },
                labels: [
                    '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24',
                    '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29',
                    '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04',
                    '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09',
                    '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14',
                    '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19',
                    '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24',
                    '2020-07-25', '2020-07-26', '2020-07-27', '2020-07-28', '2020-07-29',
                    '2020-07-30', '2020-07-31', '2020-08-01', '2020-08-02', '2020-08-03',
                    '2020-08-04', '2020-08-05', '2020-08-06', '2020-08-07', '2020-08-08',
                    '2020-08-09', '2020-08-10', '2020-08-11', '2020-08-12', '2020-08-13',
                    '2020-08-14', '2020-08-15', '2020-08-16', '2020-08-17', '2020-08-18',
                    '2020-08-19', '2020-08-20', '2020-08-21', '2020-08-22', '2020-08-23',
                    '2020-08-24', '2020-08-25', '2020-08-26', '2020-08-27', '2020-08-28',
                    '2020-08-29', '2020-08-30', '2020-08-31', '2020-09-01', '2020-09-02',
                    '2020-09-03', '2020-09-04', '2020-09-05', '2020-09-06', '2020-09-07',
                    '2020-09-08', '2020-09-09', '2020-09-10', '2020-09-11', '2020-09-12',
                    '2020-09-13', '2020-09-14', '2020-09-15', '2020-09-16', '2020-09-17',
                    '2020-09-18', '2020-09-19', '2020-09-20', '2020-09-21', '2020-09-22',
                    '2020-09-23', '2020-09-24', '2020-09-25', '2020-09-26', '2020-09-27',
                    '2020-09-28', '2020-09-29', '2020-09-30', '2020-10-01', '2020-10-02',
                    '2020-10-03', '2020-10-04', '2020-10-05', '2020-10-06', '2020-10-07',
                    '2020-10-08', '2020-10-09', '2020-10-10', '2020-10-11', '2020-10-12',
                    '2020-10-13', '2020-10-14', '2020-10-15', '2020-10-16', '2020-10-17'
                ],
                colors: [tabler.getColor("primary")],
                legend: {
                    show: false,
                },
            })).render();
        });
    </script>
@endsection
