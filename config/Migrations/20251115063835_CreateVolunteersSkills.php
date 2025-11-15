<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateVolunteersSkills extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('volunteers_skills');
        $table
            ->addColumn('volunteer_id', 'integer', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('skill_id', 'integer', [
                'default' => null,
                'null' => false,
            ])
            ->addIndex(['volunteer_id'])
            ->addIndex(['skill_id'])
            ->create();
    }
}
