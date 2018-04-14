<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatesTable Test Case
 */
class StatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StatesTable
     */
    public $States;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.states',
        'app.tasks',
        'app.priorities',
        'app.projects',
        'app.users',
        'app.bookmarks',
        'app.tags',
        'app.bookmarks_tags',
        'app.comments',
        'app.files',
        'app.types',
        'app.members'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('States') ? [] : ['className' => StatesTable::class];
        $this->States = TableRegistry::get('States', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->States);

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
