<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Document</title> --}}
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>@yield('title')</title>
</head>
<body>
    <header>
    @yield('header')
    </header>
    <main>
        @yield('maincontent')
    </main>
   <footer class="bg-light text-center text-lg-start mt-auto py-3" style="font-size: 20px">
    @yield('footer')
   </footer>    
    <!-- Bootstrap Bundle with Popper (includes JavaScript) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>