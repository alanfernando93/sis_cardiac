<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Monitors Model
 *
 * @property \App\Model\Table\PersonalTable|\Cake\ORM\Association\BelongsTo $Personal
 * @property \App\Model\Table\PatientsTable|\Cake\ORM\Association\BelongsTo $Patients
 * @property \App\Model\Table\ReportsTable|\Cake\ORM\Association\HasMany $Reports
 *
 * @method \App\Model\Entity\Monitor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Monitor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Monitor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Monitor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monitor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monitor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Monitor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Monitor findOrCreate($search, callable $callback = null, $options = [])
 */
class MonitorsTable extends Table
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

        $this->setTable('monitors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Personal', [
            'foreignKey' => 'personal_id'
        ]);
        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id'
        ]);
        $this->hasMany('Reports', [
            'foreignKey' => 'monitor_id'
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('value')
            ->maxLength('value', 255)
            ->requirePresence('value', 'create')
            ->allowEmptyString('value', false);

        $validator
            ->scalar('time')
            ->maxLength('time', 255)
            ->allowEmptyString('time');

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
        $rules->add($rules->existsIn(['personal_id'], 'Personal'));
        $rules->add($rules->existsIn(['patient_id'], 'Patients'));

        return $rules;
    }
}
