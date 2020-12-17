<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CaracteristiqueValuesProduitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CaracteristiqueValuesProduitsTable Test Case
 */
class CaracteristiqueValuesProduitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CaracteristiqueValuesProduitsTable
     */
    protected $CaracteristiqueValuesProduits;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CaracteristiqueValuesProduits',
        'app.CaracteristiqueValues',
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
        $config = $this->getTableLocator()->exists('CaracteristiqueValuesProduits') ? [] : ['className' => CaracteristiqueValuesProduitsTable::class];
        $this->CaracteristiqueValuesProduits = $this->getTableLocator()->get('CaracteristiqueValuesProduits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CaracteristiqueValuesProduits);

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
