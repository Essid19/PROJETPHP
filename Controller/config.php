<?php
class config
{
    private static $pdo = NULL;


    public static function getConnexion()
    {
        if (!self::$pdo) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=localhost; dbname=db',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
                // echo "connected successfully";
            } catch (PDOException $e) {
                die('Erreur:' . $e->getMessage());
            }
        }
        return  self::$pdo;
    }
}
