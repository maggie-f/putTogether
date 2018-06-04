<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher; 

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $Name
 * @property \Cake\I18n\FrozenTime $birthdate
 * @property \Cake\I18n\FrozenTime $last_login
 * @property bool $blocked
 * @property string $bio
 * @property string $profession
 * @property string|resource $profile_picture
 * @property string|resource $cover_picture
 * @property string $web_site
 * @property string $surname
 * @property int $login_try
 * @property \Cake\I18n\FrozenTime $block_date
 *
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\File[] $files
 * @property \App\Model\Entity\Member[] $members
 * @property \App\Model\Entity\Project[] $projects
 * @property \App\Model\Entity\Task[] $tasks
 * @property \App\Model\Entity\Team[] $teams
 */
class User extends Entity
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
        'email' => true,
        'password' => true,
        'created' => true,
        'modified' => true,
        'Name' => true,
        'birthdate' => true,
        'last_login' => true,
        'blocked' => true,
        'bio' => true,
        'profession' => true,
        'profile_picture' => true,
        'cover_picture' => true,
        'web_site' => true,
        'surname' => true,
        'login_try' => true,
        'block_date' => true,
        'comments' => true,
        'files' => true,
        'members' => true,
        'projects' => true,
        'tasks' => true,
        'teams' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    /**
    *Hash the password.
    */
    protected function _setPassword($value){
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}