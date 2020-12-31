<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommandesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommandesTable Test Case
 */
class CommandesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CommandesTable
     */
    protected $Commandes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Commandes',
        'app.CommandeLignes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Commandes') ? [] : ['className' => CommandesTable::class];
        $this->Commandes = $this->getTableLocator()->get('Commandes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Commandes);

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
}
