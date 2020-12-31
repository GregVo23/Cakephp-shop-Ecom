<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CommandeLignes Model
 *
 * @property \App\Model\Table\CommandesTable&\Cake\ORM\Association\BelongsTo $Commandes
 * @property \App\Model\Table\ProduitsTable&\Cake\ORM\Association\BelongsTo $Produits
 *
 * @method \App\Model\Entity\CommandeLigne newEmptyEntity()
 * @method \App\Model\Entity\CommandeLigne newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CommandeLigne[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CommandeLigne get($primaryKey, $options = [])
 * @method \App\Model\Entity\CommandeLigne findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CommandeLigne patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CommandeLigne[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CommandeLigne|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CommandeLigne saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CommandeLigne[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CommandeLigne[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CommandeLigne[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CommandeLigne[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CommandeLignesTable extends Table
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

        $this->setTable('commande_lignes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Commandes', [
            'foreignKey' => 'commande_id',
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

        $validator
            ->integer('quantite')
            ->requirePresence('quantite', 'create')
            ->notEmptyString('quantite');

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
        $rules->add($rules->existsIn(['commande_id'], 'Commandes'), ['errorField' => 'commande_id']);
        $rules->add($rules->existsIn(['produit_id'], 'Produits'), ['errorField' => 'produit_id']);

        return $rules;
    }
}
