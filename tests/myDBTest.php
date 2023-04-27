<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class myDBTest extends TestCase
{
    public function testConnexionPDO(): void
    {   
        try {
            $dbconfig = parse_ini_file(".env");

            $CONNECTION = $dbconfig["DB_CONNECTION"];
            $HOST = $dbconfig["DB_HOST"];
            $PORT = $dbconfig["DB_PORT"];
            $DATABASE = $dbconfig["DB_DATABASE"];
            $USERNAME = $dbconfig["DB_USERNAME"];
            $PASSWORD = $dbconfig["DB_PASSWORD"];

            $pdo = new PDO("mysql:host=".$HOST.";dbname=".$DATABASE.";charset=utf8mb4", $USERNAME, $PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $pdo->prepare('SELECT 1;');
            $result = $query->execute();

            $this->assertTrue($result, "Connexion à la base de données réussie.");
        } catch (Exception $e) {
            $this->assertTrue(false, "Impossible de se connecter à la base de données.");
        }
    }

    public function test()
    {
        
    }
}