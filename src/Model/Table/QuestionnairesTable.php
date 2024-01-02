<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class QuestionnairesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('questionnaires'); // Set the table name
        $this->setDisplayField('ques_serial'); // Set the display field
        $this->setPrimaryKey('ques_serial'); // Set the primary key

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_serial',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
//            ->notEmptyString('ques_serial', 'Questionnaire Serial cannot be empty.')
            ->notEmptyString('project_serial', 'Project Serial cannot be empty.')
            ->notEmptyString('business_name', 'Business name cannot be empty.')
            ->notEmptyString('website', 'Website cannot be empty.')
            ->url('website', 'The website must be a valid URL.')
            ->notEmptyString('technology', 'Technology cannot be empty.')
            ->notEmptyString('industry', 'Industry cannot be empty.')
            ->notEmptyString('project_proposal', 'Project proposal cannot be empty.')
            ->add('completion_time', 'custom', [
                'rule' => function ($value) {
                    // Use a regular expression to validate the format (YYYY-MM-DD HH:MM:SS)
                    $pattern = '/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/';
                    return (bool)preg_match($pattern, $value);
                },
                'message' => 'Invalid date and time format for Completion Time. It should be in the format YYYY-MM-DD HH:MM:SS.',
            ]);

        return $validator;
    }
}
