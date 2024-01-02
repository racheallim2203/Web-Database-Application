<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProjectsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('projects'); // Set the table name
        $this->setDisplayField('project_serial'); // Set the display field
        $this->setPrimaryKey('project_serial'); // Set the primary key

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_serial',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('client_serial', 'Client Serial cannot be empty.')
            ->add('semester', 'custom', [
                'rule' => function ($value) {
                    // Use a regular expression to validate the format (YYYYS#)
                    $pattern = '/^\d{4}S[1-3]$/'; // Matches "YYYYS#" where # is 1, 2, or 3
                    return (bool)preg_match($pattern, $value);
                },
                'message' => 'Invalid semester format. It should be in the format "YYYYS#" (e.g., 2021S2).',
            ])
            ->notEmptyString('status', 'Status cannot be empty.')
            ->add('last_contact', 'custom', [
                'rule' => function ($value) {
                    // Use a regular expression to validate the format (YYYY-MM-DD HH:MM:SS)
                    $pattern = '/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/';
                    return (bool)preg_match($pattern, $value);
                },
                'message' => 'Invalid date and time format for Last Contact. It should be in the format YYYY-MM-DD HH:MM:SS.',
            ])
            ->notEmptyString('level_of_necessity', 'Level of Necessity cannot be empty.')
            ->notEmptyString('description', 'Description cannot be empty.')
            ->notEmptyString('internal_comments', 'Internal Comments cannot be empty.')
            ->notEmptyString('meet_and_greet', 'Meet and Greet cannot be empty.');

        return $validator;
    }

}
