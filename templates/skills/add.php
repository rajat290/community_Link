<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skill $skill
 */
?>
<div class="skills form content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Add Skill') ?></h1>
        <div class="d-flex">
            <?= $this->Html->link(__('Back to List'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Skill Details</h6>
        </div>
        <div class="card-body">
            <?= $this->Form->create($skill) ?>
            <fieldset>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->control('name', [
                            'label' => 'Skill Name',
                            'class' => 'form-control',
                            'required' => true,
                            'placeholder' => 'e.g., First Aid, Event Management, Cooking'
                        ]) ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <?= $this->Form->control('description', [
                            'label' => 'Description',
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'rows' => 4,
                            'placeholder' => 'Describe this skill...'
                        ]) ?>
                    </div>
                </div>
            </fieldset>
            <div class="card-footer">
                <?= $this->Form->button(__('Save Skill'), ['class' => 'btn btn-success']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-secondary ml-2']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

