<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Volunteer[]|\Cake\Collection\CollectionInterface $volunteers
 */
?>
<div class="volunteers index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Volunteers') ?></h1>
        <div class="d-flex">
            <?= $this->Html->link(__('New Volunteer'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <!-- Enhanced Search Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Search & Filter Volunteers</h6>
        </div>
        <div class="card-body">
            <?= $this->Form->create(null, ['type' => 'get']) ?>
            <div class="row">
                <div class="col-md-4">
                    <?= $this->Form->control('search', [
                        'label' => 'Search Text',
                        'placeholder' => 'Search by name, email, phone...',
                        'value' => $this->request->getQuery('search'),
                        'class' => 'form-control'
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $this->Form->control('skill', [
                        'label' => 'Skill',
                        'options' => $skills,
                        'empty' => 'All Skills',
                        'value' => $this->request->getQuery('skill'),
                        'class' => 'form-control'
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $this->Form->control('availability', [
                        'label' => 'Availability',
                        'placeholder' => 'e.g., Weekends, Evenings',
                        'value' => $this->request->getQuery('availability'),
                        'class' => 'form-control'
                    ]) ?>
                </div>
                <div class="col-md-2">
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
                    <th><?= $this->Paginator->sort('first_name', 'Name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= __('Skills') ?></th>
                    <th><?= $this->Paginator->sort('availability') ?></th>
                    <th><?= $this->Paginator->sort('date_submitted', 'Date Joined') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($volunteers as $volunteer): ?>
                <tr>
                    <td><?= h($volunteer->first_name) ?> <?= h($volunteer->last_name) ?></td>
                    <td><?= h($volunteer->email) ?></td>
                    <td><?= h($volunteer->phone) ?></td>
                    <td>
                        <?php if (!empty($volunteer->skills)): ?>
                            <?php foreach ($volunteer->skills as $skill): ?>
                                <span class="badge badge-primary"><?= h($skill->name) ?></span>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <span class="text-muted">No skills listed</span>
                        <?php endif; ?>
                    </td>
                    <td><?= h($volunteer->availability) ?></td>
                    <td><?= h($volunteer->date_submitted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $volunteer->id], ['class' => 'btn btn-sm btn-info']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $volunteer->id], ['class' => 'btn btn-sm btn-warning']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $volunteer->id], [
                            'class' => 'btn btn-sm btn-danger',
                            'confirm' => __('Are you sure you want to delete # {0}?', $volunteer->id)
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