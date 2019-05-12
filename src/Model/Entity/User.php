<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $age
 * @property string $ci
 * @property string $phone
 * @property string $city
 * @property string $province
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Patient[] $patients
 * @property \App\Model\Entity\Personal[] $personal
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
        'first_name' => true,
        'last_name' => true,
        'age' => true,
        'ci' => true,
        'phone' => true,
        'city' => true,
        'province' => true,
        'created' => true,
        'modified' => true,
        'patients' => true,
        'personal' => true
    ];
}
