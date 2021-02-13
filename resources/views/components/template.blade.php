<!DOCTYPE html>
<html lang="es">
    <head>
        @include('components.head')
        @include('components.styles')
    </head>
    <body>
        @include('components.navbar')

        @yield('content')
       {{-- @yield('form') --}}

        {{--@include('components.footer')--}}

        @include('components.scripts')
    </body>
</html>