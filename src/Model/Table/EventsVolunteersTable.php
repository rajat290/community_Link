<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class EventsVolunteersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('events_volunteers');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        // belongsTo Event
        $this->belongsTo('Events', [
            'foreignKey' => 'event_id',
            'joinType' => 'INNER'
        ]);

        // belongsTo Volunteer
        $this->belongsTo('Volunteers', [
            'foreignKey' => 'volunteer_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('role', 'Role cannot be empty')
            ->allowEmptyString('role')
            ->notEmptyString('participation_status', 'Status required');

        return $validator;
    }
}
