
<?php $session=Session(); ?>

<?php if (session()->getFlashdata('success')) {
      echo "
      <div class=' ms-3 me-3 h4 text-center alert alert-success alert-dismissible'>
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
        <title>Lista de Usuarios</title>
    </head>
<body>
    <header>
        <h1>Lista de Usuarios</h1>
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
                

                <div class="d-flex ms-5 me-5" role="search">
                 <?php echo $session->email;?>
                    </div>
                 <div class="d-flex" role="search">
                  <a class="nav-link" href="<?php echo base_url('/logout');?>">Cerrar sesion</a>
            
                    </div>
                
            </div>
        </div>  
    </nav>

<!-- TERMINA NAVBAR -->

    <!-- INICIA CONTENIDO -->
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Lista de Usuarios</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                    <?php if($usuario):?>
                    <?php foreach($usuario as $user):?>
                    
                
                    <tr>
                        <td><?= $user['id_usuario'];?></td>
                        <td><?= $user['nombre'];?></td>
                        <td><?= $user['apellido'];?></td>
                        <td><?= $user['email'];?></td>
                    
                        <td><?= $user['id_estado'] == 1 ? 'Activo' : 'Inactivo'; ?></td>
                        <td>
                        <a href="<?php echo base_url('/editar_usuario'.$user['id_usuario']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                        <a href="<?= $user['id_estado'] == 1 ? base_url('/elimin_usuario_log'.$user['id_usuario']) : base_url('/devolverUsuarioLogico'.$user['id_usuario']) ?>" class="<?= $user['id_estado'] == 1 ? 'btn btn-danger btn-sm' : 'btn btn-success btn-sm' ; ?>"> <?= $user['id_estado'] == 1 ? 'Desactivar' : 'Activar'; ?></a>

                        
                        </td>
                    </tr>
                        
                        <?php endforeach; ?>
                    <?php endif; ?>

                        
                </tr>
                
            </tbody>
        </table>
        <button class="btn btn-success btn-sm" onclick="location.href='registro'"><i class="fas fa-plus"></i> Agregar Usuario</button>
        </div>
    <!-- TERMINA CONTENIDO -->

    <!-- INICIA FOOTER -->
    <footer class="text-center mt-5">
        <a href="https://www.google.com"><i class="fab fa-google"></i></a>
        <a href="https://www.yahoo.com"><i class="fab fa-yahoo"></i></a>
        <a href="https://talentosdigitales.ar/">Talentos Digitales</a>
        <p>&copy; Olivieri Simon 2024 </p>
    </footer>
    <!-- TERMINA FOOTER -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
