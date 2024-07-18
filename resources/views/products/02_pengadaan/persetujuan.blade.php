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
                                    class="icon icon-tabler icon-tabler-heart-handshake" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    <path
                                        d="M12 6l-3.293 3.293a1 1 0 0 0 0 1.414l.543 .543c.69 .69 1.81 .69 2.5 0l1 -1a3.182 3.182 0 0 1 4.5 0l2.25 2.25" />
                                    <path d="M12.5 15.5l2 2" />
                                    <path d="M15 13l2 2" />
                                </svg>
                                Persetujuan
                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="https://pintex.co.id/apps/HR/Recruitment"><i
                                                class="fa-solid fa-basket-shopping"></i> Pengadaan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#"><i
                                                class="fa-regular fa-paste"></i> Persetujuan</a></li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-auto ms-auto d-print-none">
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
                        </div>
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
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-file-symlink">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 21v-4a3 3 0 0 1 3 -3h5" />
                                                    <path d="M9 17l3 -3l-3 -3" />
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                    <path d="M5 11v-6a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-9.5" />
                                                </svg>
                                                Proses QTY Persetujuan
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-persetujuan" class="nav-link active" data-bs-toggle="tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-hand-click">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5" />
                                                    <path d="M11 11.5v-2a1.5 1.5 0 0 1 3 0v2.5" />
                                                    <path d="M14 10.5a1.5 1.5 0 0 1 3 0v1.5" />
                                                    <path
                                                        d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7l-.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" />
                                                    <path d="M5 3l-1 -1" />
                                                    <path d="M4 7h-1" />
                                                    <path d="M14 3l1 -1" />
                                                    <path d="M15 6h1" />
                                                </svg>
                                                Proses Persetujuan
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-list-reject" class="nav-link" data-bs-toggle="tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-ban">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                    <path d="M5.7 5.7l12.6 12.6" />
                                                </svg>
                                                Item List Reject
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-list-hold" class="nav-link" data-bs-toggle="tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-placeholder">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M10 20.415a8 8 0 1 0 3 -15.415h-3" />
                                                    <path d="M13 8l-3 -3l3 -3" />
                                                    <path d="M7 17l4 -4l-4 -4l-4 4z" />
                                                </svg>
                                                Item List Hold
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
                                                        class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-qty-persetujuan">
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
                                                                <th class="text-black">Form Persetujuan Pak Alvin / Pak
                                                                    Brian</th>
                                                                <th class="text-center"></th>
                                                                <th class="text-center"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
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
                                                        class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-persetujuan">
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
                                                                <th class="text-black">Data Barang Yang Tidak Di ACC
                                                                    (Reject)</th>
                                                                <th class="text-center"></th>
                                                                <th class="text-center"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="table-responsive">
                                                    <table style="width:100%; height: 100%;font-size:13px;"
                                                        class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-reject">
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
                                                                <th class="text-black">Data Barang Yang Di Hold</th>
                                                                <th class="text-center"></th>
                                                                <th class="text-center"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="table-responsive">
                                                    <table style="width:100%; height: 100%;font-size:13px;"
                                                        class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-hold">
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
            var tablePermintaan = $('.datatable-qty-persetujuan').DataTable({
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
                    "text": '<i class="fa-solid fa-file-circle-check"></i> Proses Penentuan Qty',
                    "action": function(e, node, config) {
                        $('#myModalAccQty').modal('show')
                    }
                }, ],
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
                        title: 'Tgl Permintaan',
                        data: 'tgl',
                        name: 'tgl',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'Kodeseri',
                        data: 'kodeseri',
                        name: 'kodeseri',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'Noform',
                        data: 'noform',
                        name: 'noform',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'Barang',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 text-center clickable"
                    },
                    {
                        title: 'QTY Minta',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'Satuan',
                        data: 'satuan',
                        name: 'satuan',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'Pemesan',
                        data: 'pemesan',
                        name: 'pemesan',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'Unit/Mesin',
                        data: 'mesin',
                        name: 'mesin',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                ],

            });
        });

        //---------------PERSETUJUAN----------------------------------//
        $(document).ready(function() {
            var tablePermintaan = $('.datatable-persetujuan').DataTable({
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
                    "className": 'btn btn-info',
                    "text": '<i class="fa-solid fa-file-circle-check"></i> Proses Data',
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
                        title: 'BARANG',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 text-center clickable"
                    },
                    {
                        title: 'MESIN',
                        data: 'mesin',
                        name: 'mesin',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'DESKRIPSI',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'QTY MINTA',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'SATUAN',
                        data: 'satuan',
                        name: 'satuan',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'PEMESAN',
                        data: 'pemesan',
                        name: 'pemesan',
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

        //---------------REJECT----------------------------------------//
        $(document).ready(function() {
            var tablePermintaan = $('.datatable-reject').DataTable({
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
                    "className": 'btn btn-danger',
                    "text": '<i class="fa-solid fa-file-circle-check"></i> Ubah Data',
                    "action": function(e, node, config) {
                        $('#myModalAccQty').modal('show')
                    }
                }, ],
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
                        data: 'kodeseri',
                        name: 'kodeseri',
                        className: "cuspad0 text-center clickable"
                    },
                    {
                        title: 'NOFORM',
                        data: 'noform',
                        name: 'noform',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'BARANG',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'QTY MINTA',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'SATUAN',
                        data: 'satuan',
                        name: 'satuan',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'PEMESAN',
                        data: 'pemesan',
                        name: 'pemesan',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'UNIT/MESIN',
                        data: 'unit',
                        name: 'unit',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'KETERANGAN REJECT',
                        data: 'keteranganACC',
                        name: 'keteranganACC',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                ],
            });

            $('#filter_id').on('click change', function() {
                tablePermintaan.ajax.reload(null, false);
            });
        });


        //---------------HOLD-----------------------------------------//
        $(document).ready(function() {
            var tablePermintaan = $('.datatable-hold').DataTable({
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
                    "className": 'btn btn-info',
                    "text": '<i class="fa-solid fa-file-circle-check"></i> Ubah Data',
                    "action": function(e, node, config) {
                        $('#myModalAccQty').modal('show')
                    }
                }, ],
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
                        data: 'kodeseri',
                        name: 'kodeseri',
                        className: "cuspad0 text-center clickable"
                    },
                    {
                        title: 'NOFORM',
                        data: 'noform',
                        name: 'noform',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'BARANG',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'QTY MINTA',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'SATUAN',
                        data: 'satuan',
                        name: 'satuan',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'PEMESAN',
                        data: 'pemesan',
                        name: 'pemesan',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'UNIT/MESIN',
                        data: 'unit',
                        name: 'unit',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'KETERANGAN REJECT',
                        data: 'keteranganACC',
                        name: 'keteranganACC',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                ],

            });
        });
    </script>
@endsection
