CREATE DATABASE your_database_name;

USE your_database_name;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL
);

INSERT INTO users (email, password) VALUES ('kapilrajkc10@gmail.com', md5('12345678'));
