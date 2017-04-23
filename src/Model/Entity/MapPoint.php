<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MapPoint Entity
 *
 * @property int $path
 * @property int $sequence_number
 * @property string $page_id
 * @property string $latitude
 * @property string $longitude
 */
class MapPoint extends Entity
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
        'path' => false,
        'sequence_number' => false
    ];
}
