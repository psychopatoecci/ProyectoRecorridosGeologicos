<?php
/**
 * User entity.
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 * Using default CakePHP settings for 'users' table.
 *
 * @property string $username
 * @property string $email
 * @property string $password
 */class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Everything
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'username' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     * Password should be excluded.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
