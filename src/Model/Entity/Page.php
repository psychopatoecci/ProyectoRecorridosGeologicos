<?php
/**
 * Page entity.
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Page Entity
 * Using default values.
 *
 * @property string $id
 *
 * @property \App\Model\Entity\Content[] $contents
 * @property \App\Model\Entity\MapPoint[] $map_points
 */class Page extends Entity
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
        'id' => true
    ];
}
