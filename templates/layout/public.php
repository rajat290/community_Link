<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CommunityLink - Connecting Communities Through Volunteering</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['milligram.min.css', 'cake.css', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <style>
        .navbar-brand {
            font-weight: bold;
            color: #2c7873 !important;
        }
        .nav-link {
            color: #333 !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 0.25rem;
            margin: 0 0.25rem;
        }
        .nav-link:hover, .nav-link.active {
            background-color: #2c7873;
            color: white !important;
        }
        .hero-section {
            background: linear-gradient(135deg, #2c7873 0%, #6fb3b8 100%);
            color: white;
            padding: 4rem 0;
            margin-bottom: 2rem;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 2rem 0;
            margin-top: 3rem;
            border-top: 1px solid #dee2e6;
        }
        .feature-icon {
            font-size: 3rem;
            color: #2c7873;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <?= $this->Html->link('CommunityLink', '/', [
                'class' => 'navbar-brand fs-3 fw-bold'
            ]) ?>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <?= $this->Html->link('Home', '/', [
                            'class' => 'nav-link' . ($this->request->getParam('action') === 'home' ? ' active' : '')
                        ]) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Become a Volunteer', [
                            'controller' => 'Volunteers',
                            'action' => 'publicRegister'
                        ], [
                            'class' => 'nav-link' . ($this->request->getParam('action') === 'publicRegister' ? ' active' : '')
                        ]) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Partner With Us', [
                            'controller' => 'PartnerOrganisations',
                            'action' => 'add'
                        ], [
                            'class' => 'nav-link' . ($this->request->getParam('action') === 'add' && $this->request->getParam('controller') === 'PartnerOrganisations' ? ' active' : '')
                        ]) ?>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?= $this->Html->link('Staff Login', [
                            'controller' => 'Users',
                            'action' => 'login'
                        ], [
                            'class' => 'nav-link btn btn-outline-primary btn-sm'
                        ]) ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>CommunityLink</h5>
                    <p class="text-muted">Connecting passionate volunteers with community organizations to create positive change across Australia.</p>
                </div>
                <div class="col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><?= $this->Html->link('Home', '/') ?></li>
                        <li><?= $this->Html->link('Volunteer Registration', ['controller' => 'Volunteers', 'action' => 'publicRegister']) ?></li>
                        <li><?= $this->Html->link('Partner Registration', ['controller' => 'PartnerOrganisations', 'action' => 'add']) ?></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Contact Info</h6>
                    <ul class="list-unstyled text-muted">
                        <li><i class="fas fa-envelope me-2"></i> info@communitylink.org.au</li>
                        <li><i class="fas fa-phone me-2"></i> (02) 1234 5678</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> Sydney, Australia</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="text-muted mb-0">&copy; <?= date('Y') ?> CommunityLink. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>