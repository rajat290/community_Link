<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event[]|\Cake\Collection\CollectionInterface $events
 */
?>
<div class="events index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Events') ?></h1>
        <div class="d-flex">
            <?= $this->Html->link(__('New Event'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <!-- Enhanced Search Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Search & Filter Events</h6>
        </div>
        <div class="card-body">
            <?= $this->Form->create(null, ['type' => 'get']) ?>
            <div class="row">
                <div class="col-md-3">
                    <?= $this->Form->control('search', [
                        'label' => 'Search Text',
                        'placeholder' => 'Search events...',
                        'value' => $this->request->getQuery('search'),
                        'class' => 'form-control'
                    ]) ?>
                </div>
                <div class="col-md-2">
                    <?= $this->Form->control('status', [
                        'label' => 'Status',
                        'options' => $statuses,
                        'empty' => 'All Statuses',
                        'value' => $this->request->getQuery('status'),
                        'class' => 'form-control'
                    ]) ?>
                </div>
                <div class="col-md-2">
                    <?= $this->Form->control('partner', [
                        'label' => 'Partner',
                        'options' => $partnerOrganisations,
                        'empty' => 'All Partners',
                        'value' => $this->request->getQuery('partner'),
                        'class' => 'form-control'
                    ]) ?>
                </div>
                <div class="col-md-2">
                    <?= $this->Form->control('date_from', [
                        'label' => 'From Date',
                        'type' => 'date',
                        'value' => $this->request->getQuery('date_from'),
                        'class' => 'form-control'
                    ]) ?>
                </div>
                <div class="col-md-2">
                    <?= $this->Form->control('date_to', [
                        'label' => 'To Date',
                        'type' => 'date',
                        'value' => $this->request->getQuery('date_to'),
                        'class' => 'form-control'
                    ]) ?>
                </div>
                <div class="col-md-1">
                    <div class="d-flex gap-2 mt-4">
                        <?= $this->Form->button('Search', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <?= $this->Html->link('Reset Filters', ['action' => 'index'], ['class' => 'btn btn-secondary btn-sm']) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('event_date', 'Date') ?></th>
                    <th><?= $this->Paginator->sort('location') ?></th>
                    <th><?= $this->Paginator->sort('partner_organisation_id', 'Partner') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= __('Volunteers') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                <tr>
                    <td><?= h($event->title) ?></td>
                    <td><?= h($event->event_date->format('d M Y')) ?></td>
                    <td><?= h($event->location) ?></td>
                    <td>
                        <?php if ($event->has('partner_organisation')): ?>
                            <?= $this->Html->link(
                                h($event->partner_organisation->business_name),
                                ['controller' => 'PartnerOrganisations', 'action' => 'view', $event->partner_organisation->id]
                            ) ?>
                        <?php else: ?>
                            <span class="text-muted">No partner</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="badge badge-<?= 
                            $event->status === 'Ready to go' ? 'success' : 
                            ($event->status === 'Preparing' ? 'warning' : 
                            ($event->status === 'Archive' ? 'secondary' : 'danger'))
                        ?>">
                            <?= h($event->status) ?>
                        </span>
                    </td>
                    <td>
                        <?= $this->Html->link(
                            count($event->events_volunteers) . ' volunteers',
                            ['action' => 'view', $event->id, '#' => 'volunteers'],
                            ['class' => 'badge badge-info']
                        ) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $event->id], ['class' => 'btn btn-sm btn-info']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $event->id], ['class' => 'btn btn-sm btn-warning']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $event->id], [
                            'class' => 'btn btn-sm btn-danger',
                            'confirm' => __('Are you sure you want to delete # {0}?', $event->id)
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