<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Priorities Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Priorities
 * @property \Cake\ORM\Association\HasMany $Priorities
 * @property \Cake\ORM\Association\HasMany $Projects
 * @property \Cake\ORM\Association\HasMany $Tasks
 *
 * @method \App\Model\Entity\Priority get($primaryKey, $options = [])
 * @method \App\Model\Entity\Priority newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Priority[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Priority|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Priority patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Priority[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Priority findOrCreate($search, callable $callback = null, $options = [])
 */
class PrioritiesTable extends Table
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

        $this->table('priorities');

        $this->belongsTo('Priorities', [
            'foreignKey' => 'priority_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Priorities', [
            'foreignKey' => 'priority_id'
        ]);
        $this->hasMany('Projects', [
            'foreignKey' => 'priority_id'
        ]);
        $this->hasMany('Tasks', [
            'foreignKey' => 'priority_id'
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
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->integer('value')
            ->requirePresence('value', 'create')
            ->notEmpty('value');

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
        $rules->add($rules->existsIn(['priority_id'], 'Priorities'));

        return $rules;
    }
}
