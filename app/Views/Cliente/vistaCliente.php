<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Inicio</title>
  <link rel="stylesheet" href="<?=base_url()?>estilos.css">
  <link rel="stylesheet" href="<?=base_url()?>css/bootstrap.min.css">

</head>
<body>
  <!-- Barra de navegación -->
  <div class="Rectangle1">
    <img src="<?=base_url('logo-simi.png')?>" alt="">
    <a href="<?=base_url('/Cliente/verPerfil'); ?>" class="Perfil">Perfil</a>
    <a href="#ver-citas" class="VerCitas">Ver citas</a>
    <a href="<?=base_url('cliente')?>" class="Consultorios">Consultorios</a>
    <a href="#consultorios" class="Consultorios">Buscar</a>
    <a href="<?=base_url('/usuario/salir'); ?>">Salir</a>

    <?php 
                     $session = session();
                    if ($session->get('logged_in') != null): ?>
                        
                            <a href="<?= base_url('pagina/salir') ?>" class="nav-link"> Salir <?= $session->get('correoElectronico ') ?> </a>
                        
                    <?php endif ?>
  </div>


