<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VolunteersSkills Model
 *
 * @property \App\Model\Table\VolunteersTable&\Cake\ORM\Association\BelongsTo $Volunteers
 * @property \App\Model\Table\SkillsTable&\Cake\ORM\Association\BelongsTo $Skills
 *
 * @method \App\Model\Entity\VolunteersSkill newEmptyEntity()
 * @method \App\Model\Entity\VolunteersSkill newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\VolunteersSkill> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VolunteersSkill get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\VolunteersSkill findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\VolunteersSkill patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\VolunteersSkill> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VolunteersSkill|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\VolunteersSkill saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\VolunteersSkill>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VolunteersSkill>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\VolunteersSkill>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VolunteersSkill> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\VolunteersSkill>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VolunteersSkill>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\VolunteersSkill>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VolunteersSkill> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VolunteersSkillsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('volunteers_skills');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Volunteers', [
            'foreignKey' => 'volunteer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Skills', [
            'foreignKey' => 'skill_id',
            'joinType' => 'INNER',
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
            ->nonNegativeInteger('volunteer_id')
            ->notEmptyString('volunteer_id');

        $validator
            ->nonNegativeInteger('skill_id')
            ->notEmptyString('skill_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['volunteer_id'], 'Volunteers'), ['errorField' => 'volunteer_id']);
        $rules->add($rules->existsIn(['skill_id'], 'Skills'), ['errorField' => 'skill_id']);

        return $rules;
    }
}
