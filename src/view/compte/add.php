<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Compte</title>
</head>
<body>

<?php
if(isset($ok)){
    if($ok != 0){
        
        echo "<div style='margin-top: 410px; font-size: 35px; color:#02a1a1; margin-left: 130px;'>Client inseré avec succès</div>";
    }else{
        echo "<div style='margin-top: 50px; font-size: 35px; color:red; margin-left: 130px;'>Erreur d'insertion</div>";
 
    }
}

// if(isset($listeTypeCompte)){
   
//     foreach($listeTypeCompte as $r){
//         echo $r->getId()." "."<br/>";
//         echo $r->getLibelle()." "."<br/>";
        
//     }
//     die;
// }
?>

 
    <div class="contenue">
        <div class="error" id="message_error"></div>
        <form action="http://localhost/mes_projets/BanqueProjectByOrm/Compte/add" method="POST" class="formClient" id="formClient">

            <fieldset class="fieldset">
                <legend class="legend">Rechercher client</legend>
                <div class="itemFieldset">
                
                    <div>
                        <label for="">Client:</label>
                        <select name="client_id" id="client_id" onchange="verifTypeClient()">
                            <option value="">Choisir client</option>
                            <?php
                            if(isset($listeClient)){
                                foreach($listeClient as $l_client){   
                            ?>
                            <option value="<?php echo $l_client->getId(); ?>">
                                <?php echo $l_client->getPrenom();?>
                                <?php echo $l_client->getNom(); ?>
                            </option>
                            <?php      
                                }  
                            }        
                            ?>

                          
                        </select>

                    </div>
            
                </div>

            </fieldset> 
            
            <fieldset class="fieldset" id="emp">
                <legend class="legend">Gestion compte:</legend>
                <div class="itemFieldset">
                    <div>
                        <label for="">Type de compte:</label>
                        <select name="type_compte_id" id="selectCompte" onchange="myFunction()">
                            <option value="">Choisir un type de compte</option>
                            <?php
                            if(isset($listeTypeCompte)){
                                foreach($listeTypeCompte as $l_typeCompte){   
                            ?>
                            <option value="<?php echo $l_typeCompte->getId(); ?>">
                                <?php echo $l_typeCompte->getLibelle();?>
                              
                            </option>
                            <?php      
                                }  
                            }        
                            ?>

                         
                        </select>
                    </div>
                    <div>   
                        <label for="">Date d'ouverture</label>
                        <?php echo"<input type='text' name='date_ouverture' id='date' value='$today' readonly/>";?>                      
                    </div>
                    <div>
                        <label for="">Numero compte</label>
                        <?php echo"<input type='text' name='num_compte' id='numCompte' value='$numcompte' readonly/>";?>        
                    </div>
                    <div>
                        <label for="">Numero agence</label>
                        <select name="agence_id" id="agence_id">
                            <option value="">Votre agence</option>
                            <?php
                            if(isset($listeAgence)){
                                foreach($listeAgence as $l_typeAgence){   
                            ?>
                            <option value="<?php echo $l_typeAgence->getId(); ?>">
                                <?php echo $l_typeAgence->getNom();?>
                              
                            </option>
                            <?php      
                                }  
                            }        
                            ?>

                        </select>

                    </div>
                    <div>
                        <label for="">Cle rip</label>
                        <?php echo"<input type='text' name='cle_rip' id='cleRip' value='$cleRip' readonly />";?>
                    </div>

                    <div class="dfermuture" id="dfermuture">
                        <label for="">Date fermuture</label>
                        <input type='date' name='date_fermuture' id='date_fermuture' value=''/>           
                    </div>

                    <div class="frais" id="frais">
                        <label for="">Frais ouverture</label>
                        <input type="text" name="frais_ouverture" id="fouverture" placeholder="Frais d'ouverture.....">
                    </div> 
                        
                    <div class="agio" id="agio">
                        <label for="">Montant agio</label>
                        <input type="text" name="agio" id="agio" placeholder="L'agio.....">
                    </div>


                </div>

                <div class="btnSave">
                    <input type="submit" name="btnAjouter" class="btn" value="Enregistrer"/>
                </div>
            </fieldset>    
        </form>  
    </div>
</body>
</html>