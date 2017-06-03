<?php
/**
 * User entity.
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

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
        'id' => false
    ];

    /**
     * Created by Christian Duran and Jean Carlo Lara.
     * Hashes the password so that plain text isn't used.
     * Method should be bcrypt.
     */
    protected function _setPassword ($password) {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }

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
