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
                                    class="icon icon-tabler icon-tabler-rollercoaster" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M3 21a5.55 5.55 0 0 0 5.265 -3.795l.735 -2.205a8.775 8.775 0 0 1 8.325 -6h3.675" />
                                    <path d="M20 9v12" />
                                    <path d="M8 21v-3" />
                                    <path d="M12 21v-10" />
                                    <path d="M16 9.5v11.5" />
                                    <path d="M15 3h5v3h-5z" />
                                    <path d="M6 8l4 -3l2 2.5l-4 3l-1.8 -.5z" />
                                </svg>
                                {{ $judul }}

                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                                class="icon icon-tabler icon-tabler-rollercoaster" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M3 21a5.55 5.55 0 0 0 5.265 -3.795l.735 -2.205a8.775 8.775 0 0 1 8.325 -6h3.675" />
                                                <path d="M20 9v12" />
                                                <path d="M8 21v-3" />
                                                <path d="M12 21v-10" />
                                                <path d="M16 9.5v11.5" />
                                                <path d="M15 3h5v3h-5z" />
                                                <path d="M6 8l4 -3l2 2.5l-4 3l-1.8 -.5z" />
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
                                        <h3 class="card-title">{{ $judul }}</h3>
                                        <!-- Tombol Tambah Suplier ditempatkan di pojok kanan atas -->
                                        <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                                            data-bs-toggle="modal" data-bs-target="#modal-add" data-bs-backdrop="static"
                                            data-bs-keyboard="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                                class="icon icon-tabler icon-tabler-rollercoaster" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M3 21a5.55 5.55 0 0 0 5.265 -3.795l.735 -2.205a8.775 8.775 0 0 1 8.325 -6h3.675" />
                                                <path d="M20 9v12" />
                                                <path d="M8 21v-3" />
                                                <path d="M12 21v-10" />
                                                <path d="M16 9.5v11.5" />
                                                <path d="M15 3h5v3h-5z" />
                                                <path d="M6 8l4 -3l2 2.5l-4 3l-1.8 -.5z" />
                                            </svg>
                                            Tambah Barang Jasa
                                        </a>
                                    </div>
                                    <div class="card-body" style="overflow-x: auto;">
                                        <div>
                                            <table style="width:100%;font-size:13px;"
                                                class="table table-bordered table-vcenter card-table table-hover text-nowrap"
                                                id="barangJasa">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th class="text-center">OPSI</th>
                                                        <th class="text-center">KETERANGAN</th>
                                                        <th class="text-center">SATUAN</th>
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

    {{-- modal add --}}
    <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Large modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('barang.store') }}" method="POST">
                        @csrf
                        <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan"
                                    placeholder="Input placeholder" value="{{ old('keterangan') }}">
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Satuan</label>
                                <input type="text" class="form-control" name="satuan"
                                    placeholder="Input placeholder" value="UNIT" disabled>
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Jurnal</label>
                                <input type="text" class="form-control" name="jurnal"
                                    placeholder="Input placeholder" value="{{ old('jurnal') }}">
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Persediaan</label>
                                <input type="text" class="form-control" name="persediaan"
                                    placeholder="Input placeholder" value="{{ old('persediaan') }}">
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Penjualan</label>
                                <input type="text" class="form-control" name="penjualan"
                                    placeholder="Input placeholder">
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Pembelian</label>
                                <input type="text" class="form-control" name="pembelian"
                                    placeholder="Input placeholder" value="{{ old('pembelian') }}">
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Penerimaan Lain</label>
                                <input type="text" class="form-control" name="penerimaan"
                                    placeholder="Input placeholder" value="{{ old('penerimaan') }}">
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Pembayaran Lain</label>
                                <input type="text" class="form-control" name="pembayaran"
                                    placeholder="Input placeholder" value="{{ old('pembayaran') }}">
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

    {{-- modal edit --}}
    <div class="modal modal-blur fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit {{ $judul }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="javascript:void(0)" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="fetched-edit-BarangJasa"></div>
                        <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submitBarangJasa" class="btn btn-primary"
                                data-bs-dismiss="modal">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- end modal edit --}}
    {{-- View Detail --}}
    <div class="modal modal-blur fade" id="modal-view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail {{ $judul }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="viewForm" action="javascript:void(0)" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="fetched-view-BarangJasa"></div>
                        <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submitBarangJasa" class="btn btn-primary"
                                data-bs-dismiss="modal">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- end view detail --}}

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

        $(document).ready(function() {
            $('#barangJasa').DataTable({
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
                    url: '{{ route('barangJasa.index') }}',
                },
                columns: [{
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                        className: 'text-center',

                    },
                    {
                        data: 'satuan',
                        name: 'satuan',
                        className: 'text-center',

                    },
                ],
            });
        });


        $(document).ready(function() {
            // Event listener untuk tombol update
            $('#submitBarangJasa').on('click', function(e) {
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
                var keterangan = $(this).data('keterangan');
                var satuan = $(this).data('satuan');
                var jurnal = $(this).data('jurnal');
                var persediaan = $(this).data('persediaan');
                var penjualan = $(this).data('penjualan');
                var pembelian = $(this).data('pembelian');
                var penerimaan = $(this).data('penerimaan');
                var pembayaran = $(this).data('pembayaran');

                var formAction = '/barang/update/' + id;
                $('#editForm').attr('action', formAction);

                $('#modal-edit .fetched-edit-BarangJasa').html(`
           <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan"
                                    placeholder="Input placeholder" value="` + keterangan + `">
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Satuan</label>
                                <input type="text" class="form-control" name="satuan"
                                    placeholder="Input placeholder" value="` + satuan + `" disabled>
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Jurnal</label>
                                <input type="text" class="form-control" name="jurnal"
                                    placeholder="Input placeholder" value="` + jurnal + `">
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Persediaan</label>
                                <input type="text" class="form-control" name="persediaan"
                                    placeholder="Input placeholder" value="` + persediaan + `">
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Penjualan</label>
                                <input type="text" class="form-control" name="penjualan"
                                    placeholder="Input placeholder" value="` + penjualan + `">
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Pembelian</label>
                                <input type="text" class="form-control" name="pembelian"
                                    placeholder="Input placeholder" value="` + pembelian + `">
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Penerimaan Lain</label>
                                <input type="text" class="form-control" name="penerimaan"
                                    placeholder="Input placeholder" value="` + penerimaan + `">
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Pembayaran Lain</label>
                                <input type="text" class="form-control" name="pembayaran"
                                    placeholder="Input placeholder" value="` + pembayaran + `">
                            </div>
                        </div>
        `);

                $('#modal-edit').modal('show');
            });


            //------------------------View Detail-------------------------
            $(document).on('click', '.view-btn', function() {
                var id = $(this).data('id');
                var keterangan = $(this).data('keterangan');
                var satuan = $(this).data('satuan');
                var jurnal = $(this).data('jurnal');
                var persediaan = $(this).data('persediaan');
                var penjualan = $(this).data('penjualan');
                var pembelian = $(this).data('pembelian');
                var penerimaan = $(this).data('penerimaan');
                var pembayaran = $(this).data('pembayaran');

                // var formAction = '/barang/update/' + id;
                $('#viewForm').attr('action');

                $('#modal-view .fetched-view-BarangJasa').html(`
           <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan"
                                    placeholder="Input placeholder" value="` + keterangan + `" disabled>
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Satuan</label>
                                <input type="text" class="form-control" name="satuan"
                                    placeholder="Input placeholder" value="` + satuan + `" disabled>
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Jurnal</label>
                                <input type="text" class="form-control" name="jurnal"
                                    placeholder="Input placeholder" value="` + jurnal + `" disabled>
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Persediaan</label>
                                <input type="text" class="form-control" name="persediaan"
                                    placeholder="Input placeholder" value="` + persediaan + `" disabled>
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Penjualan</label>
                                <input type="text" class="form-control" name="penjualan"
                                    placeholder="Input placeholder" value="` + penjualan + `" disabled>
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Pembelian</label>
                                <input type="text" class="form-control" name="pembelian"
                                    placeholder="Input placeholder" value="` + pembelian + `" disabled>
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Penerimaan Lain</label>
                                <input type="text" class="form-control" name="penerimaan"
                                    placeholder="Input placeholder" value="` + penerimaan + `" disabled>
                            </div>
                            <div style="flex: 1; min-width: 200px;">
                                <label class="form-label">Pembayaran Lain</label>
                                <input type="text" class="form-control" name="pembayaran"
                                    placeholder="Input placeholder" value="` + pembayaran + `" disabled>
                            </div>
                        </div>
        `);

                $('#modal-view').modal('show');
            });
        });
    </script>
@endsection
