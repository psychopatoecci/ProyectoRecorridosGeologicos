<?php
/**
 * Content entity.
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Content Entity
 * Using default vlaues.
 *
 * @property int $id
 * @property string $page_id
 * @property string $link_path
 * @property string $description
 *
 * @property \App\Model\Entity\Page $page
 */class Content extends Entity
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
        'id' => false
    ];
}
