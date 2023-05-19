<?

function creationDuPanier()
{
   if(!isset($_SESSION['panier']))
   {
      $_SESSION['panier'] = array();
      $_SESSION['panier']['nom'] = array();
      $_SESSION['panier']['id_medicaments'] = array();
      $_SESSION['panier']['quantite'] = array();
      $_SESSION['panier']['prix'] = array();
   }
}
//------------------------------------
function ajouterProduitDansPanier($nom, $id_medicament, $quantite, $prix)
{
   // creationDuPanier(); 
   $_SESSION['panier']['id_medicaments'][] =  $id_medicament;
   $_SESSION['panier']['quantite'] [] = $quantite;
    $position_medicament = array_search($id_medicament,  $_SESSION['panier']['id_medicament']);
    if($position_medicament !== false)
    {
         $_SESSION['panier']['quantite'][$position_medicament] += $quantite ;
    }
    else
    {
        $_SESSION['panier']['nom'][] = $nom;
        $_SESSION['panier']['id_medicament'][] = $id_medicament;
        $_SESSION['panier']['quantite'][] = $quantite;
        $_SESSION['panier']['prix'][] = $prix;
    }
}

function montantTotal()
{
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['id_medicament']); $i++)
   {
      $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
   }
   return round($total,2); 
}

function retirerProduitDuPanier($id_medicament_a_supprimer)
{
    $position_medicament = array_search($id_medicament_a_supprimer,  $_SESSION['panier']['id_medicament']);
    if ($position_medicament !== false)
    {
        array_splice($_SESSION['panier']['nom'], $position_medicament, 1);
        array_splice($_SESSION['panier']['id_medicament'], $position_medicament, 1);
        array_splice($_SESSION['panier']['quantite'], $position_medicament, 1);
        array_splice($_SESSION['panier']['prix'], $position_medicament, 1);
    }
}



?>