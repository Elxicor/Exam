<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truck Management</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Truck Management System</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Capacity (Tons)</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="truck-data">
            <?php
                // Conexión a la base de datos
                $host = 'localhost';
                $dbname = 'truck_management';
                $username = 'root';
                $password = 'admin123';

                try {
                    // Crear la conexión
                    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Consultar los camiones
                    $sql = "SELECT id, make, model, year, capacity, status FROM trucks";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    $trucks = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Mostrar los datos en la tabla
                    foreach ($trucks as $truck) {
                        echo "<tr>
                                <td>{$truck['id']}</td>
                                <td>{$truck['make']}</td>
                                <td>{$truck['model']}</td>
                                <td>{$truck['year']}</td>
                                <td>{$truck['capacity']}</td>
                                <td>{$truck['status']}</td>
                            </tr>";
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='6'>Error al recuperar los datos: " . $e->getMessage() . "</td></tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
