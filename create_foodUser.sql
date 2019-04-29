CREATE USER 'foodUser'@'localhost' IDENTIFIED BY 'food123';
GRANT ALL ON Food.* TO 'foodUser'@'localhost';
FLUSH PRIVILEGES;