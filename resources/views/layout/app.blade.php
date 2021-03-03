<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

            <div class="container bg-light">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#">Navegacion</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="/">Home</a>
                    <a class="nav-item nav-link" href="/category">Lista Categorías</a>
                    <a class="nav-item nav-link" href="/movie">Lista Películas</a>
                    <a class="nav-item nav-link" href="#">Alquiler</a>
                    <a class="nav-item nav-link" href="#">Compra</a>
                    <a class="nav-item nav-link" href="#">Iniciar Sesión</a>
                    <a class="nav-item nav-link" href="#">Registrarte</a>
                    </div>
                </div>
            </nav>
            </div>
            
    <body>
        <br>
        <div class="container">
            @yield('content')
        </div>
    </body>
    <section>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#tableMovie').DataTable();
            });
        </script>
    </section>
</html>