<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="hero-section">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-4">Welcome to CommunityLink</h1>
        <p class="lead mb-4">Connecting passionate volunteers with community organizations to create positive change across Australia.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <?= $this->Html->link('Become a Volunteer', 
                ['controller' => 'Volunteers', 'action' => 'publicRegister'], 
                ['class' => 'btn btn-light btn-lg fw-bold']
            ) ?>
            <?= $this->Html->link('Partner With Us', 
                ['controller' => 'PartnerOrganisations', 'action' => 'add'], 
                ['class' => 'btn btn-outline-light btn-lg fw-bold']
            ) ?>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row text-center mb-5">
        <div class="col-md-4">
            <div class="feature-icon">
                <i class="fas fa-hands-helping"></i>
            </div>
            <h3>Make a Difference</h3>
            <p class="text-muted">Join thousands of volunteers making real impact in their communities through meaningful events and programs.</p>
        </div>
        <div class="col-md-4">
            <div class="feature-icon">
                <i class="fas fa-handshake"></i>
            </div>
            <h3>Partner with Purpose</h3>
            <p class="text-muted">Connect with dedicated volunteers who share your organization's mission and values.</p>
        </div>
        <div class="col-md-4">
            <div class="feature-icon">
                <i class="fas fa-heart"></i>
            </div>
            <h3>Build Community</h3>
            <p class="text-muted">Create lasting relationships and strengthen community bonds through shared experiences.</p>
        </div>
    </div>

    <div class="row align-items-center my-5">
        <div class="col-md-6">
            <h2>Why Choose CommunityLink?</h2>
            <p class="lead">We're Australia's leading platform connecting volunteers with community organizations that need their skills and passion.</p>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Easy registration process</li>
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Skills-based matching</li>
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Flexible volunteering opportunities</li>
                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Professional support and training</li>
            </ul>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body text-center p-5">
                    <h4 class="card-title">Ready to Get Started?</h4>
                    <p class="card-text">Join our community today and start making a difference.</p>
                    <?= $this->Html->link('Join as Volunteer', 
                        ['controller' => 'Volunteers', 'action' => 'publicRegister'], 
                        ['class' => 'btn btn-primary btn-lg w-100 mb-3']
                    ) ?>
                    <?= $this->Html->link('Register Organization', 
                        ['controller' => 'PartnerOrganisations', 'action' => 'add'], 
                        ['class' => 'btn btn-outline-primary btn-lg w-100']
                    ) ?>
                </div>
            </div>
        </div>
    </div>
</div>