<?php
//include 'config.php';

class MedicamentC
{
    // Méthode pour ajouter un médicament
    public function addMedicament($medicament)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare(
                'INSERT INTO medicaments(nom, description, prix, qte_med,img,id_catg ,id_ph) VALUES(:nom, :description, :prix, :qte_med, :img, :id_catg ,:id_ph)'
            );
            $query->execute([
                'nom' => $medicament->nom,
                'description' => $medicament->description,
                'prix' => $medicament->prix,
                'qte_med' => $medicament->qte_med,
                'img' => $medicament->img,
                'id_catg' => $medicament->id_catg,
                'id_ph' => $medicament->id_ph
            ]);
        } catch (PDOException $e) {
            // Vous pouvez gérer l'erreur ici
            die('Error: ' . $e->getMessage());
        }
    }

    // Méthode pour récupérer tous les médicaments
    public function read_med()
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare('SELECT * FROM medicaments');
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function read_med2($id_ph)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare('SELECT * FROM medicaments where id_ph = :id_ph');
            $query->execute([
                'id_ph' => $id_ph

            ]);
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Méthode pour récupérer un médicament par son ID
    public function getMedicamentById($id_med)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $pdo->prepare('SELECT * FROM medicaments WHERE id_med = :id_med');
            $query->execute(
                [
                    'id_med' => $id_med
                ]
            );
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Méthode pour mettre à jour un médicament
    public function updateMedicament($medicament, $id_med)
    {
        try {

            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $updatequery = $pdo->prepare(
                "UPDATE medicaments set 
                 nom = :nom,
                  description = :description,
                   prix = :prix,
                    qte_med = :qte_med,
                     img = :img,
                      id_catg= :id_catg , 
                      id_ph = :id_ph 
                      WHERE id_med = :id_med"
            );
            $updatequery->execute([
                'nom' => $medicament->nom,
                'description' => $medicament->description,
                'prix' => $medicament->prix,
                'qte_med' => $medicament->qte_med,
                'img' => $medicament->img,
                'id_catg' => $medicament->id_catg,
                'id_ph' => $medicament->id_ph,
                'id_med' => $id_med


            ]);
            if ($updatequery->rowCount() > 0) {
                return 1;
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            echo 'La mise à jour du médicament a échoué: ' . $e->getMessage();
        }
    }

    // Méthode pour supprimer un médicament par son ID
    public function deleteMedicament($id_med)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare('DELETE FROM medicaments WHERE id_med = :id_med');
            $query->execute(['id_med' => $id_med]);
        } catch (PDOException $e) {
            echo 'La suppression du médicament a échoué: ' . $e->getMessage();
        }
    }
    // Fonction de recherche des forums
    public function searchDrugs($Term)
    {
        try {
            $Term = '%' . $Term . '%';
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT * FROM medicaments WHERE nom LIKE :Term OR description LIKE :Term');
            $query->bindParam(':Term', $Term, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    //count drugs
    public function countdrugs()
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM medicaments');
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
class qtc
{
    // Méthode pour ajouter un category
    public function addcateg($category)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare(
                'INSERT INTO categories(nom, id_ph) VALUES(:nom, :id_ph)'
            );
            $query->execute([
                'nom' => $category->nom,
                'id_ph' => $category->id_ph
            ]);
        } catch (PDOException $e) {
            // Vous pouvez gérer l'erreur ici
            die('Error: ' . $e->getMessage());
        }
    }

    // Méthode pour récupérer tous les médicaments
    public function read_catg($id_ph)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare('SELECT * FROM categories where id_ph=:id_ph');
            $query->execute([

                'id_ph' => $id_ph
            ]);
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function read_catgall()
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare('SELECT * FROM categories ');
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Méthode pour récupérer un médicament par son ID
    public function getcatById($id_catg)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $pdo->prepare('SELECT * FROM categories WHERE id_catg = :id_catg');
            $query->execute(
                [
                    'id_catg' => $id_catg
                ]
            );
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Méthode pour mettre à jour une catégorie
    public function updatecatg($nom, $id_catg)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $updatequery = $pdo->prepare(
                "UPDATE categories SET 
             nom = :nom
            WHERE id_catg = :id_catg"
            );
            $updatequery->execute([
                'nom' => $nom,
                'id_catg' => $id_catg
            ]);
            return 1;
        } catch (PDOException $e) {
            return 0;
        }
    }

    // Méthode pour supprimer un médicament par son ID
    public function deletecategory($id_catg)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare('DELETE FROM categories WHERE id_catg = :id_catg');
            $query->execute(['id_catg' => $id_catg]);
        } catch (PDOException $e) {
            echo 'La suppression du médicament a échoué: ' . $e->getMessage();
        }
    }
    //count drugs
    public function countcatg()
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM categories');
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
