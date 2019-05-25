<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3"><?= $title_page ?></div>
  </a>

  <hr class="sidebar-divider my-0">

  <li class="nav-item active">
    <?=
    $this->Html->link('<i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>', ['controller' => 'pages', 'action' => 'home'], ['class' => 'nav-link', 'escape' => false])
    ?>
  </li>

  <hr class="sidebar-divider">

  <div class="sidebar-heading">
    Modulos
  </div>

  <li class="nav-item">
    <?=
    $this->Html->link('<i class="fas fa-fw fa-user-injured"></i>
      <span>Pacientes</span>', ['controller' => 'patients', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]);
    ?>
  </li>
  
  <li class="nav-item">
    <?=
    $this->Html->link('<i class="fas fa-fw fa-hospital"></i>
      <span>Registrar</span>', ['controller' => 'patients', 'action' => 'add'], ['class' => 'nav-link', 'escape' => false]);
    ?>
  </li>
  
  <li class="nav-item">
    <?=
    $this->Html->link('<i class="fas fa-fw fa-stethoscope"></i>
      <span>Pesonal Administrativo</span>', ['controller' => 'personal', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]);
    ?>
  </li>

  <hr class="sidebar-divider">

  <div class="sidebar-heading">
    Examen
  </div>

  <li class="nav-item">
    <?=
    $this->Html->link('<i class="fas fa-fw fa-wave-square"></i>
      <span>Monitorear</span>', ['controller' => 'monitors', 'action' => 'add'], ['class' => 'nav-link', 'escape' => false])
    ?>
  </li>

  <li class="nav-item">    
    <?=
    $this->Html->link('<i class="fas fa-fw fa-file-medical-alt"></i>
      <span>Reportes</span>', ['controller' => 'reports', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false])
    ?>
  </li>

  <hr class="sidebar-divider d-none d-md-block">

  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
