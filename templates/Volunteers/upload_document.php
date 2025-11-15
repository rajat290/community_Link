<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Volunteer $volunteer
 */
?>
<div class="volunteers upload-document content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Upload Document for ') ?><?= h($volunteer->first_name) ?> <?= h($volunteer->last_name) ?></h1>
        <div class="d-flex">
            <?= $this->Html->link(__('Back to Volunteer'), ['action' => 'view', $volunteer->id], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Document Upload</h6>
        </div>
        <div class="card-body">
            <?= $this->Form->create(null, ['type' => 'file']) ?>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->control('doc_type', [
                            'label' => 'Document Type',
                            'class' => 'form-control',
                            'placeholder' => 'e.g., CV, WWCC, Police Check, Certificate',
                            'required' => true
                        ]) ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <?= $this->Form->control('document_file', [
                            'type' => 'file',
                            'label' => 'Upload Document (PDF)',
                            'class' => 'form-control',
                            'accept' => '.pdf',
                            'required' => true
                        ]) ?>
                        <small class="form-text text-muted">Accepted format: PDF only. Maximum file size: 10MB</small>
                    </div>
                </div>
            </fieldset>
            <div class="card-footer">
                <?= $this->Form->button(__('Upload Document'), ['class' => 'btn btn-success']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'view', $volunteer->id], ['class' => 'btn btn-secondary ml-2']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

