<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $project_id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $ended
 * @property int $priority_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Priority $priority
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Task[] $tasks
 */
class Project extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
