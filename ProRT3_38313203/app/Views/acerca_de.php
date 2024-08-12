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
        <link rel="preconnect" href="https://fonts.googleapis.com">
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

    <div class="info">
        <section class="content" id="About me">
            <h2>Acerca de</h2>
            <p> Bienvenidos a Fauna y Flora de Corrientes, un espacio dedicado a explorar y celebrar la rica biodiversidad de la provincia de Corrientes, Argentina. Nuestro objetivo es brindar información detallada y fascinante sobre las especies de plantas y animales que habitan esta región, destacando su importancia ecológica y cultural.</p>
            <h2> Nuestra Misión </h2>
            <p> En Fauna y Flora de Corrientes, creemos que la educación y la concientización son esenciales para la preservación de la naturaleza. A través de este sitio, buscamos:
                Informar: Proporcionar datos precisos y actualizados sobre la fauna y flora de Corrientes.
                Educar: Ofrecer recursos educativos que ayuden a entender la importancia de conservar nuestros ecosistemas.
                Inspirar: Fomentar un mayor aprecio y respeto por la naturaleza local, alentando acciones positivas hacia su preservación.
            </p>
            <h2>
                ¿Qué encontrarás aquí? 
            </h2>
            <p>
            Nuestro sitio está diseñado para ser una fuente completa de información sobre la biodiversidad de Corrientes. Entre los recursos disponibles, encontrarás:
    
            Artículos detallados sobre especies específicas de plantas y animales.
            Guías visuales con fotografías y descripciones para ayudarte a identificar la fauna y flora locales.
            Recursos educativos como hojas de trabajo, actividades y proyectos para estudiantes y profesores.
            Historias y leyendas sobre la naturaleza de Corrientes, que reflejan la conexión cultural de la comunidad con su entorno natural.      
            </p>
    
        </section>
        
    </div>
    
    <footer>
        <a href="https://www.google.com"><i class="fab fa-google"></i></a>
        <a href="https://www.yahoo.com"><i class="fab fa-yahoo"></i></a>
        <a href="https://talentosdigitales.ar/">Talentos Digitales</a>
        <p>&copy; Olivieri Simon 2024 </p>
    </footer>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  