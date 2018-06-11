<?php
namespace CakeSilverCms\Test\TestCase\Model\Table;

use CakeSilverCms\Model\Table\MenuRegionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeSilverCms\Model\Table\MenuRegionsTable Test Case
 */
class MenuRegionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeSilverCms\Model\Table\MenuRegionsTable
     */
    public $MenuRegions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_silver_cms.menu_regions',
        'plugin.cake_silver_cms.menus'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MenuRegions') ? [] : ['className' => MenuRegionsTable::class];
        $this->MenuRegions = TableRegistry::get('MenuRegions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MenuRegions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
