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
                                    class="icon icon-tabler icon-tabler-shopping-cart-dollar" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M13 17h-7v-14h-2" />
                                    <path d="M6 5l14 1l-.575 4.022m-4.925 2.978h-8.5" />
                                    <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                    <path d="M19 21v1m0 -8v1" />
                                </svg>
                                Pembelian
                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="https://pintex.co.id/apps/HR/Recruitment"><i
                                                class="fa-solid fa-basket-shopping"></i> Pengadaan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#"><i
                                                class="fa-regular fa-paste"></i> Pembelian</a></li>
                                </ol>
                            </div>
                        </div>
                        {{-- <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <div class="mb-3">
                                    <div class="row g-2">
                                        <div class="col-auto">
                                            <select class="form-select" id="filterDropdown" name="tipe">
                                                <option value="Permintaan">Permintaan</option>
                                                <option value="Servis">Servis</option>
                                                <option value="Retur">Retur</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck">
                        <div class="col-md-12">
                            <div class="card transparent-card">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                        <li class="nav-item">
                                            <a href="#tabs-qty-persetujuan" class="nav-link" data-bs-toggle="tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-transaction-euro">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M21 12.8c-.523 -.502 -1.172 -.8 -1.875 -.8c-1.727 0 -3.125 1.791 -3.125 4s1.398 4 3.125 4c.703 0 1.352 -.298 1.874 -.8" />
                                                    <path d="M15 16h4" />
                                                    <path d="M5 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                    <path d="M17 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                    <path d="M7 5h8" />
                                                    <path d="M7 5v8a3 3 0 0 0 3 3h1" />
                                                </svg>
                                                Detail Pembelian
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-persetujuan" class="nav-link active" data-bs-toggle="tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-credit-card-pay">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12 19h-6a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5" />
                                                    <path d="M3 10h18" />
                                                    <path d="M16 19h6" />
                                                    <path d="M19 16l3 3l-3 3" />
                                                    <path d="M7.005 15h.005" />
                                                    <path d="M11 15h2" />
                                                </svg>
                                                List Pembelian
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-list-reject" class="nav-link" data-bs-toggle="tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-navigation-check">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M17.487 14.894l-5.487 -11.894l-7.97 17.275c-.07 .2 -.017 .424 .135 .572c.15 .148 .374 .193 .57 .116l6.275 -2.127" />
                                                    <path d="M15 19l2 2l4 -4" />
                                                </svg>
                                                Form Checklist Pembelian
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-list-hold" class="nav-link" data-bs-toggle="tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-list-details">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M13 5h8" />
                                                    <path d="M13 9h5" />
                                                    <path d="M13 15h8" />
                                                    <path d="M13 19h5" />
                                                    <path
                                                        d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                                    <path
                                                        d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                                </svg>
                                                Form Checklist Servis
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane" id="tabs-qty-persetujuan">
                                            <div class="card card-xl shadow rounded border border-blue">
                                                <div class="table-responsive">
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
                                                                    <input type="date" id="idfilter_dari"
                                                                        class="form-control "
                                                                        value="{{ date('Y-m-01') }}">
                                                                </td>
                                                                <td>
                                                                    <input type="date" id="idfilter_sampai"
                                                                        class="form-control " value="{{ date('Y-m-d') }}">
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="btn btn-primary btn-icon"
                                                                        aria-label="Button">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path
                                                                                d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                            <path d="M21 21l-6 -6" />
                                                                        </svg>
                                                                    </a>
                                                                    <input class="btn btn-primary" type="reset"
                                                                        value="Reset">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="table-responsive">
                                                    <table style="width:100%; height: 100%;font-size:13px;"
                                                        class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-detail-pembelian">
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane active show" id="tabs-persetujuan">
                                            <div class="card card-xl shadow rounded border border-blue">
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Tgl Awal</th>
                                                                <th class="text-center">Tgl Akhir</th>
                                                                <th class="text-center"></th>
                                                                <th class="text-center"></th>
                                                                <th class="text-center"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="date" id="idfilter_dari"
                                                                        class="form-control "
                                                                        value="{{ date('Y-m-01') }}">
                                                                </td>
                                                                <td>
                                                                    <input type="date" id="idfilter_sampai"
                                                                        class="form-control " value="{{ date('Y-m-d') }}">
                                                                </td>
                                                                <td>
                                                                    <select class="form-select">
                                                                        <option value="all">Semua Person</option>
                                                                        <option value="Unit1">Unit 1</option>
                                                                        <option value="Unit2">Unit 2</option>
                                                                        <option value="TFO">TFO</option>
                                                                        <option value="TFI">TFI</option>
                                                                        <option value="UMUM">UMUM</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-select">
                                                                        <option value="all">Semua Unit</option>
                                                                        <option value="Unit1">Unit 1</option>
                                                                        <option value="Unit2">Unit 2</option>
                                                                        <option value="TFO">TFO</option>
                                                                        <option value="TFI">TFI</option>
                                                                        <option value="UMUM">UMUM</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="btn btn-primary btn-icon"
                                                                        aria-label="Button">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path
                                                                                d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                            <path d="M21 21l-6 -6" />
                                                                        </svg>
                                                                    </a>
                                                                    <input class="btn btn-primary" type="reset"
                                                                        value="Reset">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="table-responsive">
                                                    <table style="width:100%; height: 100%;font-size:13px;"
                                                        class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-list-pembelian">
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabs-list-reject">
                                            <div class="card card-xl shadow rounded border border-blue">
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Tgl Awal</th>
                                                                <th class="text-center">Tgl Akhir</th>
                                                                <th class="text-center"></th>
                                                                <th class="text-center"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="date" id="idfilter_dari"
                                                                        class="form-control "
                                                                        value="{{ date('Y-m-01') }}">
                                                                </td>
                                                                <td>
                                                                    <input type="date" id="idfilter_sampai"
                                                                        class="form-control " value="{{ date('Y-m-d') }}">
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="btn btn-primary btn-icon"
                                                                        aria-label="Button">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path
                                                                                d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                            <path d="M21 21l-6 -6" />
                                                                        </svg>
                                                                    </a>
                                                                    <input class="btn btn-primary" type="reset"
                                                                        value="Reset">
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="table-responsive">
                                                    <table style="width:100%; height: 100%;font-size:13px;"
                                                        class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-checklist-pembelian">
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabs-list-hold">
                                            <div class="card card-xl shadow rounded border border-blue">
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Tgl Awal</th>
                                                                <th class="text-center">Tgl Akhir</th>
                                                                <th class="text-center"></th>
                                                                <th class="text-center"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="date" id="idfilter_dari"
                                                                        class="form-control "
                                                                        value="{{ date('Y-m-01') }}">
                                                                </td>
                                                                <td>
                                                                    <input type="date" id="idfilter_sampai"
                                                                        class="form-control " value="{{ date('Y-m-d') }}">
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="btn btn-primary btn-icon"
                                                                        aria-label="Button">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path
                                                                                d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                            <path d="M21 21l-6 -6" />
                                                                        </svg>
                                                                    </a>
                                                                    <input class="btn btn-primary" type="reset"
                                                                        value="Reset">
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="table-responsive">
                                                    <table style="width:100%; height: 100%;font-size:13px;"
                                                        class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-checklist-servis">
                                                    </table>
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

        $(document).ready(function() {
            var tableDetailPembelian = $('.datatable-detail-pembelian').DataTable({
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
                // "ajax": {
                //     "url": "#",
                //     "data": function(data) {
                //         data._token = "{{ csrf_token() }}";
                //         data.dari = $('#idfilter_dari').val();
                //         data.sampai = $('#idfilter_sampai').val();
                //     }
                // },
                "columns": [{
                        title: '',
                        data: 'action',
                        name: 'action',
                        className: "cuspad0 cuspad1",
                    },
                    {
                        title: 'TANGGAL',
                        data: 'tgl',
                        name: 'tgl',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'NO FAKTUR',
                        data: 'kodeseri',
                        name: 'kodeseri',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'SUPPLIER',
                        data: 'noform',
                        name: 'noform',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'SUBTOTAL',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 text-center clickable"
                    },
                    {
                        title: 'DISKON',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable"
                    },
                ],

            });
        });

        //----------------------------------------------LIST PEMBLIAN-----------------------------------------//
        $(document).ready(function() {
            var tableDetailPembelian = $('.datatable-list-pembelian').DataTable({
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
                // "ajax": {
                //     "url": "#",
                //     "data": function(data) {
                //         data._token = "{{ csrf_token() }}";
                //         data.dari = $('#idfilter_dari').val();
                //         data.sampai = $('#idfilter_sampai').val();
                //     }
                // },
                "columns": [{
                        title: 'TANGGAL',
                        data: 'tgl',
                        name: 'tgl',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'NO FAKTUR',
                        data: 'kodeseri',
                        name: 'kodeseri',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'KODESERI',
                        data: 'noform',
                        name: 'noform',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'BARANG',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 text-center clickable"
                    },
                    {
                        title: 'QTY',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'HARGA',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'TOTAL',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'DESKRIPSI',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'SUPLIER',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable"
                    },
                ],

            });
        });

        //---------------------------------------------CHECKLIST PEMBELIAN-----------------------------------//
        $(document).ready(function() {
            var tablePermintaan = $('.datatable-checklist-pembelian').DataTable({
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
                    "className": 'btn btn-success',
                    "text": '<i class="fa-solid fa-file-circle-check"></i> Lanjut Proses Pembelian',
                    "action": function(e, node, config) {
                        $('#myModalAccQty').modal('show')
                    }
                }],
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
                    "url": "{{ route('getPermintaan.index') }}",
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
                        render: function(data, type, row) {
                            return `<input type="checkbox" name="checkbox[]" value="${row.id}">`;
                        }
                    },
                    {
                        title: 'TGL PERMINTAAN',
                        data: 'tgl',
                        name: 'tgl',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'KODESERI',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 text-center clickable"
                    },
                    {
                        title: 'NOFORM',
                        data: 'mesin',
                        name: 'mesin',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'BARANG',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'DESKRIPSI',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'QTY MINTA',
                        data: 'satuan',
                        name: 'satuan',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'SATUAN',
                        data: 'pemesan',
                        name: 'pemesan',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'PEMESAN',
                        data: 'unit',
                        name: 'unit',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'UNIT/MESIN',
                        data: 'unit',
                        name: 'unit',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                ],
                columnDefs: [{
                    orderable: false,
                    targets: 0
                }],
            });

            $('#filter_id').on('click change', function() {
                tablePermintaan.ajax.reload(null, false);
            });
        });

        //--------------------------------------------CHECKLIST SERVIS-------------------------------------//
        $(document).ready(function() {
            var tablePermintaan = $('.datatable-checklist-servis').DataTable({
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
                    "className": 'btn btn-success',
                    "text": '<i class="fa-solid fa-file-circle-check"></i> Lanjut Proses Pembayaran',
                    "action": function(e, node, config) {
                        $('#myModalAccQty').modal('show')
                    }
                }],
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
                    "url": "{{ route('getPermintaan.index') }}",
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
                        render: function(data, type, row) {
                            return `<input type="checkbox" name="checkbox[]" value="${row.id}">`;
                        }
                    },
                    {
                        title: 'TGL PERMINTAAN',
                        data: 'tgl',
                        name: 'tgl',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'KODESERI',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 text-center clickable"
                    },
                    {
                        title: 'NOFORM',
                        data: 'mesin',
                        name: 'mesin',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'BARANG',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'DESKRIPSI',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'QTY MINTA',
                        data: 'satuan',
                        name: 'satuan',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'SATUAN',
                        data: 'pemesan',
                        name: 'pemesan',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'PEMESAN',
                        data: 'unit',
                        name: 'unit',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'UNIT/MESIN',
                        data: 'unit',
                        name: 'unit',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                ],
                columnDefs: [{
                    orderable: false,
                    targets: 0
                }],
            });

            $('#filter_id').on('click change', function() {
                tablePermintaan.ajax.reload(null, false);
            });
        });
    </script>
@endsection
