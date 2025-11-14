<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class DocumentsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('documents');
        $this->setPrimaryKey('id');
        $this->setDisplayField('file_path');

        $this->addBehavior('Timestamp');

        // Document belongs to Volunteer
        $this->belongsTo('Volunteers', [
            'foreignKey' => 'volunteer_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('file_path', 'File path is required')
            ->allowEmptyString('doc_type');

        return $validator;
    }
}
