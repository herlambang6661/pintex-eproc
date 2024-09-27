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
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M17 17h-11v-14h-2" />
                                    <path d="M6 5l14 1l-1 7h-13" />
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
                                                class="fas fa-cart-shopping"></i> Pembelian</a></li>
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
                                            <a href="#tabs-persetujuan" class="nav-link active" data-bs-toggle="tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 5px"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-dollar">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                    <path d="M13 17h-7v-14h-2" />
                                                    <path d="M6 5l14 1l-.575 4.022m-4.925 2.978h-8.5" />
                                                    <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                                    <path d="M19 21v1m0 -8v1" />
                                                </svg>
                                                List Pembelian
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-list-reject" class="nav-link" data-bs-toggle="tab">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 5px"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                                                Form Checklist Pembelian
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-list-hold" class="nav-link" data-bs-toggle="tab"><svg
                                                    xmlns="http://www.w3.org/2000/svg" style="margin-right: 5px"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-settings-cancel">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12.29 20.977c-.818 .132 -1.724 -.3 -1.965 -1.294a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c.983 .238 1.416 1.126 1.298 1.937" />
                                                    <path d="M19 19m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                    <path d="M17 21l4 -4" />
                                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                </svg>
                                                Form Checklist Servis
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tabs-persetujuan">
                                        <div class="card card-xl shadow rounded border border-blue">
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="date" id="tablePembelian_dari"
                                                                    class="form-control border border-blue"
                                                                    value="{{ date('Y-m-01') }}">
                                                            </td>
                                                            <td>
                                                                <input type="date" id="tablePembelian_sampai"
                                                                    class="form-control  border border-blue"
                                                                    value="{{ date('Y-m-d') }}">
                                                            </td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-icon"
                                                                    aria-label="Button" onclick="syn1()">
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
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table style="width:100%; height: 100%;font-size:13px;"
                                                    class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-detail-pembelian">
                                                    <tfoot>
                                                        <tr>
                                                            <th class="px-1 py-1 text-center"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                    <path d="M21 21l-6 -6" />
                                                                </svg></th>
                                                            <th class="px-1 th py-1">tgl</th>
                                                            <th class="px-1 th py-1">kodeseri</th>
                                                            <th class="px-1 th py-1">nofaktur</th>
                                                            <th class="px-1 th py-1">barang</th>
                                                            <th class="px-1 th py-1">currid</th>
                                                            <th class="px-1 th py-1">qty</th>
                                                            <th class="px-1 th py-1">harga</th>
                                                            <th class="px-1 th py-1">total</th>
                                                            <th class="px-1 th py-1">supplier</th>
                                                        </tr>
                                                    </tfoot>
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
                                                                <input type="date" id="filterdari_pembelian"
                                                                    class="form-control "
                                                                    value="{{ date('Y-m-d', strtotime(date('Y-m-01') . '-1 month')) }}">
                                                            </td>
                                                            <td>
                                                                <input type="date" id="filtersampai_pembelian"
                                                                    class="form-control " value="{{ date('Y-m-d') }}">
                                                            </td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-icon"
                                                                    aria-label="Button" onclick="syn2()">
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
                                                                </a>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table style="width:100%; height: 100%;font-size:13px;"
                                                    class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-checklist-pembelian">
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
                                                            <th class="px-1 th py-1">mesin</th>
                                                            <th class="px-1 th py-1">qty</th>
                                                            <th class="px-1 th py-1">satuan</th>
                                                            <th class="px-1 th py-1">pemesan</th>
                                                            <th class="px-1 th py-1">unit</th>
                                                        </tr>
                                                    </tfoot>
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
                                                                    value="{{ date('Y-m-d', strtotime(date('Y-m-01') . '-1 month')) }}">
                                                            </td>
                                                            <td>
                                                                <input type="date" id="idfilter_sampai"
                                                                    class="form-control " value="{{ date('Y-m-d') }}">
                                                            </td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-icon"
                                                                    aria-label="Button" onclick="syn3()">
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
                                                                </a>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="table-responsive">
                                                <table style="width:100%; height: 100%;font-size:13px;"
                                                    class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable datatable-checklist-servis">
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
                                                            <th class="px-1 th py-1">serialnumber</th>
                                                            <th class="px-1 th py-1">katalog</th>
                                                            <th class="px-1 th py-1">part</th>
                                                            <th class="px-1 th py-1">mesin</th>
                                                            <th class="px-1 th py-1">qty</th>
                                                            <th class="px-1 th py-1">qty_kirim</th>
                                                            <th class="px-1 th py-1">satuan</th>
                                                            <th class="px-1 th py-1">suratjalan</th>
                                                            <th class="px-1 th py-1">pemesan</th>
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
    <div class="modal modal-blur fade" id="modalViewPembelian" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="overlay cursor-wait">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-dollar">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M13 17h-7v-14h-2" />
                            <path d="M6 5l14 1l-.575 4.022m-4.925 2.978h-8.5" />
                            <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                            <path d="M19 21v1m0 -8v1" />
                        </svg>
                        Lihat Detail Pembelian
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="fetched-data-pembelian"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary ms-auto" data-bs-dismiss="modal"><i
                            class="fa-solid fa-fw fa-arrow-rotate-left"></i> Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modalPembelian" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="overlay cursor-wait">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="modal-dialog modal-full-width" role="document">
            <div class="modal-content">
                <form id="formPembelian" name="formPembelian" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-dollar">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M13 17h-7v-14h-2" />
                                <path d="M6 5l14 1l-.575 4.022m-4.925 2.978h-8.5" />
                                <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                <path d="M19 21v1m0 -8v1" />
                            </svg>
                            Proses Pembelian
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data-pembelian"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-blue" id="submitPembelian"><i class="fas fa-save"
                                style="margin-right: 5px"></i> Proses</button>
                        <button type="button" class="btn btn-link link-secondary ms-auto" data-bs-dismiss="modal"><i
                                class="fa-solid fa-fw fa-arrow-rotate-left"></i> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modalServis" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="overlay cursor-wait">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="modal-dialog modal-full-width" role="document">
            <div class="modal-content">
                <form id="formServis" name="formServis" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-dollar">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M13 17h-7v-14h-2" />
                                <path d="M6 5l14 1l-.575 4.022m-4.925 2.978h-8.5" />
                                <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                <path d="M19 21v1m0 -8v1" />
                            </svg>
                            Proses Pembayaran Servis
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data-servis"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-blue" id="submitServis"><i class="fas fa-save"
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
        var tablePembelian, tableCheckPembelian, tableCheckServis;

        function syn1() {
            tablePembelian.ajax.reload();
        }

        function syn2() {
            tableCheckPembelian.ajax.reload();
        }

        function syn3() {
            tableCheckServis.ajax.reload();
        }

        function packages() {
            if (document.getElementById('packagesId').checked) {
                document.getElementById('package').value = 1;
                $(".pembelianItems").fadeOut();
                $(".packagesItems").fadeIn();
                console.log("switch to Package");
                $(".elementmesin").select2({
                    dropdownParent: $('#modalPembelian .modal-content'),
                    language: "id",
                    placeholder: "Pilih Mesin",
                    width: "100%",
                    ajax: {
                        url: "/getMesin",
                        dataType: "json",
                        delay: 200,
                        processResults: function(response) {
                            console.log(response);
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.mesin.toUpperCase() + " " + item.merk
                                            .toUpperCase() + (item.unit == "88" ? " (UMUM)" :
                                                " (UNIT " + item.unit + ")"),
                                    }
                                })
                            };
                        },
                        cache: false
                    },
                });
            } else {
                document.getElementById('package').value = 0;
                $(".pembelianItems").fadeIn();
                $(".packagesItems").fadeOut();
                console.log("switch to Normal");
            }
        }
        $(function() {
            // TABLE =============================================================================================//
            //----------------------------------------------LIST PEMBLIAN-----------------------------------------//
            tablePembelian = $('.datatable-detail-pembelian').DataTable({
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
                    [15, 10, 25, 50, -1],
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
                    "url": "{{ route('getPembelianList.index') }}",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.dari = $('#tablePembelian_dari').val();
                        data.sampai = $('#tablePembelian_sampai').val();
                    }
                },
                order: [
                    [1, 'desc']
                ],
                "columns": [{
                        title: '',
                        data: 'action',
                        name: 'action',
                        className: "cuspad0 cuspad1 text-center",
                        orderable: true,
                        searchable: false
                    }, {
                        title: 'Tanggal',
                        data: 'tgl',
                        name: 'tgl',
                        className: "cuspad0 cuspad1 text-center",
                    }, {
                        title: 'Kodeseri',
                        data: 'kode',
                        name: 'kode',
                        className: "cuspad0 cuspad1 text-center",
                    },
                    {
                        title: 'NO FAKTUR',
                        data: 'nofaktur',
                        name: 'nofaktur',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'Barang',
                        data: 'namabarang',
                        name: 'namabarang',
                        className: "cuspad0 cuspad1",
                    },
                    {
                        title: 'Curr',
                        data: 'currid',
                        name: 'currid',
                        className: "cuspad0 cuspad1 text-center",
                    },
                    {
                        title: 'Qty',
                        data: 'kts',
                        name: 'kts',
                        className: "cuspad0 cuspad1 text-center",
                    },
                    {
                        title: 'Harga',
                        data: 'harga',
                        name: 'harga',
                        className: "cuspad0 cuspad1 text-center",
                    },
                    {
                        title: 'Total',
                        data: 'jumlah',
                        name: 'jumlah',
                        className: "cuspad0 text-center clickable"
                    },
                    {
                        title: 'SUPPLIER',
                        data: 'supplier',
                        name: 'supplier',
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
            $('.datatable-detail-pembelian tfoot .th').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm my-0 border border-dark" placeholder="search" />'
                );
            });
            //----------------------------------------------CHECKLIST PEMBLIAN-----------------------------------------//
            tableCheckPembelian = $('.datatable-checklist-pembelian').DataTable({
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
                    "className": 'btn btn-success',
                    "text": '<i class="fa-solid fa-file-circle-check"></i> Lanjut Proses Pembelian',
                    "action": function(e, node, config) {
                        $('#modalPembelian').modal('show')
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
                            0: "Pilih item dan tekan tombol Proses data untuk memproses Pembelian",
                        }
                    },
                },
                "ajax": {
                    "type": "POST",
                    "url": "{{ route('getPembelian.index') }}",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.dari = $('#filterdari_pembelian').val();
                        data.sampai = $('#filtersampai_pembelian').val();
                    }
                },
                columnDefs: [{
                    'targets': 0,
                    "orderable": true,
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
                        className: 'cuspad2 cursor-pointer',
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
                        title: 'Kodeseri',
                        data: 'kodeseri',
                        name: 'kodeseri',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Barang',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'Deskripsi',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
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
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Mesin',
                        data: 'mesin',
                        name: 'mesin',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Qty',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Satuan',
                        data: 'satuan',
                        name: 'satuan',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Pemesan',
                        data: 'pemesan',
                        name: 'pemesan',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Unit',
                        data: 'unit',
                        name: 'unit',
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
            $('.datatable-checklist-pembelian tfoot .th').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm my-0 border border-dark" placeholder="search" />'
                );
            });
            //--------------------------------------------CHECKLIST SERVIS-------------------------------------//
            tableCheckServis = $('.datatable-checklist-servis').DataTable({
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
                        $('#modalServis').modal('show')
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
                            0: "Pilih item dan tekan tombol Proses data untuk proses bayar Servis",
                        }
                    },
                },
                "ajax": {
                    "type": "POST",
                    "url": "{{ route('getBayarServis.index') }}",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.dari = $('#idfilter_dari').val();
                        data.sampai = $('#idfilter_sampai').val();
                    }
                },
                columnDefs: [{
                    'targets': 0,
                    "orderable": true,
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
                        className: 'cuspad2 cursor-pointer',
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
                        title: 'Kodeseri',
                        data: 'kodeseri_servis',
                        name: 'kodeseri_servis',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Barang',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 clickable cursor-pointer"
                    },
                    {
                        title: 'Deskripsi',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Serial Number',
                        data: 'serialnumber',
                        name: 'serialnumber',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Katalog',
                        data: 'katalog',
                        name: 'katalog',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Part',
                        data: 'part',
                        name: 'part',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Mesin',
                        data: 'mesin',
                        name: 'mesin',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Qty',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Qty Kirim',
                        data: 'qtykirim',
                        name: 'qtykirim',
                        className: "cuspad0 cuspad1 clickable cursor-pointer"
                    },
                    {
                        title: 'Satuan',
                        data: 'satuan',
                        name: 'satuan',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Surat Jalan',
                        data: 'suratjalan',
                        name: 'suratjalan',
                        className: "cuspad0 cuspad1 text-center clickable cursor-pointer"
                    },
                    {
                        title: 'Pemesan',
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
            $('.datatable-checklist-servis tfoot .th').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm my-0 border border-dark" placeholder="search" />'
                );
            });
            if ($("#formPembelian").length > 0) {
                $("#formPembelian").validate({
                    rules: {
                        tgl: {
                            required: true,
                        },
                        supplier: {
                            required: true,
                        },
                        dibeli: {
                            required: true,
                        },
                        nopo: {
                            required: true,
                        },
                        uang: {
                            required: true,
                        },
                    },
                    messages: {
                        tgl: {
                            required: "Masukkan Tanggal Faktur",
                        },
                        supplier: {
                            required: "Masukkan Supplier",
                        },
                        dibeli: {
                            required: "Masukkan Dibeli Oleh",
                        },
                        nopo: {
                            required: "Masukkan Nomor PO / Faktur",
                        },
                        uang: {
                            required: "Masukkan Mata Uang",
                        },
                    },

                    submitHandler: function(form) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $('#submitPembelian').html(
                            '<i class="fa-solid fa-fw fa-spinner fa-spin"></i> Mohon Menunggu...');
                        $("#submitPembelian").attr("disabled", true);

                        $.ajax({
                            url: "{{ url('storedataPembelian') }}",
                            type: "POST",
                            data: $('#formPembelian').serialize(),
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Menyimpan Data',
                                    html: '<center><lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_al2qt2jz.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Sedang memproses data, Proses mungkin membutuhkan beberapa menit. <br><br><b class="text-danger">(Jangan menutup jendela ini, bisa mengakibatkan error)</b></h1>',
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                })
                            },
                            success: function(response) {
                                console.log('Result:', response);
                                $('#submitPembelian').html(
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg> Simpan'
                                );
                                $("#submitPembelian").attr("disabled", false);
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
                                document.getElementById("formPembelian").reset();
                                tablePembelian.ajax.reload();
                                tableCheckPembelian.ajax.reload();
                                tableCheckServis.ajax.reload();
                                $('#modalPembelian').modal('hide');
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                tablePembelian.ajax.reload();
                                tableCheckPembelian.ajax.reload();
                                tableCheckServis.ajax.reload();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Input',
                                    html: data.responseJSON.message,
                                    showConfirmButton: true
                                });
                                $('#submitPembelian').html(
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg> Simpan'
                                );
                                $("#submitPembelian").attr("disabled", false);
                            }
                        });
                    }
                })
            }
            if ($("#formServis").length > 0) {
                $("#formServis").validate({
                    rules: {
                        tgl: {
                            required: true,
                        },
                        nopo: {
                            required: true,
                        },
                        uang: {
                            required: true,
                        },
                    },
                    messages: {
                        tgl: {
                            required: "Masukkan Tanggal Faktur",
                        },
                        nopo: {
                            required: "Masukkan Nomor PO / Faktur",
                        },
                        uang: {
                            required: "Masukkan Mata Uang",
                        },
                    },

                    submitHandler: function(form) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $('#submitServis').html(
                            '<i class="fa-solid fa-fw fa-spinner fa-spin"></i> Mohon Menunggu...');
                        $("#submitServis").attr("disabled", true);

                        $.ajax({
                            url: "{{ url('storedataPembelianServis') }}",
                            type: "POST",
                            data: $('#formServis').serialize(),
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Menyimpan Data',
                                    html: '<center><lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_al2qt2jz.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Sedang memproses data, Proses mungkin membutuhkan beberapa menit. <br><br><b class="text-danger">(Jangan menutup jendela ini, bisa mengakibatkan error)</b></h1>',
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                })
                            },
                            success: function(response) {
                                console.log('Result:', response);
                                $('#submitServis').html(
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg> Simpan'
                                );
                                $("#submitServis").attr("disabled", false);
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
                                document.getElementById("formServis").reset();
                                tablePembelian.ajax.reload();
                                tableCheckPembelian.ajax.reload();
                                tableCheckServis.ajax.reload();
                                $('#modalServis').modal('hide');
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                tablePembelian.ajax.reload();
                                tableCheckPembelian.ajax.reload();
                                tableCheckServis.ajax.reload();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Input',
                                    html: data.responseJSON.message,
                                    showConfirmButton: true
                                });
                                $('#submitServis').html(
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg> Simpan'
                                );
                                $("#submitServis").attr("disabled", false);
                            }
                        });
                    }
                })
            }
            // TABLE =============================================================================================//
            // MODAL =============================================================================================//
            $('#modalViewPembelian').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget)
                var nofkt = button.data('nofkt');
                console.log("Fetch Noform: " + nofkt + "...");
                $(".overlay").fadeIn(300);
                $.ajax({
                    type: 'POST',
                    url: 'viewPembelian',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        nofkt: nofkt,
                    },
                    success: function(data) {
                        $('.fetched-data-pembelian').html(data);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $(".overlay").fadeOut(300);
                    }, 500);
                });
            });
            $('#modalPembelian').on('show.bs.modal', function(e) {
                $(".overlay").fadeIn(300);
                itemTables = [];
                // console.log(count);

                $.each(tableCheckPembelian.rows('.selected').nodes(), function(index, rowId) {
                    var rows_selected = tableCheckPembelian.rows('.selected').data();
                    itemTables.push(rows_selected[index]['id']);
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
                    url: '{{ url('checkPembelian') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: itemTables,
                        jml: itemTables.length,
                    },
                    success: function(data) {
                        //menampilkan data ke dalam modal
                        $('.fetched-data-pembelian').html(data);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $(".overlay").fadeOut(300);
                    }, 500);
                });
            });
            $('#modalServis').on('show.bs.modal', function(e) {
                $(".overlay").fadeIn(300);
                itemTables = [];

                $.each(tableCheckServis.rows('.selected').nodes(), function(index, rowId) {
                    var rows_selected = tableCheckServis.rows('.selected').data();
                    itemTables.push(rows_selected[index]['id']);
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
                    url: '{{ url('checkServis') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: itemTables,
                        jml: itemTables.length,
                    },
                    success: function(data) {
                        //menampilkan data ke dalam modal
                        $('.fetched-data-servis').html(data);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $(".overlay").fadeOut(300);
                    }, 500);
                });
            });
            // MODAL ========================================================================//
            $('#filter_id').on('click change', function() {
                tableCheckPembelian.ajax.reload(null, false);
            });

            //Enabling the tooltip
            bootstrap.Tooltip.getOrCreateInstance("#tooltip1");
            // Enabling the popover
            bootstrap.Popover.getOrCreateInstance("#popover1");

        });
    </script>
@endsection
