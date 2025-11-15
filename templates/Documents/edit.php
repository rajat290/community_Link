<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 */
?>
<div class="documents form content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Edit Document') ?></h1>
        <div class="d-flex">
            <?= $this->Html->link(__('Back to List'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Document Details</h6>
        </div>
        <div class="card-body">
            <?= $this->Form->create($document, ['type' => 'file']) ?>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->control('volunteer_id', [
                            'options' => $volunteers,
                            'label' => 'Volunteer',
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('doc_type', [
                            'label' => 'Document Type',
                            'class' => 'form-control',
                            'placeholder' => 'e.g., CV, Certificate, ID'
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->control('document_file', [
                            'type' => 'file',
                            'label' => 'Upload New Document (optional)',
                            'class' => 'form-control-file'
                        ]) ?>
                        <small class="form-text text-muted">Leave empty to keep current file. Supported formats: PDF, DOC, DOCX, JPG, PNG (Max 5MB)</small>
                        <?php if ($document->file_path): ?>
                            <p class="mt-2">Current file: <strong><?= h($document->file_path) ?></strong></p>
                        <?php endif; ?>
                    </div>
                </div>
            </fieldset>
            <div class="card-footer">
                <?= $this->Form->button(__('Save Document'), ['class' => 'btn btn-success']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-secondary ml-2']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
