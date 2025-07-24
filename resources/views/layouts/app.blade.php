<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard User</title>
  @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- pastikan path ini sesuai setup Tailwind + Vite kamu --}}
</head>
<body class="antialiased bg-gray-100 text-gray-800">
  
  <main>
    @yield('content')
  </main>
</body>
</html>
