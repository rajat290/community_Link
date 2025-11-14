<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skill[]|\Cake\Collection\CollectionInterface $skills
 */
?>
<div class="skills index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Skills') ?></h1>
        <div class="d-flex">
            <?= $this->Html->link(__('New Skill'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <!-- Enhanced Search Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Search Skills</h6>
        </div>
        <div class="card-body">
            <?= $this->Form->create(null, ['type' => 'get']) ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $this->Form->control('search', [
                        'label' => 'Search Text',
                        'placeholder' => 'Search by skill name or description...',
                        'value' => $this->request->getQuery('search'),
                        'class' => 'form-control'
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <div class="d-flex gap-2 mt-4">
                        <?= $this->Form->button('Search', ['class' => 'btn btn-primary']) ?>
                        <?= $this->Html->link('Reset', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
                    </div>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= __('Description') ?></th>
                    <th><?= __('Volunteers Count') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($skills as $skill): ?>
                <tr>
                    <td><?= h($skill->name) ?></td>
                    <td><?= h($skill->description) ?></td>
                    <td>
                        <?= $this->Html->link(
                            count($skill->volunteers) . ' volunteers',
                            ['controller' => 'Volunteers', 'action' => 'index', '?' => ['skill' => $skill->id]],
                            ['class' => 'badge badge-info']
                        ) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $skill->id], ['class' => 'btn btn-sm btn-info']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $skill->id], ['class' => 'btn btn-sm btn-warning']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $skill->id], [
                            'class' => 'btn btn-sm btn-danger',
                            'confirm' => __('Are you sure you want to delete # {0}?', $skill->id)
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