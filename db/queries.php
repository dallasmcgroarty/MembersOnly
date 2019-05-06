<?php
 //function to query database for all stored foods
 function load_food()
 {
     require('connect_db.php');

     $conn = connect_db();
    //select all froods from the database and display them
     $result = $conn->query('SELECT * FROM Foods');
     if($result->num_rows <= 0)
     {
        echo "<p class='text-center' style='color: red; font-weight: bold'>There are no foods in the database!</p>";
     }
     else {
        while($rows = $result->fetch_assoc())
        {
            echo "<div class='d-flex flex-row justify-content-around' style=''>";
            echo "<div class='p-2' style='color: black;'>" . $rows['FoodName'] . "</div>";
            echo "<div class='p-2' style='color: black;'>" . $rows['FoodType'] . "</div>";
            echo "<div class='p-2' style='color: black;'>" . $rows['Calories'] . "</div>";
            echo "</div>";
        }
     }
     $result->free();
     $conn->close();
 }
 //function to query database to get a users favorite foods
 function load_favorites()
 {
     require('connect_db.php');

     $conn = connect_db();
     $user = "";
     $favorites = [];
        //get user id to load favorites
     $result = $conn->query("SELECT UserID FROM Users WHERE Email ='{$_SESSION['user']}'");
     while($rows = $result->fetch_assoc())
     {
        $user = $rows['UserID'];
     }
     $result->free();
     //inner join on favoritefoods to get foodID
     $result = $conn->query("SELECT * FROM FavoriteFoods INNER JOIN Users on FavoriteFoods.UserID=Users.UserID WHERE Users.UserID = $user");
     if($result->num_rows <= 0)
     {
        echo "<p class='text-center' style='color: red; font-weight: bold'>You have no favorites yet!</p>";
     }
     else {
        while($rows = $result->fetch_assoc())
        {
            array_push($favorites, $rows['FoodID']);
        }
        //use the array of foodIDs to load favorites to display
        $result = $conn->query("SELECT * FROM Foods WHERE FoodID IN (".implode(',', $favorites).")");
     
        while($rows = $result->fetch_assoc())
        {
            echo "<div class='d-flex flex-row justify-content-around' style=''>";
            echo "<div class='p-2' style='color: black;'>" . $rows['FoodName'] . "</div>";
            echo "<div class='p-2' style='color: black;'>" . $rows['FoodType'] . "</div>";
            echo "<div class='p-2' style='color: black;'>" . $rows['Calories'] . "</div>";
            echo "</div>";
        }
        $result->free();
     }
     $conn->close();
 }
 //function to add a favorite food to users list of favorite foods
 function add_favorite($favorite)
 {
    require('connect_db.php');

    $conn = connect_db();

    $favorite = mysqli_real_escape_string($conn, $favorite);

    $food ="";
    $user ="";
    $favorites = [];
    //get food id associated with that food's name
    $stmt = $conn->prepare('SELECT FoodID FROM Foods WHERE FoodName = ?');
    $stmt->bind_param('s', $favorite);
    $stmt->execute();
    $result = $stmt->get_result();
    //check if its in the database
    if($result->num_rows <= 0)
    {
        echo "<p class='text-center' style='color: red; font-weight: bold'>That food is not in the database</p>";
        $stmt->close();
    }
    //else get user id
    elseif ($row = $result->fetch_assoc()) {
        $food = $row['FoodID'];
        $stmt->close();

        $result = $conn->query("SELECT UserID FROM Users WHERE Email ='{$_SESSION['user']}'");
        while($rows = $result->fetch_assoc())
        {
            $user = $rows['UserID'];
        }
        $result->free();
        //check if user already has that food as a favorite
        $result = $conn->query("SELECT * FROM FavoriteFoods INNER JOIN Users on FavoriteFoods.UserID=Users.UserID WHERE Users.UserID = $user");
        while($row = $result->fetch_assoc())
        {
            if($food == $row['FoodID'])
            {
                array_push($favorites, $row['FoodID']);
            }
        }
        //if not a favorite already then add it to the user's favorites
        if(!in_array($food, $favorites))
        {    
            $stmt = $conn->prepare('INSERT INTO FavoriteFoods (UserID, FoodID) VALUES (?, ?)');
            $stmt->bind_param('ss', $user, $food);
            $stmt->execute();
            if(!$stmt)
            {
                echo "<p class='text-center' style='color: red; font-weight: bold'>Error adding favorite! Please try again</p>";
                $stmt->close();
            }
            else {
                echo "<p class='text-center' style='color: LawnGreen; font-weight: bold'>Successfully added a new favorite food</p>";
            }
        }
        else {
            echo "<p class='text-center' style='color: red; font-weight: bold'>That food is already in your favorites</p>";
        }
    }
    $conn->close();
 }
//function to delete a favorite food from users list of favorite foods
 function delete_favorite ($favorite)
 {
    require('connect_db.php');

    $conn = connect_db();

    $favorite = mysqli_real_escape_string($conn, $favorite);

    $food ="";
    $user ="";
    $favorites = [];
    //get food id associated with that food's name
    $stmt = $conn->prepare('SELECT FoodID FROM Foods WHERE FoodName = ?');
    $stmt->bind_param('s', $favorite);
    $stmt->execute();
    $result = $stmt->get_result();
    //check if its in the database
    if($result->num_rows <= 0)
    {
        echo "<p class='text-center' style='color: red; font-weight: bold'>That food is not in the database</p>";
        $stmt->close();
    }
    //else get user id
    elseif ($row = $result->fetch_assoc()) {
        $food = $row['FoodID'];
        $stmt->close();

        $result = $conn->query("SELECT UserID FROM Users WHERE Email ='{$_SESSION['user']}'");
        while($rows = $result->fetch_assoc())
        {
            $user = $rows['UserID'];
        }
        $result->free();
        //check if user has that food as a favorite
        $result = $conn->query("SELECT * FROM FavoriteFoods INNER JOIN Users on FavoriteFoods.UserID=Users.UserID WHERE Users.UserID = $user");
        while($row = $result->fetch_assoc())
        {
            if($food == $row['FoodID'])
            {
                array_push($favorites, $row['FoodID']);
            }
        }
        //if that food is a favorite then delete it from users favorite foods
        if(in_array($food, $favorites))
        {    
            $stmt = $conn->prepare('DELETE FROM FavoriteFoods WHERE UserID = ? AND FoodID = ?');
            $stmt->bind_param('ss', $user, $food);
            $stmt->execute();
            if(!$stmt)
            {
                echo "<p class='text-center' style='color: red; font-weight: bold'>Error deleting favorite! Please try again</p>";
                $stmt->close();
            }
            else {
                echo "<p class='text-center' style='color: LawnGreen; font-weight: bold'>Successfully deleted a favorite food</p>";
            }
        }
    }
    $conn->close();
 }
?>