<nav class="sidebar sidebar-offcanvas" id="sidebar">

  <ul class="nav">
    <li class="nav-item nav-category">Documentacion</li>

    <?php if ($_SESSION["IsAdmin"] == true) { ?>



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#areas" aria-expanded="false" aria-controls="areas">
          <i class="menu-icon mdi mdi-file-document-outline"></i>
          <span class="menu-title">Áreas</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="areas">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item ">
              <a class="nav-link collapsed" href="inicio.php?root=area">Nuevo</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link collapsed" href="inicio.php?root=areas">Ver</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#perfiles" aria-expanded="false" aria-controls="perfiles">
          <i class="menu-icon mdi mdi-file-document-outline"></i>
          <span class="menu-title">Perfiles</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="perfiles">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item ">
              <a class="nav-link collapsed" href="inicio.php?root=perfil">Nuevo</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link collapsed" href="inicio.php?root=perfiles">Ver</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#usuarios" aria-expanded="false" aria-controls="usuarios">
          <i class="menu-icon mdi mdi-file-document-outline"></i>
          <span class="menu-title">Usuarios</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="usuarios">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item ">
              <a class="nav-link collapsed" href="inicio.php?root=usuario">Nuevo</a>
            </li>
      </li>
      <li class="nav-item ">
        <a class="nav-link collapsed" href="inicio.php?root=usuarios">Ver</a>
      </li>
  </ul>
  </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#accesos" aria-expanded="false" aria-controls="accesos">
      <i class="menu-icon mdi mdi-file-document-outline"></i>
      <span class="menu-title">Accesos</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="accesos">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item ">
          <a class="nav-link collapsed" href="inicio.php?root=acceso">Nuevo</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link collapsed" href="inicio.php?root=accesos">Ver</a>
        </li>

      </ul>
    </div>
  </li>

  
  </li>


<?php } else { ?>



  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#archivos" aria-expanded="false" aria-controls="archivos">
      <i class="menu-icon mdi mdi-file-document-outline"></i>
      <span class="menu-title">Archivo</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="archivos">
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
    <div class="collapse" id="cargados">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item">
          <p><a class="nav-link collapsed" href="inicio.php?root=cargados">Ver</a></p>
        </li>
      </ul>
    </div>
  </li>

  <?php if ($_SESSION["IsCoo"] == true) { ?>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" href="#gen" aria-expanded="false" aria-controls="gen">
        <i class="menu-icon mdi mdi-clipboard-text"></i>
        <span class="menu-title">Generados</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="gen">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link collapsed" href="inicio.php?root=generados">Ver</a>
          </li>
        </ul>
      </div>
    </li>
  <?php } ?>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#permisos" aria-expanded="false" aria-controls="permisos">
      <i class="menu-icon mdi mdi-file-document-outline"></i>
      <span class="menu-title">Permisos</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="permisos">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item ">
          <a class="nav-link collapsed" href="inicio.php?root=permiso">Nuevo</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link collapsed" href="inicio.php?root=permisos">Ver</a>
        </li>

      </ul>
    </div>
    
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#lay" aria-expanded="false" aria-controls="lay">
      <i class="menu-icon mdi mdi-file-document"></i>
      <span class="menu-title">Layout</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="lay">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item">
          <?php if ($_SESSION["Ingreso"] == true) { ?>
            <!-- Pruebas -->
            <a class="nav-link collapsed" href="#" onclick="DL('aHR0cDovL2xvY2FsaG9zdC9jdXJyaWN1bGEvbGF5b3V0L2xheW91dF9jdXJyaWN1bGEucGRm'); return false;">Plantilla</a>
            <!-- Producción -->
            <!-- <a class="nav-link collapsed" href="aHR0cHM6Ly9mZXBhYy5jb20ubXgvY3VycmljdWxhL2xheW91dC9sYXlvdXRfY3VycmljdWxhLnBkZg==">Descargar</a> -->
          <?php } ?>
        </li>
        <li class="nav-item">
          <?php if ($_SESSION["Ingreso"] == true) { ?>
            <!-- Pruebas -->
            <a class="nav-link collapsed" href="#" onclick="DL('aHR0cDovL2xvY2FsaG9zdC9jdXJyaWN1bGEvZXhhbXBsZS9leGFtcGxlLnBkZg'); return false;">Ejemplo</a>
            <!-- Producción -->
            <!-- <a class="nav-link collapsed" href="aHR0cHM6Ly9mZXBhYy5jb20ubXgvY3VycmljdWxhL2V4YW1wbGUvZXhhbXBsZS5wZGY=">Descargar</a> -->
          <?php } ?>
        </li>
      </ul>
    </div>
  </li>
<?php } ?>

<?php if ($_SESSION["IsCoo"] == true) { ?>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#est" aria-expanded="false" aria-controls="est">
      <i class="menu-icon mdi mdi-chart-arc"></i>
      <span class="menu-title">Estadísticas</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="est">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item">
          <a class="nav-link collapsed" href="inicio.php?root=resumen">Ver</a>
        </li>
      </ul>
    </div>
  </li>
<?php } ?>

<?php if ($_SESSION["IsCoo"] == true || $_SESSION["IsAdmin"] != true) { ?>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#comentarios" aria-expanded="false" aria-controls="comentarios">
      <i class="menu-icon mdi mdi mdi-comment-multiple-outline"></i>
      <span class="menu-title">Comentarios</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="comentarios">
      <ul class="nav flex-column sub-menu">
        <?php if ($_SESSION["IsCoo"] == true) { ?>
          <li class="nav-item">
            <p><a class="nav-link collapsed" href="inicio.php?root=comment">Nuevo</a></p>
          </li>
          <li class="nav-item">
            <p><a class="nav-link collapsed" href="inicio.php?root=comments">Enviados</a></p>
          </li>
        <?php } ?>
        <?php if ($_SESSION["IsCoo"] != true && $_SESSION["IsAdmin"] != true) { ?>
          <li class="nav-item">
            <p><a class="nav-link collapsed" href="inicio.php?root=commentr">Recibidos</a></p>
          </li>
        <?php } ?>
      </ul>
    </div>
  </li>
<?php } ?>

</ul>

</nav>