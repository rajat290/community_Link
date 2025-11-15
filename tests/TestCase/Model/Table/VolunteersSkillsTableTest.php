<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VolunteersSkillsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VolunteersSkillsTable Test Case
 */
class VolunteersSkillsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VolunteersSkillsTable
     */
    protected $VolunteersSkills;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.VolunteersSkills',
        'app.Volunteers',
        'app.Skills',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('VolunteersSkills') ? [] : ['className' => VolunteersSkillsTable::class];
        $this->VolunteersSkills = $this->getTableLocator()->get('VolunteersSkills', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->VolunteersSkills);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\VolunteersSkillsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\VolunteersSkillsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
