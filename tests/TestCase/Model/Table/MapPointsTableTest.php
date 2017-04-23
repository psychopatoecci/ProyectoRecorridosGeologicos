<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MapPointsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MapPointsTable Test Case
 */
class MapPointsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\MapPointsTable     */
    public $MapPoints;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.map_points',
        'app.pages',
        'app.contents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MapPoints') ? [] : ['className' => 'App\Model\Table\MapPointsTable'];        $this->MapPoints = TableRegistry::get('MapPoints', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MapPoints);

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
