<?php
/**
 * MapPoint entity.
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MapPoint Entity
 * Using default values.
 *
 * @property int $path
 * @property int $sequence_number
 * @property string $page_id
 * @property string $latitude
 * @property string $longitude
 *
 * @property \App\Model\Entity\Page $page
 */class MapPoint extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Everything is accesible.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'path' => true,
        'sequence_number' => true
    ];
}
