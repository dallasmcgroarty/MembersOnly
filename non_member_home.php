<?php
    require('header.html');
?>
<body class="container" style="background-color: lightblue;">
  <header>    
    <h1 class="text-center" style="font-family: 'Bangers', cursive; margin-top: 10px">Non-Member's Home Page</h1>
  </header>
  <div class="d-flex justify-content-center container" style="flex-direction: column;">
    <div class="d-flex justify-content-center align-self-center" style="flex-direction: column; background-color: white; width: 60%; border-radius: 5px; margin-top: 20px;">
        <div class="d-flex flex-row justify-content-center" style="padding-top: 20px; width: 100%">
          <div class='p-2' style='color: black; font-weight: bold'>Welcome!</div>
        </div>
        <div class="d-flex flex-row justify-content-center" style="margin-left: 10px; margin-right: 10px;">
          <div class='p-2' style='color: black;'>As a non-member you may only have access to veiwing the
            current stored food in the database.</div>
        </div>
        <div class="d-flex flex-row justify-content-center" style="width: 100%">
          <div class='p-2' style='color: black; font-weight: bold'>Current Stored Food</div>
        </div>
        <div class="d-flex flex-row justify-content-around align-items-center" style="">
          <div class='p-2' style='color: black; font-weight: bold'>Food</div>
          <div class='p-2' style='color: black; font-weight: bold'>Type</div>
          <div class='p-2' style='color: black; font-weight: bold'>Calories</div>
        </div>
        <?php
            require('db/queries.php');
            load_food();
        ?>
      </div>
      <a class="d-flex align-self-end float-right" href=login.php role="button" style="; margin-top: 10px; width: 80%; text-decoration: none; font-size: 15px;">Return to sign in</a>
  </div>
<?php
    require('footer.html');
?>