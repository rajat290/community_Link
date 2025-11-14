<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PartnerOrganisation $partnerOrganisation
 */
?>
<div class="partnerOrganisations view content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= h($partnerOrganisation->business_name) ?></h1>
        <div class="d-flex">
            <?= $this->Html->link(__('Edit Partner'), ['action' => 'edit', $partnerOrganisation->id], ['class' => 'btn btn-warning mr-2']) ?>
            <?= $this->Html->link(__('List Partners'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Business Information</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Business Name') ?></th>
                            <td><?= h($partnerOrganisation->business_name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Industry') ?></th>
                            <td><?= h($partnerOrganisation->industry) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Business Address') ?></th>
                            <td><?= h($partnerOrganisation->business_address) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Help Description') ?></th>
                            <td><?= h($partnerOrganisation->help_description) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Contact Information</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Contact Person') ?></th>
                            <td><?= h($partnerOrganisation->contact_name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Contact Email') ?></th>
                            <td><?= h($partnerOrganisation->contact_email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Contact Phone') ?></th>
                            <td><?= h($partnerOrganisation->contact_phone) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Associated Events</h6>
        </div>
        <div class="card-body">
            <?php if (!empty($partnerOrganisation->events)): ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?= __('Event Title') ?></th>
                                <th><?= __('Event Date') ?></th>
                                <th><?= __('Location') ?></th>
                                <th><?= __('Status') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($partnerOrganisation->events as $event): ?>
                            <tr>
                                <td><?= h($event->title) ?></td>
                                <td><?= h($event->event_date) ?></td>
                                <td><?= h($event->location) ?></td>
                                <td>
                                    <span class="badge badge-<?= 
                                        $event->status === 'Ready to go' ? 'success' : 
                                        ($event->status === 'Preparing' ? 'warning' : 
                                        ($event->status === 'Archive' ? 'secondary' : 'danger'))
                                    ?>">
                                        <?= h($event->status) ?>
                                    </span>
                                </td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $event->id], ['class' => 'btn btn-sm btn-info']) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-muted">No events associated with this partner organisation.</p>
            <?php endif; ?>
        </div>
    </div>
</div>