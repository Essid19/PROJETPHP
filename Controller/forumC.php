<?php
require_once 'config.php';

//class forum
class frmC
{
    // method add forum
    public function addForum($forum)
    {
        try {

            $pdo = config::getConnexion();
            $query = $pdo->prepare(
                'INSERT INTO forum (auteur,titre,img,texte_forum ,user_id) VALUES(:auteur,:titre,:img,:texte_forum ,:user_id)'

            );
            $query->execute(
                [


                    'auteur' => $forum->auteur,
                    'titre' => $forum->titre,
                    'img' => $forum->img,
                    'texte_forum' => $forum->texte_forum,
                    'user_id' => $forum->user_id

                ]
            );
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    //method read all from DB
    public function readForum()
    {
        try {
            $pdo = config::getConnexion(); //obtenir la connexion pdo depuis la class config
            $query =  $pdo->prepare(
                'SELECT * FROM forum'
            );
            $query->execute();

            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    // Méthode pour récupérer un forum par son ID
    public function getForumById($id_forum)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $pdo->prepare('SELECT * FROM forum WHERE id_forum = :id_forum');
            $query->execute(
                [
                    'id_forum' => $id_forum
                ]
            );
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // update forum
    public function updateForum($forum, $id_forum)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $updateQuery = $pdo->prepare(
                "UPDATE forum SET auteur = :auteur, titre = :titre, img = :img, texte_forum = :texte_forum  WHERE id_forum = $id_forum"
            );

            $updateQuery->bindParam('auteur', $forum->auteur, PDO::PARAM_STR);
            //$updateQuery->bindParam(':date_cmn', $date_cmn, PDO::PARAM_STR);
            $updateQuery->bindParam('titre', $forum->titre, PDO::PARAM_STR);
            $updateQuery->bindParam('img', $forum->img, PDO::PARAM_STR);
            $updateQuery->bindParam('texte_forum', $forum->texte_forum, PDO::PARAM_STR);
            $updateQuery->execute();
            echo 'data updated!';
        } catch (PDOException $e) {
            echo "update failed" . $e->getMessage();
        }
    }
    //method delete forum
    public function deleteForum($id_forum)
    {
        try {
            $pdo = config::getConnexion();
            $query2 = $pdo->prepare(
                'DELETE FROM commentaires where id_forum=:id_forum '
            );
            $query2->execute(
                [':id_forum' => $id_forum]
            );

            $query = $pdo->prepare(
                'DELETE FROM forum where id_forum= :id_forum'
            );
            $query->execute([
                'id_forum' => $id_forum
            ]);
        } catch (PDOException $e) {
            echo "oups delete failed" . $e->getMessage();
        }
    }
    //count forums
    public function countForums()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM forum');
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    //count likes
    public function countLikes($id_forum)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM forum WHERE id_forum = :id_forum');
            $query->bindParam(':id_forum', $id_forum, PDO::PARAM_INT);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Fonction de recherche des forums
    public function searchForums($searchTerm)
    {
        try {
            $searchTerm = '%' . $searchTerm . '%';
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT * FROM forum WHERE titre LIKE :searchTerm OR texte_forum LIKE :searchTerm');
            $query->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}

//class comment
class CmnC
{

    //count likes
    public function countcmn($id_forum)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM commentaires WHERE id_forum = :id_forum');
            $query->bindParam(':id_forum', $id_forum, PDO::PARAM_INT);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    // method add comment
    public function addCmn($cmn)
    {
        try {

            $pdo = config::getConnexion();
            $query = $pdo->prepare(
                'INSERT INTO commentaires(auteur,texte_cmn,id_forum ,user_id) VALUES(:auteur,:texte_cmn,:id_forum ,:user_id)'

            );
            $query->execute(
                [

                    //'date_cmn' => $cmn->getdate(),
                    //'id_cmn' => $cmn->id_cmn,
                    'auteur' => $cmn->auteur,
                    'texte_cmn' => $cmn->texte_cmn,
                    'id_forum' => $cmn->id_forum,
                    'user_id' => $cmn->user_id

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
    // Méthode pour récupérer un commentaire par l'ID de son forum
    public function getCmnById($id_forum)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $pdo->prepare('SELECT * FROM commentaires WHERE id_forum = :id_forum');
            $query->execute(
                [
                    'id_forum' => $id_forum
                ]
            );
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Méthode pour récupérer un commentaire par  son id
    public function getCommentById($id_cmn)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $pdo->prepare('SELECT * FROM commentaires WHERE id_cmn = :id_cmn');
            $query->execute(
                [
                    'id_cmn' => $id_cmn
                ]
            );
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
                "UPDATE commentaires SET
                 auteur = :auteur ,
                 texte_cmn = :texte_cmn ,
                 id_forum = :id_forum 
                  WHERE id_cmn = :id_cmn"
            );

            $updateQuery->execute([
                'auteur' => $cmn->auteur,
                'texte_cmn' => $cmn->texte_cmn,
                'id_forum' => $cmn->id_forum,
                'id_cmn' => $id_cmn
            ]);

            // Vérifier si la mise à jour a réussi
            if ($updateQuery->rowCount() > 0) {
                echo 'Data updated!';
            } else {
                echo 'No changes made or comment not found.';
            }
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
    //count forums
    public function countComments()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM commentaires');
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}

//class likes
class likeC
{
    // Méthode pour ajouter un like
    public function addLike($like)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('INSERT INTO likes (id_forum, user_id) VALUES (:id_forum, :user_id)');
            $query->bindParam(':id_forum', $like->id_forum, PDO::PARAM_INT);
            $query->bindParam(':user_id', $like->user_id, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Méthode pour supprimer un like
    public function removeLike($id_forum, $user_id)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('DELETE FROM likes WHERE id_forum = :id_forum AND user_id = :user_id');
            $query->bindParam(':id_forum', $id_forum, PDO::PARAM_INT);
            $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Méthode pour compter le nombre de likes pour un forum spécifique
    public function countLikes($id_forum)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM likes WHERE id_forum = :id_forum');
            $query->bindParam(':id_forum', $id_forum, PDO::PARAM_INT);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    public function userHasLiked($id_forum, $user_id)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM likes WHERE id_forum = :id_forum AND user_id = :user_id');
            $query->bindParam(':id_forum', $id_forum, PDO::PARAM_INT);
            $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'] > 0; // Retourne vrai si l'utilisateur a déjà "liké"
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}

//class dislikes
class dislikeC
{
    // Méthode pour ajouter un like
    public function adddisLike($dislike)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('INSERT INTO dislikes (id_forum, user_id) VALUES (:id_forum, :user_id)');
            $query->bindParam(':id_forum', $dislike->id_forum, PDO::PARAM_INT);
            $query->bindParam(':user_id', $dislike->user_id, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Méthode pour supprimer un dislike
    public function removedisLike($id_forum, $user_id)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('DELETE FROM dislikes WHERE id_forum = :id_forum AND user_id = :user_id');
            $query->bindParam(':id_forum', $id_forum, PDO::PARAM_INT);
            $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Méthode pour compter le nombre de likes pour un forum spécifique
    public function countdisLikes($id_forum)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM dislikes WHERE id_forum = :id_forum');
            $query->bindParam(':id_forum', $id_forum, PDO::PARAM_INT);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function userHasdisLiked($id_forum, $user_id)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM dislikes WHERE id_forum = :id_forum AND user_id = :user_id');
            $query->bindParam(':id_forum', $id_forum, PDO::PARAM_INT);
            $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'] > 0; // Retourne vrai si l'utilisateur a déjà "liké"
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
