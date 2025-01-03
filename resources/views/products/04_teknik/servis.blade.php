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

        <datalist id="datalistNamaBarang">
            @foreach ($namaBarang as $item)
                <option value="{{ strtoupper($item->namaBarang) }}">{{ strtoupper($item->namaBarang) }}</option>
            @endforeach
        </datalist>
        <datalist id="datalistDeskripsi">
            @foreach ($deskripsi as $a)
                <option value="{{ strtoupper($a->keterangan) }}">{{ strtoupper($a->keterangan) }}</option>
            @endforeach
        </datalist>
        <datalist id="datalistSerialnumber">
            @foreach ($serialnumber as $b)
                <option value="{{ strtoupper($b->serialnumber) }}">{{ strtoupper($b->serialnumber) }}</option>
            @endforeach
        </datalist>
        <datalist id="datalistSatuan">
            @foreach ($satuan as $d)
                <option value="{{ strtoupper($d->satuan) }}">{{ strtoupper($d->satuan) }}</option>
            @endforeach
        </datalist>

        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <h2 class="page-title">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-text"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                    <path
                                        d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path d="M9 12h6" />
                                    <path d="M9 16h6" />
                                </svg>
                                Servis Barang
                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="https://pintex.co.id/apps/HR/Recruitment"><i
                                                class="fa-solid fa-basket-shopping"></i> Teknik</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#"><i
                                                class="fa-regular fa-paste"></i> Servis Barang</a></li>
                                </ol>
                            </div>
                        </div>

                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <ul class="nav">
                                    <a href="#tabs-profile-8" id="btntabs-profile-8"
                                        class="active btn btn-cyan d-none d-sm-inline-block border border-blue"
                                        data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"
                                        style="margin-right: 10px">
                                        <i class="fa-solid fa-list-ul"></i>
                                        List Servis Barang
                                    </a>
                                    <a href="#tabs-home-8" id="btntabs-home-8"
                                        class="btn btn-primary d-none d-sm-inline-block border border-primary"
                                        data-bs-toggle="tab" aria-selected="true" role="tab">
                                        <i class="fa-solid fa-hand-holding-medical"></i>
                                        Tambah Servis
                                    </a>
                                </ul>
                                <ul class="nav">
                                    <a href="#tabs-profile-8" id="btntabs-profile-8"
                                        class="active btn btn-primary d-sm-none btn-icon border border-primary"
                                        data-bs-toggle="tab" aria-selected="true" role="tab"
                                        aria-label="List Item Servis" style="margin-right: 10px">
                                        <i class="fa-solid fa-list-ul"></i>
                                    </a>
                                    <a href="#tabs-home-8" id="btntabs-home-8"
                                        class="btn btn-warning d-sm-none btn-icon border border-warning"
                                        data-bs-toggle="tab" aria-selected="true" role="tab" aria-label="Tambah Servis">
                                        <i class="fa-solid fa-hand-holding-medical"></i>
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
                                <div class="card card-xl shadow rounded border border-blue">
                                    <div class="table-responsive">
                                        <form action="#" id="form-filter-items" method="get" autocomplete="off"
                                            novalidate="" class="">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Tgl Awal</th>
                                                        <th class="text-center">Tgl Akhir</th>
                                                        <th class="text-center">Dibuat</th>
                                                        <th class="text-center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="date" id="idfilter_dari" class="form-control"
                                                                onchange="syn()" value="{{ date('Y-m-01') }}">
                                                        </td>
                                                        <td>
                                                            <input type="date" id="idfilter_sampai"
                                                                class="form-control " onchange="syn()"
                                                                value="{{ date('Y-m-d') }}">
                                                        </td>
                                                        <td>
                                                            <select id="dibuat" class="form-select">
                                                                @if (Auth::user()->role == 'own' ||
                                                                        Auth::user()->role == 'pur' ||
                                                                        Auth::user()->role == 'kng' ||
                                                                        Auth::user()->alias == 'HRD' ||
                                                                        Auth::user()->alias == 'TFI')
                                                                    <option value="" selected>
                                                                        Semua
                                                                    </option>
                                                                    <option value="Puji Nurrenti">
                                                                        Puji Nurrenti
                                                                    </option>
                                                                    <option value="Fahmi Fahrurrozi">
                                                                        Fahmi Fahrurrozi
                                                                    </option>
                                                                    <option value="Rizky Anurullah R">
                                                                        Rizky Anurullah R
                                                                    </option>
                                                                    <option value="Sukmitiyanti">
                                                                        Sukmitiyanti
                                                                    </option>
                                                                    <option value="Admin TFI">
                                                                        Admin TFI
                                                                    </option>
                                                                    <option value="Akun HRD">
                                                                        Akun HRD
                                                                    </option>
                                                                    <option value="Rodo Natorang Gultom">
                                                                        Rodo Natorang Gultom
                                                                    </option>
                                                                @else
                                                                    <option value="{{ Auth::user()->name }}" selected
                                                                        hidden>
                                                                        {{ Auth::user()->name }}
                                                                    </option>
                                                                    <option value="Puji Nurrenti">
                                                                        Puji Nurrenti
                                                                    </option>
                                                                    <option value="Fahmi Fahrurrozi">
                                                                        Fahmi Fahrurrozi
                                                                    </option>
                                                                    <option value="Rizky Anurullah R">
                                                                        Rizky Anurullah R
                                                                    </option>
                                                                    <option value="Sukmitiyanti">
                                                                        Sukmitiyanti
                                                                    </option>
                                                                    <option value="Admin Purchasing">
                                                                        Purchasing
                                                                    </option>
                                                                    <option value="Admin TFI">
                                                                        TFI
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="syn()">
                                                                <i class="fa-solid fa-magnifying-glass"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table style="width:100%; height: 100%;font-size:13px;"
                                            class="table table-bordered table-striped table-vcenter card-table table-hover text-nowrap datatable datatable-servis">
                                            <tfoot>
                                                <tr>
                                                    <th class="px-1 py-1 text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                            <path d="M21 21l-6 -6" />
                                                        </svg>
                                                    </th>
                                                    <th class="px-1 th py-1">kodeseri</th>
                                                    <th class="px-1 th py-1">noform</th>
                                                    <th class="px-1 th py-1">tgl</th>
                                                    <th class="px-1 th py-1">barang</th>
                                                    <th class="px-1 th py-1">Mesin</th>
                                                    <th class="px-1 th py-1">Kode</th>
                                                    <th class="px-1 th py-1">deskripsi</th>
                                                    <th class="px-1 th py-1">serialnumber</th>
                                                    <th class="px-1 th py-1">qty</th>
                                                    <th class="px-1 th py-1">satuan</th>
                                                    <th class="px-1 th py-1">status</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-home-8" role="tabpanel">
                                <div class="card shadow card-active">
                                    <div class="card-body">
                                        <form method="POST" name="formServis" id="formServis" class="form"
                                            enctype="multipart/form-data" accept-charset="utf-8"
                                            onkeydown="return event.key != 'Enter';" data-select2-id="add-form">
                                            @csrf
                                            <div class="row">
                                                <div class="control-group col-lg-3">
                                                    <div class="mb-1">
                                                        <label class="form-label">Entitas</label>
                                                        <input type="text" name="entitas" id="entitas"
                                                            class="form-control {{ Session::get('entitas') == '' ? '' : 'cursor-not-allowed' }}"
                                                            {{ Session::get('entitas') == '' ? '' : 'readonly' }}
                                                            value="{{ Session::get('entitas') == '' ? 'PINTEX' : Session::get('entitas') }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label">Tanggal Pengajuan Servis</label>
                                                        <div class="input-icon mb-2">
                                                            <input name="tanggal" class="form-control "
                                                                placeholder="Select a date" id="datepicker-icon"
                                                                value="<?= date('Y-m-d') ?>" />
                                                            <span class="input-icon-addon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path
                                                                        d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                                                    <path d="M16 3v4" />
                                                                    <path d="M8 3v4" />
                                                                    <path d="M4 11h16" />
                                                                    <path d="M11 15h1" />
                                                                    <path d="M12 15v3" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Kepala Bagian</label>
                                                        <select name="kabag" id="kabag"
                                                            class="form-select elementkabag" data-select2-id="kabag"
                                                            tabindex="-1" aria-hidden="true">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group col-lg-9">
                                                    <div class="card mb-2">
                                                        <div class="card-stamp card-stamp-lg">
                                                            <div class="card-stamp-icon bg-primary text-white">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-zoom-replace"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
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
                                                            <h3 class="card-title">Repeat Servis</h3>
                                                            <div class="control-group col-lg-3">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        id="repeatOr" onblur="carikodeseri();"
                                                                        onkeyup="" style="border-color: black;"
                                                                        placeholder="Masukkan Kodeseri/Barang">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="col">
                                                                <div id="hasil_cari"></div>
                                                                <div id="tunggu"></div>
                                                                <span id="success-msg"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="control-group after-add-more">
                                                <button class="btn btn-success" type="button"
                                                    onclick="tambahItem(); return false;">
                                                    <i class="fa-solid fa-cart-plus" style="margin-right: 5px"></i>
                                                    Tambah Item
                                                </button>
                                            </div>
                                            <div class="hr-text text-blue">Item Servis</div>
                                            <input id="idf" value="1" type="hidden">
                                            <div style="overflow-x:auto;overflow-x: scroll;">
                                                <div>
                                                    <table id="detail_transaksi" class="control-group text-nowrap"
                                                        border="0"
                                                        style="width: 100%;text-align:center;font-weight: bold;">
                                                        <thead>
                                                            <tr>
                                                                <td
                                                                    style="border-left-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;width: 50px">
                                                                </td>
                                                                <td class="bg-primary text-white">
                                                                    Kodeproduk</td>
                                                                <td class="bg-primary text-white">
                                                                    Nama Barang</td>
                                                                <td class="bg-primary text-white">
                                                                    Deskripsi</td>
                                                                <td class="bg-primary text-white">
                                                                    Serial Number</td>
                                                                <td class="bg-primary text-white">
                                                                    Mesin</td>
                                                                <td class="bg-primary text-white">
                                                                    Qty
                                                                </td>
                                                                <td class="bg-primary text-white">
                                                                    Satuan</td>
                                                                <td class="bg-primary text-white">
                                                                    Pemesan</td>
                                                                <th class="text-center"
                                                                    style="border-right-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;">
                                                                    Urgent</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="hr-text text-blue">Keterangan Tambahan</div>
                                            <div class="row">
                                                <div class="control-group col-lg-12">
                                                    <div id="ketTamb">
                                                        <div class="mb-3">
                                                            <label class="form-label">Keterangan Tambahan</label>
                                                            {{-- <textarea name="keteranganform" class="form-control" id="keteranganform"></textarea> --}}
                                                            <textarea id="tinymce-default" name="keteranganform"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="float-xl-right">
                                                <button type="submit" id="submitServis" class="btn btn-primary"><i
                                                        class="fa-regular fa-floppy-disk" style="margin-right: 5px"></i>
                                                    Simpan Permintaan</button>
                                            </div>
                                        </form>
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
    {{-- Start Modals --}}
    <style>
        .overlay {
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height: 100%;
            /* display: none; */
            background: rgba(0, 0, 0, 0.6);
        }

        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Loader style */

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

        /* END Loader style */
        .modal-body {
            max-height: 70vh;
            /* Sesuaikan ketinggian modal-body */
            overflow-y: auto;
            /* Menambahkan scroll */
        }
    </style>
    <div class="modal modal-blur fade" id="modalDetailServis" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="overlay">
            <div class="cv-spinner">
                <span class="loader"></span>
            </div>
        </div>
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen-lg-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-circle-info"></i>
                        Detail Servis
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="fetched-data-servis"></div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn me-auto" data-bs-dismiss="modal">Keluar</button> --}}
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modalEditServis" tabindex="-1" style="display: none;" aria-hidden="true">
        {{-- <div class="overlay">
            <div class="cv-spinner">
                <span class="loader"></span>
            </div>
        </div> --}}
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen-lg-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-regular fa-pen-to-square"></i>
                        Edit Servis (Undone)
                    </h5>
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
                        <div class="fetched-edit-servis">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="card bg-pink-lt shadow rounded border border-blue">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-2">
                                                        <label class="form-label">Kodeseri</label>
                                                        <input type="text" class="form-control border border-blue"
                                                            disabled name="kodeseri_servis">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-2">
                                                        <label class="form-label">Noform</label>
                                                        <input type="text" class="form-control border border-blue"
                                                            name="noformservis">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" name="tgl">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Barang</label>
                                                <input type="text" class="form-control" name="namaBarang">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Deskripsi</label>
                                                <input type="text" class="form-control" name="keterangan">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Serial Number</label>
                                                <input type="text" class="form-control" name="serialnumber">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Qty</label>
                                                <input type="number" class="form-control" name="qty">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Satuan</label>
                                                <input type="text" class="form-control" name="satuan">
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
    {{-- End Modals --}}
    <script type="text/javascript">
        var unit = 'Unit 1';

        function tambahItem() {
            var idf = document.getElementById("idf").value;

            var detail_transaksi = document.getElementById("detail_transaksi");

            var tr = document.createElement("tr");
            tr.setAttribute("id", "btn-remove" + idf);

            // Kolom 1 Hapus
            var td = document.createElement("td");
            td.setAttribute("align", "center");
            td.setAttribute("style", "border-left-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;");
            td.innerHTML += '<button class="btn btn-sm btn-danger btn-icon remove" type="button" onclick="hapusElemen(' +
                idf +
                ');"><i class="fa-regular fa-trash-can"></i> </button>';
            tr.appendChild(td);

            // Kolom 2 Kodeproduk                            
            var td = document.createElement("td");
            td.innerHTML += '<input readonly type="text" name="kodeproduk[]" id="kodeproduk"' + idf +
                '" class="form-control inputNone bg-secondary-lt" value="Service" style="text-transform: uppercase;width:90px">';
            tr.appendChild(td);

            // Kolom 3 Nama Barang / Jasa
            var td = document.createElement("td");
            td.innerHTML += '<input type="text" list="datalistNamaBarang" id="namaServis-' + idf +
                '" name="namaBarang[]" class="form-control  inputNone" style=";text-transform: uppercase;width:150px" onblur="openLock(' +
                idf + ')" onclick="openLock(' + idf + ')" onkeyup="openLock(' + idf + ')">';
            tr.appendChild(td);

            // Kolom 4 Deskripsi
            var td = document.createElement("td");
            td.innerHTML += "<input type='text' list='datalistDeskripsi' name='deskripsi[]' id='deskripsi_" + idf +
                "' class='form-control inputNone cursor-not-allowed bg-secondary-lt' readonly style='text-transform: uppercase;width:150px'>";
            tr.appendChild(td);

            // Kolom 5 Serial Number
            var td = document.createElement("td");
            td.innerHTML +=
                "<input readonly type='text' list='datalistSerialnumber' name='serialnumber[]' id='serialnumber_" + idf +
                "' class='form-control  inputNone cursor-not-allowed bg-secondary-lt' readonly style='text-transform: uppercase;width:150px'>";
            tr.appendChild(td);

            // Kolom 6 Mesin
            var td = document.createElement("td");
            td.innerHTML += "<div name='tampil_mesin_" + idf + "' id='tampil_mesin_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 7 Qty
            var td = document.createElement("td");
            td.innerHTML += "<input readonly type='number' name='qty[]' id='qty_" + idf +
                "' class='form-control  inputNone cursor-not-allowed bg-secondary-lt' readonly style='text-transform: uppercase;width:150px'>";
            tr.appendChild(td);

            // Kolom 8 Satuan
            var td = document.createElement("td");
            td.innerHTML += "<input readonly list='datalistSatuan' type='text' name='satuan[]' id='satuan_" + idf +
                "' class='form-control  inputNone cursor-not-allowed bg-secondary-lt' readonly style='text-transform: uppercase;width:90px'>";
            tr.appendChild(td);

            // Kolom 9 Pemesan
            var td = document.createElement("td");
            td.innerHTML += "<div name='tampil_pemesan_" + idf + "' id='tampil_pemesan_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 10 Urgent
            var td = document.createElement("td");
            td.setAttribute("align", "center");
            td.setAttribute("style", "border-right-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;");
            td.innerHTML += '<input type="checkbox" name="urgent[]" id="urgent' + idf + '" value="1"><br>';
            tr.appendChild(td);

            detail_transaksi.appendChild(tr);

            idf = (idf - 1) + 2;
            document.getElementById("idf").value = idf;
        }

        function hapusElemen(idf) {
            $("#btn-remove" + idf).remove();
        }

        function openLock(idf) {
            var var_select = document.getElementById("namaServis-" + idf).value;
            if (var_select) {
                $('#deskripsi_' + idf).prop('readonly', false);
                $('#serialnumber_' + idf).prop('readonly', false);
                $('#qty_' + idf).prop('readonly', false);
                $('#satuan_' + idf).prop('readonly', false);
                document.getElementById("tampil_mesin_" + idf).innerHTML =
                    '<select name="mesin[]" class="form-select elementmesn text-nowrap" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("tampil_pemesan_" + idf).innerHTML =
                    '<select required name="pemesan[]" class="form-select  elementprm inputNone" style="text-transform: uppercase;"><option></option></select>';
                $('#deskripsi_' + idf).removeClass('cursor-not-allowed bg-secondary-lt');
                $('#serialnumber_' + idf).removeClass('cursor-not-allowed bg-secondary-lt');
                $('#qty_' + idf).removeClass('cursor-not-allowed bg-secondary-lt');
                $('#satuan_' + idf).removeClass('cursor-not-allowed bg-secondary-lt');
            } else {
                $('#deskripsi_' + idf).prop('readonly', true);
                $('#serialnumber_' + idf).prop('readonly', true);
                $('#qty_' + idf).prop('readonly', true);
                $('#satuan_' + idf).prop('readonly', true);

                document.getElementById("tampil_mesin_" + idf).innerHTML = '';
                document.getElementById("tampil_pemesan_" + idf).innerHTML = '';
                $('#deskripsi_' + idf).addClass('cursor-not-allowed bg-secondary-lt');
                $('#serialnumber_' + idf).addClass('cursor-not-allowed bg-secondary-lt');
                $('#qty_' + idf).addClass('cursor-not-allowed bg-secondary-lt');
                $('#satuan_' + idf).addClass('cursor-not-allowed bg-secondary-lt');
            }

            $(document).ready(function() {
                $(".elementprm").select2({
                    language: "id",
                    width: '150px',
                    placeholder: "Pilih Pemesan",
                    ajax: {
                        url: "/getMasterPemesan",
                        dataType: 'json',
                        delay: 200,
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.nama.toUpperCase(),
                                        text: item.nama.toUpperCase(),
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                });
                $(".elementmesn").select2({
                    language: "id",
                    width: '100%',
                    placeholder: "Pilih Mesin",
                    ajax: {
                        url: "/getDataMesinServis",
                        dataType: 'json',
                        // delay: 200,
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
        }

        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            window.Litepicker && (new Litepicker({
                element: document.getElementById('datepicker-icon'),
                buttonText: {
                    previousMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                    nextMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                },
            }));
        });
        // @formatter:on

        var tablePermintaan;

        function syn() {
            tablePermintaan.ajax.reload();
        }
        $(function() {
            /*------------------------------------------
            --------------------------------------------
            Start Render Select2
            --------------------------------------------
            --------------------------------------------*/
            $(".elementkabag").select2({
                language: "id",
                width: '100%',
                placeholder: "Pilih Kabag",
                ajax: {
                    url: "/getKabag",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(response) {
                        console.log(response);
                        return {
                            results: $.map(response, function(item) {
                                return {
                                    text: item.nama,
                                    id: item.nama,
                                }
                            })
                        };
                    },
                    cache: true
                },
            });

            /*------------------------------------------
            --------------------------------------------
            End Render Select2
            --------------------------------------------
            --------------------------------------------*/
            /*------------------------------------------
            --------------------------------------------
            Render DataTable
            --------------------------------------------
            --------------------------------------------*/
            tablePermintaan = $('.datatable-servis').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": false, //Feature control DataTables' server-side processing mode.
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
                    "processing": '<div class="container container-slim py-4"><div class="text-center"><div class="mb-3"></div><div class="text-secondary mb-3">Loading Data...</div><div class="progress progress-sm"><div class="progress-bar progress-bar-indeterminate"></div></div></div></div>',
                    "search": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>',
                    "paginate": {
                        "first": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 6v12"></path><path d="M18 6l-6 6l6 6"></path></svg>',
                        "last": '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right-pipe" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 6l6 6l-6 6"></path><path d="M17 5v13"></path></svg>',
                        "next": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg>',
                        "previous": '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg>',
                    },
                },
                "ajax": {
                    "url": "{{ route('getServis.index') }}",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.dari = $('#idfilter_dari').val();
                        data.sampai = $('#idfilter_sampai').val();
                        data.mesin = $('#idfilter_mesin').val();
                        data.dibuat = $('#dibuat').val();
                        data.unit = $('#unit').val();
                        data.status = $('#status').val();
                    }
                },
                columns: [{
                        title: '',
                        data: 'action',
                        name: 'action',
                        className: "cuspad0 cuspad1",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        title: 'Kodeseri',
                        data: 'kodeseri_servis',
                        name: 'kodeseri_servis',
                        className: "cuspad0 cuspad1 text-center"
                    },
                    {
                        title: 'Noform',
                        data: 'noformservis',
                        name: 'noformservis',
                        className: "cuspad0 cuspad1 text-center"
                    },
                    {
                        title: 'Tanggal',
                        data: 'tgl',
                        name: 'tgl',
                        className: "cuspad0 text-center"
                    },
                    {
                        title: 'Barang',
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 cuspad1"
                    },
                    {
                        title: 'Mesin',
                        data: 'mesin',
                        name: 'mesin',
                        className: "cuspad0 cuspad1 text-center"
                    },
                    {
                        title: 'Kode Mesin',
                        data: 'kode_nomor',
                        name: 'kode_nomor',
                        className: "cuspad0 cuspad1 text-center"
                    },
                    {
                        title: 'Deskripsi',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 cuspad1"
                    },
                    {
                        title: 'Serial Number',
                        data: 'serialnumber',
                        name: 'serialnumber',
                        className: "cuspad0 cuspad1"
                    },
                    {
                        title: 'Qty',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 text-center"
                    },
                    {
                        title: 'Satuan',
                        data: 'satuan',
                        name: 'satuan',
                        className: "cuspad0 text-center"
                    },
                    {
                        title: 'Status',
                        data: 'status',
                        name: 'status',
                        className: 'text-center cuspad0 text-center'
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
            $('.datatable-servis tfoot .th').each(function() {
                var title = $(this).text();
                $(this).html(
                    '<input type="text" class="form-control form-control-sm my-0 border border-dark" placeholder="' +
                    $(this).text().toUpperCase() + '" />'
                );
            });
            /*------------------------------------------==============================================================================================================================================================
            --------------------------------------------==============================================================================================================================================================
            Start Create Data
            --------------------------------------------==============================================================================================================================================================
            --------------------------------------------==============================================================================================================================================================*/
            if ($("#formServis").length > 0) {
                $("#formServis").validate({
                    rules: {
                        tanggal: {
                            required: true,
                        },
                        kabag: {
                            required: true,
                        },
                    },
                    messages: {
                        tanggal: {
                            required: "Masukkan Tanggal",
                        },
                        kabag: {
                            required: "Masukkan Kabag",
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
                        $("body").addClass("cursor-wait");
                        $.ajax({
                            url: "{{ url('storedataServis') }}",
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
                                $("body").removeClass("cursor-wait");
                                console.log('Result:', response);
                                $('#submitServis').html(
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg> Simpan'
                                );
                                $("#submitServis").attr("disabled", false);
                                tablePermintaan.ajax.reload();
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
                                $('#btntabs-profile-8').addClass('active show');
                                $('#btntabs-home-8').removeClass('active show');
                                $('#tabs-profile-8').addClass('active show');
                                $('#tabs-home-8').removeClass('active show');
                            },
                            error: function(data) {
                                $("body").removeClass("cursor-wait");
                                console.log('Error:', data);
                                // const obj = JSON.parse(data.responseJSON);
                                tablePermintaan.ajax.reload();
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
            /*------------------------------------------==============================================================================================================================================================
            --------------------------------------------==============================================================================================================================================================
            End Create Data
            --------------------------------------------==============================================================================================================================================================
            --------------------------------------------==============================================================================================================================================================*/
            /*------------------------------------------
            --------------------------------------------
            Start Render Ajax Modal
            --------------------------------------------
            --------------------------------------------*/
            $('#modalDetailServis').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget)
                var noform = button.data('noform');
                console.log("Fetch Noform: " + noform + "...");
                $(".overlay").fadeIn(300);
                $.ajax({
                    type: 'POST',
                    url: 'viewServis',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        noform: noform,
                    },
                    success: function(data) {
                        $('.fetched-data-servis').html(data);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $(".overlay").fadeOut(300);
                    }, 500);
                });
            });

            $(document).ready(function() {

                $(document).on('click', '.edit-btn', function() {
                    var id = $(this).data('id');


                    $.ajax({
                        url: '/servis/' + id + '/edit',
                        type: 'GET',
                        success: function(data) {
                            $('#modalEditServis input[name="kodeseri_servis"]').val(data
                                .kodeseri_servis);
                            $('#modalEditServis input[name="noformservis"]').val(data
                                .noformservis);
                            $('#modalEditServis input[name="tgl"]').val(data
                                .tgl);
                            $('#modalEditServis input[name="namaBarang"]').val(data
                                .namaBarang);
                            $('#modalEditServis input[name="keterangan"]').val(data
                                .keterangan);
                            $('#modalEditServis input[name="serialnumber"]').val(data
                                .serialnumber);
                            $('#modalEditServis input[name="qty"]').val(data
                                .qty);
                            $('#modalEditServis input[name="satuan"]').val(data
                                .satuan);

                            $('#editForm').attr('action', '/servis/' + id);

                            var modal = new bootstrap.Modal(document.getElementById(
                                'modalEditServis'));
                            modal.show();

                        },
                        error: function() {
                            alert('Failed to fetch data.');
                        }
                    });
                });

                $('#editForm').on('submit', function(e) {
                    e.preventDefault();

                    var formAction = $(this).attr('action');
                    var formData = $(this).serialize();


                    $.ajax({
                        url: formAction,
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Data servis updated successfully.',
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
                            $('#modalEditServis').modal('hide');
                            $('#tablePermintaan').DataTable().ajax.reload();
                        },
                        error: function() {
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

            $('.datatable-servis').on('click', '.remove', function() {
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
                                    url: "{{ route('getPermintaan.store') }}" +
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
                                        tablePermintaan.ajax.reload();
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
                                        tablePermintaan.ajax.reload();
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
                                tablePermintaan.ajax.reload();
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
            /*------------------------------------------
            --------------------------------------------
            End Render Ajax Modal
            --------------------------------------------
            --------------------------------------------*/
        });

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

        document.addEventListener("DOMContentLoaded", function() {
            let options = {
                selector: '#tinymce-default',
                height: 300,
                menubar: false,
                statusbar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                // toolbar: 'undo redo | formatselect | ' +
                //     'bold italic backcolor | alignleft aligncenter ' +
                //     'alignright alignjustify | bullist numlist outdent indent | ' +
                //     'removeformat',

                toolbar: "undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl",
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
            }
            if (localStorage.getItem("tablerTheme") === 'dark') {
                options.skin = 'oxide-dark';
                options.content_css = 'dark';
            }
            tinyMCE.init(options);
        })
    </script>
@endsection
