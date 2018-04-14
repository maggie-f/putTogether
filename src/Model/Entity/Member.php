<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Member Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property \Cake\I18n\Time $add_date
 * @property int $user_id_owner
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Project $project
 */
class Member extends Entity
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
