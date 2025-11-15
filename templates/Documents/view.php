<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 */
?>
<div class="documents view content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Document Details') ?></h1>
        <div class="d-flex">
            <?= $this->Html->link(__('Back to List'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $document->id], ['class' => 'btn btn-warning ml-2']) ?>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Document Information</h6>
        </div>
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th scope="row" class="w-25"><?= __('Volunteer') ?></th>
                    <td>
                        <?= $document->has('volunteer') ? $this->Html->link($document->volunteer->first_name . ' ' . $document->volunteer->last_name, ['controller' => 'Volunteers', 'action' => 'view', $document->volunteer->id]) : '' ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Document Type') ?></th>
                    <td><?= h($document->doc_type) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('File Path') ?></th>
                    <td>
                        <?= h($document->file_path) ?>
                        <?php if ($document->file_path): ?>
                            <br><small class="text-muted">
                                <?= $this->Html->link(__('Download'), '/files/documents/' . $document->file_path, ['target' => '_blank', 'class' => 'btn btn-sm btn-info mt-1']) ?>
                            </small>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($document->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($document->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
