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
                                        <div style="overflow-x: auto;">
                                            <table style="width:100%;font-size:13px;"
                                                class="table table-bordered table-vcenter card-table table-hover text-nowrap"
                                                id="example">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th class="text-center">OPSI</th>
                                                        <th class="text-center">KETERANGAN</th>
                                                        <th class="text-center">SATUAN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($barang as $item)
                                                        <tr class="text-center">
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#modal-edit{{ $item->id }}"
                                                                    data-bs-toggle="modal"
                                                                    class="btn btn-outline-info btn-sm btn-icon edit-btn"><i
                                                                        class="fa-solid fa-fw fa-edit"></i>
                                                                </a>
                                                                <form id="deleteForm{{ $item->id }}"
                                                                    action="/barang/destroy/{{ $item->id }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button"
                                                                        class="btn btn-outline-danger btn-sm btn-icon"
                                                                        onclick="confirmDelete(event, {{ $item->id }})">
                                                                        <i class="fa-solid fa-fw fa-trash-can"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <td>{{ $item->keterangan }}</td>
                                                            <td>{{ $item->satuan }}</td>
                                                        </tr>
                                                    @endforeach
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
    @foreach ($barang as $item)
        <div class="modal modal-blur fade" id="modal-edit{{ $item->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit {{ $judul }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('barang.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                <div style="flex: 1; min-width: 200px;">
                                    <label class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan"
                                        placeholder="Input placeholder"
                                        value="{{ old('keterangan', $item->keterangan) }}">
                                </div>
                                <div style="flex: 1; min-width: 200px;">
                                    <label class="form-label">Satuan</label>
                                    <input type="text" class="form-control" name="satuan"
                                        placeholder="Input placeholder" value="UNIT" disabled>
                                </div>
                                <div style="flex: 1; min-width: 200px;">
                                    <label class="form-label">Jurnal</label>
                                    <input type="text" class="form-control" name="jurnal"
                                        placeholder="Input placeholder" value="{{ old('jurnal', $item->jurnal) }}">
                                </div>
                                <div style="flex: 1; min-width: 200px;">
                                    <label class="form-label">Persediaan</label>
                                    <input type="text" class="form-control" name="persediaan"
                                        placeholder="Input placeholder"
                                        value="{{ old('persediaan', $item->persediaan) }}">
                                </div>
                                <div style="flex: 1; min-width: 200px;">
                                    <label class="form-label">Penjualan</label>
                                    <input type="text" class="form-control" name="penjualan"
                                        placeholder="Input placeholder" value="{{ old('penjualan', $item->penjualan) }}">
                                </div>
                                <div style="flex: 1; min-width: 200px;">
                                    <label class="form-label">Pembelian</label>
                                    <input type="text" class="form-control" name="pembelian"
                                        placeholder="Input placeholder" value="{{ old('pembelian', $item->pembelian) }}">
                                </div>
                                <div style="flex: 1; min-width: 200px;">
                                    <label class="form-label">Penerimaan Lain</label>
                                    <input type="text" class="form-control" name="penerimaan"
                                        placeholder="Input placeholder"
                                        value="{{ old('penerimaan', $item->penerimaan) }}">
                                </div>
                                <div style="flex: 1; min-width: 200px;">
                                    <label class="form-label">Pembayaran Lain</label>
                                    <input type="text" class="form-control" name="pembayaran"
                                        placeholder="Input placeholder"
                                        value="{{ old('pembayaran', $item->pembayaran) }}">
                                </div>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end modal edit --}}
@endsection
