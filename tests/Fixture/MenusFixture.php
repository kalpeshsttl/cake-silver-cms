<?php
namespace CakeSilverCms\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MenusFixture
 *
 */
class MenusFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'menus';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'menu_region_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'menu_title' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_mysql500_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'menu_type' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'custom', 'collate' => 'utf8_general_mysql500_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'custom_link' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_mysql500_ci', 'comment' => '', 'precision' => null],
        'object_type' => ['type' => 'string', 'length' => 30, 'null' => true, 'default' => null, 'collate' => 'utf8_general_mysql500_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'object_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'module_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'redirection' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'self', 'collate' => 'utf8_general_mysql500_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sort_order' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'menu_region_id' => ['type' => 'index', 'columns' => ['menu_region_id'], 'length' => []],
            'menu_type' => ['type' => 'index', 'columns' => ['menu_type'], 'length' => []],
            'object_type' => ['type' => 'index', 'columns' => ['object_type'], 'length' => []],
            'object_id' => ['type' => 'index', 'columns' => ['object_id'], 'length' => []],
            'module_id' => ['type' => 'index', 'columns' => ['module_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'utf8_general_mysql500_ci'
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
            'menu_region_id' => 1,
            'menu_title' => 'Lorem ipsum dolor sit amet',
            'menu_type' => 'Lorem ipsum dolor sit amet',
            'custom_link' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'object_type' => 'Lorem ipsum dolor sit amet',
            'object_id' => 1,
            'module_id' => 1,
            'redirection' => 'Lorem ipsum dolor sit amet',
            'sort_order' => 1,
            'status' => 1
        ],
    ];
}
