<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pariwisata - @yield('title', 'Destinasi')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
          
            --bs-primary: #0d6efd; 
            --bs-body-font-family: 'Inter', sans-serif;
            --bs-body-bg: #f4f7f6; /* Warna abu-abu sangat muda untuk kontras kartu putih */
        }

        body {
           
            background: linear-gradient(180deg, var(--bs-primary) 0%, var(--bs-primary) 180px, #f4f7f6 180px, #f4f7f6 100%);
            min-height: 100vh;
        }

        
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #888; border-radius: 10px; }
    </style>
</head>
<body>
    
    @include('partial.navbar')

    <main class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10"> 

                @yield('content')
            </div>
        </div>
    </main>

    <footer class="mt-auto">
        @include('partial.footer')
    </footer>

    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   




</body>
</html>