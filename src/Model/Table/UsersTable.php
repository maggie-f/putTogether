<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\CommentsTable|\Cake\ORM\Association\HasMany $Comments
 * @property \App\Model\Table\FilesTable|\Cake\ORM\Association\HasMany $Files
 * @property \App\Model\Table\MembersTable|\Cake\ORM\Association\HasMany $Members
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\HasMany $Projects
 * @property \App\Model\Table\TasksTable|\Cake\ORM\Association\HasMany $Tasks
 * @property \App\Model\Table\TeamsTable|\Cake\ORM\Association\HasMany $Teams
 * @property \App\Model\Table\TeamsTable|\Cake\ORM\Association\BelongsToMany $Teams
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Comments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Files', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Members', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Projects', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Tasks', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Teams', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Teams', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'team_id',
            'joinTable' => 'teams_users'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('Name')
            ->maxLength('Name', 50)
            ->requirePresence('Name', 'create')
            ->notEmpty('Name');

        $validator
            ->dateTime('birthdate')
            ->allowEmpty('birthdate');

        $validator
            ->dateTime('last_login')
            ->allowEmpty('last_login');

        $validator
            ->boolean('blocked')
            ->allowEmpty('blocked');

        $validator
            ->scalar('bio')
            ->maxLength('bio', 500)
            ->allowEmpty('bio');

        $validator
            ->scalar('profession')
            ->maxLength('profession', 100)
            ->allowEmpty('profession');

        $validator
            ->allowEmpty('profile_picture');

        $validator
            ->allowEmpty('cover_picture');

        $validator
            ->scalar('web_site')
            ->maxLength('web_site', 250)
            ->allowEmpty('web_site');

        $validator
            ->scalar('surname')
            ->maxLength('surname', 100)
            ->allowEmpty('surname');

        $validator
            ->integer('login_try')
            ->allowEmpty('login_try');

        $validator
            ->dateTime('block_date')
            ->allowEmpty('block_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
