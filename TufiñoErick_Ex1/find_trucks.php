<?php
header('Content-Type: application/json');

// Usar variables de entorno de Railway (o valores locales por defecto)
$host = getenv('MYSQLHOST') ?: 'localhost'; 
$port = getenv('MYSQLPORT') ?: '3306';
$dbname = getenv('MYSQLDATABASE') ?: 'truck_management'; 
$username = getenv('MYSQLUSER') ?: 'root'; 
$password = getenv('MYSQLPASSWORD') ?: 'admin123'; 

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT id, make, model, year, capacity, status FROM trucks";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $trucks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($trucks);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error fetching data: ' . $e->getMessage()]);
}

$conn = null;
?>
