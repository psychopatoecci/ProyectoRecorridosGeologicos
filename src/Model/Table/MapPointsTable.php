<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MapPoints Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pages
 *
 * @method \App\Model\Entity\MapPoint get($primaryKey, $options = [])
 * @method \App\Model\Entity\MapPoint newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MapPoint[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MapPoint|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MapPoint patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MapPoint[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MapPoint findOrCreate($search, callable $callback = null, $options = [])
 */class MapPointsTable extends Table
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

        $this->setTable('map_points');
        $this->setDisplayField('path');
        $this->setPrimaryKey(['path', 'sequence_number']);

        $this->belongsTo('Pages', [
            'foreignKey' => 'page_id',
            'joinType' => 'INNER'
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
            ->integer('path')            ->allowEmpty('path', 'create');
        $validator
            ->integer('sequence_number')            ->allowEmpty('sequence_number', 'create');
        $validator
            ->requirePresence('latitude', 'create')            ->notEmpty('latitude');
        $validator
            ->requirePresence('longitude', 'create')            ->notEmpty('longitude');
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
        $rules->add($rules->existsIn(['page_id'], 'Pages'));

        return $rules;
    }
}
