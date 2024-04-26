
DROP TABLE IF EXISTS produits;

CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categorie VARCHAR(50) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    code VARCHAR(10) NOT NULL,
    description VARCHAR(255) NOT NULL,
    stock INT NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) NOT NULL
);

DROP TABLE IF EXISTS user_data;

CREATE TABLE user_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
);
