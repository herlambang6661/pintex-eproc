<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark" style="margin-top: 5px">
            <a href="{{ url('dashboard') }}" style="margin-right: 5px">
                <img src="{{ asset('assets/static/assets.png') }}" width="25px" alt="" srcset="">
            </a>
            <a href="{{ url('dashboard') }}">
                E-PROC
            </a>
        </h1>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item d-none d-lg-flex me-3">
                <div class="btn-list">
                    <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
                        <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                        </svg>
                        Source code
                    </a>
                    <a href="https://github.com/sponsors/codecalm" class="btn" target="_blank" rel="noreferrer">
                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                        Sponsor
                    </a>
                </div>
            </div>
            <div class="d-none d-lg-flex">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path
                            d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                    </svg>
                </a>
                <div class="nav-item dropdown d-none d-md-flex me-3">
                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                        aria-label="Show notifications">
                        <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                            <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                        </svg>
                        <span class="badge bg-red"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Last updates</h3>
                            </div>
                            <div class="list-group list-group-flush list-group-hoverable">
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><span
                                                class="status-dot status-dot-animated bg-red d-block"></span></div>
                                        <div class="col text-truncate">
                                            <a href="#" class="text-body d-block">Example 1</a>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                Change deprecated html tags to text decoration classes (#29604)
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="list-group-item-actions">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><span class="status-dot d-block"></span></div>
                                        <div class="col text-truncate">
                                            <a href="#" class="text-body d-block">Example 2</a>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                justify-content:between ⇒ justify-content:space-between (#29734)
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="list-group-item-actions show">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><span class="status-dot d-block"></span></div>
                                        <div class="col text-truncate">
                                            <a href="#" class="text-body d-block">Example 3</a>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                Update change-version.js (#29736)
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="list-group-item-actions">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><span
                                                class="status-dot status-dot-animated bg-green d-block"></span></div>
                                        <div class="col text-truncate">
                                            <a href="#" class="text-body d-block">Example 4</a>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                Regenerate package-lock.json (#29730)
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="list-group-item-actions">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>Paweł Kuna</div>
                        <div class="mt-1 small text-muted">UI Designer</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="#" class="dropdown-item">Status</a>
                    <a href="./profile.html" class="dropdown-item">Profile</a>
                    <a href="#" class="dropdown-item">Feedback</a>
                    <div class="dropdown-divider"></div>
                    <a href="./settings.html" class="dropdown-item">Settings</a>
                    <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item {{ $active == 'Dashboard' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('dashboard') }}">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li
                    class="nav-item dropdown {{ $active == 'Uang' || $active == 'Pajak' || $active == 'Suplier' || $active == 'BarangJasa' || $active == 'Mesin' || $active == 'Barang' || $active == 'Locker' ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                <path d="M12 12l8 -4.5" />
                                <path d="M12 12l0 9" />
                                <path d="M12 12l-8 -4.5" />
                                <path d="M16 5.25l-8 4.5" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Data Master
                        </span>
                    </a>
                    <div
                        class="dropdown-menu {{ $active == 'Uang' || $active == 'Pajak' || $active == 'Suplier' || $active == 'BarangJasa' || $active == 'Mesin' || $active == 'Barang' || $active == 'Locker' ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="/uang">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                        class="icon icon-tabler icon-tabler-file-dollar" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path
                                            d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                        <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                        <path d="M12 17v1m0 -8v1" />
                                    </svg>
                                    Mata Uang
                                </a>
                                <a class="dropdown-item" href="/pajak">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                        class="icon icon-tabler icon-tabler-receipt-tax" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 14l6 -6" />
                                        <circle cx="9.5" cy="8.5" r=".5" fill="currentColor" />
                                        <circle cx="14.5" cy="13.5" r=".5" fill="currentColor" />
                                        <path
                                            d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" />
                                    </svg>
                                    Tarif Pajak
                                </a>
                                <a class="dropdown-item" href="/suplier">
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
                                    Supplier & User
                                </a>
                                <a class="dropdown-item" href="/barang">
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
                                    Barang & Jasa
                                </a>
                                <a class="dropdown-item" href="/mesin">
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
                                    Mesin
                                </a>
                                <a class="dropdown-item" href="/masterBarang">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                        class="icon icon-tabler icon-tabler-building-factory" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 21c1.147 -4.02 1.983 -8.027 2 -12h6c.017 3.973 .853 7.98 2 12" />
                                        <path d="M12.5 13h4.5c.025 2.612 .894 5.296 2 8" />
                                        <path
                                            d="M9 5a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1" />
                                        <path d="M3 21l19 0" />
                                    </svg>
                                    Barang
                                </a>
                                <a class="dropdown-item" href="/locker">
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
                                    Locker
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li
                    class="nav-item dropdown {{ $active == 'Permintaan' || $active == 'Persetujuan' || $active == 'ProsesEmail' || $active == 'Pembelian' || $active == 'StatusBarang' ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-shopping-bag-search" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M11.5 21h-2.926a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304h11.339a2 2 0 0 1 1.977 2.304l-.117 .761" />
                                <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                <path d="M20.2 20.2l1.8 1.8" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Pengadaan
                        </span>
                    </a>
                    <div
                        class="dropdown-menu {{ $active == 'Permintaan' || $active == 'Persetujuan' || $active == 'ProsesEmail' || $active == 'Pembelian' || $active == 'StatusBarang' ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item {{ $active == 'Permintaan' ? 'active' : '' }}"
                                    href="{{ url('pengadaan/permintaan') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
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
                                    Permintaan
                                </a>
                                <a class="dropdown-item" href="{{ url('pengadaan/persetujuan') }}"
                                    {{ $active == 'Persetujuan' ? 'active' : '' }}>
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                        class="icon icon-tabler icon-tabler-heart-handshake" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                        <path
                                            d="M12 6l-3.293 3.293a1 1 0 0 0 0 1.414l.543 .543c.69 .69 1.81 .69 2.5 0l1 -1a3.182 3.182 0 0 1 4.5 0l2.25 2.25" />
                                        <path d="M12.5 15.5l2 2" />
                                        <path d="M15 13l2 2" />
                                    </svg>
                                    Persetujuan
                                </a>
                                <a class="dropdown-item" href="./badges.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                        class="icon icon-tabler icon-tabler-mail" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                        <path d="M3 7l9 6l9 -6" />
                                    </svg>
                                    Proses Email
                                </a>
                                <a class="dropdown-item" href="./buttons.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                        class="icon icon-tabler icon-tabler-shopping-cart-dollar" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M13 17h-7v-14h-2" />
                                        <path d="M6 5l14 1l-.575 4.022m-4.925 2.978h-8.5" />
                                        <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                        <path d="M19 21v1m0 -8v1" />
                                    </svg>
                                    Pembelian
                                </a>
                                <a class="dropdown-item" href="./colors.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                        class="icon icon-tabler icon-tabler-git-pull-request-draft" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M6 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M6 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M18 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M6 8v8" />
                                        <path d="M18 11h.01" />
                                        <path d="M18 6h.01" />
                                    </svg>
                                    Status Barang
                                </a>
                                {{-- <div class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
                                Cards
                                <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                </a>
                                <div class="dropdown-menu">
                                <a href="./cards.html" class="dropdown-item">
                                    Sample cards
                                </a>
                                <a href="./card-actions.html" class="dropdown-item">
                                    Card actions
                                    <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                </a>
                                <a href="./cards-masonry.html" class="dropdown-item">
                                    Cards Masonry
                                </a>
                                </div>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-building-warehouse" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 21v-13l9 -4l9 4v13" />
                                <path d="M13 13h4v8h-10v-6h6" />
                                <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Gudang
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="./empty.html">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-truck-return" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v6h-5l2 2m0 -4l-2 2" />
                                        <path d="M9 17l6 0" />
                                        <path d="M13 6h5l3 5v6h-2" />
                                    </svg>
                                    Penerimaan
                                </a>
                                <a class="dropdown-item" href="./cookie-banner.html">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-mail-fast" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 7h3" />
                                        <path d="M3 11h2" />
                                        <path
                                            d="M9.02 8.801l-.6 6a2 2 0 0 0 1.99 2.199h7.98a2 2 0 0 0 1.99 -1.801l.6 -6a2 2 0 0 0 -1.99 -2.199h-7.98a2 2 0 0 0 -1.99 1.801z" />
                                        <path d="M9.8 7.5l2.982 3.28a3 3 0 0 0 4.238 .202l3.28 -2.982" />
                                    </svg>
                                    Pengiriman
                                </a>
                                <a class="dropdown-item" href="./activity.html">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-test-pipe" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M20 8.04l-12.122 12.124a2.857 2.857 0 1 1 -4.041 -4.04l12.122 -12.124" />
                                        <path d="M7 13h8" />
                                        <path d="M19 15l1.5 1.6a2 2 0 1 1 -3 0l1.5 -1.6z" />
                                        <path d="M15 3l6 6" />
                                    </svg>
                                    Sample
                                </a>
                                <a class="dropdown-item" href="./gallery.html">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-transform" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 6a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                        <path d="M21 11v-3a2 2 0 0 0 -2 -2h-6l3 3m0 -6l-3 3" />
                                        <path d="M3 13v3a2 2 0 0 0 2 2h6l-3 -3m0 6l3 -3" />
                                        <path d="M15 18a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>
                                    Barang Transit
                                </a>
                                <a class="dropdown-item" href="./invoice.html">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-arrows-random" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M20 21h-4v-4" />
                                        <path d="M16 21l5 -5" />
                                        <path d="M6.5 9.504l-3.5 -2l2 -3.504" />
                                        <path d="M3 7.504l6.83 -1.87" />
                                        <path d="M4 16l4 -1l1 4" />
                                        <path d="M8 15l-3.5 6" />
                                        <path d="M21 5l-.5 4l-4 -.5" />
                                        <path d="M20.5 9l-4.5 -5.5" />
                                    </svg>
                                    Mutasi
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="true">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Teknik
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="./layout-horizontal.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                        class="icon icon-tabler icon-tabler-home-cog" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h1.6" />
                                        <path d="M20 11l-8 -8l-9 9h2v7a2 2 0 0 0 2 2h4.159" />
                                        <path d="M18 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M18 14.5v1.5" />
                                        <path d="M18 20v1.5" />
                                        <path d="M21.032 16.25l-1.299 .75" />
                                        <path d="M16.27 19l-1.3 .75" />
                                        <path d="M14.97 16.25l1.3 .75" />
                                        <path d="M19.733 19l1.3 .75" />
                                    </svg>
                                    Servis
                                </a>
                                <a class="dropdown-item" href="./layout-boxed.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                        class="icon icon-tabler icon-tabler-receipt-refund" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" />
                                        <path d="M15 14v-2a2 2 0 0 0 -2 -2h-4l2 -2m0 4l-2 -2" />
                                    </svg>
                                    Retur
                                </a>
                                <a class="dropdown-item" href="./layout-vertical.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                        class="icon icon-tabler icon-tabler-qrcode" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path d="M7 17l0 .01" />
                                        <path
                                            d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path d="M7 7l0 .01" />
                                        <path
                                            d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path d="M17 7l0 .01" />
                                        <path d="M14 14l3 0" />
                                        <path d="M20 14l0 .01" />
                                        <path d="M14 14l0 3" />
                                        <path d="M14 20l3 0" />
                                        <path d="M17 17l3 0" />
                                        <path d="M20 17l0 3" />
                                    </svg>
                                    Barcode Barang
                                </a>
                                <a class="dropdown-item" href="./layout-vertical-transparent.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                        class="icon icon-tabler icon-tabler-book-upload" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 20h-8a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12v5" />
                                        <path d="M11 16h-5a2 2 0 0 0 -2 2" />
                                        <path d="M15 16l3 -3l3 3" />
                                        <path d="M18 13v9" />
                                    </svg>
                                    Pengambilan
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                class="icon icon-tabler icon-tabler-clipboard-data" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                <path
                                    d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M9 17v-4" />
                                <path d="M12 17v-1" />
                                <path d="M15 17v-2" />
                                <path d="M12 17v-1" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Laporan
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="https://tabler.io/docs" target="_blank" rel="noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                class="icon icon-tabler icon-tabler-report" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                                <path d="M18 14v4h4" />
                                <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                                <path
                                    d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M8 11h4" />
                                <path d="M8 15h3" />
                            </svg>
                            Laporan Pemakaian
                        </a>
                        <a class="dropdown-item" href="./changelog.html">
                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                class="icon icon-tabler icon-tabler-clipboard-data" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                <path
                                    d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M9 17v-4" />
                                <path d="M12 17v-1" />
                                <path d="M15 17v-2" />
                                <path d="M12 17v-1" />
                            </svg>
                            Laporan Pembelian
                        </a>
                        <a class="dropdown-item" href="https://github.com/tabler/tabler" target="_blank"
                            rel="noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px"
                                class="icon icon-tabler icon-tabler-checkup-list" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                <path
                                    d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M9 14h.01" />
                                <path d="M9 17h.01" />
                                <path d="M12 16l1 1l3 -3" />
                            </svg>
                            Laporan Stock
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown {{ $active == 'Pengguna' ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span
                            class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M15 15l3.35 3.35" />
                                <path d="M9 15l-3.35 3.35" />
                                <path d="M5.65 5.65l3.35 3.35" />
                                <path d="M18.35 5.65l-3.35 3.35" />
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Pengaturan
                        </span>
                    </a>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item {{ $active == 'Pengguna' ? 'show' : '' }}" href="/pengguna"
                            rel="noopener">
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
                            Pengguna E-Proc
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</aside>
