<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users'); // Set the table name
        $this->setDisplayField('user_serial'); // Set the display field
        $this->setPrimaryKey('user_serial'); // Set the primary key
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
//            ->notEmptyString('user_serial', 'User Serial cannot be empty.')
            ->notEmptyString('email', 'Email cannot be empty.')
            ->add('email', 'validEmail', [
                'rule' => 'email',
                'message' => 'Please enter a valid email address.'
            ])
            ->notEmptyString('password', 'Password cannot be empty.');

        return $validator;
    }
}
