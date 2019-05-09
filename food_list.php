<?php
//page to show current stored food
    require('auth/user_auth.php');

    if(!check_user())
    {
      header('Location: non_member_home.php');
    }
    require('header.html');
?>
<body class="container" style="background-color: lightblue;">
  <header>    
    <h1 class="text-center" style="font-family: 'Bangers', cursive; margin-top: 10px">Food List</h1>
  </header>
  <ul class="nav nav-tabs justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="members_home.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="food_list.php">Foods</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="favorites_list.php">Favorites</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="sign_out.php">Sign out</a>
  </li>
  </ul>
  <div class="d-flex justify-content-center container" style="flex-direction: column;">
    <div class="d-flex justify-content-center align-self-center" style="flex-direction: column; background-color: white; width: 60%; border-radius: 5px; margin-top: 20px;">
        <div class="d-flex flex-row justify-content-center" style="padding-top: 20px; width: 100%">
          <div class='p-2' style='color: black; font-weight: bold'>Current Stored Food</div>
        </div>
        <div class="d-flex flex-row justify-content-around align-items-center" style="">
          <div class='p-2' style='color: black; font-weight: bold; width: 50px;'>Food</div>
          <div class='p-2' style='color: black; font-weight: bold; width: 50px;'>Type</div>
          <div class='p-2' style='color: black; font-weight: bold; width: 50px;'>Calories</div>
        </div>
        <?php
            require('db/queries.php');
            load_food();
        ?>
        <div class="d-flex flex-row justify-content-center" style="margin-top: 20px; margin-bottom: 10px;">
        <a role="button" class="btn btn-primary p-2" href=add_food.php style="width: 50%">Add food</a>
        </div>
      </div>
  </div>
<?php
    require('footer.html');
?>