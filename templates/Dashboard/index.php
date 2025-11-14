<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="container mt-4">

    <h2 class="mb-4 fw-bold">📊 Dashboard — CommunityLink</h2>

    <div class="row g-4">

        <!-- Top Volunteers -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white fw-semibold">
                    Top 10 Most Active Volunteers (<?= date('Y') ?>)
                </div>
                <div class="card-body">
                    <?php if (!$topVols->isEmpty()): ?>
                        <ul class="list-group">
                            <?php foreach ($topVols as $vol): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><?= h($vol->volunteer->first_name . ' ' . $vol->volunteer->last_name) ?></span>
                                    <span class="badge text-bg-primary"><?= $vol->count ?> events</span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-muted">No volunteer data available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Top Partner Organisations -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-success text-white fw-semibold">
                    Top 10 Partner Organisations (<?= date('Y') ?>)
                </div>
                <div class="card-body">
                    <?php if (!$topPartners->isEmpty()): ?>
                        <ul class="list-group">
                            <?php foreach ($topPartners as $p): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><?= h($p->partner_organisation->business_name) ?></span>
                                    <span class="badge text-bg-success"><?= $p->count ?> events</span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-muted">No partner organisation data available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

    <div class="row g-4 mt-3">

        <!-- Skill Count -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-warning text-dark fw-semibold">
                    Volunteers by Skill
                </div>
                <div class="card-body">
                    <?php if (!$skillCounts->isEmpty()): ?>
                        <ul class="list-group">
                            <?php foreach ($skillCounts as $skill): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><?= h($skill->skill->name) ?></span>
                                    <span class="badge text-bg-warning"><?= $skill->count ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-muted">No skill data available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Upcoming Month Events -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-info text-white fw-semibold">
                    Events Next Month (<?= date("F Y", strtotime("+1 month")) ?>)
                </div>
                <div class="card-body">
                    <?php if (!$eventsCounts->isEmpty()): ?>
                        <ul class="list-group">
                            <?php
                                $statusColors = [
                                    'Preparing' => 'secondary',
                                    'Ready to go' => 'primary',
                                    'Archive' => 'dark',
                                    'Failed' => 'danger'
                                ];
                            ?>
                            <?php foreach ($eventsCounts as $ev): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><?= h($ev->status) ?></span>
                                    <span class="badge text-bg-<?= $statusColors[$ev->status] ?? 'secondary' ?>">
                                        <?= $ev->count ?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-muted">No upcoming events.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

</div>
