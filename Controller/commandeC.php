<?php

class CmdC
{

    public function addCmd($cmd)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('INSERT INTO commandes( qte_cmd ,id_med, user_id) VALUES( :qte_cmd ,:id_med ,:user_id )');
            $query->execute([
                //  'date_cmd' => $cmd->date_cmd,
                'qte_cmd' => $cmd->qte_cmd,
                'id_med' => $cmd->id_med,
                'user_id' => $cmd->user_id,

            ]);
            if ($query->errorCode() !== '00000') {
                var_dump($query->errorInfo());
            }
            echo "Commande ajoutée avec succès";
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function countcmd()
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $pdo->prepare('SELECT COUNT(*) as count FROM pannier');
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    public function readC()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT date_cmd, qte_cmd FROM commandes');
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function readAllforuser($user_id)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT * FROM commandes where user_id=:user_id');
            $query->bindValue(':user_id', $user_id);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function readAll()
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT * FROM pannier');
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function updateCmd($date, $qte, $id_cmd)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare('UPDATE commandes SET date_cmd = :new_date_cmd, qte_cmd = :new_qte_cmd WHERE id_cmd = :id_cmd');
            $query->bindValue(':new_date_cmd', $date);
            $query->bindValue(':new_qte_cmd', $qte);
            $query->bindValue(':id_cmd', $id_cmd);
            $query->execute();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public function deleteCmd($id_cmd)
    {
        try {
            $pdo = config::getConnexion(); //obtenir la connexion pdo depuis la class config
            $query = $pdo->prepare(
                'DELETE FROM commandes where id_cmd= :id_cmd'
            );
            $query->execute([
                'id_cmd' => $id_cmd
            ]);
            header('Location: dashpatient.php');
        } catch (PDOException $e) {
            echo "oups update failed" . $e->getMessage();
        }
    }

    public function getCmdById($id_cmd)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT * FROM commandes WHERE id_cmd = :id_cmd');
            $query->execute([
                'id_cmd' => $id_cmd
            ]);

            // Check if a record is found
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result;
            } else {
                return false; // No record found
            }
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function readAllUser($id)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT * FROM commandes where user_id =:id');
            $query->execute(['id' => $id]);
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function deleteCmd2($id_cmd)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('DELETE FROM commandes WHERE id_cmd = :id_cmd');
            $query->execute(['id_cmd' => $id_cmd]);

            if ($query->errorCode() !== '00000') {
                var_dump($query->errorInfo());
            }
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
class pannC
{
    public function addPan($id_cmd, $id_med, $qte_med, $user_id, $date)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('INSERT INTO pannier(id_cmd, id_med, qte_med, user_id, date) VALUES(:id_cmd, :id_med,:qte_med ,:user_id, :date)');
            $query->execute([
                'id_cmd' => $id_cmd,
                'id_med' => $id_med,
                'qte_med' => $qte_med,
                'user_id' => $user_id,
                'date' => $date,

            ]);
            if ($query->errorCode() !== '00000') {
                var_dump($query->errorInfo());
            }
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }



    public function readpannierforuser($id)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT * FROM pannier where user_id =:id');
            $query->execute(['id' => $id]);
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function readwithdate($date)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('SELECT * FROM pannier WHERE date = :date');
            $query->execute(['date' => $date]);
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function deleteByDate($date)
    {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare('DELETE FROM pannier WHERE date = :date');
            $query->execute(['date' => $date]);

            // Check if any row was affected

        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
