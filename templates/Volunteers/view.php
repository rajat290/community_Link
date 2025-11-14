<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Volunteer $volunteer
 */
?>
<div class="volunteers view content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= h($volunteer->first_name) ?> <?= h($volunteer->last_name) ?></h1>
        <div class="d-flex">
            <?= $this->Html->link(__('Edit Volunteer'), ['action' => 'edit', $volunteer->id], ['class' => 'btn btn-warning mr-2']) ?>
            <?= $this->Html->link(__('List Volunteers'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Full Name') ?></th>
                            <td><?= h($volunteer->first_name) ?> <?= h($volunteer->last_name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Email') ?></th>
                            <td><?= h($volunteer->email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Phone') ?></th>
                            <td><?= h($volunteer->phone) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Availability') ?></th>
                            <td><?= h($volunteer->availability) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Date Submitted') ?></th>
                            <td><?= h($volunteer->date_submitted) ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Self Introduction</h6>
                </div>
                <div class="card-body">
                    <p><?= h($volunteer->self_intro) ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Skills</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($volunteer->skills)): ?>
                        <div class="d-flex flex-wrap gap-2">
                            <?php foreach ($volunteer->skills as $skill): ?>
                                <span class="badge badge-primary p-2"><?= h($skill->name) ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted">No skills listed</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Documents</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($volunteer->documents)): ?>
                        <div class="list-group">
                            <?php foreach ($volunteer->documents as $document): ?>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><?= h($document->doc_type) ?></span>
                                    <?= $this->Html->link(__('Download'), '/files/documents/' . $document->file_path, [
                                        'class' => 'btn btn-sm btn-success',
                                        'download' => $document->file_path
                                    ]) ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted">No documents uploaded</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Event Participation</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($volunteer->events_volunteers)): ?>
                        <div class="list-group">
                            <?php foreach ($volunteer->events_volunteers as $eventVolunteer): ?>
                                <div class="list-group-item">
                                    <h6 class="mb-1"><?= h($eventVolunteer->event->title) ?></h6>
                                    <small class="text-muted">
                                        <?= h($eventVolunteer->event->event_date) ?> | 
                                        Role: <?= h($eventVolunteer->role) ?> | 
                                        Status: <?= h($eventVolunteer->participation_status) ?>
                                    </small>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted">No event participation recorded</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>