<?php
namespace CakeSilverCms\Test\TestCase\Controller;

use CakeSilverCms\Controller\ArticlesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * CakeSilverCms\Controller\ArticlesController Test Case
 */
class ArticlesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_silver_cms.articles',
        'plugin.cake_silver_cms.article_types',
        'plugin.cake_silver_cms.rewrite_rules',
        'plugin.cake_silver_cms.taxonomy_relationships',
        'plugin.cake_silver_cms.taxonomies',
        'plugin.cake_silver_cms.media',
        'plugin.cake_silver_cms.media_relationships',
        'plugin.cake_silver_cms.objects',
        'plugin.cake_silver_cms.terms',
        'plugin.cake_silver_cms.term_relationships'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
