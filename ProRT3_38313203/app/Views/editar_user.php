<?php $session=Session(); ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class='mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-success alert-dismissible'>
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets/miestilo.css">
        <link rel="stylesheet" href="<?= base_url('https://use.fontawesome.com/releases/v5.12.1/css/all.css') ?>" crossorigin="anonymous">
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
        <div class="form-container">
            <form class="formulario" method="post" action="<?php echo base_url('/enviar-form_editado'.$usuario['id_usuario']) ?>">
                <h2 class="mb-4 text-center">Editar Usuario</h2>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $usuario['nombre'];?>" placeholder="Nombre" >
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required value="<?php echo $usuario['apellido'];?>" placeholder="Apellido">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required value="<?php echo $usuario['email'];?>"  placeholder="correo@algo.com">
                </div>

                <button type="submit" class="btn btn-light w-30">Modificar</button>
            </form>
        </div>
</div>
    <footer>
        <a href="https://www.google.com"><i class="fab fa-google"></i></a>
        <a href="https://www.yahoo.com"><i class="fab fa-yahoo"></i></a>
        <a href="https://talentosdigitales.ar/">Talentos Digitales</a>
        <p>&copy; Olivieri Simon 2024 </p>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
