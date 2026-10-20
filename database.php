<?php   
require __DIR__ . '/vendor/autoload.php';  

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); 
$dotenv->load();  

function getDatabaseConnection() {
    $host = $_ENV['DB_HOST']; 
    $port = $_ENV['DB_PORT'];  
    $db   = $_ENV['DB_NAME'];  
    $user = $_ENV['DB_USER'];  
    $pass = $_ENV['DB_PASS'];   

    try {      
        $dsn = "pgsql:host=$host;port=$port;dbname=$db";      
        $pdo = new PDO($dsn, $user, $pass, [          
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);           
        
        return $pdo;  
    } catch (PDOException $e) {      
        die("Connection error: " . $e->getMessage());  
    }  
}
?>
