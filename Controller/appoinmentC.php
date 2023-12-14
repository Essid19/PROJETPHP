<?php

class apppoinementC
{
    public function addRdv($rdv)
    {
        try {
            $date = $rdv->date;
            $time = $rdv->time;
            $id_d = $rdv->id_d;

            $pdo = config::getConnexion();
            $query = $pdo->prepare(
                'INSERT INTO `rendez-vous` (`date`, `time`, `id_p`, `status`, `id_d`) VALUES (:date, :time, :id_p, :status, :id_d)'
            );

            $query->execute([
                'date' => $rdv->date,
                'time' => $rdv->time,
                'id_p' => $rdv->id_p,
                'status' => $rdv->status,
                'id_d' => $rdv->id_d,
            ]);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function checkDuplicateRdv($date, $time, $id_d)
    {

        $pdo = config::getConnexion();
        $query = $pdo->prepare(
            'SELECT COUNT(*) AS count FROM `rendez-vous` WHERE `date` = :date AND `time` = :time AND `id_d` = :id_d'
        );

        $query->execute([
            'date' => $date,
            'time' => $time,
            'id_d' => $id_d,
        ]);

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] == 0) {
            return true;
        } else {
            return false;
        }
    }
    public function readAllRdv()
    {
        try {
            $pdo = config::getConnexion();
            $query =  $pdo->prepare(
                'SELECT * FROM `rendez-vous` '
            );
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function readrdvfordoctor($id)
    {
        try {
            $pdo = config::getConnexion();
            $query =  $pdo->prepare(
                'SELECT * FROM `rendez-vous` where id_d=:id '
            );
            $query->execute([
                'id' => $id,

            ]);
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function deleteRDV($id)
    {
        $conn = config::getConnexion();


        $query = $conn->prepare("DELETE FROM `rendez-vous` WHERE id_rendezvous = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);

        try {
            $query->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression du client : " . $e->getMessage();
        }
    }
    public function readAllRdvforoneuser($id)
    {
        try {
            $pdo = config::getConnexion();
            $query =  $pdo->prepare(
                'SELECT * FROM `rendez-vous` where id_p = :id'
            );
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function readrdv($id)
    {
        try {
            $pdo = config::getConnexion(); //obtenir la connexion pdo depuis la class config
            $query =  $pdo->prepare(
                'SELECT * FROM `rendez-vous` where id_rendezvous=:id'
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
    public function updaterdv($date, $time, $id)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $updateQuery = $pdo->prepare(
                "UPDATE `rendez-vous` SET
                      date = :date,
                      time = :time
                      WHERE id_rendezvous = :id"
            );
            $updateQuery->execute([
                'date' => $date,
                'time' => $time,
                'id' => $id,
            ]);

            // Vérifier si la mise à jour a réussi
            if ($updateQuery->rowCount() > 0) {
                echo 'Data updated!';
            } else {
                echo 'No changes made or appointment not found.';
            }
        } catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
        }
    }
    public function accept($id)
    {
        try {
            $pdo = config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $updateQuery = $pdo->prepare(
                "UPDATE `rendez-vous` SET
                      status=:val
                      WHERE id_rendezvous =:id"
            );
            $updateQuery->execute([
                'val' => 'ok',
                'id' => $id
            ]);
        } catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
        }
    }
}
