<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document[]|\Cake\Collection\CollectionInterface $documents
 */
?>
<div class="documents index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Documents') ?></h1>
        <div class="d-flex">
            <?= $this->Form->create(null, ['type' => 'get', 'class' => 'mr-2']) ?>
            <div class="input-group">
                <?= $this->Form->control('search', [
                    'label' => false,
                    'placeholder' => 'Search documents...',
                    'value' => $this->request->getQuery('search'),
                    'class' => 'form-control'
                ]) ?>
                <div class="input-group-append">
                    <?= $this->Form->button('Search', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
            <?= $this->Html->link(__('New Document'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th><?= $this->Paginator->sort('volunteer_id', 'Volunteer') ?></th>
                    <th><?= $this->Paginator->sort('doc_type', 'Document Type') ?></th>
                    <th><?= $this->Paginator->sort('file_path', 'File Name') ?></th>
                    <th><?= $this->Paginator->sort('created', 'Uploaded') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($documents as $document): ?>
                <tr>
                    <td>
                        <?php if ($document->has('volunteer')): ?>
                            <?= $this->Html->link(
                                h($document->volunteer->first_name) . ' ' . h($document->volunteer->last_name),
                                ['controller' => 'Volunteers', 'action' => 'view', $document->volunteer->id]
                            ) ?>
                        <?php else: ?>
                            <span class="text-muted">Volunteer not found</span>
                        <?php endif; ?>
                    </td>
                    <td><?= h($document->doc_type) ?></td>
                    <td><?= h($document->file_path) ?></td>
                    <td><?= h($document->created->format('d M Y H:i')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $document->id], ['class' => 'btn btn-sm btn-info']) ?>
                        <?= $this->Html->link(__('Download'), '/files/documents/' . $document->file_path, [
                            'class' => 'btn btn-sm btn-success',
                            'download' => $document->file_path
                        ]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $document->id], [
                            'class' => 'btn btn-sm btn-danger',
                            'confirm' => __('Are you sure you want to delete this document?')
                        ]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>