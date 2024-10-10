<?php
require 'conexion.php';
require 'procesar.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web SPA - Proyecto Final</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Estilos personalizados -->
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Toys</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Login</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="pro.php">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">
                            <?php
                            if (isset($_SESSION['nombre'])) {
                                echo "Bienvenido! ". htmlspecialchars($_SESSION['nombre']);
                            } else {
                                echo "Invitado";
                            }
                            ?>
                        </a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</head>
<body class="body"><br><br><br>
    
    
    
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Menu</button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Juguetes</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>Try scrolling the rest of the page to see this option in action.</p>
  </div>
</div>
    <main>
        <!-- Carrusel -->
        <div class="carousel-container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-interval="500">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="prueba.jpg" class="d-block w-100" alt="Producto 1" data-bs-toggle="modal" data-bs-target="#producto1Modal">
                    </div>
                    <div class="carousel-item">
                        <img src="prueba2.jpg" class="d-block w-100" alt="Producto 2" data-bs-toggle="modal" data-bs-target="#producto2Modal">
                    </div>
                    <div class="carousel-item">
                        <img src="prueba3.jpg" class="d-block w-100" alt="Producto 3" data-bs-toggle="modal" data-bs-target="#producto3Modal">
                    </div>
                </div>
                
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        

        <!-- Modales de productos -->
        <!-- Modal Producto 1 -->
        <div class="modal fade" id="producto1Modal" tabindex="-1" aria-labelledby="producto1ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="producto1ModalLabel">Producto 1</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Descripción detallada del Producto 1...</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Producto 2 -->
        <div class="modal fade" id="producto2Modal" tabindex="-1" aria-labelledby="producto2ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="producto2ModalLabel">Producto 2</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Descripción detallada del Producto 2...</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Producto 3 -->
        <div class="modal fade" id="producto3Modal" tabindex="-1" aria-labelledby="producto3ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="producto3ModalLabel">Producto 3</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Descripción detallada del Producto 3...</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <h3 class="titulo">Productos</h3>
        <section class="container2">
         
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <img src="toy1.jpeg" class="card-img-top" alt="Producto 1">
                        <div class="card-body">
                            <h5 class="card-title">Producto 1</h5>
                            <p class="card-text">Descripción breve del producto 1.</p>
                            <a href="#" class="btn btn-primary">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <img src="toy2.jpeg" class="card-img-top" alt="Producto 2">
                        <div class="card-body">
                            <h5 class="card-title">Producto 2</h5>
                            <p class="card-text">Descripción breve del producto 2.</p>
                            <a href="#" class="btn btn-primary">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <img src="toy3.jpeg" class="card-img-top" alt="Producto 3">
                        <div class="card-body">
                            <h5 class="card-title">Producto 3</h5>
                            <p class="card-text">Descripción breve del producto 3.</p>
                            <a href="#" class="btn btn-primary">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <img src="toy3.jpeg" class="card-img-top" alt="Producto 3">
                        <div class="card-body">
                            <h5 class="card-title">Producto 3</h5>
                            <p class="card-text">Descripción breve del producto 3.</p>
                            <a href="#" class="btn btn-primary">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <img src="toy3.jpeg" class="card-img-top" alt="Producto 3">
                        <div class="card-body">
                            <h5 class="card-title">Producto 3</h5>
                            <p class="card-text">Descripción breve del producto 3.</p>
                            <a href="#" class="btn btn-primary">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <img src="toy3.jpeg" class="card-img-top" alt="Producto 3">
                        <div class="card-body">
                            <h5 class="card-title">Producto 3</h5>
                            <p class="card-text">Descripción breve del producto 3.</p>
                            <a href="#" class="btn btn-primary">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
  
    <footer>
        
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>

