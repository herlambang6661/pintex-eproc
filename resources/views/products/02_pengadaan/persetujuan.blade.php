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
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart-handshake"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                <ul class="nav">
                                    <button type="button" id="selectValue-PERMINTAAN" disabled
                                        onclick="changeSelectedValue('PERMINTAAN')"
                                        class="btn btn-outline-warning d-none d-sm-inline-block" style="margin-right: 10px">
                                        <i class="fa-solid fa-list-ul"></i>
                                        Permintaan
                                    </button>
                                    <button type="button" id="selectValue-SERVIS" onclick="changeSelectedValue('SERVIS')"
                                        class="btn btn-outline-warning d-none d-sm-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-tool">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6 -6a6 6 0 0 1 -8 -8l3.5 3.5" />
                                        </svg>
                                        Servis
                                    </button>
                                </ul>
                                <ul class="nav">
                                    <a href="#tabs-profile-8"
                                        class="active btn btn-icon btn-outline-danger d-sm-none d-sm-inline-block"
                                        data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"
                                        style="margin-right: 10px;">
                                        <i class="fa-solid fa-list-ul"></i>
                                    </a>
                                    <a href="#tabs-home-8"
                                        class="btn btn-icon btn-outline-danger d-sm-none d-sm-inline-block"
                                        data-bs-toggle="tab" aria-selected="true" role="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-tool">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6 -6a6 6 0 0 1 -8 -8l3.5 3.5" />
                                        </svg>
                                    </a>
                                </ul>
                                <input type="hidden" id="selectedValue" value="PERMINTAAN">
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
                                        {{-- TAB HEADER PROSES QTY PERSETUJUAN --}}
                                        <li class="nav-item">
                                            <a href="#tabs-qty-persetujuan" class="nav-link active" data-bs-toggle="tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-checklist">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8" />
                                                    <path d="M14 19l2 2l4 -4" />
                                                    <path d="M9 8h4" />
                                                    <path d="M9 12h2" />
                                                </svg>
                                                Proses QTY Persetujuan
                                            </a>
                                        </li>
                                        {{-- TAB HEADER PROSES PERSETUJUAN --}}
                                        <li class="nav-item">
                                            <a href="#tabs-persetujuan" class="nav-link" data-bs-toggle="tab">
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
                                        {{-- TAB HEADER REJECT --}}
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
                                        {{-- TAB HEADER HOLD --}}
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
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tabs-qty-persetujuan">
                                        <div class="card">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-dark">Penentuan Qty Acc Permintaan Item</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <div class="table-responsive">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="row g-2">
                                                                <div class="col">
                                                                    <input type="date" id="fqtydari"
                                                                        class="form-control border-primary"
                                                                        value="{{ date('Y-m-d', strtotime(date('Y-m-01') . '-1 month')) }}">
                                                                </div>
                                                                <div class="col">
                                                                    <input type="date" id="fqtysampai"
                                                                        class="form-control border-primary"
                                                                        value="{{ date('Y-m-d') }}">
                                                                </div>
                                                                <div class="col-auto">
                                                                    <a class="btn btn-primary" data-bs-toggle="offcanvas"
                                                                        href="#filterTableQtyPermintaan" role="button"
                                                                        aria-controls="filterTableQtyPermintaan">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-adjustments-alt">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path d="M4 8h4v4h-4z" />
                                                                            <path d="M6 4l0 4" />
                                                                            <path d="M6 12l0 8" />
                                                                            <path d="M10 14h4v4h-4z" />
                                                                            <path d="M12 4l0 10" />
                                                                            <path d="M12 18l0 2" />
                                                                            <path d="M16 5h4v4h-4z" />
                                                                            <path d="M18 4l0 1" />
                                                                            <path d="M18 9l0 11" />
                                                                        </svg>
                                                                        Saring Lanjutan
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table
                                                    style="width:100%; height: 100%;font-size:13px;text-transform: uppercase;"
                                                    class="table table-sm table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-qty-persetujuan">
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
                                                            <th class="px-1 th py-1">noform</th>
                                                            <th class="px-1 th py-1">barang</th>
                                                            <th class="px-1 th py-1">qty</th>
                                                            <th class="px-1 th py-1">satuan</th>
                                                            <th class="px-1 th py-1">pemesan</th>
                                                            <th class="px-1 th py-1">mesin</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-persetujuan">
                                        <div class="card">
                                            {{-- <div class="card card-xl shadow rounded border border-blue"> --}}
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-black">Formulir Persetujuan Pak Alvin / Pak
                                                                Brian / Pak Jesse</th>
                                                            <th class="text-center"></th>
                                                            <th class="text-center"></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            {{-- <div class="table-responsive"> --}}
                                            <table
                                                style="width:100%; height: 100%;font-size:13px;text-transform: uppercase;"
                                                class="table table-sm table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-persetujuan">
                                                <tfoot>
                                                    <tr>

                                                        <th class="px-1 py-1 text-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                <path d="M21 21l-6 -6" />
                                                            </svg>
                                                        </th>
                                                        <th class="px-1 th py-1">tgl</th>
                                                        <th class="px-1 th py-1">kodeseri</th>
                                                        <th class="px-1 th py-1">barang</th>
                                                        <th class="px-1 th py-1">keterangan</th>
                                                        <th class="px-1 th py-1">katalog</th>
                                                        <th class="px-1 th py-1">part</th>
                                                        <th class="px-1 th py-1">mesin</th>
                                                        <th class="px-1 th py-1">qty</th>
                                                        <th class="px-1 th py-1">satuan</th>
                                                        <th class="px-1 th py-1">pemesan</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            {{-- </div> --}}
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-list-reject">
                                        <div class="card">
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
                                                            <th class="px-1 th py-1">keterangan</th>
                                                            <th class="px-1 th py-1">katalog</th>
                                                            <th class="px-1 th py-1">part</th>
                                                            <th class="px-1 th py-1">qty</th>
                                                            <th class="px-1 th py-1">satuan</th>
                                                            <th class="px-1 th py-1">pemesan</th>
                                                            <th class="px-1 th py-1">ket_acc</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-list-hold">
                                        <div class="card">
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
                                                <table
                                                    style="width:100%; height: 100%;font-size:13px;text-transform: uppercase;"
                                                    class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-hold">
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
                                                            <th class="px-1 th py-1">keterangan</th>
                                                            <th class="px-1 th py-1">katalog</th>
                                                            <th class="px-1 th py-1">part</th>
                                                            <th class="px-1 th py-1">qty</th>
                                                            <th class="px-1 th py-1">satuan</th>
                                                            <th class="px-1 th py-1">pemesan</th>
                                                            <th class="px-1 th py-1">ket_acc</th>
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
    <div class="modal modal-blur fade" id="modalChecklistQty" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="overlay">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form id="formQtyACCPermintaan" name="formQtyACCPermintaan" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fa-solid fa-user-check" style="margin-right: 5px"></i>
                            Proses Qty Acc Permintaan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data-qtyacc-checklist"></div>
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
    <div class="modal modal-blur fade" id="modalAccept" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="overlay">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form id="formACCPermintaan" name="formACCPermintaan" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fa-solid fa-check" style="margin-right: 5px"></i>
                            Proses Acc Permintaan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data-acc-checklist"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-blue" id="submitAccept"><i class="fas fa-save"
                                style="margin-right: 5px"></i> Proses</button>
                        <button type="button" class="btn btn-link link-secondary ms-auto" data-bs-dismiss="modal"><i
                                class="fa-solid fa-fw fa-arrow-rotate-left"></i> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modalReject" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="overlay">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form id="formRejectPermintaan" name="formRejectPermintaan" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fa-solid fa-check" style="margin-right: 5px"></i>
                            Proses Acc Permintaan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data-reject-checklist"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-blue" id="submitAccept"><i class="fas fa-save"
                                style="margin-right: 5px"></i> Proses</button>
                        <button type="button" class="btn btn-link link-secondary ms-auto" data-bs-dismiss="modal"><i
                                class="fa-solid fa-fw fa-arrow-rotate-left"></i> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modalHold" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="overlay">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form id="formHoldPermintaan" name="formHoldPermintaan" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fa-solid fa-check" style="margin-right: 5px"></i>
                            Proses Acc Permintaan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data-hold-checklist"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-blue" id="submitAccept"><i class="fas fa-save"
                                style="margin-right: 5px"></i> Proses</button>
                        <button type="button" class="btn btn-link link-secondary ms-auto" data-bs-dismiss="modal"><i
                                class="fa-solid fa-fw fa-arrow-rotate-left"></i> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="filterTableQtyPermintaan"
        aria-labelledby="filterTableQtyPermintaan">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="filterTableQtyPermintaan">Saring Qty Acc</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <div class="card-stamp card-stamp-lg">
                    <div class="card-stamp-icon bg-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-adjustments-alt">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 8h4v4h-4z" />
                            <path d="M6 4l0 4" />
                            <path d="M6 12l0 8" />
                            <path d="M10 14h4v4h-4z" />
                            <path d="M12 4l0 10" />
                            <path d="M12 18l0 2" />
                            <path d="M16 5h4v4h-4z" />
                            <path d="M18 4l0 1" />
                            <path d="M18 9l0 11" />
                        </svg>
                    </div>
                </div>
                <form action="#" id="form-filter-items" method="get" autocomplete="off" novalidate=""
                    class="sticky-top">
                    <div class="form-label">Noform</div>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control border-primary"
                                    placeholder="Masukkan Nomor Formulir Permintaan">
                            </div>
                        </div>
                    </div>
                    <div class="form-label">Pemesan</div>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <select name="fbagian" id="fbagian" class="form-select border-primary">
                                    <option value="*">Semua</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-label">Unit</div>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <select name="fshift" id="fshift" class="form-select border-primary">
                                    <option value="*">Semua</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-label">Dibeli</div>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <select name="fgrup" id="fgrup" class="form-select border-primary">
                                    <option value="*">Semua</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-label">Status</div>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <select name="fgrup" id="fgrup" class="form-select border-primary">
                                    <option value="*">Semua</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="button" class="btn btn-primary w-100" onclick="syn();" id="btn-filter">Filter
                            Data</button> <br>
                        <input type="reset" class="btn btn-link w-100" value="Reset">
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
        var tablePermintaanQty, tablePermintaanAcc, tablePermintaanRjt, tablePermintaanHld;
        $(document).ready(function() {
            var selected = new Array();
            // TABLE ---------------------------------------------------------//
            //---------------QTY PERSETUJUAN----------------------------------//
            tablePermintaanQty = $('.datatable-qty-persetujuan').DataTable({
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
                    [25, 10, 25, 50, -1],
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
                    {
                        className: 'btn btn-blue',
                        text: '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg> Proses Acc Qty',
                        action: function(e, node, config) {
                            $('#modalChecklistQty').modal('show')
                        }
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
                    "select": {
                        rows: {
                            _: "%d item dipilih ",
                            0: "Pilih item dan tekan tombol Proses data untuk memproses Qty Acc ",
                        }
                    },
                },
                "ajax": {
                    "type": "POST",
                    "url": "{{ route('getACCPermintaan.index') }}",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.tipe = 'qtyacc';
                        data.dari = $('#fqtydari').val();
                        data.sampai = $('#fqtysampai').val();
                        data.selected = $('#selectedValue').val();

                        // data.dari = $('#idfilter_dari').val();
                        // data.sampai = $('#idfilter_sampai').val();
                        // data.mesin = $('#idfilter_mesin').val();
                        // data.unit = $('#unit').val();
                        // data.status = $('#status').val();
                    }
                },
                "initComplete": function(settings, json) {
                    $('html').removeClass('cursor-wait');
                },
                columnDefs: [{
                    'targets': 0,
                    "orderable": false,
                    'className': 'select-checkbox',
                    'checkboxes': {
                        'selectRow': true
                    },
                }],
                select: {
                    'style': 'multi',
                    // "selector": 'td:not(:nth-child(2))',
                },
                "columns": [{
                        data: 'select_orders',
                        name: 'select_orders',
                        className: 'cuspad2',
                        orderable: true,
                        searchable: false
                    },
                    {
                        title: 'Tgl Permintaan',
                        data: 'tgl',
                        name: 'tgl',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Kodeseri',
                        data: 'kodeseri',
                        name: 'kodeseri',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Noform',
                        data: 'noform',
                        name: 'noform',
                        className: "cuspad0 cuspad1 text-center cursor-pointer"
                    },
                    {
                        title: 'Barang',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'QTY Minta',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 text-center cursor-pointer"
                    },
                    {
                        title: 'Satuan',
                        data: 'satuan',
                        name: 'satuan',
                        className: "cuspad0 cuspad1 text-center cursor-pointer"
                    },
                    {
                        title: 'Pemesan',
                        data: 'pemesan',
                        name: 'pemesan',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Unit/Mesin',
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
            $('.datatable-qty-persetujuan tfoot .th').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm my-0 border border-dark" placeholder="search" />'
                );
            });

            //---------------PERSETUJUAN-------------------------------------//
            tablePermintaanAcc = $('.datatable-persetujuan').DataTable({
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
                        $('#modalAccept').modal('show')
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
                            0: "Pilih item dan tekan tombol Proses data untuk memproses ACC ",
                        }
                    },
                },
                "ajax": {
                    "type": "POST",
                    "url": "{{ route('getACCPermintaan.index') }}",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.tipe = 'persetujuan';
                        data.selected = $('#selectedValue').val();
                    }
                },
                columnDefs: [{
                    'targets': 0,
                    "orderable": false,
                    'className': 'select-checkbox',
                    'checkboxes': {
                        'selectRow': true
                    },
                }],
                select: {
                    'style': 'multi',
                    // "selector": 'td:not(:nth-child(2))',
                },
                "columns": [{
                        data: 'select_orders',
                        name: 'select_orders',
                        className: 'cuspad2',
                        orderable: true,
                        searchable: false
                    },
                    {
                        title: 'TGL PERMINTAAN',
                        data: 'tgl',
                        name: 'tgl',
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
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'Deskripsi',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'Katalog',
                        data: 'katalog',
                        name: 'katalog',
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'Part',
                        data: 'part',
                        name: 'part',
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'MESIN',
                        data: 'mesin',
                        name: 'mesin',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'QTY',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'SATUAN',
                        data: 'satuan',
                        name: 'satuan',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'PEMESAN',
                        data: 'pemesan',
                        name: 'pemesan',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
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
            $('.datatable-persetujuan tfoot .th').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm my-0 border border-dark" placeholder="search" />'
                );
            });

            //---------------REJECT-----------------------------------------//
            tablePermintaanRjt = $('.datatable-reject').DataTable({
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
                        $('#modalReject').modal('show')
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
                            0: "Pilih item dan tekan tombol Proses data untuk memproses ACC ",
                        }
                    },
                },
                "ajax": {
                    "type": "POST",
                    "url": "{{ route('getACCPermintaan.index') }}",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.tipe = 'reject';
                        data.dari = $('#idfilter_dari').val();
                        data.sampai = $('#idfilter_sampai').val();
                        data.selected = $('#selectedValue').val();
                    }
                },
                columnDefs: [{
                    'targets': 0,
                    "orderable": false,
                    'className': 'select-checkbox',
                    'checkboxes': {
                        'selectRow': true
                    },
                }],
                select: {
                    'style': 'multi',
                    // "selector": 'td:not(:nth-child(2))',
                },
                "columns": [{
                        data: 'select_orders',
                        name: 'select_orders',
                        className: 'cuspad2',
                        orderable: true,
                        searchable: false
                    },
                    {
                        title: 'TGL PERMINTAAN',
                        data: 'tgl',
                        name: 'tgl',
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
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'Deskripsi',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'Katalog',
                        data: 'katalog',
                        name: 'katalog',
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'Part',
                        data: 'part',
                        name: 'part',
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'QTY MINTA',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'SATUAN',
                        data: 'satuan',
                        name: 'satuan',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'PEMESAN',
                        data: 'pemesan',
                        name: 'pemesan',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Ket. ACC',
                        data: 'keteranganACC',
                        name: 'keteranganACC',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
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
            $('.datatable-reject tfoot .th').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm my-0 border border-dark" placeholder="search" />'
                );
            });

            //---------------HOLD------------------------------------------//
            tablePermintaanHld = $('.datatable-hold').DataTable({
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
                        $('#modalHold').modal('show')
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
                            0: "Pilih item dan tekan tombol Proses data untuk memproses ACC ",
                        }
                    },
                },
                "ajax": {
                    "type": "POST",
                    "url": "{{ route('getACCPermintaan.index') }}",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.tipe = 'hold';
                        data.dari = $('#idfilter_dari').val();
                        data.sampai = $('#idfilter_sampai').val();
                        data.selected = $('#selectedValue').val();
                    }
                },
                columnDefs: [{
                    'targets': 0,
                    "orderable": false,
                    'className': 'select-checkbox',
                    'checkboxes': {
                        'selectRow': true
                    },
                }],
                select: {
                    'style': 'multi',
                    // "selector": 'td:not(:nth-child(2))',
                },
                "columns": [{
                        data: 'select_orders',
                        name: 'select_orders',
                        className: 'cuspad2',
                        orderable: true,
                        searchable: false
                    },
                    {
                        title: 'TGL PERMINTAAN',
                        data: 'tgl',
                        name: 'tgl',
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
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'Deskripsi',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'Katalog',
                        data: 'katalog',
                        name: 'katalog',
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'Part',
                        data: 'part',
                        name: 'part',
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'QTY MINTA',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'SATUAN',
                        data: 'satuan',
                        name: 'satuan',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'PEMESAN',
                        data: 'pemesan',
                        name: 'pemesan',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Ket. ACC',
                        data: 'keteranganACC',
                        name: 'keteranganACC',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
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
            $('.datatable-hold tfoot .th').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm my-0 border border-dark" placeholder="search" />'
                );
            });
            //---------------FILTER------------------------------------------//
            $('#filter_id').on('click change', function() {
                tablePermintaanQty.ajax.reload(null, false);
            });

            $('#filter_id').on('click change', function() {
                tablePermintaanQty.ajax.reload(null, false);
            });
            // TABLE ---------------------------------------------------------//

            // FORM INPUT ---------------------------------------------------------//
            if ($("#formQtyACCPermintaan").length > 0) {
                $("#formQtyACCPermintaan").validate({
                    rules: {
                        pembeli: {
                            required: true,
                        },
                    },
                    messages: {
                        pembeli: {
                            required: "Masukkan Pembeli",
                        },
                    },

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
                            url: "{{ url('storeQtyPermintaan') }}",
                            type: "POST",
                            data: $('#formQtyACCPermintaan').serialize(),
                            beforeSend: function() {
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
                                tablePermintaanQty.ajax.reload();
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
                                $('#modalChecklistQty').modal('hide');
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                tablePermintaanQty.ajax.reload();
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
            if ($("#formACCPermintaan").length > 0) {
                $("#formACCPermintaan").validate({
                    submitHandler: function(form) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $('#submitAccept').html(
                            '<i class="fa-solid fa-fw fa-spinner fa-spin"></i> Please Wait...');
                        $("#submitAccept").attr("disabled", true);
                        $.ajax({
                            url: "{{ url('storeAccPermintaan') }}",
                            type: "POST",
                            data: $('#formACCPermintaan').serialize(),
                            beforeSend: function() {
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
                                $('#submitAccept').html(
                                    '<span class="spinner-border spinner-border-sm me-2" role="status"></span> Proses'
                                );
                                $("#submitAccept").attr("disabled", false);
                                tablePermintaanAcc.ajax.reload();
                                tablePermintaanRjt.ajax.reload();
                                tablePermintaanHld.ajax.reload();
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
                                $('#modalAccept').modal('hide');
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                tablePermintaanAcc.ajax.reload();
                                tablePermintaanRjt.ajax.reload();
                                tablePermintaanHld.ajax.reload();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Input',
                                    html: data.responseJSON.message,
                                    showConfirmButton: true
                                });
                                $('#submitAccept').html(
                                    '<i class="fas fa-save" style="margin-right: 5px"></i> Proses'
                                );
                                $("#submitAccept").attr("disabled", false);
                            }
                        });
                    }
                })
            }
            if ($("#formHoldPermintaan").length > 0) {
                $("#formHoldPermintaan").validate({
                    submitHandler: function(form) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $('#submitAccept').html(
                            '<i class="fa-solid fa-fw fa-spinner fa-spin"></i> Please Wait...');
                        $("#submitAccept").attr("disabled", true);
                        $.ajax({
                            url: "{{ url('storeAccPermintaan') }}",
                            type: "POST",
                            data: $('#formHoldPermintaan').serialize(),
                            beforeSend: function() {
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
                                $('#submitAccept').html(
                                    '<span class="spinner-border spinner-border-sm me-2" role="status"></span> Proses'
                                );
                                $("#submitAccept").attr("disabled", false);
                                tablePermintaanAcc.ajax.reload();
                                tablePermintaanRjt.ajax.reload();
                                tablePermintaanHld.ajax.reload();
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
                                $('#modalHold').modal('hide');
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                tablePermintaanAcc.ajax.reload();
                                tablePermintaanRjt.ajax.reload();
                                tablePermintaanHld.ajax.reload();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Input',
                                    html: data.responseJSON.message,
                                    showConfirmButton: true
                                });
                                $('#submitAccept').html(
                                    '<i class="fas fa-save" style="margin-right: 5px"></i> Proses'
                                );
                                $("#submitAccept").attr("disabled", false);
                            }
                        });
                    }
                })
            }
            if ($("#formRejectPermintaan").length > 0) {
                $("#formRejectPermintaan").validate({
                    submitHandler: function(form) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $('#submitAccept').html(
                            '<i class="fa-solid fa-fw fa-spinner fa-spin"></i> Please Wait...');
                        $("#submitAccept").attr("disabled", true);
                        $.ajax({
                            url: "{{ url('storeAccPermintaan') }}",
                            type: "POST",
                            data: $('#formRejectPermintaan').serialize(),
                            beforeSend: function() {
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
                                $('#submitAccept').html(
                                    '<span class="spinner-border spinner-border-sm me-2" role="status"></span> Proses'
                                );
                                $("#submitAccept").attr("disabled", false);
                                tablePermintaanAcc.ajax.reload();
                                tablePermintaanRjt.ajax.reload();
                                tablePermintaanHld.ajax.reload();
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
                                $('#modalReject').modal('hide');
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                tablePermintaanAcc.ajax.reload();
                                tablePermintaanRjt.ajax.reload();
                                tablePermintaanHld.ajax.reload();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Input',
                                    html: data.responseJSON.message,
                                    showConfirmButton: true
                                });
                                $('#submitAccept').html(
                                    '<i class="fas fa-save" style="margin-right: 5px"></i> Proses'
                                );
                                $("#submitAccept").attr("disabled", false);
                            }
                        });
                    }
                })
            }
            // FORM INPUT ---------------------------------------------------------//

            // MODAL ---------------------------------------------------------//
            $('#modalChecklistQty').on('show.bs.modal', function(e) {
                $(".overlay").fadeIn(300);
                itemTables = [];
                // console.log(count);

                $.each(tablePermintaanQty.rows('.selected').nodes(), function(index, rowId) {
                    var rows_selected = tablePermintaanQty.rows('.selected').data();
                    itemTables.push(rows_selected[index]['kodeseri']);
                });
                console.log(itemTables);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'POST',
                    url: '{{ url('checkAccQty') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: itemTables,
                        jml: itemTables.length,
                    },
                    success: function(data) {
                        //menampilkan data ke dalam modal
                        $('.fetched-data-qtyacc-checklist').html(data);
                        // alert(itemTables);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $(".overlay").fadeOut(300);
                    }, 500);
                });
            });

            $('#modalAccept').on('show.bs.modal', function(e) {
                $(".overlay").fadeIn(300);
                itemTables = [];
                // console.log(count);

                $.each(tablePermintaanAcc.rows('.selected').nodes(), function(index, rowId) {
                    var rows_selected = tablePermintaanAcc.rows('.selected').data();
                    itemTables.push(rows_selected[index]['kodeseri']);
                });
                console.log(itemTables);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'POST',
                    url: '{{ url('checkAccept') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: itemTables,
                        jml: itemTables.length,
                    },
                    success: function(data) {
                        //menampilkan data ke dalam modal
                        $('.fetched-data-acc-checklist').html(data);
                        // alert(itemTables);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $(".overlay").fadeOut(300);
                    }, 500);
                });
            });

            $('#modalReject').on('show.bs.modal', function(e) {
                $(".overlay").fadeIn(300);
                itemTables = [];
                // console.log(count);

                $.each(tablePermintaanRjt.rows('.selected').nodes(), function(index, rowId) {
                    var rows_selected = tablePermintaanRjt.rows('.selected').data();
                    itemTables.push(rows_selected[index]['kodeseri']);
                });
                console.log(itemTables);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'POST',
                    url: '{{ url('checkAccept') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: itemTables,
                        jml: itemTables.length,
                    },
                    success: function(data) {
                        //menampilkan data ke dalam modal
                        $('.fetched-data-reject-checklist').html(data);
                        // alert(itemTables);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $(".overlay").fadeOut(300);
                    }, 500);
                });
            });

            $('#modalHold').on('show.bs.modal', function(e) {
                $(".overlay").fadeIn(300);
                itemTables = [];
                // console.log(count);

                $.each(tablePermintaanHld.rows('.selected').nodes(), function(index, rowId) {
                    var rows_selected = tablePermintaanHld.rows('.selected').data();
                    itemTables.push(rows_selected[index]['kodeseri']);
                });
                console.log(itemTables);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'POST',
                    url: '{{ url('checkAccept') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: itemTables,
                        jml: itemTables.length,
                    },
                    success: function(data) {
                        //menampilkan data ke dalam modal
                        $('.fetched-data-hold-checklist').html(data);
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

        function changeSelectedValue(params) {
            if (params == "PERMINTAAN") {
                $("#selectValue-PERMINTAAN").attr("disabled", true);
                $("#selectValue-SERVIS").attr("disabled", false);
                $('#selectedValue').val('PERMINTAAN');
                $('html').addClass('cursor-wait');
                tablePermintaanQty.ajax.reload();
                tablePermintaanAcc.ajax.reload();
                tablePermintaanRjt.ajax.reload();
                tablePermintaanHld.ajax.reload();
                setTimeout(function() {
                    $('html').removeClass('cursor-wait')
                }, 2000);
            } else {
                $("#selectValue-PERMINTAAN").attr("disabled", false);
                $("#selectValue-SERVIS").attr("disabled", true);
                $('#selectedValue').val('SERVIS');
                $('html').addClass('cursor-wait');
                tablePermintaanQty.ajax.reload();
                tablePermintaanAcc.ajax.reload();
                tablePermintaanRjt.ajax.reload();
                tablePermintaanHld.ajax.reload();
                setTimeout(function() {
                    $('html').removeClass('cursor-wait')
                }, 2000);
            }
        }
    </script>
@endsection
