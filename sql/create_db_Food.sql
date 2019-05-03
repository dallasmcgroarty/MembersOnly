/* To run script in terminal on windows use:
     */

CREATE DATABASE IF NOT EXISTS Food;

USE Food;

CREATE TABLE Users
    (UserID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     FirstName CHAR(50) NOT NULL,
     LastName CHAR(50) NOT NULL,
     Email VARCHAR(255) NOT NULL,
     PasswordHash VARCHAR(256) NOT NULL
    );

CREATE TABLE Foods
    (FoodID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     FoodName CHAR(50) NOT NULL,
     FoodType CHAR(50) NOT NULL,
     Calories SMALLINT 
    );

CREATE TABLE FavoriteFoods
    (UserID INT NOT NULL,
     FoodID INT NOT NULL,
     
     PRIMARY KEY (UserID, FoodID),
     FOREIGN KEY (UserID) REFERENCES Users(UserID),
     FOREIGN KEY (FoodID) REFERENCES Foods(FoodID)
    );

/*Insert some test data*/
INSERT INTO Users (FirstName, LastName, Email, PasswordHash)
VALUES ('Tom', 'Floors', 'tomfloors@yahoo.com', 'slknig94nklnfls94ksnmgfngk204ngf0');
INSERT INTO Users (FirstName, LastName, Email, PasswordHash)
VALUES ('Tina', 'Coors', 'tinacoors@gmail.com', 'klfngnognfklhnd592mnfkldng02nmgln');
SET @userID = LAST_INSERT_ID();

INSERT INTO Foods (FoodName, FoodType, Calories)
VALUES ('Apple', 'Fruit', 95);
INSERT INTO Foods (FoodName, FoodType, Calories)
VALUES ('Banana', 'Fruit', 105);
SET @foodID = LAST_INSERT_ID();
INSERT INTO Foods (FoodName, FoodType, Calories)
VALUES ('Broccoli', 'Vegetable', 50);
INSERT INTO Foods (FoodName, FoodType, Calories)
VALUES ('Pineapple', 'Fruit', 82);
INSERT INTO Foods (FoodName, FoodType, Calories)
VALUES ('Watermelon', 'Fruit', 85);

/* Insert favorite using last insert id, just using it for testing purposes */
INSERT INTO FavoriteFoods (UserId, FoodID)
VALUES (@userID, @foodID);

INSERT INTO FavoriteFoods (UserID, FoodID)
VALUES (1, 5);