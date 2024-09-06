<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>WEB KEREN</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
      <a href="/" class="navbar-brand">NiNino</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a  href="/" class="nav-link active" aria-current="page">HOME</a>
            </li>
            <li class="nav-item">
              <a href="/contact" class="nav-link">CONTACT</a>
            </li>
            <li class="nav-item">
              <a href="/about" class="nav-link">ABOUT</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </header>
    <hr>

    <nav class="p-5">
    <!-- Judul Halaman -->
    <h3>@yield('page_title')</h3>

    <!-- Konten Halaman -->
    @yield('content')
    </nav>

    <hr>
    <footer>
        <p>&copy; 2024 Nino Auliya Nahara</p>
    </footer> 
</body>
</html>