<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Volunteers Model
 *
 * @property \App\Model\Table\DocumentsTable&\Cake\ORM\Association\HasMany $Documents
 * @property \App\Model\Table\EventsVolunteersTable&\Cake\ORM\Association\HasMany $EventsVolunteers
 * @property \App\Model\Table\SkillsTable&\Cake\ORM\Association\BelongsToMany $Skills
 *
 * @method \App\Model\Entity\Volunteer newEmptyEntity()
 * @method \App\Model\Entity\Volunteer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Volunteer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Volunteer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Volunteer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Volunteer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Volunteer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Volunteer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Volunteer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Volunteer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Volunteer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Volunteer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Volunteer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VolunteersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('volunteers');
        $this->setDisplayField('first_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Documents', [
            'foreignKey' => 'volunteer_id',
        ]);
        $this->hasMany('EventsVolunteers', [
            'foreignKey' => 'volunteer_id',
        ]);
        $this->belongsToMany('Skills', [
            'foreignKey' => 'volunteer_id',
            'targetForeignKey' => 'skill_id',
            'joinTable' => 'volunteers_skills',
        ]);
        
        // Add virtual field for better dropdown display
        $this->setDisplayField('display_name');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 100)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 100)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('availability')
            ->maxLength('availability', 255)
            ->allowEmptyString('availability');

        $validator
            ->scalar('self_intro')
            ->allowEmptyString('self_intro');

        $validator
            ->date('date_submitted')
            ->allowEmptyDate('date_submitted');

        $validator
            ->scalar('profile_image')
            ->maxLength('profile_image', 255)
            ->allowEmptyFile('profile_image');

        return $validator;
    }
}