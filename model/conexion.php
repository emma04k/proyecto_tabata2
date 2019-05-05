<?php
class DB
{
    private static $db = null;

    public function __construct()
    {
    }

    public static function connect()
    {
        if( self::$db == null)
        {
            self::$db = self::Database();
        }
        return self::$db;
    }

    private static function Database()
    {
        try {
            $host = 'localhost';
            $db = 'tabata';
            $user = 'root';
            $password = "";
            $charset = 'utf8mb4';
            $connection = "mysql:host=" . $host . ";dbname=" . $db . ";charset=" . $charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($connection, $user, $password, $options);


            return $pdo;

        } catch (PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
        }
        return null;
    }


}
?>