<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Project extends Entity
{
    protected array $_accessible = [
        'project_serial' => true,
        'client_serial' => true,
        'semester' => true,
        'status' => true,
        'last_contact' => true,
        'level_of_necessity' => true,
        'description' => true,
        'internal_comments' => true,
        'meet_and_greet' => true,
    ];

}
