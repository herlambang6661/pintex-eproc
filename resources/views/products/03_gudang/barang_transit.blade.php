@extends('layouts.app')
@section('content')
    @include('components.alert')
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-transform"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 6a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    <path d="M21 11v-3a2 2 0 0 0 -2 -2h-6l3 3m0 -6l-3 3" />
                                    <path d="M3 13v3a2 2 0 0 0 2 2h6l-3 -3m0 6l3 -3" />
                                    <path d="M15 18a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                </svg>
                                Barang Transit
                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="https://pintex.co.id/apps/HR/Recruitment"><i
                                                class="fa-solid fa-basket-shopping"></i> Gudang</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#"><i
                                                class="fa-regular fa-paste"></i> Barang Transit</a></li>
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
                                        List Transit
                                    </a>
                                    <a href="#tabs-home-8"
                                        class="btn btn-primary d-none d-sm-inline-block border border-primary"
                                        data-bs-toggle="tab" aria-selected="true" role="tab">
                                        <i class="fa-solid fa-hand-holding-medical"></i>
                                        Input Barang
                                    </a>
                                </ul>
                                <ul class="nav">
                                    <a href="#tabs-profile-8"
                                        class="nav-link btn btn-primary d-sm-none btn-icon border border-primary"
                                        data-bs-toggle="tab" aria-selected="true" role="tab"
                                        aria-label="List Item Permintaan" style="margin-right: 10px">
                                        <i class="fa-solid fa-list-ul"></i>
                                    </a>
                                    <a href="#tabs-home-8"
                                        class="nav-link btn btn-warning d-sm-none btn-icon border border-warning"
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
                                                        <th class="text-center"></th>
                                                        <th class="text-center"></th>
                                                        <th class="text-center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="date" id="idfilter_dari" class="form-control"
                                                                onchange="syn()" value="{{ date('Y-01-01') }}">
                                                        </td>
                                                        <td>
                                                            <input type="date" id="idfilter_sampai" class="form-control "
                                                                onchange="syn()" value="{{ date('Y-m-d') }}">
                                                        </td>
                                                        <td>
                                                            <a href="#" class="btn btn-primary btn-icon"
                                                                aria-label="Button">
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
                                                            </a>
                                                            <input class="btn btn-primary" type="reset" value="Reset">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table style="width:100%; height: 100%;font-size:13px;"
                                            class="table table-bordered table-striped table-vcenter card-table table-hover text-nowrap datatable datatable-transit">
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-home-8" role="tabpanel">
                                <div class="card shadow card-active">
                                    <div class="card-body">
                                        <form method="POST" id="formTransit" class="form"
                                            enctype="multipart/form-data" accept-charset="utf-8">
                                            @csrf
                                            <div class="row">
                                                <div class="control-group col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal Permintaan</label>
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
                                                    <div class="mb-1">
                                                        <label class="form-label">Noform</label>
                                                        <input name="text" class="form-control "
                                                            placeholder="Select a noform" id="datepicker-icon"
                                                            value="" />
                                                    </div>
                                                </div>
                                                <div class="control-group col-lg-9">
                                                    <div class="card">
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
                                                            {{-- <h3 class="card-title">Repeat Order</h3>
                                                            <div class="control-group col-lg-3">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        id="repeatOr" onblur="carikodeseri();"
                                                                        onkeyup="" style="border-color: black;"
                                                                        placeholder="Masukkan Kodeseri/Barang">
                                                                </div>
                                                            </div> --}}
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
                                            <div class="control-group after-add-more mt-3">
                                                <button class="btn btn-success" type="button"
                                                    onclick="tambahItem(); return false;">
                                                    <i class="fa-solid fa-cart-plus" style="margin-right: 5px"></i>
                                                    Tambah Item
                                                </button>
                                            </div>
                                            <div class="hr-text text-blue">Item Permintaan</div>
                                            <input id="idf" value="1" type="hidden">
                                            <div style="overflow-x:auto;overflow-x: scroll;">
                                                <div style="width: 1050px;">
                                                    <table id="detail_transaksi" class="control-group text-nowrap"
                                                        border="0"
                                                        style="width: 100%;text-align:center;font-weight: bold;">
                                                        <thead>
                                                            <tr>
                                                                <td
                                                                    style="border-left-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;width: 50px">
                                                                </td>
                                                                <td class="bg-primary text-white" style="width: 150px">
                                                                    JENIS</td>
                                                                {{-- <td class="bg-primary text-white" style="width: 150px">
                                                                    KODESERI</td> --}}
                                                                <td class="bg-primary text-white" style="width: 200px">
                                                                    BARANG</td>
                                                                <td class="bg-primary text-white" style="width: 150px">
                                                                    QTY</td>
                                                                <td class="bg-primary text-white" style="width: 150px">
                                                                    SATUAN</td>
                                                                <td class="bg-primary text-white" style="width: 150px">
                                                                    SUPPLIER</td>
                                                                <td class="bg-primary text-white" style="width: 150px">
                                                                    KETERANGAN</td>
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
                                                <button type="submit" id="submitTransit" class="btn btn-primary"><i
                                                        class="fa-regular fa-floppy-disk" style="margin-right: 5px"></i>
                                                    Proses</button>
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

    <div class="modal modal-blur fade" id="modalviewtransit" tabindex="-1" aria-hidden="true">
        <div class="overlay">
            <div class="cv-spinner">
                <span class="loader"></span>
            </div>
        </div>
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen-lg-down" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title">
                        <i class="fa-regular fa-circle-info"></i>
                        Detail Transit
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
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
                    <div class="fetched-data-transit"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/tinymce/tinymce.min.js" defer></script>
    <script type="text/javascript">
        function tambahItem() {
            var idf = document.getElementById("idf").value;
            var detail_transaksi = document.getElementById("detail_transaksi");

            var tr = document.createElement("tr");
            tr.setAttribute("id", "btn-remove" + idf);

            var td = document.createElement("td");
            td.setAttribute("align", "center");
            td.setAttribute("style", "border-left-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;");
            td.innerHTML += '<button class="btn btn-sm btn-danger btn-icon remove" type="button" onclick="hapusElemen(' +
                idf + ');"><i class="fa-regular fa-trash-can"></i></button>';
            tr.appendChild(td);

            // Kolom 2 Jenis
            td = document.createElement("td");
            td.innerHTML += "<select name='jenis[]' id='jenis_" + idf +
                "' class='form-select inputNone' onchange='tampilkan(" + idf +
                ")' style='width:100%;text-transform: uppercase;'><option hidden></option><option value='Penerimaan'>PENERIMAAN</option><option value='Pengiriman'>PENGIRIMAN</option></select>";
            tr.appendChild(td);

            // Kolom 3 Barang
            td = document.createElement("td");
            td.innerHTML += '<input type="text" name="namaBarang[]" id="namaBarang_' + idf +
                '" class="form-control" style="width: 100%; text-transform: uppercase; margin: 0;" disabled>';
            tr.appendChild(td);

            // Kolom 4 Qty
            td = document.createElement("td");
            td.innerHTML += '<input type="number" name="qty[]" id="qty_' + idf +
                '" class="form-control" style="width: 100%; text-transform: uppercase; margin: 0;" disabled>';
            tr.appendChild(td);

            // Kolom 5 Satuan
            td = document.createElement("td");
            td.innerHTML += '<input type="text" name="satuan[]" id="satuan_' + idf +
                '" class="form-control" style="width: 100%; text-transform: uppercase; margin: 0;" disabled>';
            tr.appendChild(td);

            // Kolom 6 Supplier
            td = document.createElement("td");
            td.innerHTML += "<div name='suplier_" + idf + "' id='suplier_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 7 Keterangan
            td = document.createElement("td");
            td.innerHTML += '<input type="text" name="keterangan[]" id="keterangan_' + idf +
                '" class="form-control" style="width: 100%; text-transform: uppercase; margin: 0;" disabled>';
            tr.appendChild(td);

            detail_transaksi.appendChild(tr);
            tampilkan(idf);

            idf = (parseInt(idf) + 1);
            document.getElementById("idf").value = idf;
        }

        // Fungsi untuk menghapus elemen
        function hapusElemen(idf) {
            document.getElementById("btn-remove" + idf).remove();
        }

        // Fungsi untuk menampilkan elemen berdasarkan jenis
        function tampilkan(idf) {
            var jenis = document.getElementById("jenis_" + idf).value;

            // Reset konten div dan elemen form
            document.getElementById("suplier_" + idf).innerHTML = '';
            document.getElementById("namaBarang_" + idf).innerHTML = '';

            // Menentukan apakah field input harus di-enable
            var isPenerimaan = jenis === "Penerimaan";

            // Meng-enable field input sesuai dengan jenis
            document.getElementById("namaBarang_" + idf).disabled = !isPenerimaan;
            document.getElementById("qty_" + idf).disabled = !isPenerimaan;
            document.getElementById("satuan_" + idf).disabled = !isPenerimaan;
            document.getElementById("keterangan_" + idf).disabled = !isPenerimaan;

            // Menginisialisasi Select2 sesuai dengan jenis
            if (jenis === "Penerimaan") {
                var suplierDiv = document.getElementById("suplier_" + idf);
                suplierDiv.innerHTML = '<select name="suplier[]" id="suplier_select_' + idf +
                    '" class="form-select elementprm" style="width: 100%; text-transform: uppercase; margin: 0;"></select>';

                // Menginisialisasi Select2 untuk namaBarang dan suplier
                setTimeout(function() {
                    console.log("Initializing Select2 for:", '#namaBarang_' + idf);
                    $('#suplier_select_' + idf).select2(getSelect2AjaxConfig("/Suplierget", "Pilih Supplier"));
                }, 0);
            } else if (jenis === "Pengiriman") {
                var suplierDiv = document.getElementById("suplier_" + idf);
                suplierDiv.innerHTML = '<select name="suplier[]" id="suplier_select_' + idf +
                    '" class="form-select elementprm" style="width: 100%; text-transform: uppercase; margin: 0;"></select>';

                // Menginisialisasi Select2 hanya untuk supplier
                $('#suplier_select_' + idf).select2(getSelect2AjaxConfig("/Suplierget", "Pilih Supplier"));

                // Pastikan field input tidak dalam kondisi disabled untuk Pengiriman
                document.getElementById("namaBarang_" + idf).disabled = false;
                document.getElementById("qty_" + idf).disabled = false;
                document.getElementById("satuan_" + idf).disabled = false;
                document.getElementById("keterangan_" + idf).disabled = false;
            }
        }

        function getSelect2AjaxConfig(url, placeholder) {
            return {
                language: "id",
                placeholder: placeholder,
                ajax: {
                    url: url,
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.results || data // Pastikan data.results ada
                        };
                    },
                    cache: true
                }
            };
        }



        function newexportaction(e, dt, button, config) {
            var self = this;
            var oldStart = dt.settings()[0]._iDisplayStart;

            dt.one('preXhr', function(e, s, data) {
                data.start = 0;
                data.length = 2147483647;

                dt.one('preDraw', function(e, settings) {
                    if (button[0].className.indexOf('buttons-copy') >= 0) {
                        $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button,
                            config);
                    } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                        $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button,
                                config) :
                            $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button,
                                config);
                    } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                        $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                            $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button,
                                config) :
                            $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button,
                                config);
                    }
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
            });

            dt.ajax.reload();
        }

        $(document).ready(function() {
            var tableTransit = $('.datatable-transit').DataTable({
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
                    "url": "{{ route('getTransit.index') }}",
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
                    },
                    {
                        title: 'JENIS',
                        data: 'jenis',
                        name: 'jenis',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'NOFORM',
                        data: 'noform_transit',
                        name: 'noform_transit',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'TANGGAL',
                        data: 'tgl_transit',
                        name: 'tgl_transit',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'KODESERI',
                        data: 'kodeseri',
                        name: 'kodeseri',
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
                        title: 'SUPPLIER',
                        data: 'suplier',
                        name: 'suplier',
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

            $('#submitTransit').on('click', function(e) {
                e.preventDefault();

                var formData = $('#formTransit').serialize();
                $.ajax({
                    url: '{{ route('store.transit') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses!',
                                position: 'top-end',
                                text: 'Data telah disimpan.',
                                timer: 2000,
                                timerProgressBar: true,
                                showConfirmButton: false
                            }).then(() => {
                                location
                                    .reload(); // Reload halaman setelah notifikasi ditutup
                            });
                        }
                    },
                    error: function(response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Terjadi kesalahan. Silakan coba lagi.',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });

            //---------------------------------------------view Sample--------------------------------------//
            $('#modalviewtransit').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var id = button.data(
                    'id'); // Make sure this data attribute exists on the triggering element

                console.log("Fetch ID: " + id + "...");
                $(".overlay").fadeIn(300);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('transit.detail') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id, // Sending the ID to the server
                    },
                    success: function(data) {
                        console.log("Data Received: ", data);
                        $('.fetched-data-transit').html(data);
                    },
                    error: function(xhr) {
                        console.log("Error: ", xhr.responseText);
                        $('.fetched-data-transit').html('<p>Error fetching data.</p>');
                    },
                    complete: function() {
                        setTimeout(function() {
                            $(".overlay").fadeOut(300);
                        }, 500);
                    }
                });
            });

            /*--------------------------------------------------deleted----------------------------- */
            $('.datatable-transit').on('click', '.remove', function() {
                var noform_transit = $(this).data('id'); // Ubah dari kodeseri ke noform_transit
                var nama = $(this).data('nama');
                var desc = $(this).data('desc');
                var token = $("meta[name='csrf-token']").attr("content");
                let r = (Math.random() + 1).toString(36).substring(2);

                swal.fire({
                    title: 'Hapus Data Permintaan',
                    text: 'Apakah anda yakin ingin menghapus No Form: ' + noform_transit +
                        ', Ket : ' +
                        nama + " " + desc,
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
                                title: "Ketik tulisan dibawah untuk menghapus No Form: " +
                                    noform_transit,
                                html: '<div class="unselectable">' + r + '</div>',
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
                                    url: "{{ route('getTransit.store') }}" + '/' +
                                        noform_transit, // Ubah dari kodeseri ke noform_transit
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                    },
                                    beforeSend: function() {
                                        Swal.fire({
                                            title: 'Mohon Menunggu',
                                            html: '<center><lottie-player src="https://lottie.host/54b33864-47d1-4f30-b38c-bc2b9bdc3892/1xkjwmUkku.json" background="transparent" speed="1" style="width: 400px; height: 400px;" loop autoplay></lottie-player></center><br><h1 class="h4">Sedang menghapus data, Proses mungkin membutuhkan beberapa menit. <br><br><b class="text-danger">(Jangan menutup jendela ini, bisa mengakibatkan error)</b></h1>',
                                            timerProgressBar: true,
                                            showConfirmButton: false,
                                            allowOutsideClick: false,
                                            allowEscapeKey: false,
                                        });
                                    },
                                    success: function(data) {
                                        tableTransit.ajax.reload();
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
                                                nama + " (" +
                                                noform_transit +
                                                ") Terhapus"
                                        });
                                    },
                                    error: function(data) {
                                        tableTransit.ajax.reload();
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
                                tableTransit.ajax.reload();
                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal",
                                    text: "Teks yang diketik tidak sama",
                                });
                            }
                        })();
                    }
                });
            });

        });


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
