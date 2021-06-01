<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>BOE Data Entry System - {{ $title }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!--- basic app requirement start -->
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/sbadmin2.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
	<script type="text/javascript" language="javascript" src="{{ asset('jquery-ui/1.11.4/ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/sb-admin-2.min.js') }}" defer></script>
        <script src="{{ asset('fontawesome-free\js\all.min.js') }}"></script>
        <!--- basic app requirement end -->
        
        <!--- Datatable requirement start -->
        <link rel="stylesheet" href="{{ asset('select2/css/select2.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('Datatables/media/css/jquery.dataTables.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('Datatables/resources/syntax/shCore.css') }}">
        
<!--        <script type="text/javascript" language="javascript" src="{{ asset('js/jquery-1.12.4.js') }}"></script>-->
        
	<script type="text/javascript" language="javascript" src="{{ asset('Datatables/media/js/jquery.dataTables.js') }}"></script>
	<script type="text/javascript" language="javascript" src="{{ asset('Datatables/resources/syntax/shCore.js') }}"></script>
        <script type="text/javascript" src="{{ asset('select2/js/select2.js') }}"></script>
    </head>
    <body class="bg-gray-100 font-family-karla flex">
        <!-- sidebar navigation part started -->
    @include('layouts.leftsidebar')
    <div class="w-full flex flex-col min-h-screen overflow-y-hidden">
        <!-- TOP navigation part started -->
        @include('layouts.navigation')
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <!-- Dynamic body content part -->
            <main class="w-full flex-grow flex-col p-2 min-vh-100">
                @yield('content')
            </main>
            <!-- footer navigation part started -->
            <footer class="w-full flex-col bg-white text-center" style="position: static; bottom: 10px;" >
                 Copyright &copy; {{ date('Y') }} Comtelworld. All Rights Reserved
            </footer>
        </div>
    </div>
    <!-- AlpineJS -->

    {{ $scripts ?? '' }}

    </body>
</html>
