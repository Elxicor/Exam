-- Crear la tabla trucks
CREATE TABLE IF NOT EXISTS trucks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    year INT NOT NULL,
    capacity DECIMAL(10,2) NOT NULL,
    status VARCHAR(20) NOT NULL
);

-- Insertar datos de ejemplo
INSERT INTO trucks (make, model, year, capacity, status) VALUES
('Volvo', 'FH16', 2022, 25.5, 'Active'),
('Mercedes-Benz', 'Actros', 2021, 30.0, 'Active'),
('Scania', 'R500', 2023, 28.5, 'Active'),
('MAN', 'TGX', 2020, 26.0, 'Maintenance'),
('DAF', 'XF', 2022, 29.0, 'Active');
