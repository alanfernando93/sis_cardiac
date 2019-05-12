<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Monitor Entity
 *
 * @property int $id
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $personal_id
 * @property int $patient_id
 *
 * @property \App\Model\Entity\Personal $personal
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\Report[] $reports
 */
class Monitor extends Entity
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
        'description' => true,
        'created' => true,
        'modified' => true,
        'personal_id' => true,
        'patient_id' => true,
        'personal' => true,
        'patient' => true,
        'reports' => true
    ];
}
