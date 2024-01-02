<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClientsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('clients'); // Set the table name
        $this->setDisplayField('client_serial'); // Set the display field
        $this->setPrimaryKey('client_serial'); // Set the primary key

    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
//            ->notEmptyString('client_serial', 'Client Serial cannot be empty.')
            ->notEmptyString('email', 'Email cannot be empty.')
            ->notEmptyString('first_name', 'First Name cannot be empty.')
            ->notEmptyString('surname', 'Surname cannot be empty.')
            ->notEmptyString('phone_number', 'Phone Number cannot be empty.')
            ->notEmptyString('address', 'Address cannot be empty.')
            ->add('email', 'validEmail', [
                'rule' => 'email',
                'message' => 'Please enter a valid email address.',
            ])
            ->add('phone_number', 'validPhone', [
                'rule' => ['custom', '/^\d{9}$/'], // Use a regular expression to match exactly 9 digits
                'message' => 'Phone number must be exactly 9 digits long.',
            ]);

        // Add any other validation rules as needed for your specific fields

        return $validator;
    }
}
