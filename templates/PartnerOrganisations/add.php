<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PartnerOrganisation $partnerOrganisation
 */
$isPublic = $isPublic ?? false;
?>
<div class="partnerOrganisations form content">
    <?php if ($isPublic): ?>
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h2 class="mb-0"><?= __('Partner Organisation Registration') ?></h2>
                            <p class="mb-0">Join CommunityLink as a Partner Organisation</p>
                        </div>
                        <div class="card-body p-4">
    <?php else: ?>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= __('Add Partner Organisation') ?></h1>
            <div class="d-flex">
                <?= $this->Html->link(__('Back to List'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Partner Organisation Details</h6>
            </div>
            <div class="card-body">
    <?php endif; ?>
            <?= $this->Form->create($partnerOrganisation) ?>
            <fieldset>
                <?php if ($isPublic): ?>
                    <h5 class="mb-3">Organisation Information</h5>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->control('business_name', [
                            'label' => 'Business Name',
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('industry', [
                            'label' => 'Industry',
                            'class' => 'form-control'
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->control('business_address', [
                            'label' => 'Business Address',
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                    </div>
                </div>
                <?php if ($isPublic): ?>
                    <hr class="my-4">
                    <h5 class="mb-3">Contact Information</h5>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->control('contact_name', [
                            'label' => 'Contact Person Full Name',
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('contact_email', [
                            'label' => 'Contact Email',
                            'type' => 'email',
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->control('contact_phone', [
                            'label' => 'Contact Phone (Australian)',
                            'type' => 'tel',
                            'class' => 'form-control',
                            'placeholder' => 'e.g., 02 1234 5678',
                            'required' => true
                        ]) ?>
                    </div>
                </div>
                <?php if ($isPublic): ?>
                    <hr class="my-4">
                    <h5 class="mb-3">How You Can Help</h5>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->control('help_description', [
                            'label' => 'What You Can Help With',
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'rows' => 4,
                            'placeholder' => 'Describe how your organization can help or what support you need...'
                        ]) ?>
                    </div>
                </div>
            </fieldset>
            <div class="<?= $isPublic ? 'mt-4' : 'card-footer' ?>">
                <?= $this->Form->button($isPublic ? __('Submit Registration') : __('Save Partner Organisation'), [
                    'class' => $isPublic ? 'btn btn-primary btn-lg w-100' : 'btn btn-success'
                ]) ?>
                <?php if (!$isPublic): ?>
                    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-secondary ml-2']) ?>
                <?php endif; ?>
            </div>
            <?= $this->Form->end() ?>
    <?php if ($isPublic): ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
            </div>
        </div>
    <?php endif; ?>
</div>
