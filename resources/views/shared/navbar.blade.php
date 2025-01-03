<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none sticky-top bg-dark-lt">

    <?php
    $role = Auth::user()->role;
    $username = Auth::user()->username;
    
    // Default avatar URL
    $avatarUrl = asset('assets/static/avatars/default.png');
    
    if ($role === 'own') {
        if ($username === 'alvin') {
            $avatarUrl = asset('assets/static/avatars/1.jpg');
        } elseif ($username === 'brian') {
            $avatarUrl = asset('assets/static/avatars/2.jpg');
        } elseif ($username === 'felixjesse') {
            $avatarUrl = asset('assets/static/avatars/3.jpg');
        } else {
            $avatarUrl = asset('assets/static/avatars/avatar.png');
        }
    } elseif ($role === 'pur') {
        $avatarUrl = asset('assets/static/avatars/puji.jpg');
    } elseif ($role === 'kng') {
        $avatarUrl = asset('assets/static/avatars/avatar.png');
    } elseif ($role === 'whs') {
        if ($username === 'fahmi') {
            $avatarUrl = asset('assets/static/avatars/fahmi.jpg');
        } elseif ($username === 'rizki') {
            $avatarUrl = asset('assets/static/avatars/rizky.jpg');
        } elseif ($username === 'yanti') {
            $avatarUrl = asset('assets/static/avatars/yanti.jpg');
        } else {
            $avatarUrl = asset('assets/static/avatars/avatar.png');
        }
    }
    ?>
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
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
                        aria-label="Show notifications" onclick="getNtf()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                            <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                        </svg>
                        {{-- <span class="badge bg-red"></span> --}}
                    </a>
                    <script type="text/javascript">
                        function getNtf() {
                            $('#fetched-notification').html("");
                            var htmlLoad = $(".notificationloading").html();
                            $('#fetched-notification').html(htmlLoad);
                            $.ajax({
                                type: 'POST',
                                url: '/viewNotifPermintaan',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function(data) {
                                    $('#fetched-notification').html(data);
                                }
                            }).done(function() {
                                setTimeout(function() {
                                    $(".notificationloading").fadeOut(50);
                                }, 500);
                            });
                        }
                    </script>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Permintaan Barang</h3>
                            </div>

                            <div class="notificationloading" style="display: none">
                                <ul class="list-group list-group-flush placeholder-glow">
                                    <li class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-rounded placeholder"></div>
                                            </div>
                                            <div class="col-7">
                                                <div class="placeholder placeholder-xs col-9"></div>
                                                <div class="placeholder placeholder-xs col-7"></div>
                                            </div>
                                            <div class="col-2 ms-auto text-end">
                                                <div class="placeholder placeholder-xs col-8"></div>
                                                <div class="placeholder placeholder-xs col-10"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-rounded placeholder"></div>
                                            </div>
                                            <div class="col-7">
                                                <div class="placeholder placeholder-xs col-9"></div>
                                                <div class="placeholder placeholder-xs col-7"></div>
                                            </div>
                                            <div class="col-2 ms-auto text-end">
                                                <div class="placeholder placeholder-xs col-8"></div>
                                                <div class="placeholder placeholder-xs col-10"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-rounded placeholder"></div>
                                            </div>
                                            <div class="col-7">
                                                <div class="placeholder placeholder-xs col-9"></div>
                                                <div class="placeholder placeholder-xs col-7"></div>
                                            </div>
                                            <div class="col-2 ms-auto text-end">
                                                <div class="placeholder placeholder-xs col-8"></div>
                                                <div class="placeholder placeholder-xs col-10"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-rounded placeholder"></div>
                                            </div>
                                            <div class="col-7">
                                                <div class="placeholder placeholder-xs col-9"></div>
                                                <div class="placeholder placeholder-xs col-7"></div>
                                            </div>
                                            <div class="col-2 ms-auto text-end">
                                                <div class="placeholder placeholder-xs col-8"></div>
                                                <div class="placeholder placeholder-xs col-10"></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-group list-group-flush list-group-hoverable" id="fetched-notification"
                                style="height: 400px;width:400px;overflow-y:auto;overflow-y: scroll;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    {{-- <span class="avatar avatar-sm rounded">{{ Str::limit(Auth::user()->name, 2, '') }}</span> --}}
                    <style>
                        .logo {
                            display: inline-block;
                            width: 35px;
                            height: 35px;
                            background-size: cover;
                            background-position: center;
                            position: relative;
                            overflow: hidden;
                        }

                        .logo::before {
                            content: '';
                            display: block;
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            width: 100%;
                            height: 100%;
                            background-image: inherit;
                            background-size: 120%;
                            background-position: center;
                            transition: transform 0.3s ease;
                            transform: translate(-50%, -50%);
                        }

                        .logo:hover::before {
                            transform: translate(-50%, -50%) scale(1.1);
                        }
                    </style>

                    <span class="logo avatar-sm rounded" style="background-image: url('{{ $avatarUrl }}')"></span>

                    <div class="d-none d-xl-block ps-2">
                        <div style="text-transform: capitalize;">{{ Auth::user()->name }}</div>
                        <div class="mt-1 small text-muted" style="text-transform: capitalize;">
                            {{ Auth::user()->alias }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="./profile.html" class="dropdown-item">
                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-right:5px" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                        </svg>
                        Profile
                    </a>
                    <a href="./settings.html" class="dropdown-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            style="margin-right:5px" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                        </svg>
                        Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            style="margin-right:5px" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M9 12h12l-3 -3" />
                            <path d="M18 15l3 -3" />
                        </svg>
                        Logout
                    </a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div>
                @if (Auth::user()->role === 'own' || Auth::user()->role === 'pur' || Auth::user()->role === 'kng')
                    <form action="./" method="get" autocomplete="off" novalidate>
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                    <path d="M21 21l-6 -6" />
                                </svg>
                            </span>
                            <select class="form-control searchengine" id="searchengine"
                                style="width: 700px"></select>
                            {{-- <input type="text" value="" class="form-control" placeholder="Search…"
                            aria-label="Search in website"> --}}
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</header>
