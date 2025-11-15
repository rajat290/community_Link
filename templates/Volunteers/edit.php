<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Volunteer $volunteer
 */
?>
<div class="volunteers form content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Edit Volunteer') ?></h1>
        <div class="d-flex">
            <?= $this->Html->link(__('View'), ['action' => 'view', $volunteer->id], ['class' => 'btn btn-info mr-2']) ?>
            <?= $this->Html->link(__('Back to List'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Volunteer Details</h6>
        </div>
        <div class="card-body">
            <?= $this->Form->create($volunteer) ?>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->control('first_name', [
                            'label' => 'First Name',
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('last_name', [
                            'label' => 'Last Name',
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->control('email', [
                            'label' => 'Email',
                            'type' => 'email',
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('phone', [
                            'label' => 'Phone',
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->control('availability', [
                            'label' => 'Availability',
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'rows' => 3
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->control('self_intro', [
                            'label' => 'Self Introduction',
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'rows' => 5
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->control('skills._ids', [
                            'label' => 'Skills',
                            'options' => $skills,
                            'type' => 'select',
                            'multiple' => 'checkbox',
                            'class' => 'form-check-input'
                        ]) ?>
                    </div>
                </div>
            </fieldset>
            <div class="card-footer">
                <?= $this->Form->button(__('Save Volunteer'), ['class' => 'btn btn-success']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-secondary ml-2']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

