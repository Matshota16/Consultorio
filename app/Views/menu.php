<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Consultorio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href=""<?=base_url('/cita/home'); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('/consultorio'); ?>">Administrar Consultorio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('/paciente'); ?>">Administrar Pacientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('/doctor'); ?>">Administrar Doctores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('/direccion'); ?>">Administrar Direcciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('/cita'); ?>">Administrar Cita</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">
            
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('/usuario/salir'); ?>">Salir</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>