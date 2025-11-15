<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateEvents extends BaseMigration
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
        $table = $this->table('events');
        $table
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('location', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('host', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('event_date', 'date', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('event_size', 'integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('contact_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('contact_email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('required_equipment', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('required_skills', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('required_crews', 'integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('status', 'string', [
                'default' => 'pending',
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('partner_organisation_id', 'integer', [
                'default' => null,
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
            ->addIndex(['partner_organisation_id'])
            ->create();
    }
}
