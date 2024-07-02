<ul class="navbar-nav bg-gradient-primary-impulsa sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route ('panel')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-paper-plane"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ACADEMIA IMPULSA <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route ('panel')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Academia Impulsa
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-address-card"></i>
            <span>REGISTROS</span>
        </a>

    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>REPORTES</span>
        </a>

    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{route ('ciclos.index')}}">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>CICLOS</span>
        </a>

    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        CACECOB EIRL
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-address-card"></i>
            <span>REGISTROS</span>
        </a>

    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>REPORTES</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route ('eventos.index')}}">
            <i class="fas fa-balance-scale"></i>
            <span>EVENTOS</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        USUARIOS - PERMISOS
    </div>
    
    
    <!-- Nav Item - USUARIOS -->
    <li class="nav-item">
        <a class="nav-link" href="{{route ('roles.index')}}">
            <i class="fas fa-briefcase"></i>
            <span>ROLES</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route ('usuarios.index')}}">
            <i class="fas fa-user"></i>
            <span>USUARIOS</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route ('empleados.index')}}">
            <i class="fas fa-users"></i>
            <span>PERSONAL</span></a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>