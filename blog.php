<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <title>Blog</title>
</head>
<body>
    <main class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand"> <span class="text-info">Traslados</span>Combis </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarS" aria-controls="navbarS" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarS">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                      <a href="index.php" class="nav-link"> Inicio</a>
                      <a href="servicios.php" class="nav-link"> Servicio</a>
                      <a href="contacto.php" class="nav-link"> Contacto</a>
                      <a href="blog.php" class="nav-link"> Blog</a>
                    </ul>
                </div>

            </div>
        </nav>
        <section id="blog" class="py-5">
            <div class="container">
              <br>
              <br>
                <h2 class="mb-4">Blog de viajes</h2>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <img src="imagenes/lujan.jpg" class="card-img-top" alt="Entrada del blog">
                            <div class="card-body">
                            <h5 class="card-title">Nuestros viajes a Lujan</h5>
                            <p class="card-text">Resumen de la entrada 1</p>
                            <a href="viaje-a-lujan.html" class="btn btn-primary">Leer más</a>
                        </div>
                    </div>
                </div>
          <div class="col-md-6">
            <div class="card mb-4">
              <img src="imagenes/pinamar.jpg" class="card-img-top" alt="Entrada del blog">
              <div class="card-body"> 
                <h5 class="card-title">Nuestros viajes a Pinamar</h5>
                <p class="card-text">Resumen de la entrada 2</p>
                <a href="viaje-a-pinamar.html" class="btn btn-primary">Leer más</a>
              </div>
            </div>
          </div>
        </div>

        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center">
            
            <li class="page-item"><a class="page-link" href="#">1</a></li>
  
          </ul>
  
        </nav>
  
      </div>
  
    </section>
  
  </main>
  
  <footer>
    <p>&copy; 2024 TrasladosCombis. Todos los derechos reservados.</p>
  </footer>
            
</body>
</html>