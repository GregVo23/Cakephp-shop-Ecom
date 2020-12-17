<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CaracteristiqueValues Model
 *
 * @property \App\Model\Table\CaracteristiquesTable&\Cake\ORM\Association\BelongsTo $Caracteristiques
 * @property \App\Model\Table\ProduitsTable&\Cake\ORM\Association\BelongsToMany $Produits
 *
 * @method \App\Model\Entity\CaracteristiqueValue newEmptyEntity()
 * @method \App\Model\Entity\CaracteristiqueValue newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CaracteristiqueValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CaracteristiqueValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\CaracteristiqueValue findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CaracteristiqueValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CaracteristiqueValue[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CaracteristiqueValue|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CaracteristiqueValue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CaracteristiqueValue[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CaracteristiqueValue[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CaracteristiqueValue[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CaracteristiqueValue[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CaracteristiqueValuesTable extends Table
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

        $this->setTable('caracteristique_values');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Caracteristiques', [
            'foreignKey' => 'caracteristique_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Produits', [
            'foreignKey' => 'caracteristique_value_id',
            'targetForeignKey' => 'produit_id',
            'joinTable' => 'caracteristique_values_produits',
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

        $validator
            ->scalar('nom')
            ->maxLength('nom', 100)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

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
        $rules->add($rules->existsIn(['caracteristique_id'], 'Caracteristiques'), ['errorField' => 'caracteristique_id']);

        return $rules;
    }
}
