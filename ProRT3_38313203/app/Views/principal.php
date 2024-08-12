<?php $session=Session(); ?>
<?php if (session()->getFlashdata('success')) {
      echo "
      <div class='mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-success alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('success') . "
  </div>";
    } ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/miestilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Corrientes</title>
</head>
<body>
    <header>
       <h1>Corrientes</h1>
    </header>
<!-- INICIA NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/img/corrientes.jpg" alt="Corrientes" width="50" height="auto">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"s aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="principal">Principal</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">Nosotros</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="quienes_somos">Quienes Somos</a></li>
                            <li><a class="dropdown-item" href="acerca_de">Acerca de</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuarios</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="registro">Registro</a></li>
                            <?php if($session->id_tipoUsuario!= (1||2)){?>
                            <li><a class="dropdown-item" href="login">Login</a></li>
                            <?php }?>
                        </ul>
                    </li>
                    <?php if($session->id_tipoUsuario==1){?>
                      <li class="nav-item"><a class="nav-link" href="lista_usuario">Lista Usuarios</a></li>

                    <?php }?>

                    </ul>
                
                    <?php if($session->id_tipoUsuario==(1||2)){?>
                    <div class="d-flex ms-5 me-5" role="search">
                    <?php echo $session->email;?>
                        </div>
                    <div class="d-flex" role="search">
                      <a class="nav-link" href="<?php echo base_url('/logout');?>">Cerrar sesion</a>
                
                    </div>
                    <?php }?>
            </div>
        </div>  
    </nav>

<!-- TERMINA NAVBAR -->
<!-- INICIA CONTENIDO -->
    <div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" style="margin-left:-15px; margin-right:-15px;">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="assets/img/image_1.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="assets/img/image_2.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="assets/img/image_3.png" class="d-block w-100" alt="...">
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

    <div class="info">
        <div class="container text-center">
            <div class="row ">
              <div class="col">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Fauna</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">El Carpincho (Hydrochoerus hydrochaeris)</h6>
                      <p class="card-text">El carpincho, conocido científicamente como Hydrochoerus hydrochaeris, es el roedor más grande del mundo. También se le llama capibara en otras regiones de América Latina. Este mamífero semiacuático es una especie emblemática de la fauna de Corrientes y puede encontrarse en muchas áreas húmedas de la provincia, especialmente cerca de ríos, lagunas y esteros.</p>
                      <a href="#" class="card-link">Ver más</a>
                    </div>
                  </div>
              </div>
              <div class="w-100"><br></div>
              <div class="col">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Flora</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">El Árbol de Lapacho (Tabebuia spp.)</h6>
                      <p class="card-text">El lapacho, conocido científicamente como Tabebuia spp., es uno de los árboles más emblemáticos de América del Sur, y es especialmente valorado en la región de Corrientes, Argentina. Este árbol destaca por sus espectaculares flores que varían en color desde el rosa hasta el amarillo, dependiendo de la especie. Es un símbolo de la belleza natural y la biodiversidad de Corrientes.</p>
                      <a href="#" class="card-link">Ver más</a>
                    </div>
                  </div>
              </div>
              <div class="w-100"> <br></div>
              <div class="col">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Turismo</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">Los Esteros del Iberá</h6>
                      <p class="card-text">Los Esteros del Iberá, uno de los humedales más grandes y biodiversos de Argentina, se encuentran en la provincia de Corrientes. Con una extensión de aproximadamente 12,000 kilómetros cuadrados, este vasto sistema de pantanos, lagunas, arroyos y esteros es un verdadero paraíso natural y uno de los principales destinos ecoturísticos del país.</p>
                      <a href="#" class="card-link">Ver más</a>
                    </div>
                  </div>
              </div>
            </div>
          </div>
    </div>
        
    </section>
<!-- TERMINA CONTENIDO -->

<!-- INICIA FOOTER -->
    <footer>
        <a href="https://www.google.com"><i class="fab fa-google"></i></a>
        <a href="https://www.yahoo.com"><i class="fab fa-yahoo"></i></a>
        <a href="https://talentosdigitales.ar/">Talentos Digitales</a>
        <p>&copy; Olivieri Simon 2024 </p>
    </footer>
<!-- TERMINA FOOTER -->
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    