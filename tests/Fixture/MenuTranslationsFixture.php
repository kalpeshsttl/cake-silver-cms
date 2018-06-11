<?php
namespace CakeSilverCms\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MenuTranslationsFixture
 *
 */
class MenuTranslationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'menu_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'language_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'culture' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8_general_mysql500_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'menu_title' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_mysql500_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['menu_id', 'language_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'utf8_general_mysql500_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'menu_id' => 1,
                'language_id' => 1,
                'culture' => 'Lorem ip',
                'menu_title' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
