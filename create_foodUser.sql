/*create user script
  needed to use mysql_native_password otherwise i couldnt connect to the database using mysqli */
CREATE USER 'foodUser'@'localhost' IDENTIFIED WITH mysql_native_password BY 'food123';
GRANT ALL ON Food.* TO 'foodUser'@'localhost';
FLUSH PRIVILEGES;