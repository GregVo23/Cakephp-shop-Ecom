<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CaracteristiqueValuesProduits Model
 *
 * @property \App\Model\Table\CaracteristiqueValuesTable&\Cake\ORM\Association\BelongsTo $CaracteristiqueValues
 * @property \App\Model\Table\ProduitsTable&\Cake\ORM\Association\BelongsTo $Produits
 *
 * @method \App\Model\Entity\CaracteristiqueValuesProduit newEmptyEntity()
 * @method \App\Model\Entity\CaracteristiqueValuesProduit newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CaracteristiqueValuesProduit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CaracteristiqueValuesProduit get($primaryKey, $options = [])
 * @method \App\Model\Entity\CaracteristiqueValuesProduit findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CaracteristiqueValuesProduit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CaracteristiqueValuesProduit[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CaracteristiqueValuesProduit|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CaracteristiqueValuesProduit saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CaracteristiqueValuesProduit[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CaracteristiqueValuesProduit[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CaracteristiqueValuesProduit[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CaracteristiqueValuesProduit[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CaracteristiqueValuesProduitsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('caracteristique_values_produits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('CaracteristiqueValues', [
            'foreignKey' => 'caracteristique_value_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Produits', [
            'foreignKey' => 'produit_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['caracteristique_value_id'], 'CaracteristiqueValues'), ['errorField' => 'caracteristique_value_id']);
        $rules->add($rules->existsIn(['produit_id'], 'Produits'), ['errorField' => 'produit_id']);

        return $rules;
    }
}
