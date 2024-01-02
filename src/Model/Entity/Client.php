<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Client extends Entity
{
    protected array $_accessible = [
        'client_serial' => true,
        'email' => true,
        'first_name' => true,
        'surname' => true,
        'phone_number' => true,
        'address' => true,
    ];

}
