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
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-return"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v6h-5l2 2m0 -4l-2 2" />
                                    <path d="M9 17l6 0" />
                                    <path d="M13 6h5l3 5v6h-2" />
                                </svg>
                                Penerimaan
                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="https://pintex.co.id/apps/HR/Recruitment"><i
                                                class="fa-solid fa-basket-shopping"></i> Gudang</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">
                                            <i class="fa-solid fa-truck-arrow-right"></i> Penerimaan</a></li>
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
                            <div class="card transparent-card card-xl shadow rounded border border-blue">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                        <li class="nav-item">
                                            <a href="#tabs-pertama" class="nav-link active" data-bs-toggle="tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    style="margin-right:5px" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-list-check">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3.5 5.5l1.5 1.5l2.5 -2.5" />
                                                    <path d="M3.5 11.5l1.5 1.5l2.5 -2.5" />
                                                    <path d="M3.5 17.5l1.5 1.5l2.5 -2.5" />
                                                    <path d="M11 6l9 0" />
                                                    <path d="M11 12l9 0" />
                                                    <path d="M11 18l9 0" />
                                                </svg>
                                                List
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-kedua" class="nav-link" data-bs-toggle="tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    style="margin-right:5px" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-package-import">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5" />
                                                    <path d="M12 12l8 -4.5" />
                                                    <path d="M12 12v9" />
                                                    <path d="M12 12l-8 -4.5" />
                                                    <path d="M22 18h-7" />
                                                    <path d="M18 15l-3 3l3 3" />
                                                </svg>
                                                Penerimaan
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-ketiga" class="nav-link" data-bs-toggle="tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    style="margin-right:5px" viewBox="0 0 24 24" fill="currentColor"
                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-star-half">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z" />
                                                </svg>
                                                Partial
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tabs-pertama">
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
                                                                <input type="date" id="listpermintaan_dari"
                                                                    class="form-control " value="{{ date('Y-m-01') }}">
                                                            </td>
                                                            <td>
                                                                <input type="date" id="listpermintaan_sampai"
                                                                    class="form-control " value="{{ date('Y-m-d') }}">
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-primary btn-icon" type="button"
                                                                    onclick="synList()">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                        <path d="M21 21l-6 -6" />
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table style="width:100%; height: 100%;font-size:13px;"
                                                    class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-list-penerimaan">
                                                    <tfoot>
                                                        <tr>
                                                            <th class="px-1 py-1 text-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                    <path d="M21 21l-6 -6" />
                                                                </svg>
                                                            </th>
                                                            <th class="px-1 th py-1">tgl</th>
                                                            <th class="px-1 th py-1">kodeseri</th>
                                                            <th class="px-1 th py-1">barang</th>
                                                            <th class="px-1 th py-1">deskripsi</th>
                                                            <th class="px-1 th py-1">katalog</th>
                                                            <th class="px-1 th py-1">part</th>
                                                            <th class="px-1 th py-1">supplier</th>
                                                            <th class="px-1 th py-1">unit</th>
                                                            <th class="px-1 th py-1">mesin</th>
                                                            <th class="px-1 th py-1">qty</th>
                                                            <th class="px-1 th py-1">qty_terima</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-kedua">
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
                                                                <input type="date" id="checkpermintaan_dari"
                                                                    onchange="" class="form-control "
                                                                    value="{{ date('Y-m-01') }}">
                                                            </td>
                                                            <td>
                                                                <input type="date" id="checkpermintaan_sampai"
                                                                    onchange="synCheck()" class="form-control "
                                                                    value="{{ date('Y-m-d') }}">
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-primary btn-icon"
                                                                    onclick="synCheck()" type="button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                        <path d="M21 21l-6 -6" />
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table style="width:100%; height: 100%;font-size:13px;"
                                                    class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-checklist-penerimaan">
                                                    <tfoot>
                                                        <tr>
                                                            <th class="px-1 py-1 text-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                    <path d="M21 21l-6 -6" />
                                                                </svg>
                                                            </th>
                                                            <th class="px-1 th py-1">tgl</th>
                                                            <th class="px-1 th py-1">kodeseri</th>
                                                            <th class="px-1 th py-1">barang</th>
                                                            <th class="px-1 th py-1">deskripsi</th>
                                                            <th class="px-1 th py-1">katalog</th>
                                                            <th class="px-1 th py-1">part</th>
                                                            <th class="px-1 th py-1">supplier</th>
                                                            <th class="px-1 th py-1">unit</th>
                                                            <th class="px-1 th py-1">mesin</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-ketiga">
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
                                                                <input type="date" id="idfilter_dari_partial"
                                                                    class="form-control " value="{{ date('Y-m-01') }}">
                                                            </td>
                                                            <td>
                                                                <input type="date" id="idfilter_sampai_partial"
                                                                    class="form-control " value="{{ date('Y-m-d') }}">
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-primary btn-icon"
                                                                    onclick="synPartial()" type="button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                        <path d="M21 21l-6 -6" />
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table style="width:100%; height: 100%;font-size:13px;"
                                                    class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-partial-penerimaan">
                                                    <tfoot>
                                                        <tr>
                                                            <th class="px-1 py-1 text-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                    <path d="M21 21l-6 -6" />
                                                                </svg>
                                                            </th>
                                                            <th class="px-1 th py-1">tgl</th>
                                                            <th class="px-1 th py-1">kodeseri</th>
                                                            <th class="px-1 th py-1">barang</th>
                                                            <th class="px-1 th py-1">qty</th>
                                                            <th class="px-1 th py-1">deskripsi</th>
                                                            <th class="px-1 th py-1">katalog</th>
                                                            <th class="px-1 th py-1">part</th>
                                                            <th class="px-1 th py-1">supplier</th>
                                                            <th class="px-1 th py-1">unit</th>
                                                            <th class="px-1 th py-1">mesin</th>
                                                        </tr>
                                                    </tfoot>
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
            @include('shared.footer')
        </div>
    </div>
    {{-- Modal Start --}}
    <style>
        .overlay {
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height: 100%;
            display: none;
            background: rgba(0, 0, 0, 0.6);
        }

        .cv-spinner {
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
        }
    </style>
    <div class="modal modal-blur fade" id="modalPenerimaan" tabindex="-1" role="dialog" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel">
        <div class="overlay">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form id="formPenerimaan" name="formPenerimaan" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fa-solid fa-user-check" style="margin-right: 5px"></i>
                            Proses Penerimaan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data-penerimaan"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-blue" id="submitCheck"><i class="fas fa-save"
                                style="margin-right: 5px"></i> Proses</button>
                        <button type="button" class="btn btn-link link-secondary ms-auto" data-bs-dismiss="modal"><i
                                class="fa-solid fa-fw fa-arrow-rotate-left"></i> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modalPartial" tabindex="-1" role="dialog" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel">
        <div class="overlay">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form id="formPartial" name="formPartial" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fa-solid fa-user-check" style="margin-right: 5px"></i>
                            Proses Penerimaan Partial
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data-partial"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-blue" id="submitPartial"><i class="fas fa-save"
                                style="margin-right: 5px"></i> Proses</button>
                        <button type="button" class="btn btn-link link-secondary ms-auto" data-bs-dismiss="modal"><i
                                class="fa-solid fa-fw fa-arrow-rotate-left"></i> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal End --}}

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

        var tableListPenerimaan, tableChecklistPenerimaan, tablePartial;

        function synCheck() {
            tableChecklistPenerimaan.ajax.reload();
        }

        function synList() {
            tableListPenerimaan.ajax.reload();
        }

        function synPartial() {
            tablePartial.ajax.reload();
        }
        $(function() {
            //----------------------------------------------LIST PENERIMAAN-----------------------------------------//
            tableListPenerimaan = $('.datatable-list-penerimaan').DataTable({
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
                        // action: newexportaction,
                    },
                    {
                        extend: 'excelHtml5',
                        autoFilter: true,
                        className: 'btn btn-success',
                        text: '<i class="fa fa-file-excel text-white"></i> Excel',
                        // action: newexportaction,
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
                    "url": "{{ route('tbPenerimaan.index') }}",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.tipe = 'qtyacc';
                        data.dari = $('#listpermintaan_dari').val();
                        data.sampai = $('#listpermintaan_sampai').val();
                    }
                },
                "columns": [{
                        title: '',
                        data: 'action',
                        name: 'action',
                        className: "cuspad0 cuspad1",
                    },
                    {
                        title: 'Tgl Penerimaan',
                        data: 'tgl',
                        name: 'tgl',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'KODESERI',
                        data: 'kodeseri',
                        name: 'kodeseri',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'BARANG',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'Deskripsi',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 text-center clickable"
                    },
                    {
                        title: 'Katalog',
                        data: 'katalog',
                        name: 'katalog',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'Part',
                        data: 'part',
                        name: 'part',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'Supplier',
                        data: 'supplier',
                        name: 'supplier',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'Unit',
                        data: 'unit',
                        name: 'unit',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'Mesin',
                        data: 'mesin',
                        name: 'mesin',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'Qty Beli',
                        data: 'qty_beli',
                        name: 'qty_beli',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'Qty Terima',
                        data: 'qty_diterima',
                        name: 'qty_diterima',
                        className: "cuspad0 cuspad1 clickable"
                    },
                ],
                "initComplete": function() {
                    this.api()
                        .columns()
                        .every(function() {
                            var that = this;
                            $('input', this.footer()).on('keyup change clear', function() {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                }
            });
            $('.datatable-list-penerimaan tfoot .th').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm my-0 border border-dark" placeholder="' +
                    $(this).text().toUpperCase() + '" />'
                );
            });
            //----------------------------------------------CHECKLLIS PENERIMAAN-----------------------------------------//
            tableChecklistPenerimaan = $('.datatable-checklist-penerimaan').DataTable({
                "processing": true,
                "serverSide": false,
                "scrollX": false,
                "scrollCollapse": false,
                "pagingType": 'full_numbers',
                "dom": "<'card-header h3' B>" +
                    "<'card-body border-bottom py-3' <'row'<'col-sm-6'l><'col-sm-6'f>> >" +
                    "<'table-responsive' <'col-sm-12'tr> >" +
                    "<'card-footer' <'row'<'col-sm-8'i><'col-sm-4'p> >>",
                "lengthMenu": [
                    [10, 10, 25, 50, -1],
                    ['Default', '10', '25', '50', 'Semua']
                ],
                "buttons": [{
                    "className": 'btn btn-blue',
                    "text": '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-checkbox"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l3 3l8 -8" /><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg> Proses Penerimaan',
                    "action": function(e, node, config) {
                        $('#modalPenerimaan').modal('show')
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
                    "select": {
                        rows: {
                            _: "%d item dipilih ",
                            0: "Pilih item dan tekan tombol Proses data untuk memproses Penerimaan Barang",
                        }
                    },
                },
                "ajax": {
                    "type": "POST",
                    "url": "{{ url('getPenerimaanCheck') }}",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.dari = $('#checkpermintaan_dari').val();
                        data.sampai = $('#checkpermintaan_sampai').val();
                    }
                },
                select: {
                    'style': 'multi',
                    // "selector": 'td:not(:nth-child(2))',
                },
                columnDefs: [{
                    'targets': 0,
                    "orderable": false,
                    'className': 'select-checkbox cursor-pointer',
                    'checkboxes': {
                        'selectRow': true
                    },
                }],
                "columns": [{
                        data: 'select_orders',
                        name: 'select_orders',
                        className: 'cuspad2 cursor-pointer',
                        orderable: true,
                        searchable: false
                    },
                    {
                        title: 'Tgl Pembelian',
                        data: 'tgl_pembelian',
                        name: 'tgl_pembelian',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'KODESERI',
                        data: 'kodeseri',
                        name: 'kodeseri',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'BARANG',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Deskripsi',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Katalog',
                        data: 'katalog',
                        name: 'katalog',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Part',
                        data: 'part',
                        name: 'part',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Supplier',
                        data: 'supplier',
                        name: 'supplier',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Unit',
                        data: 'unit',
                        name: 'unit',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Mesin',
                        data: 'mesin',
                        name: 'mesin',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                ],
                "initComplete": function() {
                    this.api()
                        .columns()
                        .every(function() {
                            var that = this;
                            $('input', this.footer()).on('keyup change clear', function() {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                }
            });
            $('.datatable-checklist-penerimaan tfoot .th').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm my-0 border border-dark" placeholder="' +
                    $(this).text().toUpperCase() + '" />'
                );
            });
            //---------------------------------------------PARSIAL PENERIMAAN-----------------------------------//
            tablePartial = $('.datatable-partial-penerimaan').DataTable({
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
                    "text": '<i class="fa-solid fa-file-circle-check"></i> Proses Penerimaan',
                    "action": function(e, node, config) {
                        $('#modalPartial').modal('show')
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
                    "select": {
                        rows: {
                            _: "%d item dipilih ",
                            0: "Pilih item dan tekan tombol Proses data untuk memproses Penerimaan Barang",
                        }
                    },
                },
                "ajax": {
                    "type": "POST",
                    "url": "{{ route('getPartial') }}",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.dari = $('#idfilter_dari_partial').val();
                        data.sampai = $('#idfilter_sampai_partial').val();
                    }
                },
                select: {
                    'style': 'multi',
                },
                columnDefs: [{
                    'targets': 0,
                    "orderable": false,
                    'className': 'select-checkbox cursor-pointer',
                    'checkboxes': {
                        'selectRow': true
                    },
                }],
                "columns": [{
                        data: 'select_orders',
                        name: 'select_orders',
                        className: 'cuspad2 cursor-pointer',
                        orderable: true,
                        searchable: false
                    },
                    {
                        title: 'Tgl Pembelian',
                        data: 'tgl_pembelian',
                        name: 'tgl_pembelian',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'KODESERI',
                        data: 'kodeseri',
                        name: 'kodeseri',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'BARANG',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Qty Partial',
                        data: 'qty_partial',
                        name: 'qty_partial',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Deskripsi',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Katalog',
                        data: 'katalog',
                        name: 'katalog',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Part',
                        data: 'part',
                        name: 'part',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Supplier',
                        data: 'supplier',
                        name: 'supplier',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Unit',
                        data: 'unit',
                        name: 'unit',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Mesin',
                        data: 'mesin',
                        name: 'mesin',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                ],
                "initComplete": function() {
                    this.api()
                        .columns()
                        .every(function() {
                            var that = this;
                            $('input', this.footer()).on('keyup change clear', function() {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                }
            });
            $('.datatable-partial-penerimaan tfoot .th').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm my-0 border border-dark" placeholder="' +
                    $(this).text().toUpperCase() + '" />'
                );
            });

            if ($("#formPenerimaan").length > 0) {
                $("#formPenerimaan").validate({
                    submitHandler: function(form) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $('#submitCheck').html(
                            '<i class="fa-solid fa-fw fa-spinner fa-spin"></i> Please Wait...');
                        $("#submitCheck").attr("disabled", true);
                        $.ajax({
                            url: "{{ url('storePenerimaan') }}",
                            type: "POST",
                            data: $('#formPenerimaan').serialize(),
                            beforeSend: function() {
                                console.log($('#formPenerimaan').serialize());
                                Swal.fire({
                                    title: 'Mohon Menunggu',
                                    html: '<center><lottie-player src="https://lottie.host/9f0e9407-ad00-4a21-a698-e19bed2949f6/mM7VH432d9.json"  background="transparent"  speed="1"  style="width: 250px; height: 250px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Sedang memproses data, Proses mungkin membutuhkan beberapa menit.</h1>',
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                })
                            },
                            success: function(response) {
                                console.log('Completed.');
                                $('#submitCheck').html(
                                    '<i class="fas fa-save" style="margin-right: 5px"></i> Proses'
                                );
                                $("#submitCheck").attr("disabled", false);
                                tableListPenerimaan.ajax.reload();
                                tableChecklistPenerimaan.ajax.reload();
                                tablePartial.ajax.reload();
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
                                $('#modalPenerimaan').modal('hide');
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                tableListPenerimaan.ajax.reload();
                                tableChecklistPenerimaan.ajax.reload();
                                tablePartial.ajax.reload();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Input',
                                    html: data.responseJSON.message,
                                    showConfirmButton: true
                                });
                                $('#submitCheck').html(
                                    '<i class="fas fa-save" style="margin-right: 5px"></i> Proses'
                                );
                                $("#submitCheck").attr("disabled", false);
                            }
                        });
                    }
                })
            }

            if ($("#formPartial").length > 0) {
                $("#formPartial").validate({
                    submitHandler: function(form) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $('#submitPartial').html(
                            '<i class="fa-solid fa-fw fa-spinner fa-spin"></i> Please Wait...');
                        $("#submitPartial").attr("disabled", true);
                        $.ajax({
                            url: "{{ url('storePartial') }}",
                            type: "POST",
                            data: $('#formPartial').serialize(),
                            beforeSend: function() {
                                console.log($('#formPartial').serialize());
                                Swal.fire({
                                    title: 'Mohon Menunggu',
                                    html: '<center><lottie-player src="https://lottie.host/9f0e9407-ad00-4a21-a698-e19bed2949f6/mM7VH432d9.json"  background="transparent"  speed="1"  style="width: 250px; height: 250px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Sedang memproses data, Proses mungkin membutuhkan beberapa menit.</h1>',
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                })
                            },
                            success: function(response) {
                                console.log('Completed.');
                                $('#submitPartial').html(
                                    '<i class="fas fa-save" style="margin-right: 5px"></i> Proses'
                                );
                                $("#submitPartial").attr("disabled", false);
                                tableListPenerimaan.ajax.reload();
                                tableChecklistPenerimaan.ajax.reload();
                                tablePartial.ajax.reload();
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
                                $('#modalPartial').modal('hide');
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                tableListPenerimaan.ajax.reload();
                                tableChecklistPenerimaan.ajax.reload();
                                tablePartial.ajax.reload();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Input',
                                    html: data.responseJSON.message,
                                    showConfirmButton: true
                                });
                                $('#submitPartial').html(
                                    '<i class="fas fa-save" style="margin-right: 5px"></i> Proses'
                                );
                                $("#submitPartial").attr("disabled", false);
                            }
                        });
                    }
                })
            }

            $('#filter_id').on('click change', function() {
                tablePermintaan.ajax.reload(null, false);
            });

            // MODAL ---------------------------------------------------------//
            $('#modalPenerimaan').on('show.bs.modal', function(e) {
                $(".overlay").fadeIn(300);
                itemTables = [];
                // console.log(count);

                $.each(tableChecklistPenerimaan.rows('.selected').nodes(), function(index, rowId) {
                    var rows_selected = tableChecklistPenerimaan.rows('.selected').data();
                    itemTables.push(rows_selected[index]['id']);
                });
                console.log("Selected Items: " + itemTables);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'POST',
                    url: '{{ url('checkPenerimaan') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: itemTables,
                        jml: itemTables.length,
                    },
                    success: function(data) {
                        //menampilkan data ke dalam modal
                        $('.fetched-data-penerimaan').html(data);
                        // alert(itemTables);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $(".overlay").fadeOut(300);
                    }, 500);
                });
            });
            $('#modalPartial').on('show.bs.modal', function(e) {
                $(".overlay").fadeIn(300);
                itemTables = [];
                // console.log(count);

                $.each(tablePartial.rows('.selected').nodes(), function(index, rowId) {
                    var rows_selected = tablePartial.rows('.selected').data();
                    itemTables.push(rows_selected[index]['id']);
                });
                console.log("Selected Items: " + itemTables);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'POST',
                    url: '{{ url('checkPartial') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: itemTables,
                        jml: itemTables.length,
                    },
                    success: function(data) {
                        //menampilkan data ke dalam modal
                        $('.fetched-data-partial').html(data);
                        // alert(itemTables);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $(".overlay").fadeOut(300);
                    }, 500);
                });
            });
            // MODAL ---------------------------------------------------------//
        });
    </script>
@endsection
