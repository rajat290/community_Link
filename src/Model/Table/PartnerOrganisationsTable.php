<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PartnerOrganisations Model
 *
 * @property \App\Model\Table\EventsTable&\Cake\ORM\Association\HasMany $Events
 *
 * @method \App\Model\Entity\PartnerOrganisation newEmptyEntity()
 * @method \App\Model\Entity\PartnerOrganisation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PartnerOrganisation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PartnerOrganisation get($primaryKey, $options = [])
 * @method \App\Model\Entity\PartnerOrganisation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PartnerOrganisation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PartnerOrganisation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PartnerOrganisation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PartnerOrganisation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PartnerOrganisation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PartnerOrganisation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PartnerOrganisation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PartnerOrganisation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PartnerOrganisationsTable extends Table
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

    $this->setTable('partner_organisations');
    $this->setDisplayField('display_name'); // Updated to use virtual field
    $this->setPrimaryKey('id');

    $this->hasMany('Events', [
        'foreignKey' => 'partner_organisation_id',
    ]);
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
            ->scalar('business_name')
            ->maxLength('business_name', 255)
            ->requirePresence('business_name', 'create')
            ->notEmptyString('business_name');

        $validator
            ->scalar('business_address')
            ->maxLength('business_address', 255)
            ->requirePresence('business_address', 'create')
            ->notEmptyString('business_address');

        $validator
            ->scalar('contact_name')
            ->maxLength('contact_name', 255)
            ->requirePresence('contact_name', 'create')
            ->notEmptyString('contact_name');

        $validator
            ->email('contact_email')
            ->requirePresence('contact_email', 'create')
            ->notEmptyString('contact_email');

        $validator
            ->scalar('contact_phone')
            ->maxLength('contact_phone', 20)
            ->requirePresence('contact_phone', 'create')
            ->notEmptyString('contact_phone');

        $validator
            ->scalar('industry')
            ->maxLength('industry', 100)
            ->allowEmptyString('industry');

        $validator
            ->scalar('help_description')
            ->allowEmptyString('help_description');

        return $validator;
    }
}