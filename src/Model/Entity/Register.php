<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Register Entity
 *
 * @property int $id
 * @property string $code
 * @property string $family_mobile
 * @property string $family_name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $personal_id
 * @property int $patient_id
 *
 * @property \App\Model\Entity\Personal $personal
 * @property \App\Model\Entity\Patient $patient
 */
class Register extends Entity
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
        'code' => true,
        'family_mobile' => true,
        'family_name' => true,
        'created' => true,
        'modified' => true,
        'personal_id' => true,
        'patient_id' => true,
        'personal' => true,
        'patient' => true
    ];
}
