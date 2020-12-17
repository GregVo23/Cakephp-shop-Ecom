<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhotosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhotosTable Test Case
 */
class PhotosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PhotosTable
     */
    protected $Photos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Photos',
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
        $config = $this->getTableLocator()->exists('Photos') ? [] : ['className' => PhotosTable::class];
        $this->Photos = $this->getTableLocator()->get('Photos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Photos);

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
