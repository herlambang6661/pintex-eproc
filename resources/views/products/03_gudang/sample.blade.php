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

        <datalist id="datalistExpedisi"></datalist>

        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <h2 class="page-title">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-test-pipe"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M20 8.04l-12.122 12.124a2.857 2.857 0 1 1 -4.041 -4.04l12.122 -12.124" />
                                    <path d="M7 13h8" />
                                    <path d="M19 15l1.5 1.6a2 2 0 1 1 -3 0l1.5 -1.6z" />
                                    <path d="M15 3l6 6" />
                                </svg>
                                Sample
                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="https://pintex.co.id/apps/HR/Recruitment"><i
                                                class="fa-solid fa-basket-shopping"></i> Gudang</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#"><i
                                                class="fa-regular fa-paste"></i> Sample</a></li>
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
                                        List Sample
                                    </a>
                                    <a href="#tabs-home-8"
                                        class="btn btn-primary d-none d-sm-inline-block border border-primary"
                                        data-bs-toggle="tab" aria-selected="true" role="tab">
                                        <i class="fa-solid fa-hand-holding-medical"></i>
                                        Input Sample
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
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                <path d="M21 21l-6 -6" />
                                                            </svg>
                                                        </a>
                                                        <input class="btn btn-primary" type="reset" value="Reset">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table style="width:100%; height: 100%;font-size:13px;"
                                            class="table table-bordered table-striped table-vcenter card-table table-hover text-nowrap datatable datatable-sample">
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-home-8" role="tabpanel">
                                <div class="card shadow card-active">
                                    <div class="card-body">
                                        <form method="POST" id="formSample" class="form"
                                            enctype="multipart/form-data" accept-charset="utf-8">
                                            @csrf
                                            <div class="row">
                                                <div class="control-group col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal Sampel</label>
                                                        <div class="input-icon mb-2">
                                                            <input name="tanggal" id="tanggal" class="form-control "
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
                                                        <input type="text" name="noform_display" id="noform_display"
                                                            class="form-control" placeholder="Select a noform"
                                                            value="" disabled />
                                                        <input type="hidden" id="last_number" value="1000" />
                                                        <input type="hidden" id="noform" name="noform">
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
                                            <div class="hr-text text-blue">Item Sample</div>
                                            <input id="idf" value="1" type="hidden">
                                            <div style="overflow-x:auto;">
                                                <div style="width: 1050px;">
                                                    <table id="detail_transaksi" class="control-group text-nowrap"
                                                        border="0"
                                                        style="width: 100%; text-align:center; font-weight: bold;">
                                                        <thead>
                                                            <tr>
                                                                <td
                                                                    style="width: 40px; border-left-color:#FFFFFF; border-top-color:#FFFFFF; border-bottom-color:#FFFFFF;">
                                                                </td>
                                                                <td class="bg-primary text-white" style="width: 150px;">
                                                                    Barang</td>
                                                                <td class="bg-primary text-white" style="width: 80px;">Qty
                                                                </td>
                                                                <td class="bg-primary text-white" style="width: 150px;">
                                                                    Keterangan</td>
                                                                <td class="bg-primary text-white" style="width: 150px;">
                                                                    Supplier</td>
                                                                <td class="bg-primary text-white" style="width: 150px;">
                                                                    Expedisi</td>
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
                                                <button type="submit" id="submitPermintaan" class="btn btn-primary"><i
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

    {{-- Modal --}}
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

    <div class="modal modal-blur fade" id="modalviewsample" tabindex="-1" aria-hidden="true">
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
                        Detail Sample
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
                    <div class="fetched-data-sample"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modalEditSample" tabindex="-1" aria-hidden="true">
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
                        Edit Sample
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
                    <div class="fetched-data-edit-sample"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- end modal --}}
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/tinymce/tinymce.min.js" defer></script>
    <script type="text/javascript">
        function tambahItem() {
            var idf = document.getElementById("idf").value;
            var detail_transaksi = document.getElementById("detail_transaksi");

            var tr = document.createElement("tr");
            tr.setAttribute("id", "btn-remove" + idf);

            // Kolom 1 Hapus
            var td = document.createElement("td");
            td.setAttribute("align", "center");
            td.setAttribute("style", "border-left-color:#FFFFFF; border-top-color:#FFFFFF; border-bottom-color:#FFFFFF;");
            td.innerHTML += '<button class="btn btn-sm btn-danger btn-icon remove" type="button" onclick="hapusElemen(' +
                idf + ');"><i class="fa-regular fa-trash-can"></i></button>';
            tr.appendChild(td);

            // Kolom 2 Kodeseri
            // var td = document.createElement("td");
            // td.innerHTML += '<input type="text" name="kodeseri[]" id="kodeseri_' + idf +
            //     '" class="form-control" style="width: 100%; text-transform: uppercase; margin: 0;">';
            // tr.appendChild(td);

            // Kolom 3 Barang
            var td = document.createElement("td");
            td.innerHTML += '<input type="text" name="namaBarang[]" id="namaBarang_' + idf +
                '" class="form-control" style="width: 100%; text-transform: uppercase; margin: 0;">';
            tr.appendChild(td);

            // Kolom 4 Qty
            var td = document.createElement("td");
            td.innerHTML += '<input type="number" name="qty[]" id="qty_' + idf +
                '" class="form-control" style="width: 100%; text-transform: uppercase; margin: 0;">';
            tr.appendChild(td);

            // Kolom 5 Keterangan
            var td = document.createElement("td");
            td.innerHTML += '<input type="text" name="keterangan[]" id="keterangan_' + idf +
                '" class="form-control" style="width: 100%; text-transform: uppercase; margin: 0;">';
            tr.appendChild(td);

            // Kolom 6 Supplier
            var td = document.createElement("td");
            td.innerHTML += "<div name='suplier_" + idf + "' id='suplier_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 7 Expedisi
            var td = document.createElement("td");
            td.innerHTML += '<input type="text" list="datalistExpedisi" id="expedisi-' + idf +
                '" name="expedisi[]" class="form-control inputNone" style="text-transform: style="width: 100%; text-transform: uppercase; margin: 0; onblur="tampilkan(' +
                idf + ')" onclick="tampilkan(' + idf + ')" onkeyup="tampilkan(' + idf + ')">';
            tr.appendChild(td);
            // var td = document.createElement("td");
            // td.innerHTML += '<input type="text" name="expedisi[]" id="expedisi_' + idf +
            //     '" class="form-control" style="width: 100%; text-transform: uppercase; margin: 0;">';
            // tr.appendChild(td);

            detail_transaksi.appendChild(tr);

            tampilkan(idf);

            idf = (idf - 1) + 2;
            document.getElementById("idf").value = idf;
        }


        function hapusElemen(idf) {
            document.getElementById("btn-remove" + idf).remove();
        }

        function tampilkan(idf) {
            var suplierDiv = document.getElementById("suplier_" + idf);
            suplierDiv.innerHTML =
                '<select required name="suplier[]" class="form-select elementprm" style="width: 100%; text-transform: uppercase; margin: 0;"><option></option></select>';

            // var expedisiDiv = document.getElementById("expedisi_" + idf);
            // expedisiDiv.innerHTML =
            //     '<select required name="expedisi[]" class="form-select elementsmpl" style="width: 100%; text-transform: uppercase; margin: 0;"><option></option></select>';


            $(".elementprm").select2({
                language: "id",
                placeholder: "Pilih Supplier",
                ajax: {
                    url: "/getMasterSuplier",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term
                        };
                    },
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
                }
            });

            function tampilkan(idf) {
                var search = document.getElementById('expedisi-' + idf).value;

                $.ajax({
                    url: '/getSample',
                    dataType: 'json',
                    delay: 250,
                    data: {
                        s: search
                    },
                    success: function(response) {
                        var datalist = $('#datalistExpedisi');
                        datalist.empty();

                        response.forEach(function(item) {
                            var option = $('<option>').val(item.expedisi.toUpperCase());
                            datalist.append(option);
                        });
                    }
                });
            }
            // $(".elementsmpl").select2({
            //     language: "id",
            //     placeholder: "Pilih Expedisi",
            //     ajax: {
            //         url: "/getSamples",
            //         dataType: 'json',
            //         delay: 250,
            //         data: function(params) {
            //             return {
            //                 s: params.term
            //             };
            //         },
            //         processResults: function(response) {
            //             return {
            //                 results: $.map(response, function(item) {
            //                     return {
            //                         id: item.expedisi.toUpperCase(),
            //                         text: item.expedisi.toUpperCase(),
            //                     }
            //                 })
            //             }
            //         }
            //     }
            // });
        }


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
            // Inisialisasi DataTable
            var tableSample = $('.datatable-sample').DataTable({
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
                    "url": "{{ route('getSample.index') }}",
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
                        title: 'TANGGAL',
                        data: 'tanggal',
                        name: 'tanggal',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'NOFORM',
                        data: 'noform',
                        name: 'noform',
                        className: "cuspad0 cuspad1 text-center clickable"
                    },
                    {
                        title: 'KODESERI',
                        data: 'kodeseri',
                        name: 'kodeseri',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'BARANG/JASA',
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
                        title: 'KETERANGAN',
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'SUPLIER',
                        data: 'suplier',
                        name: 'suplier',
                        className: "cuspad0 cuspad1 clickable"
                    },
                    {
                        title: 'EXPEDISI',
                        data: 'expedisi',
                        name: 'expedisi',
                        className: "cuspad0 cuspad1 clickable"
                    },
                ],
            });

            //----------------------------------------Create Sample------------------------------------------//
            $('#submitPermintaan').on('click', function(e) {
                e.preventDefault();

                var formData = new FormData($('#formSample')[0]);

                $.ajax({
                    url: '{{ route('sample.store') }}',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Data sample berhasil ditambahkan.',
                            position: 'top-end',
                            toast: true,
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        for (var error in errors) {
                            errorMessage += errors[error][0] + '\n';
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi kesalahan',
                            text: errorMessage,
                            position: 'top-end',
                            toast: true,
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        });
                    }
                });
            });

            //---------------------------------------------view Sample--------------------------------------//
            $('#modalviewsample').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var noform = button.data('noform');

                console.log("Fetch Noform: " + noform + "...");
                $(".overlay").fadeIn(300);

                $.ajax({
                    type: 'POST',
                    url: 'viewSample',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        noform: noform,
                    },
                    success: function(data) {
                        console.log("Data Received: ", data);
                        $('.fetched-data-sample').html(data);
                    },
                    error: function(xhr) {
                        console.log("Error: ", xhr.responseText);
                        $('.fetched-data-sample').html('<p>Error fetching data.</p>');
                    },
                    complete: function() {
                        setTimeout(function() {
                            $(".overlay").fadeOut(300);
                        }, 500);
                    }
                });
            });

            $('#modalEditSample').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget)
                var id = button.data('id');
                console.log("Fetch Id Item: " + id + "...");
                $(".overlay").fadeIn(300);
                $.ajax({
                    type: 'POST',
                    url: 'viewEditSample',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function(data) {
                        $('.fetched-data-edit-sample').html(data);
                    }
                }).done(function() {
                    setTimeout(function() {
                        $(".overlay").fadeOut(300);
                    }, 500);
                });
            });

            $(document).on('submit', '#formUpdateSample', function(e) {
                e.preventDefault(); // Mencegah submit default

                let form = $(this);
                let url = form.attr("action");
                let data = form.serialize();

                $.ajax({
                    url: url,
                    method: "POST",
                    data: data,
                    success: function(response) {
                        if (response.status === "success") {
                            alert(response.message);
                            $('#modalEditSample').modal('hide'); // Tutup modal setelah berhasil
                            // Tambahkan logika lain di sini jika perlu
                        } else {
                            alert("Terjadi kesalahan: " + response.message);
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 419) {
                            alert("CSRF token expired or missing.");
                        } else {
                            alert("Terjadi kesalahan: " + xhr.statusText);
                        }
                    }
                });
            });

            /*----------------------------------------------------------------------------------------------------delete------------------------*/
            $('.datatable-sample').on('click', '.remove', function() {
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
                                    url: "{{ route('getSample.store') }}" +
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
                                        tableSample.ajax.reload();
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
                                        tableSample.ajax.reload();
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
                                tableSample.ajax.reload();
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
