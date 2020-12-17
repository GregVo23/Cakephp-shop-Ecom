<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CaracteristiqueValuesProduit Entity
 *
 * @property int $id
 * @property int $caracteristique_value_id
 * @property int $produit_id
 *
 * @property \App\Model\Entity\CaracteristiqueValue $caracteristique_value
 * @property \App\Model\Entity\Produit $produit
 */
class CaracteristiqueValuesProduit extends Entity
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
        'caracteristique_value_id' => true,
        'produit_id' => true,
        'caracteristique_value' => true,
        'produit' => true,
    ];
}
