<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skill $skill
 */
?>
<div class="skills view content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= h($skill->name) ?></h1>
        <div class="d-flex">
            <?= $this->Html->link(__('Edit Skill'), ['action' => 'edit', $skill->id], ['class' => 'btn btn-warning mr-2']) ?>
            <?= $this->Html->link(__('Back to List'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Skill Information</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Skill Name') ?></th>
                            <td><?= h($skill->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Description') ?></th>
                            <td><?= h($skill->description) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Volunteers with this Skill</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($skill->volunteers)): ?>
                        <div class="list-group">
                            <?php foreach ($skill->volunteers as $volunteer): ?>
                                <div class="list-group-item">
                                    <?= $this->Html->link(
                                        h($volunteer->first_name . ' ' . $volunteer->last_name),
                                        ['controller' => 'Volunteers', 'action' => 'view', $volunteer->id],
                                        ['class' => 'text-decoration-none']
                                    ) ?>
                                    <br>
                                    <small class="text-muted"><?= h($volunteer->email) ?></small>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted">No volunteers have this skill yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

