<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'email' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'birthdate' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'last_login' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'blocked' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'bio' => ['type' => 'string', 'length' => 500, 'null' => true, 'default' => null, 'collate' => 'utf32_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'profession' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf32_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'profile_picture' => ['type' => 'binary', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'cover_picture' => ['type' => 'binary', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'web_site' => ['type' => 'string', 'length' => 250, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'surname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'login_try' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'block_date' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'email' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'created' => '2018-05-28 17:49:32',
            'modified' => '2018-05-28 17:49:32',
            'Name' => 'Lorem ipsum dolor sit amet',
            'birthdate' => 1527529772,
            'last_login' => 1527529772,
            'blocked' => 1,
            'bio' => 'Lorem ipsum dolor sit amet',
            'profession' => 'Lorem ipsum dolor sit amet',
            'profile_picture' => 'Lorem ipsum dolor sit amet',
            'cover_picture' => 'Lorem ipsum dolor sit amet',
            'web_site' => 'Lorem ipsum dolor sit amet',
            'surname' => 'Lorem ipsum dolor sit amet',
            'login_try' => 1,
            'block_date' => 1527529772
        ],
    ];
}
