<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Questionnaire extends Entity
{
    protected array $_accessible = [
        'ques_serial' => true,
        'project_serial' => true,
        'business_name' => true,
        'website' => true,
        'technology' => true,
        'industry' => true,
        'project_proposal' => true,
        'completion_time' => true,
    ];

}


