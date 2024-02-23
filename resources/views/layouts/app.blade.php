<!doctype html>
<!--
* =======================================================================================
* App Name : E-Procurement
* All copyrights belong to PT. Plumbon International Textile
* Developer : Herlambang Yudha Pahlawan (Fullstack + Mobile Native Android)
* All Rights Reserved
* This Website using Template : 
* =======================================================================================
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
    <div class="main-wrapper">
        @include('shared.header')

        <script src="{{ asset('assets/dist/js/demo-theme.min.js?1684106062') }}"></script>
        <div class="main-content">
            
            <div class="container">
                <body>
                    @yield('content')
                </body>
            </div>
        </div>

        @include('shared.footer')
        @include('shared.script')
        @include('components.alert')
        </div>
    </div>
</html>