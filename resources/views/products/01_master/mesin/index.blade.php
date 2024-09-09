@extends('layouts.app')
@section('content')
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
                                    class="icon icon-tabler icon-tabler-tractor" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 15m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M7 15l0 .01" />
                                    <path d="M19 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M10.5 17l6.5 0" />
                                    <path d="M20 15.2v-4.2a1 1 0 0 0 -1 -1h-6l-2 -5h-6v6.5" />
                                    <path d="M18 5h-1a1 1 0 0 0 -1 1v4" />
                                </svg>
                                {{ $judul }}

                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                                class="icon icon-tabler icon-tabler-tractor" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 15m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                <path d="M7 15l0 .01" />
                                                <path d="M19 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M10.5 17l6.5 0" />
                                                <path d="M20 15.2v-4.2a1 1 0 0 0 -1 -1h-6l-2 -5h-6v6.5" />
                                                <path d="M18 5h-1a1 1 0 0 0 -1 1v4" />
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
                        <div class="col-6">
                            <div class="card card-xl border-success shadow rounded">
                                <div class="card-stamp card-stamp-lg">
                                    <div class="card-stamp-icon bg-success">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">Table {{ $judul }}</h3>
                                        <!-- Tombol Tambah Suplier ditempatkan di pojok kanan atas -->
                                        <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                                            data-bs-toggle="modal" data-bs-target="#modal-add-mesin"
                                            data-bs-backdrop="static" data-bs-keyboard="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                                class="icon icon-tabler icon-tabler-tractor" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 15m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                <path d="M7 15l0 .01" />
                                                <path d="M19 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M10.5 17l6.5 0" />
                                                <path d="M20 15.2v-4.2a1 1 0 0 0 -1 -1h-6l-2 -5h-6v6.5" />
                                                <path d="M18 5h-1a1 1 0 0 0 -1 1v4" />
                                            </svg>
                                            Tambah Data Mesin
                                        </a>
                                    </div>
                                    <div class="card-body" style="overflow-x: auto;">
                                        <div>
                                            <table style="width:100%;font-size:13px;"
                                                class="table table-bordered table-vcenter card-table table-hover text-nowrap"
                                                id="example">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th class="text-center">OPSI</th>
                                                        <th class="text-center">NAMA MESIN</th>
                                                        <th class="text-center">UNIT</th>
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
                        <div class="col-6">
                            <div class="card card-xl border-info shadow rounded">
                                <div class="card-stamp card-stamp-lg">
                                    <div class="card-stamp-icon bg-info">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">Table {{ $judul }} Itm</h3>
                                        <!-- Tombol Tambah Suplier ditempatkan di pojok kanan atas -->
                                        <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                                            data-bs-toggle="modal" data-bs-target="#modal-add-itm" data-bs-backdrop="static"
                                            data-bs-keyboard="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                                class="icon icon-tabler icon-tabler-tractor" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 15m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                <path d="M7 15l0 .01" />
                                                <path d="M19 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M10.5 17l6.5 0" />
                                                <path d="M20 15.2v-4.2a1 1 0 0 0 -1 -1h-6l-2 -5h-6v6.5" />
                                                <path d="M18 5h-1a1 1 0 0 0 -1 1v4" />
                                            </svg>
                                            Tambah Data Item Mesin
                                        </a>
                                    </div>
                                    <div class="card-body" style="overflow-x: auto;">
                                        <div>
                                            <table style="width:100%;font-size:13px;"
                                                class="table table-bordered table-vcenter card-table table-hover text-nowrap"
                                                id="example1">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th class="text-center">OPSI</th>
                                                        <th class="text-center">IMG</th>
                                                        <th class="text-center">MESIN</th>
                                                        <th class="text-center">UNIT</th>
                                                        <th class="text-center">MERK MESIN</th>
                                                        <th class="text-center">KODE / NOMOR</th>
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

    {{-- ADD MESIN --}}
    <div class="modal modal-blur fade" id="modal-add-mesin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add {{ $judul }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mesin.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Card sebelah kiri -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="text-center">
                                            <img src="{{ asset('assets/static/assets.png') }}"
                                                class="avatar img-circle img-thumbnail"
                                                style="height: 150px; width: 150px;" alt="avatar">
                                            <hr>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Nama Mesin</label>
                                            <input type="text" class="form-control" name="mesin"
                                                placeholder="Masukkan Nama" value="">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Unit</label>
                                            <select class="form-select" name="unit">
                                                <option value="">--Pilih Unit--</option>
                                                <option value="1">Unit 1</option>
                                                <option value="2">Unit 2</option>
                                                <option value="Kendaraan">Kendaraan</option>
                                                <option value="Others">Others</option>
                                            </select>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- END ADD MESIN --}}

    {{-- EDIT MESIN --}}
    <div class="modal modal-blur fade" id="modal-edit-mesin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Mesin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="javascript:void(0)" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="fetched-edit-mesin"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submitMesin" class="btn btn-primary">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- END EDIT MESIN --}}

    {{-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------MASTER MESIN ITM -------------- --}}

    {{-- ADD MESIN ITM --}}
    <div class="modal modal-blur fade" id="modal-add-itm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add {{ $judul }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mesinitm.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Card sebelah kiri -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="text-center">
                                            <img src="{{ asset('assets/static/machine.png') }}"
                                                class="avatar img-circle img-thumbnail"
                                                style="height: 150px; width: 150px;" alt="avatar">
                                            <hr>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mesin</label>
                                            <select class="form-select" name="id_mesin">
                                                <option value="">--Pilih Mesin`--</option>
                                                @foreach ($mesin as $item)
                                                    <option value="{{ $item->id }}">{{ $item->mesin }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Merk Mesin</label>
                                            <input type="text" class="form-control" name="merk"
                                                placeholder="Masukkan Nama" value="{{ old('merk') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kode / Nomor</label>
                                            <input type="text" class="form-control" name="kode_nomor"
                                                placeholder="Masukkan Nama" value="{{ old('kode_nomor') }}">
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-label">foto</div>
                                            <input type="file" name="foto" class="form-control" />
                                            <small class="text-danger">*Jika ada foto saja</small>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- END MESIN ITM --}}

    {{-- EDIT MESIN ITM --}}
    <div class="modal modal-blur fade" id="modal-edit-mesinitm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit {{ $judul }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editFormMesin" action="javascript:void(0)" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Card sebelah kiri -->
                            <div class="fecthed-edit-mesinitm"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submitMesinItm" class="btn btn-primary"
                                data-bs-dismiss="modal">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- END EDIT MESIN ITM --}}

    <script>
        var table;

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
                    url: '{{ route('mesin.index') }}',
                    data: {
                        model: 'mesin'
                    }
                },
                columns: [{
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'cuspad0 cuspad1 text-center',
                    },
                    {
                        data: 'mesin',
                        name: 'mesin',
                        className: 'cuspad0 cuspad1 text-center',
                    },
                    {
                        data: 'unit',
                        name: 'unit',
                        className: 'cuspad0 cuspad1 text-center',
                    },

                ],
            });
        });

        //-----------------------------------------------------EDIT MESIN---------------------------------------------
        $(document).on('click', '.edit-btn', function() {
            var id = $(this).data('id');
            var mesin = $(this).data('mesin');
            var unit = $(this).data('unit');

            $('#modal-edit-mesin .fetched-edit-mesin').html(`
        <div class="row">
            <!-- Card sebelah kiri -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('assets/static/assets.png') }}"
                                class="avatar img-circle img-thumbnail"
                                style="height: 150px; width: 150px;" alt="avatar">
                            <hr>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Mesin</label>
                            <input type="text" class="form-control" name="mesin" id="editmesin" value="${mesin}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Unit</label>
                            <select class="form-select" name="unit" id="editunit">
                                <option value="">--Pilih Unit--</option>
                                <option value="1">Unit 1</option>
                                <option value="2">Unit 2</option>
                                <option value="Kendaraan">Kendaraan</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `);
            $('#submitMesin').data('id', id);
            // Mengatur opsi yang dipilih pada elemen <select>
            $('#editunit').val(unit);
        });

        $(document).on('click', '#submitMesin', function(e) {
            e.preventDefault();

            var id = $(this).data('id'); // Ambil id dari data-id tombol submit
            var csrfToken = $('form').find('input[name="_token"]').val();
            var formData = {
                '_token': csrfToken,
                '_method': 'PUT',
                'mesin': $('#editmesin').val(),
                'unit': $('#editunit').val(),
            };

            $.ajax({
                url: '/mesin/update/' + id,
                method: 'POST',
                data: formData,
                success: function(response) {
                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: response.msg,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#modal-edit-mesin').modal('hide');
                                table.ajax.reload(); // Memperbarui tabel setelah sukses
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.msg,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat mengirim data. Silakan coba lagi.',
                    });
                }
            });
        });

        //--------------------------------------------------MESIN ITM--------------------------------------//
        $(document).ready(function() {
            $('#example1').DataTable({
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
                    url: '{{ route('mesin.index') }}',
                    data: {
                        model: 'mesinitm'
                    }
                },
                columns: [{
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'cuspad0 cuspad1 text-center',
                    },
                    {
                        data: 'foto',
                        name: 'foto',
                        className: 'cuspad0 cuspad1 text-center',
                    },
                    {
                        data: 'mesin_nama',
                        name: 'mesin_nama',
                        className: 'cuspad0 cuspad1 text-center',
                    },
                    {
                        data: 'mesin_unit',
                        name: 'mesin_unit',
                        className: 'cuspad0 cuspad1 text-center',
                    },
                    {
                        data: 'merk',
                        name: 'merk',
                        className: 'cuspad0 cuspad1 text-center',
                    },
                    {
                        data: 'kode_nomor',
                        name: 'kode_nomor',
                        className: 'cuspad0 cuspad1 text-center',
                    },

                ],
            });
        });

        $(document).ready(function() {
            // Event listener untuk tombol edit
            $(document).on('click', '.edit-btn', function() {
                var id_itm = $(this).data('id_itm');
                var id_mesin = $(this).data('id_mesin');
                var merk = $(this).data('merk');
                var kode_nomor = $(this).data('kode_nomor');

                var formAction = '/itm/update/' + id_itm;
                $('#editFormMesin').attr('action', formAction);

                $('#modal-edit-mesinitm .fecthed-edit-mesinitm').html(`
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('assets/static/machine.png') }}"
                                class="avatar img-circle img-thumbnail"
                                style="height: 150px; width: 150px;" alt="avatar">
                            <hr>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mesin</label>
                            <select class="form-select" name="id_mesin">
                                <option value="">--Pilih Mesin--</option>
                                @foreach ($mesin as $m)
                                    <option value="{{ $m->id }}" ` + (id_mesin == {{ $m->id }} ?
                        'selected' : '') + `>{{ $m->mesin }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Merk Mesin</label>
                            <input type="text" class="form-control" name="merk" placeholder="Masukkan Nama" value="` +
                    merk +
                    `">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kode / Nomor</label>
                            <input type="text" class="form-control" name="kode_nomor" placeholder="Masukkan Nama" value="` +
                    kode_nomor + `">
                        </div>
                        <div class="mb-3">
                            <div class="form-label">foto</div>
                            <input type="file" name="foto" class="form-control" />
                            <small class="text-danger">*Jika ada foto saja</small>
                        </div>
                    </div>
                </div>
            </div>
        `);

                $('#modal-edit-mesinitm').modal('show');
            });

            // Event listener untuk tombol submit
            $('#submitMesinItm').on('click', function(e) {
                e.preventDefault();
                var form = $('#editFormMesin');
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
                                timer: 3000,
                                toast: true
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    location.reload();
                                }
                            });
                        }
                    },
                    error: function(xhr) {
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
        });
    </script>
@endsection
