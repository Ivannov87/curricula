<nav class="sidebar sidebar-offcanvas" id="sidebar">

  <ul class="nav">
    <li class="nav-item nav-category">Documentacion</li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" href="#archivos" aria-expanded="false" aria-controls="archivos">
        <i class="menu-icon mdi mdi-file-document-outline"></i>
        <span class="menu-title">Archivo</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="archivos" >
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link collapsed" href="inicio.php?root=upload">Subir</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" href="#cargados" aria-expanded="false" aria-controls="cargados">
        <i class="menu-icon mdi mdi-view-list"></i>
        <span class="menu-title">Cargados</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="cargados" >
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <p><a class="nav-link collapsed" href="inicio.php?root=cargados">Ver</a></p>
          </li>
        </ul>
      </div>
    </li>

    <?php if ($_SESSION["IsAdmin"] == true) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#gen" aria-expanded="false" aria-controls="gen">
          <i class="menu-icon mdi mdi-clipboard-text"></i>
          <span class="menu-title">Generados</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="gen" >
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link collapsed" href="inicio.php?root=generados">Ver</a>
            </li>
          </ul>
        </div>
      </li>
    <?php } ?>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" href="#lay" aria-expanded="false" aria-controls="lay">
        <i class="menu-icon mdi mdi-file-document"></i>
        <span class="menu-title">Layout</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="lay" >
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link collapsed" href="inicio.php?download">Descargar</a>
          </li>
        </ul>
      </div>
    </li>

  </ul>

</nav>