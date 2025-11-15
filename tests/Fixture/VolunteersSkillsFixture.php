<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VolunteersSkillsFixture
 */
class VolunteersSkillsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'volunteer_id' => 1,
                'skill_id' => 1,
                'created' => '2025-11-15 18:12:25',
                'modified' => '2025-11-15 18:12:25',
            ],
        ];
        parent::init();
    }
}
