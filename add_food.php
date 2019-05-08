<?php
//page for adding a new food to the database and food list
    require('auth/user_auth.php');

    if(!check_user())
    {
      header('Location: non_member_home.php');
    }

    require('header.html');
?>
<body class="container" style="background-color: lightblue;">
  <header>    
    <h1 class="text-center" style="font-family: 'Bangers', cursive; margin-top: 10px">Add Food</h1>
  </header>
  <ul class="nav nav-tabs justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="members_home.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="food_list.php">Foods</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="favorites_list.php">Favorites</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="sign_out.php">Sign out</a>
  </li>
  </ul>
  <div class="d-flex justify-content-center container">
  <div class="d-flex justify-content-center align-self-center form-body" style="background-color: white; width: 60%; border-radius: 5px; margin-top: 20px;">
    <form action="add_food.php" method="post" style="width:80%;">
        <div class="form-group" style="padding-top: 40px; width: 100%">
            <p class=text-center style='color: black; font-weight: bold'>Add a new food</p>
            <?php
              //check if user input
              if(empty($_POST['food']) || empty($_POST['foodType']) || empty($_POST['calories']))
              {
                  //echo "<p class='text-center' style='color: red; font-weight: bold'>Enter a food to add</p>";
              }
              else {
                    //call add_food function
                    $food = $_POST['food'];
                    $type = $_POST['foodType'];
                    $calories = $_POST['calories'];
                    
                    require('db/queries.php');
                    add_food($food, $type, $calories);
                }
            ?>
            <input class="form-control" name="food" id="food" placeholder="Enter name of the food" autofocus>
        </div>
        <div class="form-group" style="">
            <input class="form-control" name="foodType" id="foodType" placeholder="Type of food" autofocus >
        </div>
        <div class="form-group" style="">
            <input class="form-control" name="calories" id="calories" placeholder="Enter number of calories" autofocus >
        </div>
        <div class="d-flex flex-row justify-content-center" style="margin-top: 10px; margin-bottom: 10px;">
        <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; width: 60%">Add</button>
        </div>
    </form>
  </div>
</div>
<?php
    require('footer.html');
?>