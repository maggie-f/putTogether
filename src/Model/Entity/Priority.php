<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Priority Entity
 *
 * @property int $priority_id
 * @property string $code
 * @property int $value
 *
 * @property \App\Model\Entity\Priority[] $priorities
 * @property \App\Model\Entity\Project[] $projects
 * @property \App\Model\Entity\Task[] $tasks
 */
class Priority extends Entity
{

}
