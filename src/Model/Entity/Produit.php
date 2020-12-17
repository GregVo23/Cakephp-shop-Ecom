<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produit Entity
 *
 * @property int $id
 * @property string $nom
 * @property string|null $description
 * @property string $prix
 * @property int $category_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Photo[] $photos
 * @property \App\Model\Entity\CaracteristiqueValue[] $caracteristique_values
 */
class Produit extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nom' => true,
        'description' => true,
        'prix' => true,
        'category_id' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'category' => true,
        'photos' => true,
        'caracteristique_values' => true,
    ];
}
