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
<?php
    require('footer.html');
?>