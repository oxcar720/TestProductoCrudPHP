DROP DATABASE IF EXISTS crud_app;

CREATE DATABASE crud_app
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

use crud_app;

DROP TABLE IF EXISTS Producto;
CREATE TABLE Producto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT
);

DROP PROCEDURE IF EXISTS registrarNuevoProducto;
DELIMITER //
CREATE PROCEDURE registrarNuevoProducto (
    IN nuevo_nombre VARCHAR(20), 
    IN n_descripcion TEXT, 
    IN n_precio DECIMAL(10,2), 
    IN n_stock INT
)
BEGIN
    INSERT INTO Producto 
    (nombre, descripcion, precio, stock) 
    VALUES (nuevo_nombre, n_descripcion, n_precio, n_stock);
END;
//
DELIMITER ;

DROP PROCEDURE IF EXISTS eliminarProducto;
DELIMITER //
CREATE PROCEDURE eliminarProducto (
    IN p_id INT
)
BEGIN
    DELETE FROM Producto WHERE id = p_id;
END;
//
DELIMITER ;

DROP PROCEDURE IF EXISTS actualizarProducto;
DELIMITER //
CREATE PROCEDURE actualizarProducto (
    IN p_id INT,
    IN nuevo_nombre VARCHAR(20),
    IN n_descripcion TEXT,
    IN n_precio DECIMAL(10,2),
    IN n_stock INT
)
BEGIN
    UPDATE Producto
    SET nombre = nuevo_nombre,
        descripcion = n_descripcion,
        precio = n_precio,
        stock = n_stock
    WHERE id = p_id;
END;
//
DELIMITER ;

DROP PROCEDURE IF EXISTS buscarProductoId;
DELIMITER //
CREATE PROCEDURE buscarProductoId (
    IN p_id INT
)
BEGIN
    SELECT * FROM Producto WHERE id = p_id;
END;
//
DELIMITER ;

DROP PROCEDURE IF EXISTS consultarTodosLosProductos;
DELIMITER //
CREATE PROCEDURE consultarTodosLosProductos()
BEGIN 
    SELECT * FROM Producto LIMIT 20;
END;
//
DELIMITER ;



call registrarNuevoProducto ('computador', 'computador y sus caracteristicas', 2000000, 300);
call registrarNuevoProducto ('mouse', 'raton de alta calidad', 18000, 132);
call registrarNuevoProducto ('monitor', 'monitor de alta resolución', 800000, 6);
call registrarNuevoProducto ('celular ultimo modelo', 'con todas las caracteristicas premium del ultimo año', 2340000, 23);
call registrarNuevoProducto ('teclados al por mayor', 'por cada 100 unidades compradas se obsequían 5 unidades mas', 130000, 350);