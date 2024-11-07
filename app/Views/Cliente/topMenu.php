<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=base_url()?>css/bootstrap.min.css">
    <style>
        .imgPrincipal {width: 90%; height: 450px; background-color: darkgrey; display: block;}
        .imgSecundaria {width: 90%; height: 200px; background-color: darkgreen; display: block; margin-bottom: 20px;}
        .producto {margin-bottom: 60px;}
        .texto-formal {
            text-align: center;
            color: #fff;
            font-size: 24px; /* Tamaño de letra */
            line-height: 1.6; /* Espaciado entre líneas */
            padding: 20px;
            border: 1px solid #ccc; /* Borde sutil */
            border-radius: 8px; /* Esquinas redondeadas */
            background-color: #4CAF50; /* Fondo blanco */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=base_url('uber.png')?>"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Consultorio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('cliente'); ?>">Consultorios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('/usuario'); ?>">Ingresar</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    