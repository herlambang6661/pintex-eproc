@extends('layouts.app')
@section('content')
    @include('components.alert')
    <style>
        td.cuspad0 {
            padding-top: 3px;
            padding-bottom: 3px;
            padding-right: 13px;
            padding-left: 13px;
        }

        td.cuspad1 {
            text-transform: uppercase;
        }

        td.cuspad2 {
            /* padding-top: 0.5px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                padding-bottom: 0.5px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                padding-right: 0.5px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                padding-left: 0.5px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                margin-top: 5px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                margin-bottom: 5px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                margin-right: 5px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                margin-left: 5px; */
        }

        .unselectable {
            -webkit-user-select: none;
            -webkit-touch-callout: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            color: #cc0000;
            font-weight: bolder;
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
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                    class="icon icon-tabler icon-tabler-users-group" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                    <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                    <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                </svg>
                                {{ $judul }}

                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                                class="icon icon-tabler icon-tabler-users-group" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                                <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                                <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                            </svg>
                                            {{ $judul }}
                                        </a>
                                    </li>
                                </ol>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card card-xl border-success shadow rounded">
                                <div class="card-stamp card-stamp-lg">
                                    <div class="card-stamp-icon bg-success">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">Daftar Suplier</h3>
                                        <!-- Tombol Tambah Suplier ditempatkan di pojok kanan atas -->
                                        <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                                            data-bs-toggle="modal" data-bs-target="#modal-add" data-bs-backdrop="static"
                                            data-bs-keyboard="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                                class="icon icon-tabler icon-tabler-users-group" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                                <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                                <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                            </svg>
                                            Tambah Suplier
                                        </a>
                                    </div>
                                    <div class="card-body" style="overflow-x: auto;">
                                        <div style="overflow-x: auto;">
                                            <table style="width:100%;font-size:13px;"
                                                class="table table-bordered table-vcenter card-table table-hover text-nowrap"
                                                id="example">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th class="text-center">OPSI</th>
                                                        <th class="text-center">NAMA</th>
                                                        <th class="text-center">TIPE</th>
                                                        <th class="text-center">TELEPON</th>
                                                        <th class="text-center">CONTACT</th>
                                                        <th class="text-center">KOTA</th>
                                                        <th class="text-center">PROVINSI</th>
                                                        <th class="text-center">EMAIL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
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

    {{-- modal add supplier --}}
    <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add {{ $judul }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('suplier.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img src="{{ asset('assets/static/avatar.png') }}"
                                                class="avatar img-circle img-thumbnail" alt="avatar">
                                            <hr>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="first_name">
                                                    <h6>Nama Suplier</h6>
                                                </label>
                                                <input name="nama" type="text"
                                                    class="form-control form-control-sm input-suplier-nama"
                                                    value="{{ old('nama') }}" placeholder="Masukkan Nama Suplier">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="last_name">
                                                    <h6>Contact</h6>
                                                </label>
                                                <input name="contact" type="text"
                                                    class="form-control form-control-sm input-suplier-contact"
                                                    value="{{ old('contact') }}" placeholder="Masukkan Kontak Suplier">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="last_name">
                                                    <h6>Telepon</h6>
                                                </label>
                                                <input name="telp" type="text"
                                                    class="form-control form-control-sm input-suplier-telp"
                                                    value="{{ old('telp') }}" placeholder="Masukkan Telepon Suplier">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="last_name">
                                                            <h6>Tipe</h6>
                                                        </label>
                                                        <select name="tipe" id="tipe"
                                                            class="form-control form-control-sm input-suplier-tipe">
                                                            <option value="" hidden>-- PILIH TIPE --</option>
                                                            <option value="ENTITAS">ENTITAS</option>
                                                            <option value="INDIVIDU">INDIVIDU</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="last_name">
                                                            <h6>Jabatan</h6>
                                                        </label>
                                                        <input name="jabatan" type="text"
                                                            class="form-control form-control-sm input-suplier-jabatan"
                                                            value="{{ old('jabatan') }}"
                                                            placeholder="Masukkan Jabatan Suplier">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="last_name">
                                                            <h6>NPWP</h6>
                                                        </label>
                                                        <input name="npwp" type="text"
                                                            class="form-control form-control-sm input-suplier-npwp"
                                                            value="{{ old('npwp') }}"
                                                            placeholder="Masukkan NPWP Suplier">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="last_name">
                                                            <h6>Jenis Mata Uang</h6>
                                                        </label>
                                                        <select name="uang_id" id="uang_id"
                                                            class="form-control form-control-sm input-suplier-uang">
                                                            <option value="">-- Pilih Mata Uang --</option>
                                                            @foreach ($uang as $item)
                                                                <option value="{{ $item->id }}">{{ $item->inisial }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="last_name">
                                                            <h6>Alamat</h6>
                                                        </label>
                                                        <input name="alamat" type="text"
                                                            class="form-control form-control-sm input-suplier-alamat"
                                                            value="{{ old('alamat') }}"
                                                            placeholder="Masukkan Alamat Suplier">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="last_name">
                                                            <h6>Kode Pos</h6>
                                                        </label>
                                                        <input name="kopos" type="text"
                                                            class="form-control form-control-sm input-suplier-kopos"
                                                            value="{{ old('kopos') }}"
                                                            placeholder="Masukkan Kode Pos Suplier">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="last_name">
                                                            <h6>Kota</h6>
                                                        </label>
                                                        <input name="kota" type="text"
                                                            class="form-control form-control-sm input-suplier-kota"
                                                            value="{{ old('kota') }}"
                                                            placeholder="Masukkan Kota Suplier">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="last_name">
                                                            <h6>Provinsi</h6>
                                                        </label>
                                                        <input name="provinsi" type="text"
                                                            class="form-control form-control-sm input-suplier-provinsi"
                                                            value="{{ old('provinsi') }}"
                                                            placeholder="Masukkan Provinsi Suplier">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="last_name">
                                                            <h6>Email</h6>
                                                        </label>
                                                        <input name="email" type="text"
                                                            class="form-control form-control-sm input-suplier-email"
                                                            value="{{ old('email') }}"
                                                            placeholder="Masukkan Email Suplier">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal add supplier --}}

    {{-- modal edit suplier --}}
    <div class="modal modal-blur fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit {{ $judul }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="javascript:void(0)" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="fecthed-edit-suplier"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submitSuplier" class="btn btn-primary"
                                data-bs-dismiss="modal">Save
                                changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- end modal edit suplier --}}

    {{-- modal detail suplier --}}
    {{-- @foreach ($suplier as $item)
        <div class="modal modal-blur fade" id="modal-detail{{ $item->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail {{ $judul }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Card sebelah kiri -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img src="{{ asset('assets/static/avatar.png') }}"
                                                class="avatar img-circle img-thumbnail"
                                                style="height: 150px; width: 150px;" alt="avatar">
                                            <hr>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control" name="nama"
                                                placeholder="Masukkan Nama" value="{{ old('nama', $item->nama) }}"
                                                disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Contact</label>
                                            <input type="text" class="form-control" name="contact"
                                                placeholder="Masukkan Contact"
                                                value="{{ old('contact', $item->contact) }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Telepon</label>
                                            <input type="text" class="form-control" name="telp"
                                                placeholder="Masukkan Telepon" value="{{ old('telp', $item->telp) }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Form kiri -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Tipe</label>
                                                    <input type="text" class="form-control" name="tipe"
                                                        placeholder="Masukkan tipe"
                                                        value="{{ old('tipe', $item->tipe) }}" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jabatan</label>
                                                    <input type="text" class="form-control" name="jabatan"
                                                        placeholder="Masukkan Jabatan"
                                                        value="{{ old('jabatan', $item->jabatan) }}" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">NPWP</label>
                                                    <input type="text" class="form-control" name="npwp"
                                                        placeholder="Masukkan NPWP"
                                                        value="{{ old('npwp', $item->npwp) }}" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jenis Mata Uang</label>
                                                    <input type="text" class="form-control" name="uang_id"
                                                        placeholder="Masukkan Jenis Mata Uang"
                                                        value="{{ old('uang_id', optional($item->uang)->inisial) }}"
                                                        disabled>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Provinsi</label>
                                                    <input type="text" class="form-control" name="provinsi"
                                                        placeholder="Masukkan Provinsi"
                                                        value="{{ old('provinsi', $item->provinsi) }}" disabled>
                                                </div>
                                            </div>
                                            <!-- Form kanan -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" name="alamat"
                                                        placeholder="Masukkan Alamat"
                                                        value="{{ old('alamat', $item->alamat) }}" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Kode Pos</label>
                                                    <input type="text" class="form-control" name="kopos"
                                                        placeholder="Masukkan Kode Pos"
                                                        value="{{ old('kopos', $item->kopos) }}" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Kota</label>
                                                    <input type="text" class="form-control" name="kota"
                                                        placeholder="Masukkan Kota"
                                                        value="{{ old('kota', $item->kota) }}" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email"
                                                        placeholder="Masukkan Email"
                                                        value="{{ old('email', $item->email) }}" disabled>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save
                                changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}
    {{-- end modal suplier --}}

    <script>
        document.getElementById('filterDropdown').addEventListener('change', function() {
            var selectedValue = this.value.toLowerCase(); // Ubah ke huruf kecil untuk konsistensi
            var rows = document.querySelectorAll('#example tbody .suplier-row');

            rows.forEach(function(row) {
                var tipe = row.getAttribute('data-tipe')
                    .toLowerCase(); // Ubah ke huruf kecil untuk konsistensi
                if (selectedValue === 'all' || selectedValue === '') {
                    row.style.display = '';
                } else if (selectedValue === tipe) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

    <script>
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

        //---------------------------------------------------RENDER-----------------------------------------------------------------------------//
        $(document).ready(function() {
            $('#example').DataTable({
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
                ajax: {
                    url: '{{ route('suplier.index') }}',
                },
                columns: [{
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'cuspad0 cuspad1 text-center'
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        className: 'cuspad0 cuspad1 text-center'
                    },
                    {
                        data: 'tipe',
                        name: 'tipe',
                        className: 'cuspad0 cuspad1 text-center'
                    },
                    {
                        data: 'telp',
                        name: 'telp',
                        className: 'cuspad0 cuspad1 text-center'
                    },
                    {
                        data: 'contact',
                        name: 'contact',
                        className: 'cuspad0 cuspad1 text-center'
                    },
                    {
                        data: 'kota',
                        name: 'kota',
                        className: 'cuspad0 cuspad1 text-center'
                    },
                    {
                        data: 'provinsi',
                        name: 'provinsi',
                        className: 'cuspad0 cuspad1 text-center'
                    },
                    {
                        data: 'email',
                        name: 'email',
                        className: 'cuspad0 cuspad1 text-center'
                    },

                ],
            });
        });

        //------------------------------------------------UPADATE----------------------------------------------------------------------------------//
        $(document).ready(function() {
            // Event listener untuk tombol update
            $('#submitSuplier').on('click', function(e) {
                e.preventDefault();
                var form = $('#editForm');
                var url = form.attr('action');

                $.ajax({
                    url: url,
                    type: 'PUT',
                    data: form.serialize(),
                    success: function(response) {
                        if (response.status) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: response.msg,
                                showConfirmButton: false,
                                html: '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>',
                                timer: 3000,
                                toast: true
                            }).then((result) => {
                                // Refresh halaman setelah SweetAlert menghilang
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    location.reload();
                                }
                            });
                        }
                    },
                    error: function(xhr) {
                        // Tampilkan notifikasi kesalahan
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errors, function(key, value) {
                            errorMessage += value + '\n';
                        });
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Error',
                            text: errorMessage,
                            showConfirmButton: false,
                            timer: 3000,
                            toast: true
                        });
                    }
                });
            });

            // Event listener untuk tombol edit
            $(document).on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var tipe = $(this).data('tipe');
                var jabatan = $(this).data('jabatan');
                var npwp = $(this).data('npwp');
                var alamat = $(this).data('alamat');
                var kopos = $(this).data('kopos');
                var kota = $(this).data('kota');
                var provinsi = $(this).data('provinsi');
                var telp = $(this).data('telp');
                var contact = $(this).data('contact');
                var email = $(this).data('email');
                var uang_id = $(this).data('uang_id');

                var formAction = '/suplier/update/' + id;
                $('#editForm').attr('action', formAction);

                $('#modal-edit .fecthed-edit-suplier').html(`
            <div class="row">
                <!-- Card sebelah kiri -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('assets/static/avatar.png') }}"
                                    class="avatar img-circle img-thumbnail"
                                    style="height: 150px; width: 150px;" alt="avatar">
                                <hr>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama"
                                    placeholder="Masukkan Nama" value="` + nama + `">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contact</label>
                                <input type="text" class="form-control" name="contact"
                                    placeholder="Masukkan Contact"
                                    value="` + contact + `">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telepon</label>
                                <input type="text" class="form-control" name="telp"
                                    placeholder="Masukkan Telepon" value="` + telp + `">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card sebelah kanan -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Informasi Tambahan</h5>
                            <div class="row">
                                <!-- Form kiri -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tipe</label>
                                        <select class="form-select" name="tipe">
                                            <option value="">Pilih Tipe</option>
                                            <option value="ENTITAS" ` + (tipe == 'ENTITAS' ? 'selected' : '') + `>Entitas</option>
                                            <option value="INDIVIDU" ` + (tipe == 'INDIVIDU' ? 'selected' : '') + `>Individu</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan"
                                            placeholder="Masukkan Jabatan" value="` + jabatan + `">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">NPWP</label>
                                        <input type="text" class="form-control" name="npwp"
                                            placeholder="Masukkan NPWP" value="` + npwp + `">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Mata Uang</label>
                                        <select class="form-select" name="uang_id">
                                            <option value="">--Pilih Uang--</option>
                                            @foreach ($uang as $currency)
                                                <option value="{{ $currency->id }}" ` + (uang_id ==
                        '{{ $currency->id }}' ? 'selected' : '') + `>{{ $currency->inisial }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" name="provinsi"
                                            placeholder="Masukkan Provinsi" value="` + provinsi +
                    `">
                                    </div>
                                </div>
                                <!-- Form kanan -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" class="form-control" name="alamat"
                                            placeholder="Masukkan Alamat" value="` + alamat + `">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kode Pos</label>
                                        <input type="text" class="form-control" name="kopos"
                                            placeholder="Masukkan Kode Pos" value="` + kopos + `">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kota</label>
                                        <input type="text" class="form-control" name="kota"
                                            placeholder="Masukkan Kota" value="` + kota + `">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email"
                                            placeholder="Masukkan Email" value="` + email + `">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `);

                $('#modal-edit').modal('show');
            });
        });
    </script>
@endsection
