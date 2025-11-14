<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CommunityLink - Admin Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['milligram.min.css', 'cake.css']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <style>
        .sidebar {
            background-color: #2c7873;
            min-height: 100vh;
            padding: 0;
        }
        .sidebar .nav-link {
            color: white;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #245c57;
            color: white;
        }
        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
        }
        .navbar-brand {
            font-weight: bold;
            color: #2c7873 !important;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <?= $this->Html->link('CommunityLink Admin', [
                        'controller' => 'Dashboard',
                        'action' => 'index'
                    ], [
                        'class' => 'navbar-brand text-white p-3 d-block text-center fs-4'
                    ]) ?>
                    
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="fas fa-tachometer-alt"></i> Dashboard', [
                                'controller' => 'Dashboard',
                                'action' => 'index'
                            ], [
                                'class' => 'nav-link' . ($this->request->getParam('controller') === 'Dashboard' ? ' active' : ''),
                                'escape' => false
                            ]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="fas fa-users"></i> Volunteers', [
                                'controller' => 'Volunteers',
                                'action' => 'index'
                            ], [
                                'class' => 'nav-link' . ($this->request->getParam('controller') === 'Volunteers' ? ' active' : ''),
                                'escape' => false
                            ]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="fas fa-building"></i> Partner Organisations', [
                                'controller' => 'PartnerOrganisations',
                                'action' => 'index'
                            ], [
                                'class' => 'nav-link' . ($this->request->getParam('controller') === 'PartnerOrganisations' ? ' active' : ''),
                                'escape' => false
                            ]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="fas fa-calendar-alt"></i> Events', [
                                'controller' => 'Events',
                                'action' => 'index'
                            ], [
                                'class' => 'nav-link' . ($this->request->getParam('controller') === 'Events' ? ' active' : ''),
                                'escape' => false
                            ]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="fas fa-tools"></i> Skills', [
                                'controller' => 'Skills',
                                'action' => 'index'
                            ], [
                                'class' => 'nav-link' . ($this->request->getParam('controller') === 'Skills' ? ' active' : ''),
                                'escape' => false
                            ]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="fas fa-file-pdf"></i> Documents', [
                                'controller' => 'Documents',
                                'action' => 'index'
                            ], [
                                'class' => 'nav-link' . ($this->request->getParam('controller') === 'Documents' ? ' active' : ''),
                                'escape' => false
                            ]) ?>
                        </li>
                        <li class="nav-item mt-4">
                            <?= $this->Html->link('<i class="fas fa-globe"></i> Public Site', '/', [
                                'class' => 'nav-link',
                                'escape' => false
                            ]) ?>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><?= $this->fetch('title') ?></h1>
                </div>
                
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>