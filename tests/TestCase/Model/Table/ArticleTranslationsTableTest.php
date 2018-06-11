<?php
namespace CakeSilverCms\Test\TestCase\Model\Table;

use CakeSilverCms\Model\Table\ArticleTranslationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeSilverCms\Model\Table\ArticleTranslationsTable Test Case
 */
class ArticleTranslationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeSilverCms\Model\Table\ArticleTranslationsTable
     */
    public $ArticleTranslations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_silver_cms.article_translations',
        'plugin.cake_silver_cms.articles',
        'plugin.cake_silver_cms.languages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ArticleTranslations') ? [] : ['className' => ArticleTranslationsTable::class];
        $this->ArticleTranslations = TableRegistry::get('ArticleTranslations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ArticleTranslations);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
