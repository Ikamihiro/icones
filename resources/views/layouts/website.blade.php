<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code&display=swap" rel="stylesheet">

    <link href="{{ asset('css/website.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
</head>

<body>
    <div class="vertical-nav bg-dark d-flex flex-column justify-content-center" id="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item text-center">
                <a href="{{ route('root') }}" class="nav-link text-white">
                    <h3>Ícones da Computação</h3>
                </a>
            </li>
            <li class="nav-item text-center">
                <a href="{{ route('root') }}" class="nav-link text-white">
                    <h5>Sobre</h5>
                </a>
            </li>
            <li class="nav-item text-center">
                <a href="{{ route('root') }}" class="nav-link text-white">
                    <h5>Ícones</h5>
                </a>
            </li>
            <li class="nav-item text-center">
                <a href="{{ route('root') }}" class="nav-link text-white">
                    <h5>Contribuir</h5>
                </a>
            </li>
            <li class="nav-item text-center">
                <a href="{{ route('root') }}" class="nav-link text-white">
                    <h5>Políticas e Termos</h5>
                </a>
            </li>
        </ul>
    </div>

    <div class="page-content p-5" id="content">
        <button id="sidebarCollapse" class="btn btn-dark rounded-pill shadow-sm px-4 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
            </svg>
        </button>

        @yield('content')
    </div>
    <!-- End demo content -->

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
        });

    </script>
</body>

</html>
