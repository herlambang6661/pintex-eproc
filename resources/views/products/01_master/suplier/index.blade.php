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
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <div class="mb-3">
                                    <div class="row g-2">
                                        <div class="col-auto">
                                            <select class="form-select" id="filterDropdown" name="tipe">
                                                <option value="">--Pilih Tipe--</option>
                                                <option value="all">Tampilkan Semua</option>
                                                <option value="entitas">Entitas</option>
                                                <option value="individu">Individu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
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
                                                    @foreach ($suplier as $item)
                                                        <tr class="text-center suplier-row"
                                                            data-tipe="{{ $item->tipe }}">
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#modal-detail{{ $item->id }}"
                                                                    data-bs-toggle="modal"
                                                                    class="btn btn-outline-info btn-sm btn-icon edit-btn"><i
                                                                        class="fa-solid fa-fw fa-eye"></i>
                                                                </a>
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#modal-edit{{ $item->id }}"
                                                                    data-bs-toggle="modal"
                                                                    class="btn btn-outline-success btn-sm btn-icon edit-btn"><i
                                                                        class="fa-solid fa-fw fa-edit"></i>
                                                                </a>
                                                                <form id="deleteForm{{ $item->id }}"
                                                                    action="/suplier/destroy/{{ $item->id }}"
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
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->tipe }}</td>
                                                            <td>{{ $item->telp }}</td>
                                                            <td>{{ $item->contact }}</td>
                                                            <td>{{ $item->kota }}</td>
                                                            <td>{{ $item->provinsi }}</td>
                                                            <td>{{ $item->email }}</td>
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

    {{-- modal add supplier --}}
    <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
                                                            <h6>Fax</h6>
                                                        </label>
                                                        <input name="fax" type="text"
                                                            class="form-control form-control-sm input-suplier-fax"
                                                            value="{{ old('fax') }}"
                                                            placeholder="Masukkan Fax Suplier">
                                                    </div>
                                                </div>
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
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="last_name">
                                                            <h6>Website</h6>
                                                        </label>
                                                        <input name="website" type="text"
                                                            class="form-control form-control-sm input-suplier-website"
                                                            value="{{ old('website') }}"
                                                            placeholder="Masukkan Website Suplier">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="last_name">
                                                            <h6>Catatan</h6>
                                                        </label>
                                                        <textarea name="catatan" cols="30" rows="3" class="form-control form-control-sm input-suplier-catatan"
                                                            placeholder="(Opsional)">{{ old('catatan') }}</textarea>
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
    @foreach ($suplier as $item)
        <div class="modal modal-blur fade" id="modal-edit{{ $item->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit {{ $judul }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('suplier.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
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
                                                    placeholder="Masukkan Nama" value="{{ old('nama', $item->nama) }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Contact</label>
                                                <input type="text" class="form-control" name="contact"
                                                    placeholder="Masukkan Contact"
                                                    value="{{ old('contact', $item->contact) }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Telepon</label>
                                                <input type="text" class="form-control" name="telp"
                                                    placeholder="Masukkan Telepon"
                                                    value="{{ old('telp', $item->telp) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                            <option value="entitas"
                                                                {{ old('tipe', $item->tipe) == 'entitas' ? 'selected' : '' }}>
                                                                Entitas</option>
                                                            <option value="individu"
                                                                {{ old('tipe', $item->tipe) == 'individu' ? 'selected' : '' }}>
                                                                Individu</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jabatan</label>
                                                        <input type="text" class="form-control" name="jabatan"
                                                            placeholder="Masukkan Jabatan"
                                                            value="{{ old('jabatan', $item->jabatan) }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">NPWP</label>
                                                        <input type="text" class="form-control" name="npwp"
                                                            placeholder="Masukkan NPWP"
                                                            value="{{ old('npwp', $item->npwp) }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jenis Mata Uang</label>
                                                        <select class="form-select" name="uang_id">
                                                            <option value="">--Pilih Uang--</option>
                                                            @foreach ($uang as $currency)
                                                                <option value="{{ $currency->id }}"
                                                                    {{ old('uang_id', $item->uang_id) == $currency->id ? 'selected' : '' }}>
                                                                    {{ $currency->inisial }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Provinsi</label>
                                                        <input type="text" class="form-control" name="provinsi"
                                                            placeholder="Masukkan Provinsi"
                                                            value="{{ old('provinsi', $item->provinsi) }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Catatan</label>
                                                        <textarea class="form-control" name="catatan" rows="3" placeholder="Masukkan Catatan">{{ old('catatan', $item->catatan) }}</textarea>
                                                    </div>
                                                </div>
                                                <!-- Form kanan -->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Fax</label>
                                                        <input type="text" class="form-control" name="fax"
                                                            placeholder="Masukkan Fax"
                                                            value="{{ old('fax', $item->fax) }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Alamat</label>
                                                        <input type="text" class="form-control" name="alamat"
                                                            placeholder="Masukkan Alamat"
                                                            value="{{ old('alamat', $item->alamat) }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Kode Pos</label>
                                                        <input type="text" class="form-control" name="kopos"
                                                            placeholder="Masukkan Kode Pos"
                                                            value="{{ old('kopos', $item->kopos) }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Kota</label>
                                                        <input type="text" class="form-control" name="kota"
                                                            placeholder="Masukkan Kota"
                                                            value="{{ old('kota', $item->kota) }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" class="form-control" name="email"
                                                            placeholder="Masukkan Email"
                                                            value="{{ old('email', $item->email) }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Website</label>
                                                        <input type="text" class="form-control" name="website"
                                                            placeholder="Masukkan Website"
                                                            value="{{ old('website', $item->website) }}">
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
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end modal edit suplier --}}

    {{-- modal detail suplier --}}
    @foreach ($suplier as $item)
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
                                                <div class="mb-3">
                                                    <label class="form-label">Catatan</label>
                                                    <textarea class="form-control" name="catatan" rows="3" placeholder="Masukkan Catatan" disabled>{{ old('catatan', $item->catatan) }}</textarea>
                                                </div>
                                            </div>
                                            <!-- Form kanan -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Fax</label>
                                                    <input type="text" class="form-control" name="fax"
                                                        placeholder="Masukkan Fax" value="{{ old('fax', $item->fax) }}"
                                                        disabled>
                                                </div>
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
                                                <div class="mb-3">
                                                    <label class="form-label">Website</label>
                                                    <input type="text" class="form-control" name="website"
                                                        placeholder="Masukkan Website"
                                                        value="{{ old('website', $item->website) }}" disabled>
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
    @endforeach
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
@endsection
