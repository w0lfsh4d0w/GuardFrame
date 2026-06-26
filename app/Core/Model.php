<?php
class Model
{
    protected $pdo;
    public function __construct()
    {
        $config =require __DIR__ . '/../../config.php' ; 
        $dbconfig = $config['database'];
        $dsn = "mysql:host={$dbconfig['host']};port={$dbconfig['port']};dbname={$dbconfig['dbname']};charset={$dbconfig['charset']}";
        try {
            $this->pdo = new PDO($dsn, $dbconfig['username'], $dbconfig['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (\PDOException $e) {
            error_log("Database Error: " . $e->getMessage());

            die("sorry , please try again leater ");
        }
    }
}
