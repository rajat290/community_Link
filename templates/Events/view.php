<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<div class="events view content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= h($event->title) ?></h1>
        <div class="d-flex">
            <?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id], ['class' => 'btn btn-warning mr-2']) ?>
            <?= $this->Html->link(__('List Events'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Event Details</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Title') ?></th>
                            <td><?= h($event->title) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Event Date') ?></th>
                            <td><?= h($event->event_date->format('d M Y')) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Location') ?></th>
                            <td><?= h($event->location) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Host') ?></th>
                            <td><?= h($event->host) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Event Size') ?></th>
                            <td><?= h($event->event_size) ?> participants</td>
                        </tr>
                        <tr>
                            <th><?= __('Required Crews') ?></th>
                            <td><?= h($event->required_crews) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <td>
                                <span class="badge badge-<?= 
                                    $event->status === 'Ready to go' ? 'success' : 
                                    ($event->status === 'Preparing' ? 'warning' : 
                                    ($event->status === 'Archive' ? 'secondary' : 'danger'))
                                ?>">
                                    <?= h($event->status) ?>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Contact Information</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Contact Person') ?></th>
                            <td><?= h($event->contact_name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Contact Email') ?></th>
                            <td><?= h($event->contact_email) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Partner Organisation</h6>
                </div>
                <div class="card-body">
                    <?php if ($event->has('partner_organisation')): ?>
                        <table class="table table-bordered">
                            <tr>
                                <th><?= __('Business Name') ?></th>
                                <td><?= h($event->partner_organisation->business_name) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Industry') ?></th>
                                <td><?= h($event->partner_organisation->industry) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Contact') ?></th>
                                <td><?= h($event->partner_organisation->contact_name) ?></td>
                            </tr>
                        </table>
                        <?= $this->Html->link(__('View Partner Details'), 
                            ['controller' => 'PartnerOrganisations', 'action' => 'view', $event->partner_organisation->id],
                            ['class' => 'btn btn-info btn-sm']
                        ) ?>
                    <?php else: ?>
                        <p class="text-muted">No partner organisation associated with this event.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Requirements</h6>
                </div>
                <div class="card-body">
                    <h6>Required Equipment:</h6>
                    <p><?= h($event->required_equipment) ?: 'No specific equipment required' ?></p>
                    
                    <h6>Required Skills:</h6>
                    <p><?= h($event->required_skills) ?: 'No specific skills required' ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" id="volunteers">Assigned Volunteers</h6>
        </div>
        <div class="card-body">
            <?php if (!empty($event->events_volunteers)): ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?= __('Volunteer Name') ?></th>
                                <th><?= __('Role') ?></th>
                                <th><?= __('Participation Status') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($event->events_volunteers as $eventVolunteer): ?>
                            <tr>
                                <td>
                                    <?= $this->Html->link(
                                        h($eventVolunteer->volunteer->first_name) . ' ' . h($eventVolunteer->volunteer->last_name),
                                        ['controller' => 'Volunteers', 'action' => 'view', $eventVolunteer->volunteer->id]
                                    ) ?>
                                </td>
                                <td><?= h($eventVolunteer->role) ?></td>
                                <td>
                                    <span class="badge badge-<?= 
                                        $eventVolunteer->participation_status === 'Completed' ? 'success' : 
                                        ($eventVolunteer->participation_status === 'Confirmed' ? 'primary' : 
                                        ($eventVolunteer->participation_status === 'Assigned' ? 'warning' : 'danger'))
                                    ?>">
                                        <?= h($eventVolunteer->participation_status) ?>
                                    </span>
                                </td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), 
                                        ['controller' => 'Volunteers', 'action' => 'view', $eventVolunteer->volunteer->id],
                                        ['class' => 'btn btn-sm btn-info']
                                    ) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-muted">No volunteers assigned to this event yet.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Event Description</h6>
        </div>
        <div class="card-body">
            <p><?= h($event->description) ?: 'No description provided.' ?></p>
        </div>
    </div>
</div>