<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .messagErreur {
        color: red;
        font-size:0.8em;
    }
    </style>
</head>
<body>
    <?php
    echo var_dump($_GET);
    echo "<h1>Formulaire de saisie d'un article</h1>";
    echo "Les champs marqués d'une * sont obligatoires";
    $erreurReference="";
    $erreurLibelle="";
    $erreurPrix="";
    $erreurQuantite="";
    $erreurFrs="";
    $erreurPtvt="";
    $champsValides=True;  
    $ref="";
    $libelle="";
    $PV=array();
    $four=array();
    $prix="";
    $qte="";
    if( isset($_GET["submit"])){ 
        
        if (empty($_GET["ref"])){
            $erreurReference = " La référence est requise"; 
            $champsValides=False; 
        }
        else 
        $ref= $_GET["ref"];
        if (empty($_GET["libelle"])){
            $erreurLibelle = " Le libellé est requise"; 
            $champsValides=False; 
        }
        else
        $libelle=$_GET["libelle"];
         if(empty($_GET["pv"])){
            $erreurPtvt = " il faut choisir au moins un point de vente";
            $champsValides=False; 
        }
        else
        $PV=$_GET["pv"];
    if (empty($_GET["fournisseurs"])) {
        $erreurFrs = " il faut choisir au moins un fournisseur";
        $champsValides=False; 
         }
         else
         $four=$_GET["fournisseurs"];
     if(empty($_GET["prix"])){
            $erreurPrix = " Le prix est requis";
            $champsValides=False;
         }
         else
        $prix=$_GET["prix"];
     if(empty($_GET["qte"])){
            $erreurQuantite = " La quantité est requise";
            $champsValides=False;
        }
        else
        $qte=$_GET["qte"];
    }
    ?>
    <form action=""<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <table>
            <tr><td><label for="ref">référence :</td>
                <td>
                    <input type="text" name="ref" id="ref" value="<?php echo $ref;?>">
                    <span class='messagErreur'><?php echo $erreurReference; ?></span>
                </td>
            </tr>
            <tr><td><label for="libelle">libellé :</td>
                <td>
                    <input type="text" name="libelle" id="libelle" value="<?php echo $libelle;?>" >
                  <span class="messagErreur"><?php echo $erreurLibelle;?></span>
                </td>
            </tr>
            <tr><td><label for="fournisseur">fournisseurr    :</label></td>
                <td>
                <select name="fournisseurs[]" id="fournisseur" multiple>
                <option value="f1" <?php if (in_array("f1",$four)) echo "selected"; ?>>fournisseur1</option>
                <option value="f2" <?php if (in_array("f2",$four)) echo "selected"; ?>>fournisseur2</option>
                <option value="f3" <?php if (in_array("f3",$four)) echo "selected"; ?>>fournisseur3</option>
                </select>
                <span class="messagErreur"><?=$erreurFrs;?></span></td>
                </td>
            </tr> 
            <tr>
                <td><label for="">point de vente :</label></td>
                <td>
                    <input type="checkbox" id="sf"name="pv[]"value="Sfax" <?php if (in_array("Sfax",$PV)) echo "checked"; ?>><label for="sf">Sfax</label>
                    <input type="checkbox" id="gb" name="pv[]"value="Gabes" <?php if (in_array("Gabes",$PV)) echo "checked"; ?>><label for="gb">Gabes</label>
                    <span class="messagErreur"><?php echo $erreurPtvt;?></span>
            </td>
            </tr>         
            <tr><td><label for="prix">prix :</td>
                <td>
                    <input type="text" name="prix" id="prix" value="<?php echo $prix; ?>">
                    <span class="messagErreur"><?php echo $erreurPrix;?></span>
            </td>
            </tr> 
            <tr><td><label for="qte">Qte en stock :</td>
                <td><input type="text" name="qte" id="qte" value="<?php echo $qte;?>">
                <span class="messagErreur"><?php echo $erreurQuantite;?></span>
            </td>
            </tr>        
            </table>
            <input type="submit" name="submit" value="Envoyer">
    </form>
<?php if($champsValides){?>
    <h1>Informations de l'article</h1>
<b>Referencee :</b> <?php echo $ref; ?><br>
<b>Libellé : </b><?php echo $libelle; ?><br>
<b>Fournisseur : </b><br>
<ul>
    <?php
     foreach($four as $f)
     echo "<li>$f</li>";
    ?>
</ul>
<b>Point de vente:</b><br>
<ul>
   <?php
    foreach($PV as $p)
    echo "<li>$p</li>";
    ?>
</ul>
<b>Prix :</b> <?php echo $prix ?></br>
<b>Quantité:</b> <?php echo $qte ?><br>
<?php }?>
</body>
</html>

