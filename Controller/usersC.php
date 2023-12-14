<?php

class usersC
{
    public function countAdmins()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM users');
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    public function login($email, $password)
    {
        try {
            $pdo = config::getConnexion();

            $select_user = $pdo->prepare("SELECT * FROM users WHERE email = :email and pwd = :password");
            $select_user->bindValue(':email', $email, PDO::PARAM_STR);
            $select_user->bindValue(':password', $password, PDO::PARAM_STR);
            $select_user->execute();

            $row = $select_user->fetch(PDO::FETCH_ASSOC);

            // Utilisez isset pour vérifier si $row['user_id'] est défini
            if (isset($row['user_id'])) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['role'] = $row['role'];
                if ($_SESSION['role'] == 'doctor') {
                    echo '<script>window.location.href = "homedoctor.php";</script>';
                } else {
                    echo '<script>window.location.href = "index.php";</script>';
                }
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // method add comment
    public function adduser($user)
    {
        try {
            $pdo = config::getConnexion();
            if ($this->isEmailUnique($user->email)) {
                $query = $pdo->prepare(
                    'INSERT INTO users (nom,prenom,email,pwd ,role ,adresse) VALUES(:nom,:prenom,:email,:pwd, :role, :adresse)',
                );

                $query->execute(
                    [
                        'nom' => $user->nom,
                        'prenom' => $user->prenom,
                        'email' => $user->email,
                        'pwd' => $user->pwd,
                        'role' => $user->role,
                        'adresse' => $user->adresse
                    ]
                );
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function adddoctor($user)
    {
        try {
            $pdo = config::getConnexion();

            if ($this->isEmailUnique($user->email)) {
                $query = $pdo->prepare(
                    'INSERT INTO users (nom,prenom,email,pwd,adresse ,role, specialite, experience, img) VALUES(:nom,:prenom,:email,:pwd,:adresse, :role, :specialite, :experience, :img)',
                );

                $query->execute(
                    [
                        'nom' => $user->nom,
                        'prenom' => $user->prenom,
                        'email' => $user->email,
                        'pwd' => $user->pwd,
                        'adresse' => $user->adresse,
                        'role' => $user->role,
                        'specialite' => $user->specialite,
                        'experience' => $user->experience,
                        'img' => $user->img
                    ]
                );
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function isEmailUnique($email)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM users WHERE email = :email');
            $query->execute(['email' => $email]);

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return ($result['count'] == 0);
        } catch (PDOException $e) {
            return 0;
        }
    }
    public function isEmailUniqueedit($email)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM users WHERE email = :email');
            $query->execute(['email' => $email]);

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return ($result['count'] == 1);
        } catch (PDOException $e) {
            return 0;
        }
    }
    public function isEmailexiste($email)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM users WHERE email = :email');
            $query->execute(['email' => $email]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return ($result['count'] == 1);
        } catch (PDOException $e) {
            return 0;
        }
    }
    public function countDoctors()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM users where role = "doctor"');
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function countrdv($id)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM `rendez-vous` where id_d =:id');
            $query->execute(['id' => $id]);

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    public function countPatients()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM users where role = "patient"');
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function countPharmacies()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM users where role = "pharmacie"');
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    //count forums
    public function countForums($user_id)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM forum where user_id =:user_id');
            $query->execute([
                'user_id' => $user_id
            ]);

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function readadmins()
    {
        try {
            $pdo = config::getConnexion(); //obtenir la connexion pdo depuis la class config
            $query =  $pdo->prepare(
                'SELECT * FROM users WHERE role = "admin"'
            );
            $query->execute();
            //echo "liste des commentaires récupérée avec succée!";
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function readpatient()
    {
        try {
            $pdo = config::getConnexion(); //obtenir la connexion pdo depuis la class config
            $query =  $pdo->prepare(
                'SELECT * FROM users WHERE role = "patient"'
            );
            $query->execute();
            //echo "liste des commentaires récupérée avec succée!";
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function readdoctor()
    {
        try {
            $pdo = config::getConnexion(); //obtenir la connexion pdo depuis la class config
            $query =  $pdo->prepare(
                'SELECT * FROM users WHERE role = "doctor"'
            );
            $query->execute();
            //echo "liste des commentaires récupérée avec succée!";
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    // Fonction de recherche des docteur
    public function searchDoctor($Term)
    {
        try {
            $Term = '%' . $Term . '%';
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT * FROM users WHERE nom LIKE :Term OR specialite LIKE :Term and role="doctor"');
            $query->bindParam(':Term', $Term, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function readpharmacy()
    {
        try {
            $pdo = config::getConnexion(); //obtenir la connexion pdo depuis la class config
            $query =  $pdo->prepare(
                'SELECT * FROM users WHERE role = "pharmacie"'
            );
            $query->execute();
            //echo "liste des commentaires récupérée avec succée!";
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function readall($user_id)
    {
        try {
            $pdo = config::getConnexion(); //obtenir la connexion pdo depuis la class config
            $query =  $pdo->prepare(
                'SELECT * FROM users where user_id = ' . $user_id
            );
            $query->execute();
            //echo "liste des commentaires récupérée avec succée!";
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function deleteuser($id)
    {
        $conn = config::getConnexion();


        $query = $conn->prepare("DELETE FROM users WHERE user_id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);

        try {
            $query->execute();
            echo "Le client avec l'ID $id a été supprimé avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression du client : " . $e->getMessage();
        }
    }

    public function read($id)
    {
        try {
            $pdo = config::getConnexion(); //obtenir la connexion pdo depuis la class config
            $query =  $pdo->prepare(
                'SELECT * FROM users where user_id=:id'
            );
            $query->execute([
                'id' => $id
            ]);
            //echo "liste des commentaires récupérée avec succée!";
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }




    public function updateuser($user, $id)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $updateQuery = $pdo->prepare(
                "UPDATE users SET
                  nom = :nom,
                  prenom = :prenom ,
                  email= :email ,
                  pwd = :pwd , 
                  specialite= :specialite , experience= :experience , img = :img ,  adresse =:adresse
                   WHERE user_id= :id"
            );
            $updateQuery->execute([
                'nom' => $user->nom,
                'prenom' => $user->prenom,
                'email' => $user->email,
                'pwd' => $user->pwd,
                'specialite' => $user->specialite,
                'experience' => $user->experience,
                'img' => $user->img,
                'adresse' => $user->adresse,
                'id' => $id,

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

    public function updatePassword($email, $pwd)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('UPDATE users SET pwd = :pwd WHERE email = :email');
            $query->execute(['email' => $email, 'pwd' => $pwd]);


            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
