<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Patients Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\MonitorsTable|\Cake\ORM\Association\HasMany $Monitors
 * @property \App\Model\Table\RegisterTable|\Cake\ORM\Association\HasMany $Register
 *
 * @method \App\Model\Entity\Patient get($primaryKey, $options = [])
 * @method \App\Model\Entity\Patient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Patient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Patient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Patient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Patient findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PatientsTable extends Table {

  /**
   * Initialize method
   *
   * @param array $config The configuration for the Table.
   * @return void
   */
  public function initialize(array $config) {
    parent::initialize($config);

    $this->setTable('patients');
    $this->setDisplayField('id');
    $this->setPrimaryKey('id');

    $this->addBehavior('Timestamp');

    $this->belongsTo('Users', [
      'foreignKey' => 'user_id',
      'joinType' => 'INNER'
    ]);
    $this->hasMany('Monitors', [
      'foreignKey' => 'patient_id'
    ]);
    $this->hasMany('Register', [
      'foreignKey' => 'patient_id'
    ]);
  }

  /**
   * Default validation rules.
   *
   * @param \Cake\Validation\Validator $validator Validator instance.
   * @return \Cake\Validation\Validator
   */
  public function validationDefault(Validator $validator) {
    $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

    $validator
            ->scalar('code')
            ->maxLength('code', 10)
            ->requirePresence('code', 'create')
            ->allowEmptyString('code', false);

    $validator
            ->scalar('family_mobile')
            ->maxLength('family_mobile', 20)
            ->requirePresence('family_mobile', 'create')
            ->allowEmptyString('family_mobile', false);

    $validator
            ->scalar('family_name')
            ->maxLength('family_name', 20)
            ->requirePresence('family_name', 'create')
            ->allowEmptyString('family_name', false);

    return $validator;
  }

  /**
   * Returns a rules checker object that will be used for validating
   * application integrity.
   *
   * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
   * @return \Cake\ORM\RulesChecker
   */
  public function buildRules(RulesChecker $rules) {
    $rules->add($rules->existsIn(['user_id'], 'Users'));

    return $rules;
  }

}
