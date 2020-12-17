<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProduitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProduitsTable Test Case
 */
class ProduitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProduitsTable
     */
    protected $Produits;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Produits',
        'app.Categories',
        'app.Photos',
        'app.CaracteristiqueValues',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Produits') ? [] : ['className' => ProduitsTable::class];
        $this->Produits = $this->getTableLocator()->get('Produits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Produits);

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
