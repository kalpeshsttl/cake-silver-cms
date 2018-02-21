<?php
namespace CakeSilverCms\Test\TestCase\Model\Table;

use CakeSilverCms\Model\Table\ArticlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeSilverCms\Model\Table\ArticlesTable Test Case
 */
class ArticlesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeSilverCms\Model\Table\ArticlesTable
     */
    public $Articles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_silver_cms.articles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Articles') ? [] : ['className' => ArticlesTable::class];
        $this->Articles = TableRegistry::get('Articles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Articles);

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

    /**
     * Test afterSave method
     *
     * @return void
     */
    public function testAfterSave()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
