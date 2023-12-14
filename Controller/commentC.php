<?php
include 'config.php' ;
//include('C:/wamp64/www/projetphp_snm/Model/comment.php');
//class comment
class CmnC
{
    // method add comment
    public function addCmn($cmn)
    {
        try {

            $pdo = config::getConnexion();
            $query = $pdo->prepare(
                'INSERT INTO commentaires(nom,texte_cmn) VALUES(:nom,:texte_cmn)'

            );
            $query->execute(
                [

                    //'date_cmn' => $cmn->getdate(),
                    //'id_cmn' => $cmn->id_cmn,
                    'nom' => $cmn->nom,
                    'texte_cmn' => $cmn->texte_cmn

                ]
            );
            //echo "commentaire ajoutée avec succée";
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    //method read all from DB
    public function readAll()
    {
        try {
            $pdo = config::getConnexion(); //obtenir la connexion pdo depuis la class config
            $query =  $pdo->prepare(
                'SELECT * FROM commentaires'
            );
            $query->execute();
            //echo "liste des commentaires récupérée avec succée!";
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    //method update comment
    public function updateCmn($cmn, $id_cmn)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $updateQuery = $pdo->prepare(
                "UPDATE commentaires SET texte_cmn = :texte_cmn, nom = :nom WHERE id_cmn = $id_cmn"
            );

            $updateQuery->bindParam('texte_cmn', $cmn->texte_cmn, PDO::PARAM_STR);
            $updateQuery->bindParam('nom', $cmn->nom, PDO::PARAM_STR);
            $updateQuery->execute();
           
        } catch (PDOException $e) {
            echo "update failed" . $e->getMessage();
        }
    }
    //method delete comment
    public function deleteCmn($id_cmn)
    {
        try {
            $pdo = config::getConnexion(); //obtenir la connexion pdo depuis la class config
            $query = $pdo->prepare(
                'DELETE FROM commentaires where id_cmn= :id_cmn'
            );
            $query->execute([
                'id_cmn' => $id_cmn
            ]);
            
        } catch (PDOException $e) {
            echo "oups update failed" . $e->getMessage();
        }
    }
}
