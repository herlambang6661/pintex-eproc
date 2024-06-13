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
                                    class="icon icon-tabler icon-tabler-square-half" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 4v16" />
                                    <path
                                        d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                    <path d="M12 13l7.5 -7.5" />
                                    <path d="M12 18l8 -8" />
                                    <path d="M15 20l5 -5" />
                                    <path d="M12 8l4 -4" />
                                </svg>
                                {{ $judul }}

                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                                class="icon icon-tabler icon-tabler-square-half" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 4v16" />
                                                <path
                                                    d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                                <path d="M12 13l7.5 -7.5" />
                                                <path d="M12 18l8 -8" />
                                                <path d="M15 20l5 -5" />
                                                <path d="M12 8l4 -4" />
                                            </svg>
                                            {{ $judul }}
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <form action="{{ route('locker.download') }}" method="GET">
                                    <button type="submit" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-file-spreadsheet">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                            <path d="M8 11h8v7h-8z" />
                                            <path d="M8 15h8" />
                                            <path d="M11 11v7" />
                                        </svg>
                                        Export to Excel
                                    </button>
                                </form>
                                <a href="#" class="btn btn-primary d-none d-sm-inline-block mr-2"
                                    data-bs-toggle="modal" data-bs-target="#modal-add" data-bs-backdrop="static"
                                    data-bs-keyboard="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                        class="icon icon-tabler icon-tabler-square-half" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 4v16" />
                                        <path
                                            d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                        <path d="M12 13l7.5 -7.5" />
                                        <path d="M12 18l8 -8" />
                                        <path d="M15 20l5 -5" />
                                        <path d="M12 8l4 -4" />
                                    </svg>
                                    Tambah Locker
                                </a>

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
                                    <div class="card-body" style="overflow-x: auto;">
                                        <div style="overflow-x: auto;">
                                            <table style="width:100%;font-size:13px;"
                                                class="table table-bordered table-vcenter card-table table-hover text-nowrap"
                                                id="example">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th class="text-center">OPSI</th>
                                                        <th class="text-center">QRCODE</th>
                                                        <th class="text-center">GUDANG</th>
                                                        <th class="text-center">NAMA LOCKER</th>
                                                        <th class="text-center">KETERANGAN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($locker as $item)
                                                        <tr class="text-center">
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#modal-detail{{ $item->id }}"
                                                                    data-bs-toggle="modal"
                                                                    class="btn btn-outline-success btn-sm btn-icon edit-btn"><i
                                                                        class="fa-solid fa-fw fa-eye"></i>
                                                                </a>
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#modal-edit{{ $item->id }}"
                                                                    data-bs-toggle="modal"
                                                                    class="btn btn-outline-info btn-sm btn-icon edit-btn"><i
                                                                        class="fa-solid fa-fw fa-edit"></i>
                                                                </a>
                                                                <form id="deleteForm{{ $item->id }}"
                                                                    action="/locker/destroy/{{ $item->id }}"
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
                                                            <td>
                                                                <img src="{{ asset($item->qrcode) }}" alt="QR Code"
                                                                    width="40" height="40">
                                                            </td>
                                                            <td>{{ $item->gudang }}</td>
                                                            <td>{{ $item->inisial }}</td>
                                                            <td>{{ $item->keterangan }}</td>
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
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add {{ $judul }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('locker.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="form-label">Gudang</div>
                            <select class="form-select" name="gudang">
                                <option value="">--Pilih Gudang--</option>
                                <option value="99">Gudang Induk</option>
                                <option value="1">Gudang 2-1</option>
                                <option value="2">Gudang 2-2</option>
                                <option value="3">Gudang 2-3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Locker</label>
                            <input type="text" class="form-control" name="inisial" placeholder="Input placeholder">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan"
                                placeholder="Input placeholder">
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
    {{-- end modal add --}}

    {{-- modal edit --}}
    @foreach ($locker as $item)
        <div class="modal modal-blur fade" id="modal-edit{{ $item->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit {{ $judul }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('locker.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <div class="form-label">Gudang</div>
                                <select class="form-select" name="gudang">
                                    <option value="">--Pilih Gudang--</option>
                                    <option value="99"{{ old('gudang', $item->gudang) == '99' ? 'selected' : '' }}>
                                        Gudang Induk</option>
                                    <option value="1"{{ old('gudang', $item->gudang) == '1' ? 'selected' : '' }}>
                                        Gudang 2-1</option>
                                    <option value="2"{{ old('gudang', $item->gudang) == '2' ? 'selected' : '' }}>
                                        Gudang 2-2</option>
                                    <option value="3"{{ old('gudang', $item->gudang) == '3' ? 'selected' : '' }}>
                                        Gudang 2-3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Locker</label>
                                <input type="text" class="form-control" name="inisial"
                                    placeholder="Input placeholder" value="{{ old('inisial', $item->inisial) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan"
                                    placeholder="Input placeholder" value="{{ old('keterangan', $item->keterangan) }}">
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
    @endforeach
    {{-- end modal edit --}}

    {{-- modal detail --}}
    @foreach ($locker as $item)
        <div class="modal modal-blur fade" id="modal-detail{{ $item->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail {{ $judul }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Card sebelah kiri -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="text-center">
                                            <p>Tanggal Pembuatan: {{ $item->created_at->format('d-m-Y') }}</p>
                                            <img src="{{ asset($item->qrcode) }}" alt="QR Code" width="150"
                                                height="150">
                                            <hr>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Inisial</label>
                                            <input type="text" class="form-control" name="inisial"
                                                placeholder="Masukkan Nama" value="{{ old('inisial', $item->inisial) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Keterangan</label>
                                            <input type="text" class="form-control" name="keterangan"
                                                placeholder="Masukkan Nama"
                                                value="{{ old('keterangan', $item->keterangan) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>


                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end modal detail --}}
@endsection
