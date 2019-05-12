<?php
    require('auth/user_auth.php');

    if(!check_user())
    {
      header('Location: non_member_home.php');
    }
    require('header.html');
?>
<body class="container" style="background-color: lightblue;">
  <header>    
    <h1 class="text-center" style="font-family: 'Bangers', cursive; margin-top: 10px">Member's Home Page</h1>
  </header>
  <ul class="nav nav-tabs justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" href="members_home.php">Home</a>
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
  <div class="d-flex justify-content-center container" style="flex-direction: column;">
    <div class="d-flex justify-content-center align-self-center" style="flex-direction: column; background-color: white; width: 60%; border-radius: 5px; margin-top: 20px;">
        <div class="d-flex flex-row justify-content-center" style="padding-top: 20px; width: 100%">
          <div class='p-2' style='color: black; font-weight: bold'>Welcome!</div>
        </div>
        <div class="d-flex flex-row justify-content-center" style="margin-left: 10px; margin-right: 10px;">
          <div class='p-2' style='color: black;'>As a member you have access to our food database.
            Use the navigation bar above to view the current stored foods list and to view your own favorite foods.
            You may sign out at any time and all your data will be saved.</div>
        </div>
      </div>
  </div>
<?php
    require('footer.html');
?>