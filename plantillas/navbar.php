<nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <a class="navbar-brand" href="perfil.php"><?php echo $_SESSION['nombre']; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a class="nav-link" href="home.php">Home </a>
        </li>  
      
      <li class="nav-item active">
          <a class="nav-link" href="impbd.php">Importar base de datos </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Modificar base de datos</a>
        </li>
      
        <li class="nav-item active">
          <a class="nav-link " href="#">Crear plantilla</a>
        </li>

        <li class="nav-item active">
          <a class="nav-link " href="#">Modificar plantilla</a>
        </li>

        <li class="nav-item active">
          <a class="nav-link " href="#">Realizar Envio</a>
        </li>
        

        <li class="nav-item active">
          <a class="nav-link"  href="desconectar.php">Cerrar Sesion</a>
        </li>
      </ul>
      
    </div>
  </nav>