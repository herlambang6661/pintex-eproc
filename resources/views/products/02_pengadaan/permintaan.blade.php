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
        <datalist id="datalistKatalog">
            @foreach ($katalog as $b)
                <option value="{{ strtoupper($b->katalog) }}">{{ strtoupper($b->katalog) }}</option>
            @endforeach
        </datalist>
        <datalist id="datalistPart">
            @foreach ($part as $c)
                <option value="{{ strtoupper($c->part) }}">{{ strtoupper($c->part) }}</option>
            @endforeach
        </datalist>
        <datalist id="datalistSatuan">
            @foreach ($satuan as $d)
                <option value="{{ strtoupper($d->satuan) }}">{{ strtoupper($d->satuan) }}</option>
            @endforeach
        </datalist>
        <datalist id="datalistPeruntukan">
            @foreach ($peruntukan as $e)
                <option value="{{ strtoupper($e->peruntukan) }}">{{ strtoupper($e->peruntukan) }}</option>
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
                                Permintaan
                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="https://pintex.co.id/apps/HR/Recruitment"><i
                                                class="fa-solid fa-basket-shopping"></i> Pengadaan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#"><i
                                                class="fa-regular fa-paste"></i> Permintaan</a></li>
                                </ol>
                            </div>
                        </div>

                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <ul class="nav">
                                    <a href="#tabs-profile-8"
                                        class="active btn btn-warning d-none d-sm-inline-block border border-warning"
                                        data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"
                                        style="margin-right: 10px">
                                        <i class="fa-solid fa-list-ul"></i>
                                        List Item Permintaan
                                    </a>
                                    <a href="#tabs-home-8"
                                        class="btn btn-primary d-none d-sm-inline-block border border-primary"
                                        data-bs-toggle="tab" aria-selected="true" role="tab">
                                        <i class="fa-solid fa-hand-holding-medical"></i>
                                        Tambah Permintaan
                                    </a>
                                </ul>
                                <ul class="nav">
                                    <a href="#tabs-profile-8"
                                        class="active btn btn-primary d-sm-none btn-icon border border-primary"
                                        data-bs-toggle="tab" aria-selected="true" role="tab"
                                        aria-label="List Item Permintaan" style="margin-right: 10px">
                                        <i class="fa-solid fa-list-ul"></i>
                                    </a>
                                    <a href="#tabs-home-8" class="btn btn-warning d-sm-none btn-icon border border-warning"
                                        data-bs-toggle="tab" aria-selected="true" role="tab"
                                        aria-label="Tambah Permintaan">
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
                                                        {{-- <th class="text-center">Status</th> --}}
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
                                                                value="{{ date('Y-m-t') }}">
                                                        </td>
                                                        <td>
                                                            <select id="dibuat" class="form-select">
                                                                @if (Auth::user()->role == 'own' || Auth::user()->role == 'pur' || Auth::user()->role == 'kng')
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
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="syn()">
                                                                <i class="fa-solid fa-magnifying-glass"></i>
                                                            </button>
                                                        </td>
                                                        {{--
                                                        <td>
                                                            <input type="text" id="idfilter_status" onchange="syn()"
                                                                class="form-control">
                                                        </td> --}}
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table style="width:100%; height: 100%;font-size:13px;"
                                            class="table table-bordered table-striped table-vcenter card-table table-hover text-nowrap datatable datatable-permintaan">
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
                                                    <th class="px-1 th py-1">deskripsi</th>
                                                    <th class="px-1 th py-1">katalog</th>
                                                    <th class="px-1 th py-1">part</th>
                                                    <th class="px-1 th py-1">mesin</th>
                                                    <th class="px-1 th py-1">qty</th>
                                                    <th class="px-1 th py-1">qty_acc</th>
                                                    <th class="px-1 th py-1">satuan</th>
                                                    <th class="px-1 th py-1">dibeli</th>
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
                                        <form method="POST" name="formPermintaan" id="formPermintaan" class="form"
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
                                                        <label class="form-label">Tanggal Permintaan</label>
                                                        <div class="input-icon mb-0">
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
                                                            <h3 class="card-title">Repeat Order</h3>
                                                            <div class="control-group col-lg-3">
                                                                <div class="form-group">
                                                                    <input type="text"
                                                                        class="form-control border border-primary bg-primary-lt"
                                                                        id="repeatOr" placeholder="Kodeseri/Barang...">
                                                                </div>
                                                            </div>
                                                            <div class="hr-text text-blue mb-3 mt-3">Hasil</div>
                                                            <div id="tunggu"></div>
                                                            <div class="col">
                                                                <div id="hasil_cari" class="fw-bold">
                                                                    <p class="text-center">
                                                                        Masukkan Kodeseri untuk Repeat Order
                                                                    </p>
                                                                </div>
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
                                            <div class="hr-text text-blue">Item Permintaan</div>
                                            <input id="idf" value="1" type="hidden">
                                            <div style="overflow-x:auto;overflow-x: scroll;">
                                                <div style="width: 2800px">
                                                    <table id="detail_transaksi" class="control-group text-nowrap"
                                                        border="0"
                                                        style="width: 100%;text-align:center;font-weight: bold;">
                                                        <thead>
                                                            <tr>
                                                                <td
                                                                    style="border-left-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;width: 50px">
                                                                </td>
                                                                <td class="bg-primary text-white" style="width: 200px">
                                                                    Jenis</td>
                                                                <td class="bg-primary text-white" style="width: 200px">
                                                                    Kodeproduk</td>
                                                                <td class="bg-primary text-white" style="width: 200px">
                                                                    Nama Barang</td>
                                                                <td class="bg-primary text-white" style="width: 200px">
                                                                    Deskripsi</td>
                                                                <td class="bg-primary text-white" style="width: 200px">
                                                                    katalog</td>
                                                                <td class="bg-primary text-white" style="width: 200px">
                                                                    Part</td>
                                                                <td class="bg-primary text-white" style="width: 200px">
                                                                    Mesin</td>
                                                                <td class="bg-primary text-white" style="width: 200px">
                                                                    Qty
                                                                </td>
                                                                <td class="bg-primary text-white" style="width: 200px">
                                                                    Satuan</td>
                                                                <td class="bg-primary text-white" style="width: 200px">
                                                                    Pemesan</td>
                                                                <td class="bg-primary text-white" style="width: 200px">
                                                                    Unit</td>
                                                                <td class="bg-primary text-white" style="width: 200px">
                                                                    Peruntukan</td>
                                                                <td class="bg-primary text-white" style="width: 200px">
                                                                    Sample</td>
                                                                <th
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
                                                {{-- <div class="control-group col-lg-4">
                                                    <script>
                                                        var loadFile = function(event) {
                                                            var output = document.getElementById('blah');
                                                            output.src = URL.createObjectURL(event.target
                                                                .files[0]);
                                                            output.onload = function() {
                                                                URL.revokeObjectURL(output
                                                                    .src) // free memory
                                                            }
                                                        };
                                                    </script>

                                                    <div class="mb-3">
                                                        <label class="form-label">Unggah Gambar</label>
                                                        <input type="file" name="gambarKeterangan"
                                                            id="gambarKeterangan" class="form-control-file"
                                                            accept=".jpg, .jpeg, .png, .gif" onchange="loadFile(event)">
                                                    </div>
                                                    <img id="blah" src="#" alt="Preview" width="300px">
                                                </div> --}}
                                            </div>
                                            <br>
                                            <div class="float-xl-right">
                                                <button type="submit" id="submitPermintaan" class="btn btn-primary"><i
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
    </style>
    <div class="modal modal-blur fade" id="modalDetailPermintaan" tabindex="-1" style="display: none;"
        aria-hidden="true">
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
                        Detail Permintaan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="fetched-data-permintaan"></div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-outline-dark me-auto btnadditem" data-bs-toggle="modal" href="#addmoreitem">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Tambah Item di Form ini
                    </a>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modalEditPermintaan" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="overlay">
            <div class="cv-spinner">
                <span class="loader"></span>
            </div>
        </div>
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen-lg-down" role="document">
            <form method="POST" name="formEditPermintaan" id="formEditPermintaan" class="form"
                enctype="multipart/form-data" accept-charset="utf-8" onkeydown="return event.key != 'Enter';"
                data-select2-id="add-form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fa-regular fa-pen-to-square"></i>
                            Edit Permintaan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data-edit-permintaan"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submitEditPermintaan" class="btn btn-primary me-auto"
                            data-bs-dismiss="modal">Simpan</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal modal-blur fade" id="addmoreitem" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="overlay">
            <div class="cv-spinner">
                <span class="loader"></span>
            </div>
        </div>
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen-lg-down" role="document">
            <form method="POST" name="formAddPermintaan" id="formAddPermintaan" class="form"
                enctype="multipart/form-data" accept-charset="utf-8" onkeydown="return event.key != 'Enter';"
                data-select2-id="add-form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-package">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                <path d="M12 12l8 -4.5" />
                                <path d="M12 12l0 9" />
                                <path d="M12 12l-8 -4.5" />
                                <path d="M16 5.25l-8 4.5" />
                            </svg>
                            Tambah Item
                        </h4>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button> --}}
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data-add-permintaan"></div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-outline-dark btnBackToForm me-auto" data-bs-toggle="modal"
                            data-bs-target="#modalDetailPermintaan">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l14 0" />
                                <path d="M5 12l4 4" />
                                <path d="M5 12l4 -4" />
                            </svg>
                            Batal
                        </a>
                        <button type="submit" id="subAddItem" class=" btn btn-primary btnSaveForm"
                            data-bs-toggle="modal" data-bs-target="#modalDetailPermintaan">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M14 4l0 4l-6 0l0 -4" />
                            </svg>
                            Simpan Perubahan
                            </submit>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- End Modals --}}
    <script type="text/javascript">
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

            // Kolom 2 Jenis
            var td = document.createElement("td");
            td.innerHTML += "<select name='jenis[]' id='jenis_" + idf +
                "' class='form-select border-danger' onchange='tampilkan(" + idf +
                ")' style='width:100%;text-transform: uppercase;'><option hidden></option><option value='Standar'>STANDAR</option><option value='Lain'>LAIN-LAIN</option></select>";
            tr.appendChild(td);

            // Kolom 3 Kodeproduk                            
            var td = document.createElement("td");
            td.innerHTML += '<select name="kodeproduk[]" id="kodeproduk' + idf +
                '" class="form-select  border-danger" style="text-transform: uppercase;"><option hidden></option><option value="8" data-ket="Sparepart">8 - Sparepart</option><option value="17" data-ket="Kendaraan">17 - Kendaraan</option><option value="18" data-ket="Perlengkapan">18 - Perlengkapan</option></select>';
            tr.appendChild(td);

            // Kolom 4 Nama Barang / Jasa
            var td = document.createElement("td");
            td.innerHTML += "<div name='menampilkan_barang_" + idf + "' id='menampilkan_barang_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 5 Deskripsi
            var td = document.createElement("td");
            td.innerHTML += "<div name='menampilkan_deskripsi_" + idf + "' id='menampilkan_deskripsi_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 6 Katalog
            var td = document.createElement("td");
            td.innerHTML += "<div name='menampilkan_katalog_" + idf + "' id='menampilkan_katalog_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 7 Part
            var td = document.createElement("td");
            td.innerHTML += "<div name='menampilkan_part_" + idf + "' id='menampilkan_part_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 8 Mesin
            var td = document.createElement("td");
            td.innerHTML += "<div name='tampil_mesin_" + idf + "' id='tampil_mesin_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 9 Qty
            var td = document.createElement("td");
            td.innerHTML += "<input readonly type='number' name='qty[]' id='qty_" + idf +
                "' class='form-control  border-danger' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 10 Satuan
            var td = document.createElement("td");
            td.innerHTML += "<div name='menampilkan_satuan_" + idf + "' id='menampilkan_satuan_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 11 Pemesan
            var td = document.createElement("td");
            td.innerHTML += "<div name='tampil_pemesan_" + idf + "' id='tampil_pemesan_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 12 Unit
            var td = document.createElement("td");
            td.innerHTML += "<input type='text' name='unit[]' id='unit_" + idf +
                "' class='form-control  inputNone' style='text-transform: uppercase;' value='{{ Auth::user()->alias == 'TFI' ? 'TFI' : (Auth::user()->username == 'yanti' ? 'Unit 1' : (Auth::user()->username == 'rizki' ? 'Unit 2' : '')) }}'>";
            tr.appendChild(td);

            // Kolom 13 Peruntukan
            var td = document.createElement("td");
            td.innerHTML += '<input readonly name="peruntukan[]" id="peruntukan_' + idf +
                '" class="form-control  inputNone" list"datalistPeruntukan" style="text-transform: uppercase;">';
            tr.appendChild(td);

            // Kolom 14 Sample
            var td = document.createElement("td");
            td.innerHTML += '<input readonly type="number" value="0" name="sample[]" id="sample_' + idf +
                '" class="form-control " style="">';
            tr.appendChild(td);

            // Kolom 14 Urgent
            var td = document.createElement("td");
            td.setAttribute("align", "center");
            td.setAttribute("style", "border-right-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;");
            td.innerHTML += '<input type="checkbox" name="urgent[]" id="urgent' + idf + '" value="1"><br>';
            tr.appendChild(td);

            detail_transaksi.appendChild(tr);

            idf = (idf - 1) + 2;
            document.getElementById("idf").value = idf;
            $(".element").select2({
                placeholder: "Pilih Kodeproduk"
            });
        }

        function hapusElemen(idf) {
            $("#btn-remove" + idf).remove();
        }

        function tampilkan(idf) {
            var var_select = document.getElementById("jenis_" + idf).value;
            if (var_select == "Standar") {
                document.getElementById("menampilkan_barang_" + idf).innerHTML =
                    '<select name="namaBarang[]" class="form-select  elementbrg border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_deskripsi_" + idf).innerHTML =
                    '<select name="deskripsi[]" class="form-select elementdeskripsi border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_katalog_" + idf).innerHTML =
                    '<select name="katalog[]" class="form-select elementkatalog border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_part_" + idf).innerHTML =
                    '<select name="part[]" class="form-select elementpart border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_satuan_" + idf).innerHTML =
                    '<select name="satuan[]" class="form-select elementsatuan border-danger" style="text-transform: uppercase;"><option></option></select>';

                document.getElementById("tampil_mesin_" + idf).innerHTML =
                    '<select name="mesin[]" class="form-select border-danger elementmsn text-nowrap" style="text-transform: uppercase;"><option value="{{ Auth::user()->alias == 'TFI' ? '38TFI' : '' }}" selected="selected">{{ Auth::user()->alias == 'TFI' ? 'TFI TFI (UMUM)(UMUM)' : '' }}</option></select>';
                $('#qty_' + idf).prop('readonly', false);
                $('#satuan_' + idf).prop('readonly', false);
                document.getElementById("tampil_pemesan_" + idf).innerHTML =
                    '<select required name="pemesan[]" class="form-select border-danger elementprm inputNone" style="text-transform: uppercase;"><option></option></select>';
                $('#peruntukan_' + idf).prop('readonly', false);
                $('#sample_' + idf).prop('readonly', false);
            } else if (var_select == "Lain") {
                document.getElementById("menampilkan_barang_" + idf).innerHTML =
                    '<select name="namaBarang[]" class="form-select elementbrglain border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_deskripsi_" + idf).innerHTML =
                    '<select name="deskripsi[]" class="form-select elementdeskripsi border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_katalog_" + idf).innerHTML =
                    '<select name="katalog[]" class="form-select elementkatalog border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_part_" + idf).innerHTML =
                    '<select name="part[]" class="form-select elementpart border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_satuan_" + idf).innerHTML =
                    '<select name="satuan[]" class="form-select elementsatuan border-danger" style="text-transform: uppercase;"><option></option></select>';

                document.getElementById("tampil_mesin_" + idf).innerHTML =
                    '<select name="mesin[]" class="form-select border-danger elementmsn" style="text-transform: uppercase;"><option value="{{ Auth::user()->alias == 'TFI' ? '38TFI' : '' }}" selected="selected">{{ Auth::user()->alias == 'TFI' ? 'TFI TFI (UMUM)(UMUM)' : '' }}</option></select>';
                $('#qty_' + idf).prop('readonly', false);
                $('#satuan_' + idf).prop('readonly', false);

                document.getElementById("tampil_pemesan_" + idf).innerHTML =
                    '<select name="pemesan[]" class="form-select border-danger elementprm inputNone" style="text-transform: uppercase;"><option></option></select>';
                $('#peruntukan_' + idf).prop('readonly', false);
                $('#sample_' + idf).prop('readonly', false);
            }

            $(document).ready(function() {
                $(".elementbrg").select2({
                    language: "id",
                    placeholder: "Pilih Barang",
                    ajax: {
                        url: "/getMasterBarang",
                        dataType: 'json',
                        delay: 200,
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.nama,
                                        text: item.nama.toUpperCase(),
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                });
                $(".elementbrglain").select2({
                    language: "id",
                    placeholder: "Ketik Nama Barang",
                    tags: "true",
                    allowClear: true,
                    minimumInputLength: 1,
                    ajax: {
                        url: "/getMasterLain",
                        dataType: 'json',
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.namaBarang,
                                        text: item.namaBarang.toUpperCase(),
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                });
                $(".elementdeskripsi").select2({
                    language: "id",
                    placeholder: "Ketik Deskripsi",
                    tags: "true",
                    allowClear: true,
                    minimumInputLength: 1,
                    ajax: {
                        url: "/getMasterDeskripsi",
                        dataType: 'json',
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.keterangan,
                                        text: item.keterangan.toUpperCase(),
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                });
                $(".elementkatalog").select2({
                    language: "id",
                    placeholder: "Ketik Katalog",
                    tags: "true",
                    allowClear: true,
                    minimumInputLength: 1,
                    ajax: {
                        url: "/getMasterKatalog",
                        dataType: 'json',
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.katalog,
                                        text: item.katalog.toUpperCase(),
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                });
                $(".elementpart").select2({
                    language: "id",
                    placeholder: "Ketik Part",
                    tags: "true",
                    allowClear: true,
                    minimumInputLength: 1,
                    ajax: {
                        url: "/getMasterPart",
                        dataType: 'json',
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.part,
                                        text: item.part.toUpperCase(),
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                });
                $(".elementmsn").select2({
                    language: "id",
                    width: '250px',
                    placeholder: "Pilih Mesin",
                    ajax: {
                        url: "/getMesin",
                        dataType: 'json',
                        delay: 200,
                        processResults: function(response) {
                            console.log(response);
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.mesin.toUpperCase() + " " + item.merk
                                            .toUpperCase() + (item.unit == '88' ? ' (UMUM)' :
                                                " (UNIT " + item.unit + ")"),
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                });
                $(".elementsatuan").select2({
                    language: "id",
                    placeholder: "Ketik Satuan",
                    tags: "true",
                    allowClear: true,
                    ajax: {
                        url: "/getMasterSatuan",
                        dataType: 'json',
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.satuan,
                                        text: item.satuan.toUpperCase(),
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                });
                $(".elementprm").select2({
                    language: "id",
                    placeholder: "Pilih Pemesan",
                    ajax: {
                        url: "/getMasterPemesan",
                        // type: "post",
                        dataType: 'json',
                        delay: 200,
                        // data: function(params) {
                        //     return {
                        //         searchTerm: params.term // search term
                        //     };
                        // },
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
            });
        }

        function tambahItemForm() {
            var idAddForm = document.getElementById("idAddForm").value;

            var detail_add_transaksi = document.getElementById("detail_add_transaksi");

            var tr = document.createElement("tr");
            tr.setAttribute("id", "btn-remove-form" + idAddForm);

            // Kolom 1 Hapus
            var td = document.createElement("td");
            td.setAttribute("align", "center");
            td.setAttribute("style", "border-left-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;");
            td.innerHTML +=
                '<button class="btn btn-sm btn-danger btn-icon remove" type="button" onclick="hapusElemenForm(' +
                idAddForm +
                ');"><i class="fa-regular fa-trash-can"></i> </button>';
            tr.appendChild(td);

            // Kolom 2 Jenis
            var td = document.createElement("td");
            td.innerHTML += "<select name='jenis[]' id='jenis_" + idAddForm +
                "' class='form-select border border-red' onchange='tampilkanForm(" + idAddForm +
                ")' style='width:100%;text-transform: uppercase;'><option hidden></option><option value='Standar'>STANDAR</option><option value='Lain'>LAIN-LAIN</option></select>";
            tr.appendChild(td);

            // Kolom 3 Kodeproduk                            
            var td = document.createElement("td");
            td.innerHTML += '<select name="kodeproduk[]" id="kodeproduk' + idAddForm +
                '" class="form-select border border-red" style="text-transform: uppercase;"><option hidden></option><option value="8" data-ket="Sparepart">8 - Sparepart</option><option value="17" data-ket="Kendaraan">17 - Kendaraan</option><option value="18" data-ket="Perlengkapan">18 - Perlengkapan</option></select>';
            tr.appendChild(td);

            // Kolom 4 Nama Barang / Jasa
            var td = document.createElement("td");
            td.innerHTML += "<div name='menampilkan_add_barang_" + idAddForm + "' id='menampilkan_add_barang_" + idAddForm +
                "'></div>";
            tr.appendChild(td);

            // Kolom 5 Deskripsi
            var td = document.createElement("td");
            td.innerHTML += "<div name='menampilkan_add_deskripsi_" + idAddForm + "' id='menampilkan_add_deskripsi_" +
                idAddForm +
                "'></div>";
            tr.appendChild(td);

            // Kolom 6 Katalog
            var td = document.createElement("td");
            td.innerHTML += "<div name='menampilkan_add_katalog_" + idAddForm + "' id='menampilkan_add_katalog_" +
                idAddForm + "'></div>";
            tr.appendChild(td);

            // Kolom 7 Part
            var td = document.createElement("td");
            td.innerHTML += "<div name='menampilkan_add_part_" + idAddForm + "' id='menampilkan_add_part_" + idAddForm +
                "'></div>";
            tr.appendChild(td);

            // Kolom 8 Mesin
            var td = document.createElement("td");
            td.innerHTML += "<div name='tampil_add_mesin_" + idAddForm + "' id='tampil_add_mesin_" + idAddForm + "'></div>";
            tr.appendChild(td);

            // Kolom 9 Qty
            var td = document.createElement("td");
            td.innerHTML += "<input readonly type='number' name='qty[]' id='qty_" + idAddForm +
                "' class='form-control border border-red' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 10 Satuan
            var td = document.createElement("td");
            td.innerHTML += "<div name='menampilkan_add_satuan_" + idAddForm + "' id='menampilkan_add_satuan_" + idAddForm +
                "'></div>";
            tr.appendChild(td);

            // Kolom 11 Pemesan
            var td = document.createElement("td");
            td.innerHTML += "<div name='tampil_pemesan_" + idAddForm + "' id='tampil_add_pemesan_" + idAddForm + "'></div>";
            tr.appendChild(td);

            // Kolom 12 Unit
            var td = document.createElement("td");
            td.innerHTML += "<input type='text' name='unit[]' id='unit_" + idAddForm +
                "' class='form-control  inputNone' style='text-transform: uppercase;' value='{{ Auth::user()->alias == 'TFI' ? 'TFI' : (Auth::user()->username == 'yanti' ? 'Unit 1' : (Auth::user()->username == 'rizki' ? 'Unit 2' : '')) }}'>";
            tr.appendChild(td);

            // Kolom 13 Peruntukan
            var td = document.createElement("td");
            td.innerHTML += '<input readonly name="peruntukan[]" id="peruntukan_' + idAddForm +
                '" class="form-control  inputNone" list"datalistPeruntukan" style="text-transform: uppercase;">';
            tr.appendChild(td);

            // Kolom 14 Sample
            var td = document.createElement("td");
            td.innerHTML += '<input readonly type="number" value="0" name="sample[]" id="sample_' + idAddForm +
                '" class="form-control " style="">';
            tr.appendChild(td);

            // Kolom 14 Urgent
            var td = document.createElement("td");
            td.setAttribute("align", "center");
            td.setAttribute("style", "border-right-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;");
            td.innerHTML += '<input type="checkbox" name="urgent[]" id="urgent' + idAddForm + '" value="1"><br>';
            tr.appendChild(td);

            detail_add_transaksi.appendChild(tr);

            idAddForm = (idAddForm - 1) + 2;
            document.getElementById("idAddForm").value = idAddForm;
        }

        function hapusElemenForm(idAddForm) {
            $("#btn-remove-form" + idAddForm).remove();
        }

        function tampilkanForm(idAddForm) {
            var var_select = document.getElementById("jenis_" + idAddForm).value;
            if (var_select == "Standar") {
                document.getElementById("menampilkan_add_barang_" + idAddForm).innerHTML =
                    '<select name="namaBarang[]" class="form-select border border-red elementbrgAdd inputNone" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_add_deskripsi_" + idAddForm).innerHTML =
                    '<select name="deskripsi[]" class="form-select elementdeskripsiAdd border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_add_katalog_" + idAddForm).innerHTML =
                    '<select name="katalog[]" class="form-select elementkatalogAdd border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_add_part_" + idAddForm).innerHTML =
                    '<select name="part[]" class="form-select elementpartAdd border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_add_satuan_" + idAddForm).innerHTML =
                    '<select name="satuan[]" class="form-select elementsatuanAdd border-danger" style="text-transform: uppercase;"><option></option></select>';

                document.getElementById("tampil_add_mesin_" + idAddForm).innerHTML =
                    '<select name="mesin[]" class="form-select border border-red elementmsnAdd text-nowrap" style="text-transform: uppercase;"><option value="{{ Auth::user()->alias == 'TFI' ? '38TFI' : '' }}" selected="selected">{{ Auth::user()->alias == 'TFI' ? 'TFI TFI (UMUM)(UMUM)' : '' }}</option></select>';
                $('#qty_' + idAddForm).prop('readonly', false);
                document.getElementById("tampil_add_pemesan_" + idAddForm).innerHTML =
                    '<select required name="pemesan[]" class="form-select border border-red elementprmAdd inputNone" style="text-transform: uppercase;"><option></option></select>';
                $('#peruntukan_' + idAddForm).prop('readonly', false);
                $('#sample_' + idAddForm).prop('readonly', false);
            } else if (var_select == "Lain") {
                document.getElementById("menampilkan_add_barang_" + idAddForm).innerHTML =
                    '<select name="namaBarang[]" class="form-select elementbrglainAdd border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_add_deskripsi_" + idAddForm).innerHTML =
                    '<select name="deskripsi[]" class="form-select elementdeskripsiAdd border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_add_katalog_" + idAddForm).innerHTML =
                    '<select name="katalog[]" class="form-select elementkatalogAdd border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_add_part_" + idAddForm).innerHTML =
                    '<select name="part[]" class="form-select elementpartAdd border-danger" style="text-transform: uppercase;"><option></option></select>';
                document.getElementById("menampilkan_add_satuan_" + idAddForm).innerHTML =
                    '<select name="satuan[]" class="form-select elementsatuanAdd border-danger" style="text-transform: uppercase;"><option></option></select>';

                document.getElementById("tampil_add_mesin_" + idAddForm).innerHTML =
                    '<select name="mesin[]" class="form-select border border-red elementmsnAdd" style="text-transform: uppercase;"><option value="{{ Auth::user()->alias == 'TFI' ? '38TFI' : '' }}" selected="selected">{{ Auth::user()->alias == 'TFI' ? 'TFI TFI (UMUM)(UMUM)' : '' }}</option></select>';
                $('#qty_' + idAddForm).prop('readonly', false);

                document.getElementById("tampil_add_pemesan_" + idAddForm).innerHTML =
                    '<select name="pemesan[]" class="form-select border border-red elementprmAdd inputNone" style="text-transform: uppercase;"><option></option></select>';
                $('#peruntukan_' + idAddForm).prop('readonly', false);
                $('#sample_' + idAddForm).prop('readonly', false);
            }

            $(document).ready(function() {
                $(".elementbrgAdd").select2({
                    dropdownParent: $("#addmoreitem"),
                    language: "id",
                    placeholder: "Pilih Barang",
                    ajax: {
                        url: "/getMasterBarang",
                        // type: "post",
                        dataType: 'json',
                        delay: 200,
                        // data: function(params) {
                        //     return {
                        //         searchTerm: params.term // search term
                        //     };
                        // },
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.nama,
                                        text: item.nama.toUpperCase(),
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                });
                $(".elementprmAdd").select2({
                    dropdownParent: $("#addmoreitem"),
                    language: "id",
                    placeholder: "Pilih Pemesan",
                    ajax: {
                        url: "/getMasterPemesan",
                        // type: "post",
                        dataType: 'json',
                        delay: 200,
                        // data: function(params) {
                        //     return {
                        //         searchTerm: params.term // search term
                        //     };
                        // },
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
                $(".elementmsnAdd").select2({
                    dropdownParent: $("#addmoreitem"),
                    language: "id",
                    width: '250px',
                    placeholder: "Pilih Mesin",
                    ajax: {
                        url: "/getMesin",
                        // type: "post",
                        dataType: 'json',
                        delay: 200,
                        // data: function(params) {
                        //     return {
                        //         searchTerm: params.term // search term
                        //     };
                        // },
                        processResults: function(response) {
                            console.log(response);
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.mesin.toUpperCase() + " " + item.merk
                                            .toUpperCase() + (item.unit == '88' ? ' (UMUM)' :
                                                " (UNIT " + item.unit + ")"),
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                });
                $(".elementbrglainAdd").select2({
                    dropdownParent: $("#addmoreitem"),
                    language: "id",
                    placeholder: "Ketik Nama Barang",
                    tags: "true",
                    allowClear: true,
                    minimumInputLength: 1,
                    ajax: {
                        url: "/getMasterLain",
                        dataType: 'json',
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.namaBarang,
                                        text: item.namaBarang.toUpperCase(),
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                });
                $(".elementdeskripsiAdd").select2({
                    dropdownParent: $("#addmoreitem"),
                    language: "id",
                    placeholder: "Ketik Deskripsi",
                    tags: "true",
                    allowClear: true,
                    minimumInputLength: 1,
                    ajax: {
                        url: "/getMasterDeskripsi",
                        dataType: 'json',
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.keterangan,
                                        text: item.keterangan.toUpperCase(),
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                });
                $(".elementkatalogAdd").select2({
                    dropdownParent: $("#addmoreitem"),
                    language: "id",
                    placeholder: "Ketik Katalog",
                    tags: "true",
                    allowClear: true,
                    minimumInputLength: 1,
                    ajax: {
                        url: "/getMasterKatalog",
                        dataType: 'json',
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.katalog,
                                        text: item.katalog.toUpperCase(),
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                });
                $(".elementpartAdd").select2({
                    dropdownParent: $("#addmoreitem"),
                    language: "id",
                    placeholder: "Ketik Part",
                    tags: "true",
                    allowClear: true,
                    minimumInputLength: 1,
                    ajax: {
                        url: "/getMasterPart",
                        dataType: 'json',
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.part,
                                        text: item.part.toUpperCase(),
                                    }
                                })
                            };
                        },
                        cache: true
                    },
                });
                $(".elementsatuanAdd").select2({
                    dropdownParent: $("#addmoreitem"),
                    language: "id",
                    placeholder: "Ketik Satuan",
                    tags: "true",
                    allowClear: true,
                    ajax: {
                        url: "/getMasterSatuan",
                        dataType: 'json',
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.satuan,
                                        text: item.satuan.toUpperCase(),
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

            $("#repeatOr").keyup(function(event) {
                if (event.keyCode === 13) {
                    var id = document.getElementById("repeatOr").value;
                    $.ajax({
                        type: "POST",
                        url: "{{ route('pengadaan/permintaan/repeatOrder') }}",
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
                            document.getElementById("repeatOr").value = "";
                            document.getElementById("repeatOr").focus();
                        }
                    });
                }
            });
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
            tablePermintaan = $('.datatable-permintaan').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
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
                    "url": "{{ route('getPermintaan.index') }}",
                    "data": function(data) {
                        data._token = "{{ csrf_token() }}";
                        data.dari = $('#idfilter_dari').val();
                        data.sampai = $('#idfilter_sampai').val();
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
                        data: 'kodeseri',
                        name: 'kodeseri',
                        className: "cuspad0 cuspad1 text-center"
                    },
                    {
                        title: 'Noform',
                        data: 'noform',
                        name: 'noform',
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
                        title: 'Deskripsi',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 cuspad1"
                    },
                    {
                        title: 'Katalog',
                        data: 'katalog',
                        name: 'katalog',
                        className: "cuspad0 cuspad1"
                    },
                    {
                        title: 'Part',
                        data: 'part',
                        name: 'part',
                        className: "cuspad0 cuspad1"
                    },
                    {
                        title: 'Mesin',
                        data: 'mesin',
                        name: 'mesin',
                        className: "cuspad0 cuspad1 text-center"
                    },
                    {
                        title: 'Qty PO',
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 text-center"
                    },
                    {
                        title: 'Qty Acc',
                        data: 'qtyacc',
                        name: 'qtyacc',
                        className: "cuspad0 text-center"
                    },
                    {
                        title: 'Satuan',
                        data: 'satuan',
                        name: 'satuan',
                        className: "cuspad0 text-center"
                    },
                    {
                        title: 'Dibeli',
                        data: 'dibeli',
                        name: 'dibeli',
                        className: "cuspad0 cuspad1 text-center"
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
            $('.datatable-permintaan tfoot .th').each(function() {
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
            if ($("#formPermintaan").length > 0) {
                $("#formPermintaan").validate({
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

                        $('#submitPermintaan').html(
                            '<i class="fa-solid fa-fw fa-spinner fa-spin"></i> Mohon Menunggu...');
                        $("#submitPermintaan").attr("disabled", true);

                        $.ajax({
                            url: "{{ url('storedataPermintaan') }}",
                            type: "POST",
                            data: $('#formPermintaan').serialize(),
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
                                $('#submitPermintaan').html(
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg> Simpan'
                                );
                                $("#submitPermintaan").attr("disabled", false);
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
                                document.getElementById("formPermintaan").reset();
                                $('#tabs-profile-8').addClass('active show');
                                $('#tabs-home-8').removeClass('active show');
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                // const obj = JSON.parse(data.responseJSON);
                                tablePermintaan.ajax.reload();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Input',
                                    html: data.responseJSON.message,
                                    showConfirmButton: true
                                });
                                $('#submitPermintaan').html(
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg> Simpan'
                                );
                                $("#submitPermintaan").attr("disabled", false);
                            }
                        });
                    }
                })
            }
            if ($("#formEditPermintaan").length > 0) {
                $("#formEditPermintaan").validate({
                    submitHandler: function(form) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $('#submitEditPermintaan').html(
                            '<i class="fa-solid fa-fw fa-spinner fa-spin"></i> Mohon Menunggu...');
                        $("#submitEditPermintaan").attr("disabled", true);
                        $.ajax({
                            url: "{{ url('storedataEditPermintaan') }}",
                            type: "POST",
                            data: $('#formEditPermintaan').serialize(),
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
                                $('#submitEditPermintaan').html(
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg> Simpan'
                                );
                                $("#submitEditPermintaan").attr("disabled", false);
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
                                document.getElementById("formEditPermintaan").reset();
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                // const obj = JSON.parse(data.responseJSON);
                                tablePermintaan.ajax.reload();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Input',
                                    html: data.responseJSON.message,
                                    showConfirmButton: true
                                });
                                $('#submitEditPermintaan').html(
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg> Simpan'
                                );
                                $("#submitEditPermintaan").attr("disabled", false);
                            }
                        });
                    }
                })
            }
            if ($("#formAddPermintaan").length > 0) {
                $("#formAddPermintaan").validate({
                    submitHandler: function(form) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $('#subAddItem').html(
                            '<i class="fa-solid fa-fw fa-spinner fa-spin"></i> Mohon Menunggu...');
                        $("#subAddItem").attr("disabled", true);
                        $.ajax({
                            url: "{{ url('storedataAddPermintaan') }}",
                            type: "POST",
                            data: $('#formAddPermintaan').serialize(),
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
                                $('#subAddItem').html(
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg> Simpan'
                                );
                                $("#subAddItem").attr("disabled", false);
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
                                document.getElementById("formAddPermintaan").reset();
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                // const obj = JSON.parse(data.responseJSON);
                                tablePermintaan.ajax.reload();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Input',
                                    html: data.responseJSON.message,
                                    showConfirmButton: true
                                });
                                $('#subAddItem').html(
                                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg> Simpan'
                                );
                                $("#subAddItem").attr("disabled", false);
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
            $('#modalDetailPermintaan').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget)
                var noform = button.data('noform');
                console.log("Fetch Noform: " + noform + "...");
                $(".overlay").fadeIn(300);
                $.ajax({
                    type: 'POST',
                    url: 'viewPermintaan',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        noform: noform,
                    },
                    success: function(data) {
                        $('.fetched-data-permintaan').html(data);
                        $(".btnBackToForm").attr("data-noform",
                            noform);
                        $(".btnSaveForm").attr("data-noform",
                            noform);
                        $(".btnadditem").attr("data-noform",
                            noform);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $(".overlay").fadeOut(300);
                    }, 500);
                });
            });
            $('#addmoreitem').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget)
                var noform = button.data('noform');
                console.log("Add data in Noform: " + noform + "...");
                $(".overlay").fadeIn(300);
                $.ajax({
                    type: 'POST',
                    url: 'viewAddPermintaan',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        noform: noform,
                    },
                    success: function(data) {
                        $('.fetched-data-add-permintaan').html(data);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $(".overlay").fadeOut(300);
                    }, 500);
                });
            });

            $('#modalEditPermintaan').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget)
                var id = button.data('id');
                console.log("Fetch Id Item: " + id + "...");
                $(".overlay").fadeIn(300);
                $.ajax({
                    type: 'POST',
                    url: 'viewEditPermintaan',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function(data) {
                        $('.fetched-data-edit-permintaan').html(data);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $(".overlay").fadeOut(300);
                    }, 500);
                });
            });

            $('.datatable-permintaan').on('click', '.remove', function() {
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

        $(document).on('click', '.tambahkebawah', function() {
            document.getElementById("repeatOr").value = "";
            document.getElementById("repeatOr").focus();
            $("#hasil_cari").hide();
            var Rjenis = $(this).data('jenis');
            var Rkodeproduk = $(this).data('kodeproduk');
            var Rnamabarang = $(this).data('namabarang');
            var Rdeskripsi = $(this).data('deskripsi');
            var Rkatalog = $(this).data('katalog');
            var Rpart = $(this).data('part');
            var Rqty = $(this).data('qty');
            var Rsatuan = $(this).data('satuan');
            var Runit = $(this).data('unit');
            var Rperuntukan = $(this).data('peruntukan');
            var Rsample = $(this).data('sample');

            var idf = document.getElementById("idf").value;
            var detail_transaksi = document.getElementById("detail_transaksi");
            var tr = document.createElement("tr");
            tr.setAttribute("id", "btn-remove" + idf);

            // Kolom 0 Hapus
            var td = document.createElement("td");
            td.setAttribute("align", "center");
            td.setAttribute("style",
                "border-left-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;");
            td.innerHTML +=
                '<button class="btn btn-sm btn-danger btn-icon remove" type="button" onclick="hapusElemen(' +
                idf +
                ');"><i class="fa-regular fa-trash-can"></i> </button>';
            tr.appendChild(td);
            // Kolom 2 Jenis
            var td = document.createElement("td");
            td.innerHTML += "<select name='jenis[]' id='jenis_" + idf +
                "' class='form-select inputNone' onchange='tampilkan(" + idf +
                ")' style='width:100%;text-transform: uppercase;'><option value='" + Rjenis + "'>" + Rjenis +
                "</option><option value='Standar'>STANDAR</option><option value='Lain'>LAIN-LAIN</option></select>";
            tr.appendChild(td);

            // Kolom 3 Kodeproduk                            
            var td = document.createElement("td");
            td.innerHTML += '<select name="kodeproduk[]" id="kodeproduk' + idf +
                '" class="form-select  inputNone" style="text-transform: uppercase;"><option value="' +
                Rkodeproduk +
                '">' +
                Rkodeproduk +
                '</option><option value="8" data-ket="Sparepart">8 - Sparepart</option><option value="17" data-ket="Kendaraan">17 - Kendaraan</option><option value="18" data-ket="Perlengkapan">18 - Perlengkapan</option></select>';
            tr.appendChild(td);

            // Kolom 4 Nama Barang / Jasa
            var td = document.createElement("td");
            td.innerHTML += "<div name='menampilkan_barang_" + idf + "' id='menampilkan_barang_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 5 Deskripsi
            var td = document.createElement("td");
            td.innerHTML +=
                "<input readonly type='text' list='datalistDeskripsi' name='deskripsi[]' id='deskripsi_" + idf +
                "' class='form-control inputNone' value='" + Rdeskripsi + "' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 6 Katalog
            var td = document.createElement("td");
            td.innerHTML += "<input readonly type='text' list='datalistKatalog' name='katalog[]' id='katalog" +
                idf +
                "'  value='" + Rkatalog + "' class='form-control  inputNone' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 7 Part
            var td = document.createElement("td");
            td.innerHTML += "<input readonly type='text' list='datalistPart' name='part[]' id='part_" + idf +
                "' class='form-control  inputNone' value='" + Rpart + "' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 8 Mesin
            var td = document.createElement("td");
            td.innerHTML += "<div name='tampil_mesin_" + idf + "' id='tampil_mesin_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 9 Qty
            var td = document.createElement("td");
            td.innerHTML += "<input readonly type='number' name='qty[]' id='qty_" + idf +
                "' class='form-control  inputNone' value='" + Rqty + "' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 10 Satuan
            var td = document.createElement("td");
            td.innerHTML += "<input readonly list='datalistSatuan' type='text' name='satuan[]' id='satuan_" + idf +
                "' class='form-control  inputNone' value='" + Rsatuan + "' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 11 Pemesan
            var td = document.createElement("td");
            td.innerHTML += "<div name='tampil_pemesan_" + idf + "' id='tampil_pemesan_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 12 Unit
            var td = document.createElement("td");
            td.innerHTML += "<input type='text' name='unit[]' id='unit_" + idf +
                "' class='form-control  inputNone' value='" + Runit +
                "' style='text-transform: uppercase;' value='" +
                unit + "'>";
            tr.appendChild(td);

            // Kolom 13 Peruntukan
            var td = document.createElement("td");
            td.innerHTML += '<input readonly name="peruntukan[]" id="peruntukan_' + idf +
                '" class="form-control  inputNone"  value="' + Rperuntukan +
                '" list"datalistPeruntukan" style="text-transform: uppercase;">';
            tr.appendChild(td);

            // Kolom 14 Sample
            var td = document.createElement("td");
            td.innerHTML += '<input readonly type="number" value="' + Rsample +
                '" name="sample[]" id="sample_' + idf +
                '" class="form-control " style="">';
            tr.appendChild(td);

            // Kolom 14 Urgent
            var td = document.createElement("td");
            td.setAttribute("align", "center");
            td.setAttribute("style",
                "border-right-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;");
            td.innerHTML += '<input type="checkbox" name="urgent[]" id="urgent' + idf + '" value="1"><br>';
            tr.appendChild(td);

            detail_transaksi.appendChild(tr);

            idf = (idf - 1) + 2;
        });
    </script>
@endsection
