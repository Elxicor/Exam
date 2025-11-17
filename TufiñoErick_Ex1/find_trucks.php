<?php

$host = 'localhost'; 
$dbname = 'truck_management'; 
$username = 'root'; 
$password = 'admin123'; 


$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    
    $sql = "SELECT id, make, model, year, capacity, status FROM trucks";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $trucks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($trucks);

} catch (PDOException $e) {
    
    echo json_encode(['error' => 'Error fetching data: ' . $e->getMessage()]);
}


$conn = null;
?>
