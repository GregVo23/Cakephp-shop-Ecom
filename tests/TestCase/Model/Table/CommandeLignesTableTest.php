<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommandeLignesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommandeLignesTable Test Case
 */
class CommandeLignesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CommandeLignesTable
     */
    protected $CommandeLignes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CommandeLignes',
        'app.Commandes',
        'app.Produits',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CommandeLignes') ? [] : ['className' => CommandeLignesTable::class];
        $this->CommandeLignes = $this->getTableLocator()->get('CommandeLignes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CommandeLignes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
