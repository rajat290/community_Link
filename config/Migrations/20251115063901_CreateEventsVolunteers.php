<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateEventsVolunteers extends BaseMigration
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
        $table = $this->table('events_volunteers');
        $table
            ->addColumn('event_id', 'integer', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('volunteer_id', 'integer', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('status', 'string', [
                'default' => 'pending',
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addIndex(['event_id'])
            ->addIndex(['volunteer_id'])
            ->create();
    }
}
