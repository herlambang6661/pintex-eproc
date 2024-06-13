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
                                        <div style="overflow-x: auto;">
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
                                                    @foreach ($mesin as $item)
                                                        <tr class="text-center">
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#modal-edit-mesin{{ $item->id }}"
                                                                    data-bs-toggle="modal"
                                                                    class="btn btn-outline-info btn-sm btn-icon edit-btn"><i
                                                                        class="fa-solid fa-fw fa-edit"></i>
                                                                </a>
                                                                <form id="deleteForm{{ $item->id }}"
                                                                    action="/mesin/destroy/{{ $item->id }}"
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
                                                            <td>{{ $item->mesin }}</td>
                                                            <td>{{ $item->unit }}</td>
                                                        </tr>
                                                    @endforeach
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
                                            data-bs-toggle="modal" data-bs-target="#modal-add-itm"
                                            data-bs-backdrop="static" data-bs-keyboard="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                                class="icon icon-tabler icon-tabler-tractor" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
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
                                        <div style="overflow-x: auto;">
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
                                                    @foreach ($mesinitm as $item)
                                                        <tr class="text-center">
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#modal-edit-itm{{ $item->id_itm }}"
                                                                    data-bs-toggle="modal"
                                                                    class="btn btn-outline-info btn-sm btn-icon edit-btn"><i
                                                                        class="fa-solid fa-fw fa-edit"></i>
                                                                </a>
                                                                <form id="deleteForm{{ $item->id_itm }}"
                                                                    action="/itm/destroy/{{ $item->id_itm }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button"
                                                                        class="btn btn-outline-danger btn-sm btn-icon"
                                                                        onclick="confirmDelete(event, {{ $item->id_itm }})">
                                                                        <i class="fa-solid fa-fw fa-trash-can"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <td>{{ $item->foto }}</td>
                                                            <td>{{ $item->mesin->mesin }}</td>
                                                            <td>{{ $item->mesin->unit }}</td>
                                                            <td>{{ $item->merk }}</td>
                                                            <td>{{ $item->kode_nomor }}</td>
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
    @foreach ($mesin as $item)
        <div class="modal modal-blur fade" id="modal-edit-mesin{{ $item->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit {{ $judul }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('mesin.update', $item->id) }}" method="POST">
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
                                                    placeholder="Masukkan Nama" value="{{ old('mesin', $item->mesin) }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Unit</label>
                                                <select class="form-select" name="unit">
                                                    <option value="">--Pilih Unit--</option>
                                                    <option
                                                        value="1"{{ old('unit', $item->unit) == '1' ? 'selected' : '' }}>
                                                        Unit 1</option>
                                                    <option
                                                        value="2"{{ old('unit', $item->unit) == '2' ? 'selected' : '' }}>
                                                        Unit 2</option>
                                                    <option
                                                        value="Kendaraan"{{ old('unit', $item->unit) == 'Kendaraan' ? 'selected' : '' }}>
                                                        Kendaraan</option>
                                                    <option
                                                        value="Others"{{ old('unit', $item->unit) == 'Others' ? 'selected' : '' }}>
                                                        Others</option>
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
    @endforeach
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
    @foreach ($mesinitm as $item)
        <div class="modal modal-blur fade" id="modal-edit-itm{{ $item->id_itm }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit {{ $judul }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('mesinitm.update', $item->id_itm) }}" method="POST">
                            @csrf
                            @method('PUT')
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
                                                    <option value="">--Pilih Mesin--</option>
                                                    @foreach ($mesin as $currency)
                                                        <option value="{{ $currency->id }}"
                                                            {{ old('id_mesin', $item->id_mesin) == $currency->id ? 'selected' : '' }}>
                                                            {{ $currency->mesin }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Merk Mesin</label>
                                                <input type="text" class="form-control" name="merk"
                                                    placeholder="Masukkan Nama" value="{{ old('merk', $item->merk) }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Kode / Nomor</label>
                                                <input type="text" class="form-control" name="kode_nomor"
                                                    placeholder="Masukkan Nama"
                                                    value="{{ old('kode_nomor', $item->kode_nomor) }}">
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
    @endforeach
    {{-- END EDIT MESIN ITM --}}
@endsection
