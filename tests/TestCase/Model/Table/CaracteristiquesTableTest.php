<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CaracteristiquesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CaracteristiquesTable Test Case
 */
class CaracteristiquesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CaracteristiquesTable
     */
    protected $Caracteristiques;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Caracteristiques',
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
        $config = $this->getTableLocator()->exists('Caracteristiques') ? [] : ['className' => CaracteristiquesTable::class];
        $this->Caracteristiques = $this->getTableLocator()->get('Caracteristiques', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Caracteristiques);

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
