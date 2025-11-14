<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PartnerOrganisation[]|\Cake\Collection\CollectionInterface $partnerOrganisations
 */
?>
<div class="partnerOrganisations index content">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= __('Partner Organisations') ?></h1>
    <div class="d-flex">
        <?= $this->Html->link(__('New Partner Organisation'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
    </div>
</div>

<!-- Enhanced Search Form -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Search & Filter Partners</h6>
    </div>
    <div class="card-body">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <div class="row">
            <div class="col-md-5">
                <?= $this->Form->control('search', [
                    'label' => 'Search Text',
                    'placeholder' => 'Search by name, contact, industry...',
                    'value' => $this->request->getQuery('search'),
                    'class' => 'form-control'
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $this->Form->control('industry', [
                    'label' => 'Industry',
                    'options' => $industries,
                    'empty' => 'All Industries',
                    'value' => $this->request->getQuery('industry'),
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
                    <th><?= $this->Paginator->sort('business_name') ?></th>
                    <th><?= $this->Paginator->sort('industry') ?></th>
                    <th><?= $this->Paginator->sort('contact_name') ?></th>
                    <th><?= $this->Paginator->sort('contact_email') ?></th>
                    <th><?= $this->Paginator->sort('contact_phone') ?></th>
                    <th><?= __('Events Count') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($partnerOrganisations as $partnerOrganisation): ?>
                <tr>
                    <td><?= h($partnerOrganisation->business_name) ?></td>
                    <td><?= h($partnerOrganisation->industry) ?></td>
                    <td><?= h($partnerOrganisation->contact_name) ?></td>
                    <td><?= h($partnerOrganisation->contact_email) ?></td>
                    <td><?= h($partnerOrganisation->contact_phone) ?></td>
                    <td>
                        <?= $this->Html->link(
                            count($partnerOrganisation->events) . ' events',
                            ['controller' => 'Events', 'action' => 'index', '?' => ['partner' => $partnerOrganisation->id]],
                            ['class' => 'badge badge-info']
                        ) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $partnerOrganisation->id], ['class' => 'btn btn-sm btn-info']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $partnerOrganisation->id], ['class' => 'btn btn-sm btn-warning']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $partnerOrganisation->id], [
                            'class' => 'btn btn-sm btn-danger',
                            'confirm' => __('Are you sure you want to delete # {0}?', $partnerOrganisation->id)
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