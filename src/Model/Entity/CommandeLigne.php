<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CommandeLigne Entity
 *
 * @property int $id
 * @property int $commande_id
 * @property int $produit_id
 * @property int $quantite
 *
 * @property \App\Model\Entity\Commande $commande
 * @property \App\Model\Entity\Produit $produit
 */
class CommandeLigne extends Entity
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
        'commande_id' => true,
        'produit_id' => true,
        'quantite' => true,
        'commande' => true,
        'produit' => true,
    ];
}
