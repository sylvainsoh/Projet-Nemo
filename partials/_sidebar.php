<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <img src="views/assets/img/logoCy.png" height="50">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= setActivePage('landing_page.php') ?>">
        <a class="nav-link" href="landing_page.php">
            <i class="fas fa-fw fa-book"></i>
            <span>Accueil</span></a>
    </li>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= setActivePage('connecteur.php') ?>">
        <a class="nav-link" href="connecteur.php">
            <i class="fas fa-fw fa-link"></i>
            <span>Connexion</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= setActivePage('bd_list.php') ?>">
        <a class="nav-link" href="bd_list.php">
            <i class="fas fa-fw fa-database"></i>
            <span>Applications</span></a>
    </li>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= setActivePage('visualiser_db.php') ?>" style="display: none">
        <a class="nav-link" href="visualiser_db.php">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Visualisation de tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Configurateurs
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-person"></i>
            <span>Comptes</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Utilisateurs</h6>
                <a class="collapse-item" href="admin_users.php">Etudiants</a>
                <a class="collapse-item" href="admin_list.php">Administrateurs</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Configuration</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Geston des connecteurs</h6>
                <a class="collapse-item" href="">Ajouter</a>
                <a class="collapse-item" href="">Liste</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Bases de données
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Comptes</h6>
                <a class="collapse-item" href="">Connecteurs</a>
                <a class="collapse-item" href="">Entrant</a>
                <a class="collapse-item" href="">Sortant</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Autres :</h6>
                <a class="collapse-item" href="">Connecteurs</a>
                <a class="collapse-item" href="">Entrant</a>
                <a class="collapse-item" href="">Sortant</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Statistiques</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - Tables -->


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="views/assets/img/whale.png">
        <p class="text-center mb-2">
            Le projet <strong>Némo</strong> permet de synchroniser les données des différents SI
        </p>
        <a class="btn btn-primary btn-sm" href="index.php">
            Déconnexion
        </a>
    </div>

</ul>