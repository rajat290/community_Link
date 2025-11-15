<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PartnerOrganisation $partnerOrganisation
 */
?>
<div class="partnerOrganisations form content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Edit Partner Organisation') ?></h1>
        <div class="d-flex">
            <?= $this->Html->link(__('View'), ['action' => 'view', $partnerOrganisation->id], ['class' => 'btn btn-info mr-2']) ?>
            <?= $this->Html->link(__('Back to List'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Partner Organisation Details</h6>
        </div>
        <div class="card-body">
            <?= $this->Form->create($partnerOrganisation) ?>
            <fieldset>
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
            <div class="card-footer">
                <?= $this->Form->button(__('Save Partner Organisation'), ['class' => 'btn btn-success']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-secondary ml-2']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

