<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $ended
 * @property int $priority_id
 * @property int $user_id
 * @property int $project_id
 * @property int $state_id
 *
 * @property \App\Model\Entity\Priority $priority
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\State $state
 */
class Task extends Entity
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
        'name' => true,
        'description' => true,
        'created' => true,
        'ended' => true,
        'priority_id' => true,
        'user_id' => true,
        'project_id' => true,
        'state_id' => true,
        'priority' => true,
        'user' => true,
        'project' => true,
        'state' => true
    ];
}
