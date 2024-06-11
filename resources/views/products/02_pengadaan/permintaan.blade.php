@extends('layouts.app')
@section('content')
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
                                        class="active nav-link btn btn-warning d-none d-sm-inline-block border border-warning"
                                        data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"
                                        style="margin-right: 10px">
                                        <i class="fa-solid fa-list-ul"></i>
                                        List Item Permintaan
                                    </a>
                                    <a href="#tabs-home-8"
                                        class="nav-link btn btn-primary d-none d-sm-inline-block border border-primary"
                                        data-bs-toggle="tab" aria-selected="true" role="tab">
                                        <i class="fa-solid fa-hand-holding-medical"></i>
                                        Tambah Permintaan
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
                    <div class="row row-deck row-cards">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tabs-profile-8" role="tabpanel">
                                <div class="card card-xl shadow rounded">
                                    <div class="card-stamp card-stamp-lg">
                                        <div class="card-stamp-icon bg-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-clipboard-text" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                                <path
                                                    d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                                <path d="M9 12h6" />
                                                <path d="M9 16h6" />
                                            </svg>
                                        </div>
                                    </div>
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
                                    <table style="width:100%;font-size:13px;"
                                        class="table table-bordered table-vcenter card-table table-hover text-nowrap datatable-permintaan">
                                        <thead>
                                            <tr>
                                                <th class="cuspad0">No</th>
                                                <th class="cuspad0">Kodeseri</th>
                                                <th class="cuspad0">Barang</th>
                                                <th class="cuspad0">Tanggal</th>
                                                <th class="cuspad0">Noform</th>
                                                <th class="cuspad0">Deskripsi</th>
                                                <th class="cuspad0">Katalog</th>
                                                <th class="cuspad0">Part</th>
                                                <th class="cuspad0">Mesin</th>
                                                <th class="cuspad0">Qty Pesan</th>
                                                <th class="cuspad0">Qty Acc</th>
                                                <th class="cuspad0">Dibeli</th>
                                                <th class="cuspad0">Status</th>
                                                <th class="cuspad0"></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-home-8" role="tabpanel">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <form method="POST" class="form" id="add-form" enctype="multipart/form-data"
                                            accept-charset="utf-8" onkeydown="return event.key != 'Enter';"
                                            data-select2-id="add-form">
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
                                                    <div class="mb-3">
                                                        <label class="form-label">Kepala Bagian</label>
                                                        <select name="kabag" id="kabag"
                                                            class="form-select elementkabag" data-select2-id="kabag"
                                                            tabindex="-1" aria-hidden="true">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group col-lg-9">
                                                    <div class="card card-active">
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
                                            <hr>
                                            <input id="idf" value="1" type="hidden">
                                            <div style="overflow-x:auto;overflow-x: scroll;">
                                                <div style="width: 2000px">
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
                                                                <td class="bg-primary text-white" style="width: 200px">Qty
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
                                            <br>
                                            <div class="row">
                                                <div class="control-group col-lg-8">
                                                    <div id="ketTamb">
                                                        <div class="mb-3">
                                                            <label class="form-label">Keterangan Tambahan</label>
                                                            <textarea name="keteranganform" class="form-control" id="keteranganform"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group col-lg-4">
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
                                                </div>
                                            </div>
                                            <br>
                                            <div class="float-xl-right">
                                                <button type="submit" class="btn btn-primary" id="submitPermintaan"><i
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
            td.innerHTML += '<button class="btn btn-danger btn-icon remove" type="button" onclick="hapusElemen(' + idf +
                ');"><i class="fa-regular fa-trash-can"></i> </button>';
            tr.appendChild(td);

            // Kolom 2 Jenis
            var td = document.createElement("td");
            td.innerHTML += "<select name='jenis[]' id='jenis_" + idf +
                "' class='form-select inputNone blinking' onchange='tampilkan(" + idf +
                ")' style='width:100%;' style='text-transform: uppercase;'><option hidden></option><option value='Standar'>STANDAR</option><option value='Lain'>LAIN-LAIN</option></select>";
            tr.appendChild(td);

            // Kolom 3 Kodeproduk                            
            var td = document.createElement("td");
            td.innerHTML += '<select name="kodeproduk[]" id="kodeproduk' + idf +
                '" class="form-select  inputNone" style="text-transform: uppercase;"><option hidden></option><option value="8" data-ket="Sparepart">8 - Sparepart</option><option value="17" data-ket="Kendaraan">17 - Kendaraan</option><option value="18" data-ket="Perlengkapan">18 - Perlengkapan</option></select>';
            tr.appendChild(td);

            // Kolom 4 Nama Barang / Jasa
            var td = document.createElement("td");
            td.innerHTML += "<div name='tampil_" + idf + "' id='tampil_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 5 Deskripsi
            var td = document.createElement("td");
            td.innerHTML += "<input readonly type='text' list='deskripsiList' name='deskripsi[]' id='deskripsi_" + idf +
                "' class='form-control  inputNone' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 6 Katalog
            var td = document.createElement("td");
            td.innerHTML += "<input readonly type='text' list='katalogList' name='katalog[]' id='katalog" + idf +
                "' value='' class='form-control  inputNone' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 7 Part
            var td = document.createElement("td");
            td.innerHTML += "<input readonly type='text' list='partList' name='part[]' id='part_" + idf +
                "' class='form-control  inputNone' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 8 Mesin
            var td = document.createElement("td");
            // td.innerHTML += '<input readonly list="mesinversi2" name="mesin[]" id="mesin_'+idf+'" class="form-control  inputNone" style="text-transform: uppercase;">';
            td.innerHTML += "<div name='tampil_mesin_" + idf + "' id='tampil_mesin_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 9 Qty
            var td = document.createElement("td");
            td.innerHTML += "<input readonly type='number' name='qty[]' id='qty_" + idf +
                "' class='form-control  inputNone' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 10 Satuan
            var td = document.createElement("td");
            td.innerHTML += "<input readonly list='satuanList' type='text' name='satuan[]' id='satuan_" + idf +
                "' class='form-control  inputNone' style='text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 11 Pemesan
            var td = document.createElement("td");
            // td.innerHTML += '<input readonly list="kabaglist" name="pemesan[]" id="pemesan_'+idf+'" class="form-control  inputNone" style="text-transform: uppercase;">';
            td.innerHTML += "<div name='tampil_pemesan_" + idf + "' id='tampil_pemesan_" + idf + "'></div>";
            tr.appendChild(td);

            // Kolom 12 Unit
            var td = document.createElement("td");
            td.innerHTML += "<input type='text' name='unit[]' id='unit_" + idf +
                "' class='form-control  inputNone' style='text-transform: uppercase;' value='" +
                unit + "'>";
            tr.appendChild(td);

            // Kolom 13 Peruntukan
            var td = document.createElement("td");
            td.innerHTML += '<input readonly name="peruntukan[]" id="peruntukan_' + idf +
                '" class="form-control  inputNone" style="text-transform: uppercase;">';
            tr.appendChild(td);

            // Kolom 14 Sample
            var td = document.createElement("td");
            // td.setAttribute("align","center");
            // td.setAttribute("style", "border-right-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;");
            td.innerHTML += '<input readonly type="number" value="0" name="sample[]" id="sample_' + idf +
                '" class="form-control " style="">';
            // td.innerHTML += '<input type="file" name="files[]" class="form-control-file imgInp" accept="image/*">';
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
            var nama_kota = document.getElementById("jenis_" + idf).value;
            if (nama_kota == "Standar") {
                document.getElementById("tampil_" + idf).innerHTML =
                    '<select name="namaBarang[]" class="form-select  elementbrg inputNone" style="text-transform: uppercase;width:100%"><option></option></select>';
                $('#deskripsi_' + idf).prop('readonly', false);
                $('#katalog' + idf).prop('readonly', false);
                $('#part_' + idf).prop('readonly', false);

                // $('#mesin_'+idf).prop('readonly', false);
                document.getElementById("tampil_mesin_" + idf).innerHTML =
                    '<select name="mesin[]" class="form-select  elementmsn inputNone" style="text-transform: uppercase;width:100%"><option></option></select>';
                $('#qty_' + idf).prop('readonly', false);
                $('#satuan_' + idf).prop('readonly', false);
                // $('#pemesan_'+idf).prop('readonly', false);
                document.getElementById("tampil_pemesan_" + idf).innerHTML =
                    '<select required name="pemesan[]" class="form-select  elementprm inputNone" style="text-transform: uppercase;width:100%"><option></option></select>';
                $('#peruntukan_' + idf).prop('readonly', false);
                $('#sample_' + idf).prop('readonly', false);
            } else if (nama_kota == "Lain") {
                document.getElementById("tampil_" + idf).innerHTML =
                    '<input type="text" list="barangList" name="namaBarang[]" class="form-control  inputNone" style="width:100%;text-transform: uppercase;width:100%" >';
                $('#deskripsi_' + idf).prop('readonly', false);
                $('#katalog' + idf).prop('readonly', false);
                $('#part_' + idf).prop('readonly', false);

                // $('#mesin_'+idf).prop('readonly', false);
                document.getElementById("tampil_mesin_" + idf).innerHTML =
                    '<select name="mesin[]" class="form-select  elementmsn inputNone" style="text-transform: uppercase;width:100%"><option></option></select>';
                $('#qty_' + idf).prop('readonly', false);
                $('#satuan_' + idf).prop('readonly', false);
                document.getElementById("tampil_pemesan_" + idf).innerHTML =
                    '<select name="pemesan[]" class="form-select  elementprm inputNone" style="text-transform: uppercase;width:100%"><option></option></select>';
                // $('#pemesan_'+idf).prop('readonly', false);
                $('#peruntukan_' + idf).prop('readonly', false);
                $('#sample_' + idf).prop('readonly', false);
            } else {
                document.getElementById("tampil_" + idf).innerHTML =
                    '<input type="text" list="barangList" name="namaBarang[]" class="form-control  inputNone" style="width:100%;text-transform: uppercase;width:100%" readonly>';
                $('#deskripsi_' + idf).prop('readonly', true);
                $('#katalog' + idf).prop('readonly', true);
                $('#part_' + idf).prop('readonly', true);

                $('#mesin_' + idf).prop('readonly', false);
                $('#qty_' + idf).prop('readonly', false);
                $('#satuan_' + idf).prop('readonly', false);
                document.getElementById("tampil_pemesan_" + idf).innerHTML =
                    '<select name="pemesan[]" class="form-select  elementprm inputNone" style="text-transform: uppercase;width:100%"><option></option></select>';
                // $('#pemesan_'+idf).prop('readonly', false);
                $('#peruntukan_' + idf).prop('readonly', false);
                $('#sample_' + idf).prop('readonly', false);
            }

            $(document).ready(function() {
                $(".elementbrg").select2({
                    language: "id",
                    placeholder: "Pilih Barang",
                    ajax: {
                        url: "https://pintex.co.id/apps//GD/Pengadaan/getMasterBarang",
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                searchTerm: params.term // search term
                            };
                        },
                        processResults: function(response) {
                            return {
                                results: response
                            };
                        },
                        cache: true
                    },
                });

                $(".elementprm").select2({
                    language: "id",
                    placeholder: "Pilih Pemesan",
                    ajax: {
                        url: "https://pintex.co.id/apps//GD/Pengadaan/getMasterPemesan",
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                searchTerm: params.term // search term
                            };
                        },
                        processResults: function(response) {
                            return {
                                results: response
                            };
                        },
                        cache: true
                    },
                });

                $(".elementmsn").select2({
                    language: "id",
                    width: '100%',
                    placeholder: "Pilih Mesin",
                    ajax: {
                        url: "/getMesin",
                        // type: "post",
                        dataType: 'json',
                        delay: 250,
                        // data: function(params) {
                        //     return {
                        //         searchTerm: params.term // search term
                        //     };
                        // },
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        text: item.mesin.toUpperCase() + " " + item.merk
                                            .toUpperCase() + (item.unit == '88' ? ' (UMUM)' :
                                                " (UNIT " + item.unit + ")"),
                                        id: item.id,
                                    }
                                })
                            };
                        },
                        cache: true
                    },

                });
            });
        }

        $(document).ready(function() {
            $(".elementkabag").select2({
                language: "id",
                width: '100%',
                placeholder: "Pilih Kabag",
                ajax: {
                    url: "/getKabag",
                    // type: "post",
                    dataType: 'json',
                    delay: 250,
                    // data: function(params) {
                    //     return {
                    //         // "_token": "{{ csrf_token() }}",
                    //         searchTerm: params.term // search term
                    //     };
                    // },
                    processResults: function(response) {
                        return {
                            results: $.map(response, function(item) {
                                return {
                                    text: item.nama,
                                    id: item.id,
                                }
                            })
                        };
                        // return {
                        //     results: response
                        // };
                    },
                    cache: true
                },
            });
        });

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


        $(function() {
            /*------------------------------------------
            --------------------------------------------
            Render DataTable
            --------------------------------------------
            --------------------------------------------*/
            var table = $('.datatable-permintaan').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "scrollX": true,
                "scrollCollapse": true,
                "pagingType": 'full_numbers',
                "dom": "<'card-header h3' B>" +
                    "<'card-body border-bottom py-3' <'row'<'col-sm-6'l><'col-sm-6'f>> >" +
                    "<'table-responsive' <'col-sm-12'tr> >" +
                    "<'card-footer' <'row'<'col-sm-5'i><'col-sm-7'p> >>",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    ['10', '25', '50', 'Tampilkan Semua']
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
                ajax: "{{ route('getPermintaan.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: "cuspad0 cuspad1"
                    },
                    {
                        data: 'kodeseri',
                        name: 'kodeseri',
                        className: "cuspad0 cuspad1 text-center"
                    },
                    {
                        data: 'namaBarang',
                        name: 'namaBarang',
                        className: "cuspad0 cuspad1"
                    },
                    {
                        data: 'tgl',
                        name: 'tgl',
                        className: "cuspad0 text-center"
                    },
                    {
                        data: 'noform',
                        name: 'noform',
                        className: "cuspad0 cuspad1 text-center"
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                        className: "cuspad0 cuspad1"
                    },
                    {
                        data: 'katalog',
                        name: 'katalog',
                        className: "cuspad0 cuspad1"
                    },
                    {
                        data: 'part',
                        name: 'part',
                        className: "cuspad0 cuspad1"
                    },
                    {
                        data: 'mesinV',
                        name: 'mesinV',
                        className: "cuspad0 cuspad1 text-center"
                    },
                    {
                        data: 'qty',
                        name: 'qty',
                        className: "cuspad0 cuspad1 text-center"
                    },
                    {
                        data: 'qtyacc',
                        name: 'qtyacc',
                        className: "cuspad0 text-center"
                    },
                    {
                        data: 'dibeli',
                        name: 'dibeli',
                        className: "cuspad0 cuspad1 text-center"
                    },
                    {
                        data: 'stt',
                        name: 'stt',
                        className: 'text-center cuspad0 text-center'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'cuspad0 text-center'
                    },
                ],

            });
            /*------------------------------------------==============================================================================================================================================================
            --------------------------------------------==============================================================================================================================================================
            Start Create Data
            --------------------------------------------==============================================================================================================================================================
            --------------------------------------------==============================================================================================================================================================*/
            if ($("#add-form").length > 0) {
                $("#add-form").validate({
                    rules: {
                        tanggal: {
                            required: true,
                        },
                        kabag: {
                            required: true,
                        },
                        jenis: {
                            required: true,
                        },
                        kodeproduk: {
                            required: true,
                        },
                        qty: {
                            required: true,
                        },
                        satuan: {
                            required: true,
                        },
                        unit: {
                            required: true,
                        },
                        namaBarang: {
                            required: true,
                        },
                        mesin: {
                            required: true,
                        },
                        pemesan: {
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
                        jenis: {
                            required: "Masukkan Jenis",
                        },
                        kodeproduk: {
                            required: "Masukkan Kode Produk",
                        },
                        qty: {
                            required: "Masukkan Qty",
                        },
                        satuan: {
                            required: "Masukkan Satuan",
                        },
                        unit: {
                            required: "Masukkan Unit",
                        },
                        namaBarang: {
                            required: "Masukkan Nama Barang",
                        },
                        mesin: {
                            required: "Masukkan Mesin",
                        },
                        pemesan: {
                            required: "Masukkan Pemesan",
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
                            data: $('#add-form').serialize(),
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
                                table.draw();

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
                                document.getElementById("add-form").reset();
                                $('#tabs-profile-8').addClass('active show');
                                $('#tabs-home-8').removeClass('active show');
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                // const obj = JSON.parse(data.responseJSON);
                                table.draw();

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
            /*------------------------------------------==============================================================================================================================================================
            --------------------------------------------==============================================================================================================================================================
            End Create Data
            --------------------------------------------==============================================================================================================================================================
            --------------------------------------------==============================================================================================================================================================*/
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
    </script>
@endsection
