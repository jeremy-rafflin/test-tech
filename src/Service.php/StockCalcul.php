<?php
namespace App\Service;

use App\Stock;
use App\TypeProduit\Bague;
use App\TypeProduit\TShirt;

class StockCalcul
{
    /**
     * Permet de renvoyer le prix le bas possible pour un stock (peut importe le fournisseur)
     *
     * @param Stock $stock
     * @return float
     */
    public function valeurStockSouhaiteLaPlusFaible(Stock $stock): float {
        $valeur = 0;
        foreach ($stock->produits() as $produit) {
            $prixBas = null;
            foreach($produit->fournisseurs() as $fournisseur) {
                if (TShirt::class === get_class($produit)) {
                    $prixFournisseur = $fournisseur->prixTshirt($produit->couleur(), $produit->taille());
                } elseif (Bague::class === get_class($produit)) {
                    $prixFournisseur = $fournisseur->prixBague($produit->taille());
                }

                if (null === $prixBas || $prixFournisseur < $prixBas) {
                    $prixBas = $prixFournisseur;
                }
            }
            $valeur += $prixBas;
        }
        return $valeur;
    }
}
