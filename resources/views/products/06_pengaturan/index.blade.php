@extends('layouts.app')
@section('content')
    <div class="page">
        @include('shared.sidebar')
        <!-- Navbar -->
        @include('shared.navbar')
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                    class="icon icon-tabler icon-tabler-users" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                </svg>
                                {{ $judul }}
                            </h2>
                            <div class="page-pretitle">
                                <ol class="breadcrumb" aria-label="breadcrumbs">
                                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>
                                            Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                                class="icon icon-tabler icon-tabler-users" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                            </svg> --}}
                                            {{ $judul }}
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="d-flex">
                                <input type="search" id="user-list" class="form-control d-inline-block w-75 me-3"
                                    placeholder="Search user…">
                                <button href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal-add">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                        class="icon icon-tabler icon-tabler-users" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                    </svg>
                                    New Pengguna
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        @foreach ($users as $item)
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div id="search-results" class="row"></div>
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column align-items-center">
                                        <span class="avatar avatar-xl mb-3 rounded"
                                            style="background-image: url(assets/static/avatar.png)"></span>
                                        <h3 class="m-0 mb-1"><a href="#">{{ $item->name }}</a></h3>
                                        <div class="text-secondary">{{ $item->username }}</div>
                                        <div class="mt-3">
                                            <span class="badge bg-purple-lt">{{ $item->role }}</span>
                                        </div>

                                        <br>
                                        <!-- Tambahkan tombol di sini -->
                                        <div class="row">
                                            <div class="col">
                                                <button class="btn btn-outline-green me-2" data-bs-toggle="modal"
                                                    data-bs-target="#modal-checklist">
                                                    <i class="fa-solid fa-list-check"></i>
                                                </button>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-outline-primary me-2" data-bs-toggle="modal"
                                                    data-bs-target="#modal-reset{{ $item->id }}">
                                                    <i class="fa-solid fa-unlock-keyhole"></i>
                                                </button>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-outline-warning me-2" data-bs-toggle="modal"
                                                    data-bs-target="#modal-edit{{ $item->id }}"><i
                                                        class="fas fa-edit"></i></button>
                                            </div>
                                            <div class="col">
                                                <form id="deleteForm{{ $item->id }}"
                                                    action="/pengguna/destroy/{{ $item->id }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-outline-danger me-2"
                                                        onclick="confirmDelete(event, {{ $item->id }})">
                                                        <i class="fa-solid fa-fw fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add pengguna --}}
    <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store.users') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Input placeholder">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Input placeholder">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Input placeholder">
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Role</div>
                            <select class="form-select" name="role">
                                <option value="">--Pilih Role--</option>
                                <option value="admin">Admin</option>
                                <option value="owner">Owner</option>
                                <option value="purchasing">Pur</option>
                                <option value="whs">Whs</option>
                                <option value="tec">Tec</option>
                            </select>
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
    {{-- end pengguna --}}

    <style>
        .overlay {
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height: 100%;
            display: none;
            background: rgba(0, 0, 0, 0.6);
        }

        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px #ddd solid;
            border-top: 4px #2e93e6 solid;
            border-radius: 50%;
            animation: sp-anime 0.8s infinite linear;
        }

        @keyframes sp-anime {
            100% {
                transform: rotate(360deg);
            }
        }

        .is-hide {
            display: none;
        }
    </style>
    <div class="modal modal-blur fade" id="modal-checklist" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="overlay cursor-wait">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form id="formPembelian" name="formPembelian" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-carambola">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M17.286 21.09q -1.69 .001 -5.288 -2.615q -3.596 2.617 -5.288 2.616q -2.726 0 -.495 -6.8q -9.389 -6.775 2.135 -6.775h.076q 1.785 -5.516 3.574 -5.516q 1.785 0 3.574 5.516h.076q 11.525 0 2.133 6.774q 2.23 6.802 -.497 6.8" />
                            </svg>
                            Otorisasi User
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- <div class="fetched-data-pembelian"></div> --}}
                        <div class="row row-cards">
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-md bg-green-lt">
                                    <div class="card-body ps-3 pe-3 pt-3">
                                        <div class="text-center mt-0 mb-3">
                                            <span class="fa-solid fa-cart-shopping fa-3x text-green"></span>
                                        </div>
                                        <div class="text-uppercase text-secondary font-weight-medium text-center mb-2">
                                            <label class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="packagesId"
                                                    value="0" onclick="packages();">
                                                <span class="form-check-label">Pengadaan</span>
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <div class="divide-y">
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Permintaan</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    checked="">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Persetujuan</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Proses Email</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    checked="">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Pembelian</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    checked="">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Status Barang</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    checked="">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-md bg-azure-lt">
                                    <div class="card-body ps-3 pe-3 pt-3">
                                        <div class="text-center mt-0 mb-3">
                                            <i class="fa-solid fa-warehouse fa-3x text-azure"></i>
                                        </div>
                                        <div class="text-uppercase text-secondary font-weight-medium text-center mb-2">
                                            <label class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="packagesId"
                                                    value="0" onclick="packages();">
                                                <span class="form-check-label">Gudang</span>
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <div class="divide-y">
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Stok Barang</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    checked="">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Penerimaan</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Pengiriman</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    checked="">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Sample</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    checked="">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Barang Transit</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    checked="">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-md bg-cyan-lt">
                                    <div class="card-body ps-3 pe-3 pt-3">
                                        <div class="text-center mt-0 mb-3">
                                            <i class="fa-solid fa-wrench fa-3x text-cyan"></i>
                                        </div>
                                        <div class="text-uppercase text-secondary font-weight-medium text-center mb-2">
                                            <label class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="packagesId"
                                                    value="0" onclick="packages();">
                                                <span class="form-check-label">Teknik</span>
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <div class="divide-y">
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Servis</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    checked="">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Retur</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Pengambilan</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    checked="">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-md bg-purple-lt">
                                    <div class="card-body ps-3 pe-3 pt-3">
                                        <div class="text-center mt-0 mb-3">
                                            <i class="fa-solid fa-book fa-3x text-purple"></i>
                                        </div>
                                        <div class="text-uppercase text-secondary font-weight-medium text-center mb-2">
                                            <label class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="packagesId"
                                                    value="0" onclick="packages();">
                                                <span class="form-check-label">Laporan</span>
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <div class="divide-y">
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Laporan Pemakaian</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    checked="">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Laporan Pembelian</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="row">
                                                        <span class="col">Laporan Stock</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    checked="">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-blue" id="submitPembelian"><i class="fas fa-save"
                                style="margin-right: 5px"></i> Simpan</button>
                        <button type="button" class="btn btn-link link-secondary ms-auto" data-bs-dismiss="modal"><i
                                class="fa-solid fa-fw fa-arrow-rotate-left"></i> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    @foreach ($users as $item)
        <div class="modal modal-blur fade" id="modal-edit{{ $item->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Users</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('update.users', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="Input placeholder" value="{{ old('name', $item->name) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username"
                                    placeholder="Input placeholder" value="{{ old('username', $item->username) }}">
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Role</div>
                                <select class="form-select" name="role">
                                    <option value="">--Pilih Role--</option>
                                    <option value="admin"{{ old('role', $item->role) == 'admin' ? 'selected' : '' }}>
                                        Admin</option>
                                    <option value="owner"{{ old('role', $item->role) == 'owner' ? 'selected' : '' }}>
                                        Owner</option>
                                    <option
                                        value="purchasing"{{ old('role', $item->role) == 'purchasing' ? 'selected' : '' }}>
                                        Pur</option>
                                    <option value="whs"{{ old('role', $item->role) == 'whs' ? 'selected' : '' }}>Whs
                                    </option>
                                    <option value="tec"{{ old('role', $item->role) == 'tec' ? 'selected' : '' }}>Tec
                                    </option>
                                </select>
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

    {{-- modal reset --}}
    @foreach ($users as $item)
        <div class="modal modal-blur fade" id="modal-reset{{ $item->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Reset Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('reset.users', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="text-center">
                                            <img src="{{ asset('assets/static/machine.png') }}"
                                                class="avatar img-circle img-thumbnail"
                                                style="height: 150px; width: 150px;" alt="avatar">
                                            <hr>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" placeholder="Masukkan Password Baru"
                                                    value="{{ old('password') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Konfirmasi Password
                                                    Baru</label>
                                                <input type="password" class="form-control" id="password_confirmation"
                                                    name="password_confirmation" placeholder="Ulangi Password Baru">
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
    {{-- end modal reset --}}
@endsection
