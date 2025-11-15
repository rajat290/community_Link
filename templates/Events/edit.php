<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 * @var \Cake\Collection\CollectionInterface|string[] $partnerOrganisations
 */
?>
<div class="events form content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Edit Event') ?></h1>
        <div class="d-flex">
            <?= $this->Html->link(__('Back to List'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Event Details</h6>
        </div>
        <div class="card-body">
            <?= $this->Form->create($event) ?>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->control('title', [
                            'label' => 'Event Title',
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('event_date', [
                            'label' => 'Event Date',
                            'type' => 'date',
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->control('location', [
                            'label' => 'Location',
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('host', [
                            'label' => 'Host',
                            'class' => 'form-control'
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $this->Form->control('event_size', [
                            'label' => 'Event Size (participants)',
                            'type' => 'number',
                            'class' => 'form-control',
                            'min' => 1
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('required_crews', [
                            'label' => 'Required Crews',
                            'type' => 'number',
                            'class' => 'form-control',
                            'min' => 1
                        ]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->control('status', [
                            'label' => 'Status',
                            'options' => [
                                'Preparing' => 'Preparing',
                                'Ready to go' => 'Ready to go',
                                'Archive' => 'Archive',
                                'Failed' => 'Failed'
                            ],
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->control('contact_name', [
                            'label' => 'Contact Person',
                            'class' => 'form-control'
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('contact_email', [
                            'label' => 'Contact Email',
                            'type' => 'email',
                            'class' => 'form-control'
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->control('partner_organisation_id', [
                            'options' => $partnerOrganisations,
                            'label' => 'Partner Organisation',
                            'empty' => 'Select Partner Organisation',
                            'class' => 'form-control'
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->control('description', [
                            'label' => 'Description',
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'rows' => 3
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->control('required_equipment', [
                            'label' => 'Required Equipment',
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'rows' => 2,
                            'placeholder' => 'List any required equipment...'
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('required_skills', [
                            'label' => 'Required Skills',
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'rows' => 2,
                            'placeholder' => 'List any required skills...'
                        ]) ?>
                    </div>
                </div>
            </fieldset>
            <div class="card-footer">
                <?= $this->Form->button(__('Save Event'), ['class' => 'btn btn-success']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-secondary ml-2']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
