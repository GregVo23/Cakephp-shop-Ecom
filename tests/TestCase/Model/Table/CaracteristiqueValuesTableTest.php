<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CaracteristiqueValuesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CaracteristiqueValuesTable Test Case
 */
class CaracteristiqueValuesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CaracteristiqueValuesTable
     */
    protected $CaracteristiqueValues;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CaracteristiqueValues',
        'app.Caracteristiques',
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
        $config = $this->getTableLocator()->exists('CaracteristiqueValues') ? [] : ['className' => CaracteristiqueValuesTable::class];
        $this->CaracteristiqueValues = $this->getTableLocator()->get('CaracteristiqueValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CaracteristiqueValues);

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
